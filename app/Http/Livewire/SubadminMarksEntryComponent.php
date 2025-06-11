<?php

namespace App\Http\Livewire;

use App\Models\Answerscriptdistribution;
use App\Models\Exam;
use App\Models\Examdetails;
use App\Models\Exammode;
use App\Models\Examtype;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use Livewire\Component;

class SubadminMarksEntryComponent extends Component
{

    public $examDetail_id;
    public $myclassSection_id;
    public $myclassSubject_id;
    public $examDetails;
    public $answerscriptdistribution;


    public $myclassSections;
    public $myclassSubjects;

    public $exams;
    public $examtypes;
    public $examModes;

    


    public $selectedExam = null;
    public $selectedexamtype = null;
    
    public $message = null;


    public function mount($myclassSection_id){
        $this->myclassSection_id = $myclassSection_id;

        $this->myclassSections = Myclasssection::find($myclassSection_id);
        $this->myclassSubjects = Myclasssubject::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->where('myclass_id', $this->myclassSections->myclass_id)
            ->orderBy('examtype_id', 'asc')
            ->get();

        $this->exams = Exam::all();
        $this->examtypes = Examtype::all();
        $this->examModes = Exammode::where('name', 'Oral')->orWhere('name', 'Written')->get();
        $this->examDetails = Examdetails::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->where('myclass_id', $this->myclassSections->myclass_id)                        
            ->get();

        

        $this->answerscriptdistribution = Answerscriptdistribution::where('myclass_id', $this->myclassSections->myclass_id)
            ->where('section_id', $this->myclassSections->section_id)
            ->get();
        
    }



    public function updatedSelectedExam($selectedExam){
        $this->selectedExam = $selectedExam;
        $this->message = 'Exam selected';

        $this->selectedexamtype = $this->selectedExam ? null : $this->selectedexamtype;

    }


    public function render()
    {
        return view('livewire.subadmin-marks-entry-component');
    }
}
