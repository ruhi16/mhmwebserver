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

class AdminWeeklyClassScheduleTeachersComponent extends Component
{

    

    public $myclasses = null;
    public $myclassSubjects = null;
    public $myclassSections = null;

    public $days = null;

    public $teachers = null;


    public $showModal = false;
    public $myclassSection_id = 1;
    public $selectedTeacher = null;

    public $selectedMyclass = null;
    public $selectedSection = null;
    public $selectedDay = null;    // for current day, where clicked
    public $selectedPeriod = null;
    public $selectedMySubject = null;
    public $selectedMyTeacher = null;

    public $mydays = [];
    

    public $changedSelectedDays = null;
    public $key, $value;



    public $weeklySchedules = null;


    protected $rules = [
        'selectedMySubject' => 'required',        
        'selectedMyTeacher' => 'required',
    ];

    protected $messages = [
        'selectedMySubject.required' => 'Subject is required',
        'selectedMyTeacher.required' => 'Teacher is required',
    ];


    public function mount(){
        $this->myclasses = Myclass::all();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();
        
        $this->days = Day::where('status', 'active')->get();

        $this->teachers = Teacher::all();
        $this->weeklySchedules = Myclassschedule::all();

    }


    public function updatedChangedSelectedDays($key,  $value){
        $this->key = $key;
        $this->value = $value;

    }




    public function showModal($myclass_id, $section_id, $day_id, $period_id){
        // $this->refreshModals();


        $this->selectedMyclass = Myclass::find($myclass_id);
        $this->selectedSection = Section::find($section_id);
        $this->selectedDay = Day::find($day_id);
        $this->selectedPeriod = Period::find($period_id);

        $this->changedSelectedDays = $this->selectedDay->id;
        array_push($this->mydays, (string) $day_id);
        
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
        $this->refreshModals();
    }


    public function updated($fields){
        $this->validateOnly($fields);
        // automatically it will validate according to the rules
        // and display corresponding error messages
    }



    public function saveChanges(){
        $this->validate();
    
        try{
            // Myclassschedule::updateOrCreate([
            //     'myclass_id'    => $this->selectedMyclass->id,
            //     'section_id'    => $this->selectedSection->id,
            //     'day_id'    => $this->selectedDay->id,
            //     'period_id' => $this->selectedPeriod->id,
            // ], [
            //     'subject_id'    => $this->selectedMySubject,
            //     'teacher_id'    => $this->selectedMyTeacher,

            //     'session_id' => 1,
            //     'school_id'  => 1,

            // ]);

            

            foreach($this->mydays as $day){
                Myclassschedule::updateOrCreate([
                    'myclass_id'    => $this->selectedMyclass->id,
                    'section_id'    => $this->selectedSection->id,
                    'day_id'    => $day,
                    'period_id' => $this->selectedPeriod->id,
                ], [
                    'subject_id'    => $this->selectedMySubject,
                    'teacher_id'    => $this->selectedMyTeacher,

                    'session_id' => 1,  
                    'school_id'  => 1,
                ]);
            }




            session()->flash('message', 'Scheduled updated successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving marks: ' . $e->getMessage());
        }


        $this->weeklySchedules = Myclassschedule::all();
        // foreach($this->mydays as $day){
        //     $day;
        // }


        // dd( $this->selectedMySubject, 
        //     $this->selectedMyTeacher, 
        //     $this->mydays,  
        // );

        $this->closeModal();
    }

    public function refreshModals(){
        $this->selectedMyclass = null;
        $this->selectedSection = null;
        $this->selectedDay = null;    
        $this->selectedPeriod = null;
        $this->selectedMySubject = null;
        $this->selectedMyTeacher = null;
    
        $this->mydays = [];
    }

    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-teachers-component');
    }
}
