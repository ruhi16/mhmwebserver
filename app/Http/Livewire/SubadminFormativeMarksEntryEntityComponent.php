<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Exammode;
use App\Models\Examtype;
use App\Models\Marksentry;
use App\Models\Myclasssection;
use App\Models\Studentcr;
use Livewire\Component;

class SubadminFormativeMarksEntryEntityComponent extends Component{

    public $myclassSection;
    public $examterm;
    public $examtype;

    public $studentcrs;
    public $myclassSubjects;
    public $examdetails;

    public $examdetail = null;
    
    public $myclassSubject = null;
    public $enteredMarks = null;

    public $studentcr = null;

    public $formativeMarks = [];
    public $formativeAbsentMarks = [];

    public $key=null, $value;



    public function mount($myclassSection_id, $examterm_id, $examtype_id) {
        $this->myclassSection = Myclasssection::find($myclassSection_id);
        $this->examterm = Exam::find($examterm_id);
        $this->examtype = Examtype::find($examtype_id);

        $this->studentcrs = Studentcr::where('myclass_id', $this->myclassSection->myclass_id)
            ->where('section_id', $this->myclassSection->section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

        $this->myclassSubjects = $this->myclassSection->myclass->myclasssubjects()
            ->where('examtype_id', $this->examtype->id) // only formative subjects
            // ->where('exammode_id', $this->exammode->id)
            ->get();

        $this->examdetails = $this->examterm->examdetails()
            ->where('myclass_id', $this->myclassSection->myclass_id)
            ->where('examtype_id', $this->examtype->id)
            ->orderBy('id')
            ->get();

        // $this->enteredMarks = $this->myclassSection->marksentries()
            // ->whereColumn('examdetail_id', $this->examdetails->pluck('id'))
            // ->get();

        $this->reloadData();

    }

    public function updatedFormativeMarks($value, $key){
        // $this->key = $key;    // studentcr_id
        // $this->value = $value;  // marks        

        $this->examdetail = $this->examdetails
            ->where('subject_id', explode('-', $key)[1])
            ->where('exammode_id', 1)   // Formative Exam Mode: 1(Oral)
            ->first();

        $this->myclassSubject = $this->myclassSubjects
            ->where('subject_id', explode('-', $key)[1])
            ->first();

        $this->studentcr = Studentcr::find(explode('-', $key)[0]);

        $studentcr_id = explode('-', $key)[0];
        $this->submitMarks($studentcr_id, $value);

    }


    public function updatedFormativeAbsentMarks($value, $key){
        $this->key = $key;    // studentcr_id
        $this->value = $value;  // marks  

        $this->examdetail = $this->examdetails
            ->where('subject_id', explode('-', $key)[1])
            ->where('exammode_id', 1)   // Formative Exam Mode: 1(Oral)
            ->first();

        $this->myclassSubject = $this->myclassSubjects
            ->where('subject_id', explode('-', $key)[1])
            ->first();

        $this->studentcr = Studentcr::find(explode('-', $key)[0]);

        $studentcr_id = explode('-', $key)[0];
        $this->submitMarks($studentcr_id);
        
        
    }



    public function submitMarks($studentcr_id, $mark_value = -999){
        try {
            $marksentry = Marksentry::updateOrCreate([
                'examdetail_id' => $this->examdetail->id,
                'myclasssection_id' => $this->myclassSection->id,
                'myclasssubject_id' => $this->myclassSubject->id,
                'studentcr_id' => (int) $studentcr_id,
                'session_id' => 1,
                'school_id' => 1,
            ],[
                'marks' => (double) $mark_value,
                'status' => 'Done',
            ]);

            // $marksentry->marks = (double) $mark_value;            
            // $marksentry->status = 'Done';
            // $marksentry->save();

            
            session()->flash('message', 'Formative Marks submitted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving marks: ' . $e->getMessage());
        }

        // $this->enteredMarks = Marksentry::where('myclasssection_id', $this->myclassSection->id)
        //     ->where('examdetail_id', $this->examdetail->id)
        //     ->where('myclasssubject_id', $this->myclassSubject->id)
        //     ->get();
        $this->reloadData();
    }

    public function reloadData(){
        $this->enteredMarks = Marksentry::where('myclasssection_id', $this->myclassSection->id)
            // ->where('examdetail_id', $this->examdetails->first()->id)
            ->whereIn('myclasssubject_id', $this->myclassSubjects->pluck('id'))
            ->get();
    }


    public function render()
    {
        return view('livewire.subadmin-formative-marks-entry-entity-component');
    }
}
