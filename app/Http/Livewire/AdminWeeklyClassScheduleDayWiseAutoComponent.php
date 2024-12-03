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

class AdminWeeklyClassScheduleDayWiseAutoComponent extends Component
{
    public $days;
    public $myclassSections;
    public $myclassSubjects;
    public $randomNumbers;
    public $myclassDayWiseRandomSubjects;

    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
    }

    public function uniqueDayMyclassRandomSubjects($myclass_id, $day_id){

        $count = Myclassdayperiod::where('myclass_id', $myclass_id)->where('day_id', $day_id)->count(); 

        $subjects = Myclasssubject::where('myclass_id', $myclass_id)
            ->where('examtype_id', 2)
            ->where('combination_no', '>=', 0)
            ->pluck('subject_id')
            ->toArray();
        // $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $randomNumbers = array_rand($subjects, $count);

        // Convert the array keys (indices) to the actual values
        $this->randomNumbers = array_map(function($index) use ($subjects) {
            return $subjects[$index];
        }, $randomNumbers);


    }

    public function myclassDayWiseRandomSubjects($myclass_id, $section_id){
        // foreach($this->myclassSections->where('myclass_id', $myclass_id) as $myclassSection){

            foreach($this->days as $day){
                $this->uniqueDayMyclassRandomSubjects($myclass_id, $day->id);
                
                $this->myclassDayWiseRandomSubjects[$myclass_id][$section_id][$day->id] = $this->randomNumbers;
            }

        // }
    }





    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-day-wise-auto-component');
    }
}
