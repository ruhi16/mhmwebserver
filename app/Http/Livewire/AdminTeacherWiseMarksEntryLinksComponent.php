<?php

namespace App\Http\Livewire;

use App\Models\Answerscriptdistribution;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Teacher;
use Livewire\Component;

class AdminTeacherWiseMarksEntryLinksComponent extends Component
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
        $this->answerscriptdistributions = Answerscriptdistribution::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->get();
        $this->myclasssections = Myclasssection::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->get();
        $this->myclasssubjects = Myclasssubject::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->get();
    }

    public function mount($teacher_id = null){
        // dd($teacher_id);
        
        if($teacher_id != null){
            $this->teachers = Teacher::where('id', $teacher_id)->get();
        }else{
            $this->teachers = Teacher::all();
        }
        
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
        $this->selectedTeacher = Teacher::find($this->teacherId);
    }

    public function render()
    {
        return view('livewire.admin-teacher-wise-marks-entry-links-component');
    }
}
