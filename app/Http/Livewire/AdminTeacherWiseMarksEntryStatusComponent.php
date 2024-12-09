<?php

namespace App\Http\Livewire;


use App\Models\Answerscriptdistribution;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Teacher;
use Livewire\Component;

class AdminTeacherWiseMarksEntryStatusComponent extends Component
{
    public $teachers;
    public $selectedTeacher;
    public $teacherId;

    public $msg;

    public $answerscriptdistributions;
    public $myclasssections;
    public $myclasssubjects;

    public $teachersAnswerScript_id;



    public function initialize(){
        $this->answerscriptdistributions = Answerscriptdistribution::all();
        $this->myclasssections = Myclasssection::all();
        $this->myclasssubjects = Myclasssubject::all();
        $this->teachers = Teacher::all();
    }


    public function mount(){
        $this->initialize();
        
    }

    
    public function adminUnfinalizeMarksEntry($teachersAnswerScript_id){
        $this->teachersAnswerScript_id = $teachersAnswerScript_id;

        $teacherAnswerScript = Answerscriptdistribution::find($this->teachersAnswerScript_id);
        $teacherAnswerScript->finalize_dt = null;
        $teacherAnswerScript->save();

        $this->initialize();
    }

    public function updatedTeacherId($teacher_id){
        // $this->msg = $teacher_id . "Teacher Id: " . Teacher::where('id', $this->teacherId)->first();
        $this->selectedTeacher = Teacher::where('id', $this->teacherId)->first();
    }







    public function render()
    {
        return view('livewire.admin-teacher-wise-marks-entry-status-component');
    }
}
