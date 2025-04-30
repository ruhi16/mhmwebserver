<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Session;
use App\Models\Studentcr;
use Illuminate\Http\Request;
use Livewire\Component;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminMarkRegisterComponent extends Component
{
    public $active_session = null;

    public $myclassSection = null;
    public $studentcrs = null;

    public $myclassSubjects = null;
    public $exams = null;
    public $examdetails = null;

    public $marksentries = null;

    public $grades = null;

    public function mount($myclassSection_id)
    {
        $this->active_session = Session::currentlyActive();

        // Load class section with eager loading
        $this->myclassSection = Myclasssection::with([
            'myclass',
            'section',
        ])->find($myclassSection_id);

        // Load only relevant subjects for this class
        $this->myclassSubjects = Myclasssubject::with('subject')
            ->where('myclass_id', $this->myclassSection->myclass_id)
            ->orderBy('examtype_id', 'asc')
            ->orderBy('subject_order', 'asc')
            ->get();

        // Load only exams for the current session
        $this->exams = Exam::where(
            'session_id',
            $this->active_session->id
        )->get();

        // Load exam details with eager loading
        $this->examdetails = $this->myclassSection->myclass
            ->examdetails()
            ->with(['exammode'])
            ->get();

        // Load students with eager loading
        $this->studentcrs = $this->active_session
            ->studentcrs()
            ->with('studentdb')
            ->where('myclass_id', $this->myclassSection->myclass_id)
            ->where('section_id', $this->myclassSection->section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

        // Load marks entries with eager loading
        $this->marksentries = $this->active_session
            ->myclasssections()
            ->where('id', $myclassSection_id)
            ->first()
            ->marksentries()
            ->get();

        
        // Load grades
        $this->grades = Grade::all();
    }

    public function exportMarkregisterPdf(Request $request)
    {
        // Reuse existing data if already loaded
        if (
            !$this->myclassSection ||
            $this->myclassSection->id != $request->myclassSection_id
        ) {
            $this->mount($request->myclassSection_id);
        }

        // Pre-process data to avoid complex calculations in the view
        $processedData = $this->preprocessDataForPdf();
        // json_encode($processedData);

        $pdf = PDF::loadView(
            'pdfs.tmp_marksregister',
            [
                'classSection' => $this->myclassSection,
                'myclassSubjects' => $this->myclassSubjects,
                'studentcrs' => $this->studentcrs,
                'exams' => $this->exams,
                'examdetails' => $this->examdetails,
                'marksentries' => $this->marksentries,
                'grades' => $this->grades,
                'processedData' => $processedData,
            ],
            [],
            [
                'title' => 'Mark Register',
                'format' => 'A4-L',
                'orientation' => 'L',
                'margin_top' => 0,
                'margin_bottom' => 10,
                'margin_left' => 10,
                'margin_right' => 10,
            ]
        );

        $name =
            $this->active_session->name .
            ' Mark Reg ' .
            $this->myclassSection->myclass->name .
            ' - ' .
            $this->myclassSection->section->name .
            '.pdf';
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $name);
    }

    /**
     * Pre-process data to avoid complex calculations in the view
     */
    private function preprocessDataForPdf()
    {
        $processedData = [];

        // Pre-calculate exam details by exam and subject
        $examDetailsByExamAndSubject = [];
        foreach ($this->examdetails as $examDetail) {
            $key = $examDetail->exam_id . '_' . $examDetail->subject_id;
            if (!isset($examDetailsByExamAndSubject[$key])) {
                $examDetailsByExamAndSubject[$key] = [];
            }
            $examDetailsByExamAndSubject[$key][] = $examDetail;
        }

        // Pre-calculate marks by student and exam detail
        $marksByStudentAndExamDetail = [];
        foreach ($this->marksentries as $markEntry) {
            $key = $markEntry->studentcr_id . '_' . $markEntry->examdetail_id;
            if (!isset($marksByStudentAndExamDetail[$key])) {
                $marksByStudentAndExamDetail[$key] = [];
            }
            $marksByStudentAndExamDetail[$key][] = $markEntry;
        }

        // Pre-calculate totals and grades for each student
        $studentTotalsAndGrades = [];
        foreach ($this->studentcrs as $studentcr) {
            $studentTotalsAndGrades[$studentcr->id] = [];

            foreach ($this->myclassSubjects as $classSubject) {
                $subjectId = $classSubject->subject->id;

                // Get all exam details for this subject
                $subjectExamDetails = $this->examdetails->where(
                    'subject_id',
                    $subjectId
                );

                // Calculate total marks
                $totalMarks = 0;
                $fullMarks = 0;

                foreach ($subjectExamDetails as $examDetail) {
                    $key = $studentcr->id . '_' . $examDetail->id;
                    $marks = $marksByStudentAndExamDetail[$key] ?? [];

                    foreach ($marks as $mark) {
                        if ($mark->marks >= 0) {
                            $totalMarks += $mark->marks;
                        }
                    }

                    $fullMarks += $examDetail->full_mark;
                }

                // Calculate percentage and grade
                $percentage =
                    $fullMarks > 0
                        ? round(($totalMarks / $fullMarks) * 100, 2)
                        : 0;
                $grade = $this->grades
                    ->where('stpercentage', '<=', $percentage)
                    ->where('enpercentage', '>=', $percentage)
                    ->first();

                $studentTotalsAndGrades[$studentcr->id][$subjectId] = [
                    'total_marks' => $totalMarks,
                    'full_marks' => $fullMarks,
                    'percentage' => $percentage,
                    'grade' => $grade ? $grade->gradeparticular->name : '--',
                ];
            }
        }

        return [
            'examDetailsByExamAndSubject' => $examDetailsByExamAndSubject,
            'marksByStudentAndExamDetail' => $marksByStudentAndExamDetail,
            'studentTotalsAndGrades' => $studentTotalsAndGrades,
        ];
    }

    public function render()
    {
        return view('livewire.admin-mark-register-component');
    }
}
