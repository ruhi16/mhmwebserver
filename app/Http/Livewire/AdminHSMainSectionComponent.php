<?php

namespace App\Http\Livewire;

use App\Models\HsStudentdb;
use App\Models\HsClass;
use App\Models\HsExamDetails;

use App\Models\HsStudentCr;
use App\Models\HsSubject;
use App\Models\HsMarksentry;

use Illuminate\Support\Facades\DB;
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

    public function mount()
    {
        $this->hs_studentdbs = HsStudentdb::all();
        $this->hs_classes = HsClass::all();
        $this->hs_subjects = HsSubject::all();
        $this->hs_marksentries = HsMarksentry::all();

        $this->hs_exam_details = HsExamDetails::all();



        // $this->hs_Studentcrs = HsStudentCr::with('hsStudentDb')->get();
        // $this->hs_Studentcrs = HsStudentCr::with('hs_student_db_subjects')->get();
        if ($this->selectedHsSubjectId) {
            $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
                ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id' )
                ->join('hs_student_db_subjects as sdb_subj', 'sdb.id', '=', 'sdb_subj.hs_studentdb_id' )
                ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
                ->get();
        } else {
            $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
                ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id')
                ->join('hs_student_db_subjects as sdb_subj', 'sdb.id', '=', 'sdb_subj.hs_studentdb_id')
                // ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
                ->get();
        }
        // dd($this->hs_studentdbs);
    }

    public function changeSelectedHsSubjectId($hs_subject_id, $exam_detail_id = null)
    {
        $this->selectedHsSubjectId = $hs_subject_id;
        $this->examDetailId = $exam_detail_id;
     
        
        if ($this->selectedHsSubjectId) {
            $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
                ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id')
                ->join('hs_student_db_subjects as sdb_subj', 'sdb.id', '=', 'sdb_subj.hs_studentdb_id')
                ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
                ->get();
        } else {
            $this->hs_Studentcrs = DB::table('hs_student_crs as scr')
                ->join('hs_student_dbs as sdb', 'scr.hs_studentdb_id', '=', 'sdb.id' )
                ->join('hs_student_db_subjects as sdb_subj','sdb.id','=', 'sdb_subj.hs_studentdb_id')
                // ->where('sdb_subj.hs_subject_id', $this->selectedHsSubjectId)
                ->get();
        }

        
        $this->loadPreviousMarks();
    }

    public function loadPreviousMarks(){
        $updated_marks = HsMarksentry::where('hs_exam_detail_id', $this->examDetailId)            
            ->where('hs_subject_id', $this->selectedHsSubjectId)
            ->where('hs_class_id', $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsClass->id)
            ->where('hs_semester_id', $this->hs_exam_details->find($this->examDetailId)->hsExamName->hsSemester->id)
            ->get()
            ;
        // dd($updated_marks);

        foreach($updated_marks as $updated_mark){
            $this->marks[$updated_mark->hs_student_cr_id] = $updated_mark->obtain_marks;
        }
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

    public function render()
    {
        return view('livewire.admin-h-s-main-section-component');
    }
}
