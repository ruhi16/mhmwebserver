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

class AdminWeeklyClassScheduleDayWiseAutoComponent extends Component
{
    public $days;
    public $myclassSections;
    public $myclassSubjects;
    public $randomNumbers;
    public $myclassDayWiseRandomSubjects;


    public $myclassSchedules;



    public $test_myclasssectionteachers;
    public $test_classSchedules;





    public function mount(){
        $this->days = Day::where('status', 'active')->get();
        $this->myclassSections = Myclasssection::all();
        $this->myclassSubjects = Myclasssubject::all();


        $this->refreshMyclassSchedules();
    }

    public function uniqueDayMyclassRandomSubjects($myclass_id, $day_id){

        $count_periods = Myclassdayperiod::where('myclass_id', $myclass_id)->where('day_id', $day_id)->count(); 

        $subjects = Myclasssubject::where('myclass_id', $myclass_id)
            ->where('examtype_id', 2)
            ->where('combination_no', '>=', 0)
            ->pluck('subject_id')
            ->toArray();
        // $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $randomNumbers = array_rand($subjects, $count_periods);

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

    public function saveMyclassSectionSubjectsWeeklySchedule($myclass_id, $section_id){
        foreach($this->days as $day){            
            // dd($day->id, $this->myclassDayWiseRandomSubjects[$myclass_id][$section_id][$day->id]);
            try{
                for($i=0; $i < count($this->myclassDayWiseRandomSubjects[$myclass_id][$section_id][$day->id]); $i++){

                    Myclassschedule::updateOrCreate([
                        'myclass_id'    => $myclass_id,
                        'section_id'    => $section_id,
                        'day_id'        => $day->id,
                        'period_id'     => $i+1,
                        'subject_id'    => $this->myclassDayWiseRandomSubjects[$myclass_id][$section_id][$day->id][$i],
                        
                    ],[
                        'teacher_id'    => null,
                        'wtperiods'     => null,
                        
                        'status'        => 'active',
                        'school_id'     => 1,
                        'session_id'    => 1,
                    ]);
                }
    
                
    
                session()->flash('message', 'Class Schedule Updated Successfully');
            }catch(\Exception $e){
                session()->flash('error', 'Error saving class schedule: ' . $e->getMessage());
            }
        }
        
    }


    public function assignMyclassScheduleTeachers($myclass_id, $section_id){

        // $myclassschedules = Myclassschedule::where('myclass_id', $myclass_id)->where('section_id', $section_id)->get();
        $this->test_myclasssectionteachers = Myclasssectionteacher::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->where('day_id', null) 
            ->get();
        
        $this->test_classSchedules = Myclassschedule::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)

            ->inRandomOrder()
            ->get()
            ;

        

        foreach($this->test_myclasssectionteachers as $myclasssectionteacher){         
            
            $test_classSchedules_count = Myclassschedule::where('myclass_id', $myclass_id)
                ->where('section_id', $section_id)
                ->where('subject_id', $myclasssectionteacher->subject_id)
                // ->where('teacher_id', null)
                ->count()
                ;

            // if($test_classSchedules_count <= $myclasssectionteacher->wtperiods){
                
                $this->test_classSchedules = Myclassschedule::where('myclass_id', $myclass_id)
                    ->where('section_id', $section_id)
                    ->where('subject_id', $myclasssectionteacher->subject_id)
                    ->where('teacher_id', null)
                    ->get()                
                    ;
                
                for($i=0; $i < $myclasssectionteacher->wtperiods; $i++){
                // for($i=0; $i < $this->test_classSchedules->count(); $i++){
                    if( isset($this->test_classSchedules[$i]) ){

                        $this->test_classSchedules[$i]->update([
                            'teacher_id'    => $myclasssectionteacher->teacher_id,
                            'status'        => 'active',
                            'school_id'     => 1,
                            'session_id'    => 1,
                        ]);

                    }            
                }
            // }

        }

        foreach($this->test_classSchedules->where('teacher_id', null) as $myclassSchedule){
            $myclassSchedule->update([
                'subject_id'    => null
            ]);
        }


        $this->refreshMyclassSchedules();
    }



    public function deleteMyclassSectionWeeklyExtraPeriods($myclass_id, $section_id){
        $myclassSectionWeeklySchedules = Myclassschedule::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->inRandomOrder()
            ->get()
            ;
            
        $myclassSectionWeeklyTeacherAllotments = Myclasssectionteacher::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->get()
            ;


        foreach($myclassSectionWeeklyTeacherAllotments as $myclassSectionWeeklyTeacherAllotment){
            // $myclassSectionWeeklyTeacherAllotment->subject->code;
            $myclassSectionWeeklySubjectTotalPeriods = $myclassSectionWeeklyTeacherAllotment->wtperiods;
            $myclassSectionWeeklyTeacherSchedules = $myclassSectionWeeklySchedules
                ->where('subject_id', $myclassSectionWeeklyTeacherAllotment->subject_id)
                ->where('teacher_id', $myclassSectionWeeklyTeacherAllotment->teacher_id)
                ;
            foreach($myclassSectionWeeklyTeacherSchedules as $myclassSectionWeeklySchedule){
                if($myclassSectionWeeklySubjectTotalPeriods < 1){
                    $myclassSectionWeeklySchedule->update([
                        'subject_id'     => null,
                        'teacher_id'    => null,
                        'status'        => 'active',
                        'school_id'     => 1,
                        'session_id'    => 1,
                    ]);
                }else{
                    $myclassSectionWeeklySubjectTotalPeriods--;
                }
            }
            
        }

        $this->refreshMyclassSchedules();
    }


    public function adjustMyclassSectionWeeklyNotAssignedPeriods($myclass_id, $section_id){
        $myclassSectionWeeklySchedules = Myclassschedule::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->inRandomOrder()
            ->get()
            ;
            
        $myclassSectionWeeklyTeacherAllotments = Myclasssectionteacher::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->get()
            ;

        foreach($myclassSectionWeeklyTeacherAllotments as $myclassSectionWeeklyTeacherAllotment){
            // $myclassSectionWeeklyTeacherAllotment->subject->code;
            $myclassSectionWeeklySubjectTotalPeriods = $myclassSectionWeeklyTeacherAllotment->wtperiods;

            foreach($myclassSectionWeeklySchedules->where('subject_id', $myclassSectionWeeklyTeacherAllotment->subject_id) as $myclassSectionWeeklySchedule){
            


            }

        }

        $this->refreshMyclassSchedules();

    }





    public function clearMyclassSectionSchedule($myclass_id, $section_id){
        
        try{
            Myclassschedule::where('myclass_id', $myclass_id)
                ->where('section_id', $section_id)
                ->delete();


            session()->flash('message', 'Class Section Weekly Schedules Deleted Successfully');
        }catch(\Exception $e){
            session()->flash('error', 'Error saving class schedule: ' . $e->getMessage());
        }
        
        $this->refreshMyclassSchedules();
    }




    public function refreshMyclassSchedules(){
        $this->myclassSchedules = Myclassschedule::all();
    }


    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-day-wise-auto-component');
    }
}
