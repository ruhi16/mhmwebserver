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
use App\Models\Myclasssectionteacher;
use App\Models\Weeklymyclasssubject;

class AdminWeeklyClassScheduleSubjectWiseComponent extends Component
{

    public $days;
    public $myclasses;
    public $myclassSections;
    public $myclassSubjects;
    public $weeklymyclasssubjectschedules;
    public $myclasssectionteachers;

    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclasses = Myclass::all();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        $this->weeklymyclasssubjectschedules = Weeklymyclasssubject::all();

        $this->myclasssectionteachers = Myclasssectionteacher::all();
    }



    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-subject-wise-component');
    }
}

