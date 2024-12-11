<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Day;
use App\Models\Myclass;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
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

    public $showModal = false;

    public $myclass_id;    
    public $subject_id;
    public $wtperiods = 0;

    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclasses = Myclass::all();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        

        $this->refreshModalData();
    }


    public function showModalForWTPeriods($myclass_id, $subject_id){

        $this->myclass_id = $myclass_id;
        $this->subject_id = $subject_id;
        $this->wtperiods = Weeklymyclasssubject::where('myclass_id', $myclass_id)
            ->where('subject_id', $subject_id)
            ->first()->weekly_no_of_classes_allowed ?? 0;

        $this->showModal = true;
    }


    public function closeModal(){
        $this->refreshModalData();
        $this->showModal = false;
    }

    public function updateWeeklyMyclassSubjectTotalPeriods(){
        try{
            Weeklymyclasssubject::where('myclass_id', $this->myclass_id)
                ->where('subject_id', $this->subject_id)
                ->update(['weekly_no_of_classes_allowed' => $this->wtperiods]);

            session()->flash('message', 'Weekly Total Periods Updated Successfully');
        }catch(\Exception $e){
            session()->flash('error', 'Error saving class schedule: ' . $e->getMessage());
        }

        $this->refreshModalData();
        $this->closeModal();

    }


    public function refreshModalData(){
        $this->myclass_id = null;
        $this->subject_id = null;
        $this->wtperiods = null;

        $this->weeklymyclasssubjectschedules = Weeklymyclasssubject::all();
        $this->myclasssectionteachers = Myclasssectionteacher::all();
    }


    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-subject-wise-component');
    }
}

