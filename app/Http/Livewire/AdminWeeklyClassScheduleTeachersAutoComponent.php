<?php

namespace App\Http\Livewire;

use Livewire\Component;



use App\Models\Day;
use App\Models\Myclass;
use App\Models\Myclassschedule;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Period;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Myclassdayperiod;


class AdminWeeklyClassScheduleTeachersAutoComponent extends Component
{

    public $days;
    public $myclassSections;
    public $myclassSubjects;
    public $teachers;
    public $showModal = false;
    public $myclasses;

    public $myclass_id;
    public $section_id;
    public $subject_id;
    public $teacher_id;

    public $key, $value;

    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        $this->teachers = Teacher::all();

        $this->myclasses = Myclass::all();
    }



    public function openModal(){
        $this->refreshModal();
        
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function saveChanges(){
        
    }

    // public function updatedMyclass_id($key, $value){
    //     $this->myclass_id = $value;
    //     $this->key = $key;
    //     $this->value = $value;
    // }

    public function refreshModal(){
        $this->myclass_id = null;
        $this->section_id = null;
        $this->subject_id = null;
        $this->teacher_id = null;
    }



    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-teachers-auto-component');
    }
}
