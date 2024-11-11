<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Exammode;
use App\Models\Examtype;
use App\Models\Myclasssection;
use App\Models\Studentcr;
use Livewire\Component;

class SubadminFormativeMarksEntryEntityComponent extends Component
{

    public $myclassSection;
    public $examterm;
    public $examtype;

    public $studentcrs;
    public $myclassSubjects;
    public $examdetails;


    public $formativeMarks = [];
    public $formativeAbsentMarks = [];

    public $key, $value;



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

    }

    public function updatedFormativeMarks($value, $key){
        // $this->k = $key;    // studentcr_id
        // $this->v = $value;  // marks
        // $x = explode('-', $key);
    
        dd('val:' . $value, '  key:' . $key);
    }


    public function render()
    {
        return view('livewire.subadmin-formative-marks-entry-entity-component');
    }
}
