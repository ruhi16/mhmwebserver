<?php

namespace App\Http\Livewire;

use App\Models\Myclass;
use Livewire\Component;

use App\Models\Myclasssection;
use App\Models\Promotionalrule;
use App\Models\Section;
use App\Models\Session;
use App\Models\Studentcr;
// use App\Models\Studentcr_eoy_summary;
use App\Models\Studentdb;

class AdminStudentcrAdmisstionComponent extends Component
{
    public $componentName;
    public $studentcrEOYSummary;

    public $promotionalRules;
    public $classSections;
    public $nextClassSections;

    public $section_id;
    public $myclasses;
    public $mysections;

    public $studentcrs_promoted;
    public $session;

    public $myclass_id;
    public $mysection_id;

    public $studentdbs;

    public $studentcr_curr;

    public $showNewAdmissionModal = false;
    public $studentName, $studentRollNo, $studentcr_max_roll_no;

    // #[On('refreshStudentcrsPromotions')]
    protected $listeners = ['refreshStudentcrsPromotions' => 'mount'];

    public function mount()
    {
        $this->session = Session::currentlyActive();

        $this->myclasses = Myclass::all();
        $this->mysections = Section::all();

        $this->showNewAdmissionModal = false;

        $this->classSections = Myclasssection::where(
            'session_id',
            $this->session->id
        )
            ->where('status', 'ACTIVE')
            ->first();

        $studentdb_running_ids = Studentcr::where(
            'session_id',
            $this->session->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->pluck('studentdb_id')
            ->toArray();

        $this->studentdbs = Studentdb::where('session_id', $this->session->id)
            ->where('stclass_id', $this->classSections->myclass_id)
            ->where('stsection_id', $this->classSections->section_id)
            ->whereNotIn('id', $studentdb_running_ids)
            ->get();
        // dd($this->studentdbs);
        $this->studentcr_curr = Studentcr::where(
            'session_id',
            $this->session->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->orderBy('roll_no', 'desc')
            ->get();

        // $this->nextClassSections = Myclasssection::where('myclass_id', $this->classSections->myclass->next_class_id)->get();
        $studentcrs_promoted_ids = Studentcr::where(
            'session_id',
            $this->session->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->pluck('id')
            ->toArray();

        $this->studentcrs_promoted = Studentcr::where(
            'next_session_id',
            $this->session->id
        )
            ->where('next_class_id', $this->classSections->myclass_id)
            ->where('next_section_id', $this->classSections->section_id)
            ->whereNotIn('next_studentcr_id', $studentcrs_promoted_ids)

            // ->join('Studentcr_eoy_summary', 'studentcrs.id', '=', 'Studentcr_eoy_summary.id')
            // ->select('studentcrs.*', 'Studentcr_eoy_summary.total_ob_marks', 'Studentcr_eoy_summary.No_of_Ds', 'Studentcr_eoy_summary.fm')
            // ->orderBy('total_ob_marks', 'desc')
            ->get();

        // dd($this->studentcrs_promoted);
        $this->studentcr_max_roll_no = Studentcr::where(
            'session_id',
            Session::currentlyActive()->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->max('roll_no');
    }

    public function openNewAdmissionModal()
    {
        $this->studentcr_max_roll_no = Studentcr::where(
            'session_id',
            Session::currentlyActive()->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->max('roll_no');

        $this->studentName = null;
        $this->studentRollNo = null;

        $this->showNewAdmissionModal = true;
    }

    public function closeNewAdmissionModal()
    {
        $this->showNewAdmissionModal = false;
    }

    public function saveNewlyAdmittedStudent()
    {
        // session()->flash('message', 'New Student Admitted Successfully');

        $this->validate([
            'studentName' => 'required|string|max:255',
            'studentRollNo' => 'required|integer|min:1', //|max:' . $this->studentcr_max_roll_no,
        ]);

        // dd($this->studentName);

        try {
            $studentdb = Studentdb::create([
                'name' => $this->studentName,
                'stclass_id' => $this->classSections->myclass_id,
                'stsection_id' => $this->classSections->section_id,
                'session_id' => $this->session->id,
                'school_id' => $this->classSections->school_id,
                'remarks' => $this->studentRollNo,
            ]);

            session()->flash(
                'message',
                'New Student ' . $this->studentName . ' Admitted Successfully'
            );
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->showNewAdmissionModal = false;
        $this->mount();
    }

    public function admitNewStudent($studentdb_id)
    {
        $studentdb = Studentdb::find($studentdb_id);

        $this->studentcr_max_roll_no = Studentcr::where(
            'session_id',
            Session::currentlyActive()->id
        )
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->max('roll_no');
        // dd($studentcr_max_roll_no);

        if ($studentdb->remarks == null) {
            $this->studentcr_max_roll_no = Studentcr::where(
                'session_id',
                Session::currentlyActive()->id
            )
                ->where('myclass_id', $this->classSections->myclass_id)
                ->where('section_id', $this->classSections->section_id)
                ->max('roll_no');
            $this->studentcr_max_roll_no = $this->studentcr_max_roll_no
                ? $this->studentcr_max_roll_no + 1
                : 1;
        } else {
            $this->studentcr_max_roll_no = $studentdb->remarks;
        }

        try {
            // dd($studentdb);

            Studentcr::firstOrCreate(
                [
                    'session_id' => Session::currentlyActive()->id,
                    'studentdb_id' => $studentdb_id,
                ],
                [
                    'myclass_id' => $studentdb->stclass_id,
                    'section_id' => $studentdb->stsection_id,
                    'roll_no' => (int) $this->studentcr_max_roll_no, // ??? wrong
                    'crstatus' => 'Running',
                    'school_id' => $studentdb->school_id,
                ]
            );

            $this->mount();
            session()->flash('message', 'New Student Admitted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->mount();
    }

    public function admitPromotedStudent($studentcr_id)
    {
        try {
            // dd(5);
            $studentcr_old = Studentcr::where(
                'id',
                $studentcr_id
            )->firstOrFail();

            // to get the last roll_no
            // $this->studentcr_curr = Studentcr::where('session_id', $this->session->id)
            //     ->where('myclass_id', $this->classSections->myclass_id)
            //     ->where('section_id', $this->classSections->section_id)
            //     ->orderBy('roll_no', 'desc')
            //     ->get();

            // dd($studentcr_curr[0]->roll_no ?? 0);
            $studentcr_new = Studentcr::firstOrCreate(
                [
                    'session_id' => Session::currentlyActive()->id,
                    'studentdb_id' => $studentcr_old->studentdb_id,
                ],
                [
                    'myclass_id' => $studentcr_old->next_class_id,
                    'section_id' => $studentcr_old->next_section_id,
                    'roll_no' => (int) isset($this->studentcr_curr[0])
                        ? $this->studentcr_curr[0]->roll_no + 1
                        : 1,
                    //(int) ($this->studentcr_curr[0]->roll_no ?? 0) + 1,
                    'crstatus' => 'Running',
                    'school_id' => $studentcr_old->school_id,
                ]
            );

            $studentcr_old->next_studentcr_id = $studentcr_new->id;
            $studentcr_old->save();

            $this->mount();
            session()->flash(
                'message',
                'Promoted Student Admitted Successfully'
            );
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-studentcr-admisstion-component');
    }
}
