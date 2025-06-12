<?php

namespace App\Http\Livewire;

use App\Models\HsStudentdb;
use App\Models\HsClass;
use App\Models\HsExamDetails;
use App\Models\HsExamName;
use App\Models\HsStudentCr;
use App\Models\HsSubject;
use App\Models\HsMarksentry;
use App\Models\HsClassSemester;

use Illuminate\Support\Facades\DB;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


use Livewire\Component;

class AdminHSMainSectionComponent extends Component
{
    public $hs_studentdbs = [];
    public $hs_classes;
    public $hs_exam_details;
    public $hs_Studentcrs;
    public $hs_subjects;
    public $hs_marksentries;

    public $selectedHsSubjectId = null;
    public $examDetailId = null;
    public $marks = [];
    public $mark;
    public $value = 'na', $key = 'na';

    public $hs_exam_names = null;
    public $hs_exam_modes = null;
    public $hs_exam_details2 = null;


    public $hs_res_studentcrs = [];
    public $hs_res_marksentries = [];


    public $hsClassId = '-1';
    public $hsClassIdMessage = null;

    public $hsClassSemesters = null;
    public $hsClassSemesterId = null;
    public $hsClassSemesterSelectedMsg = null;


    public function mount()
    {
        $this->hs_studentdbs = HsStudentdb::all();
        $this->hs_classes = HsClass::all();
        $this->hs_subjects = HsSubject::all();
        $this->hs_marksentries = HsMarksentry::all();

        $this->hs_exam_details = HsExamDetails::all();

        $this->hs_exam_names = HsExamName::all();
        $this->hs_exam_details2 = HsExamDetails::all();


        $this->hsClassSemesters = HsClassSemester::all();



        // $this->hs_Studentcrs = HsStudentCr::with('hsStudentDb')->get();
        // $this->hs_Studentcrs = HsStudentCr::with('hs_student_db_subjects')->get();
        // if ($this->selectedHsSubjectId) {
        //     $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
        //         ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id' )
        //         ->join('hs_student_db_subjects as sdb_subj', 'sdb.id', '=', 'sdb_subj.hs_studentdb_id' )
        //         ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
        //         ->get();
        // } else {
        //     $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
        //         ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id')
        //         ->join('hs_student_db_subjects as sdb_subj', 'sdb.id', '=', 'sdb_subj.hs_studentdb_id')
        //         // ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
        //         ->get();
        // }
        // dd($this->hs_studentdbs);

        $this->hs_res_studentcrs = HsStudentCr::with('hsStudentDb')->get();
        // $this->hs_res_marksentries = HsMarksentry::with('hsStudentCr')->get();
        $this->hs_res_marksentries = HsMarksentry::all();
        // dd($this->hs_res_marksentries);

    }


    public function updatedHsClassSemesterId($hsClassSemesterId){
        $this->hsClassIdMessage = $hsClassSemesterId.' updated';
        $hsClassSemester = HsClassSemester::find($this->hsClassSemesterId);

        $examNames = HsExamName::where('hs_class_id', $hsClassSemester->hs_class_id)
            ->where('hs_semester_id', $hsClassSemester->hs_semester_id)
            ->get();

        // dd($examNames);


    }

    public function changeSelectedHsSubjectId($hs_subject_id, $exam_detail_id = null)
    {
        $this->selectedHsSubjectId = $hs_subject_id;
        $this->examDetailId = $exam_detail_id;
     
        
        if ($this->selectedHsSubjectId) {
            
            $this->hs_Studentcrs = HsStudentCr::with(['hsStudentDb', 'hsStudentDb.hsSubjects'])
                ->whereHas('hsStudentDb.hsSubjects', function($query) {
                    $query->where('hs_subject_id', $this->selectedHsSubjectId);
                })
                ->get();
        } else {
            $this->hs_Studentcrs = HsStudentCr::with(['hsStudentDb', 'hsStudentDb.hsSubjects'])
                // ->whereHas('hsStudentDb.hsSubjects', function($query) {
                //     $query->where('hs_subject_id', $this->selectedHsSubjectId);
                // })
                ->get();
        }

        
        $this->loadPreviousMarks();
    }

    public function loadPreviousMarks(){
        // dd('class',$this->hs_exam_details->find($this->examDetailId)->hsExamName->hsClass->id,
        //     'sem:',$this->hs_exam_details->find($this->examDetailId)->hsExamName->hsSemester->id);
        $updated_marks = HsMarksentry::where('hs_exam_detail_id', $this->examDetailId)            
            ->where('hs_subject_id', $this->selectedHsSubjectId)
            ->where('hs_class_id', $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsClass->id)
            ->where('hs_semester_id', $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsSemester->id)
            ->get()
            ;
        
            $this->marks = [];
        foreach($updated_marks as $updated_mark){
            $this->marks[$updated_mark->hs_student_cr_id] = $updated_mark->obtain_marks;
        }
        // dd($this->marks);
    }

    public function updatedMarks($value, $key)
    {
        // dd("value",$value, ", key",$key);
        // $this->marks[$key] = $value;
        $this->value = $value;
        $this->key = $key;

        $marksentry = HsMarksentry::updateOrCreate([
            'hs_exam_detail_id' => $this->examDetailId,
            'hs_student_cr_id' => $key,
            'hs_subject_id' => $this->selectedHsSubjectId,
            'hs_class_id' => $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsClass->id,
            'hs_semester_id' => $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsSemester->id,
        ], [
            'obtain_marks' => $value,
        
        ]);

        $this->loadPreviousMarks();
        $this->changeSelectedHsSubjectId($this->selectedHsSubjectId, $this->examDetailId);
        // echo json_encode($this->marks);
    }

    public function generatePDF(){
        $data = [
            'hs_res_studentcrs' => $this->hs_res_studentcrs,
            'hs_exam_details2'  => $this->hs_exam_details2,
            'content' => 'This is the content of the PDF.',
            'date' => now()->format('m/d/Y'),
        ];

        $pdf = PDF::loadView('pdfs.tmp_xi_compact_marks', $data);
        
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "XI25_Compact_MarkRegister.pdf"
        );
    
        // return view('pdfs.tmp_xi_compact_marks');
    }

    public function render()
    {
        return view('livewire.admin-h-s-main-section-component');
    }
}
