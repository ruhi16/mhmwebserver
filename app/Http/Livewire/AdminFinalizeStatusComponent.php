<?php

namespace App\Http\Livewire;

use App\Models\Answerscriptdistribution;
use Livewire\Component;

use App\Models\Exam;
use App\Models\Examdetails;
use App\Models\Exammode;
use App\Models\Examtype;
use App\Models\Myclass;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Myclassteacher;

class AdminFinalizeStatusComponent extends Component
{
    public $myclasses;
    public $sections;
    public $myclassSections;
    public $myclassSubjects;
    public $teachers;
    public $myclassteachers;

    public $exams;
    public $examtypes;
    public $exammodes;
    public $examdetials;

    public $showModal = false;
    public $myclassSection_id;

    public $myclass_id;
    public $section_id;
    public $exam_id;

    public $answerscriptdistributions;

    public $exam_term_active_tab_no = 1;
    public $myclass_active_tab_no = 0;

    public $selectedClass = null;
    public $selectedSecton = null;
    public $selectedTeacher = null;

    public function mount()
    {
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        $this->myclassteachers = Myclassteacher::all();
        $this->myclassSubjects = Myclasssubject::all();
        $this->myclasses = Myclass::all();
        $this->sections = Section::all();
        $this->teachers = Teacher::all();
        $this->exams = Exam::all();
        $this->examtypes = Examtype::all();
        $this->exammodes = Exammode::all();
        $this->examdetials = Examdetails::all();

        $this->answerscriptdistributions = Answerscriptdistribution::all();
    }


    public function selectExamTermTab($exam_id){
        $this->exam_term_active_tab_no = $exam_id;
        $this->myclass_active_tab_no = null;   
        $this->myclass_id = null;     
    }

    public function selectMyclassTab($myclass_id){
        $this->myclass_active_tab_no = $myclass_id;

        $this->exam_id = $this->exam_term_active_tab_no;
        $this->myclass_id = $this->myclass_active_tab_no;

        $this->myclassSections = Myclasssection::where('myclass_id', $this->myclass_id)->get();
        $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclass_id)->orderBy('examtype_id', 'asc')->get();
        $this->answerscriptdistributions = Answerscriptdistribution::where('myclass_id', $this->myclass_id)
            ->where('exam_id', $this->exam_id)->get();
    }

    public function showTable($myclass_id, $exam_id){

        $this->myclass_id = $myclass_id;
        $this->exam_id = $exam_id;

    }





    public function render()
    {
        return view('livewire.admin-finalize-status-component');
    }

    public function resetToNull()
    {
        $this->selectedSecton = null;
        $this->selectedClass = null;
        $this->selectedTeacher = null;
    }
}
