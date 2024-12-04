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

    public $teacher_id;
    public $myclass_id;
    public $section_id;
    public $subject_id;
    public $wtperiods;

    public $key, $value;
    public $myclassSchedules;

    public $mydays = [];



    protected $rules = [
        'mydays' => 'required',        
        // 'selectedMyTeacher' => 'required',
    ];

    protected $messages = [
        'mydays.required' => 'Day selection is required',
        // 'selectedMyTeacher.required' => 'Teacher is required',
    ];



    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        $this->teachers = Teacher::all();

        $this->myclasses = Myclass::all();

        $this->refreshModal();
    }



    public function openModal($teacher_id){
        $this->refreshModal();

        $this->teacher_id = $teacher_id;
        
        $this->showModal = true;
    }

    public function closeModal(){
        $this->refreshModal();
        $this->showModal = false;
    }


    public function updated($fields){
        $this->validateOnly($fields);
        // automatically it will validate according to the rules
        // and display corresponding error messages
    }

    public function saveChanges(){
        // dd($this->mydays);

        try{
            Myclassschedule::updateOrCreate([
                'myclass_id'    => $this->myclass_id,
                'section_id'    => $this->section_id,
                'subject_id'    => $this->subject_id,
                'teacher_id'    => $this->teacher_id,
                
            ],[
                'wtperiods'     => $this->wtperiods ? $this->wtperiods : count($this->mydays),
                'day_id'        => null,
                'period_id'     => null,
                'status'        => 'active',
                'school_id'     => 1,
                'session_id'    => 1,
            ]);

            for($i=0; $i < count($this->mydays); $i++){

                Myclassschedule::updateOrCreate([
                    'myclass_id'    => $this->myclass_id,
                    'section_id'    => $this->section_id,
                    'subject_id'    => $this->subject_id,
                    'teacher_id'    => $this->teacher_id,
                    'day_id'        => $this->mydays[$i],
                ],[
                    'wtperiods'     => 1,                    
                    'period_id'     => null,
                    'status'        => 'active',
                    'school_id'     => 1,
                    'session_id'    => 1,
                ]);
            }

            session()->flash('message', 'Class Schedule Updated Successfully');
        }catch(\Exception $e){
            session()->flash('error', 'Error saving class schedule: ' . $e->getMessage());
        }
        
        
        $this->refreshModal();
        $this->showModal = false;
    }



    public function removeMyclassSchedule($schedule_id){
        try{
            Myclassschedule::where('id', $schedule_id)->delete();
            $this->refreshModal();

            session()->flash('message', 'Class Schedule Removed Successfully');
        }catch(\Exception $e){
            session()->flash('error', 'Error removing class schedule: ' . $e->getMessage());
        }
    }

    public function refreshModal(){
        $this->myclass_id = null;
        $this->section_id = null;
        $this->subject_id = null;
        $this->teacher_id = null;

        $this->wtperiods = null;

        $this->mydays = [];

        $this->myclassSchedules = Myclassschedule::all();
    }

    



    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-teachers-auto-component');
    }
}
