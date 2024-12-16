<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Day;
use App\Models\Myclass;
use App\Models\Myclassschedule;
use App\Models\Myclasssection;
use App\Models\Myclasssectionteacher;
use App\Models\Myclasssubject;
use App\Models\Period;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Weeklymyclasssubject;

class AdminWeeklyClassScheduleTeacherWise2Component extends Component
{
    public $days;
    public $myclassSections;
    public $myclassSubjects;
    public $myclassSectionTeachers;


    public $randomNumbers;
    public $myclassDayWiseRandomSubjects;
    public $weeklymyclasssubjects;
    
    public $myclassSchedules;

    public $test_myclasssectionteachers;
    public $test_classSchedules;

    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::where('examtype_id', 2)->get();
        $this->myclassSectionTeachers = Myclasssectionteacher::all();
        $this->weeklymyclasssubjects = Weeklymyclasssubject::all();


        $this->refreshMyclassSchedules();
    }






    public function refreshMyclassSchedules(){
        $this->myclassSchedules = Myclassschedule::all();
    }




    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-teacher-wise2-component');
    }
}
