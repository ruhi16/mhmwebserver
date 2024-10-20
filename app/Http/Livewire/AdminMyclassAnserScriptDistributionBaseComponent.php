<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Myclass;
use App\Models\Myclasssection;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Myclassteacher;


class AdminMyclassAnserScriptDistributionBaseComponent extends Component
{
    public $myclasses;
    public $sections;
    public $myclassSections;
    public $teachers;
    public $myclassteachers;
    public $exams;

    public $showModal = false;
    public $myclassSection_id;

    public $myclass_id;
    public $section_id;
    public $exam_id;

    public $exam_term_active_tab_no = 1;
    public $myclass_active_tab_no = 0;

    public $selectedClass = null;
    public $selectedSecton = null;
    public $selectedTeacher = null;

    public function selectExamTermTab($exam_id){
        $this->exam_term_active_tab_no = $exam_id;
        $this->myclass_active_tab_no = 1;

        
    }

    public function selectMyclassTab($myclass_id){
        $this->myclass_active_tab_no = $myclass_id;

        $this->myclass_id = $this->myclass_active_tab_no;
        $this->exam_id = $this->exam_term_active_tab_no;

    }







    public function resetToNull()
    {
        $this->selectedSecton = null;
        $this->selectedClass = null;
        $this->selectedTeacher = null;
    }

    public function mount()
    {
        $this->myclassSections = Myclasssection::all();
        $this->myclassteachers = Myclassteacher::all();
        $this->myclasses = Myclass::all();
        $this->sections = Section::all();
        $this->teachers = Teacher::all();
        $this->exams = Exam::all();
    }


    public function showTable($myclass_id, $exam_id){

        $this->myclass_id = $myclass_id;
        $this->exam_id = $exam_id;

    }

    public function render()
    {
        return view('livewire.admin-myclass-anser-script-distribution-base-component');
    }
}
