<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Myclass;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Studentcr;
use Livewire\Component;

class AdminMyclassSectionIndividualMarksheetComponent extends Component
{

    public $myclassSection_id;    
    public $myclassSection;


    // public $sections;
    public $myclassSubjects;


    public $studentcr_id;
    public $studentcr;

    public $markEntries;

    public $exams;
    public $examDetails;



    public function mount($myclassSection_id, $studentcr_id){

        $this->myclassSection_id = $myclassSection_id;
        $this->myclassSection = Myclasssection::find($myclassSection_id);
        $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)->orderBy('examtype_id', 'asc')->get();
        // $this->myclassSubjects = $this->myclassSection->myclass->myclasssubjects();


        // $this->section_id = $section_id;
        $this->studentcr_id = $studentcr_id;
        $this->studentcr = Studentcr::find($studentcr_id)->get();

        $this->markEntries = $this->myclassSection->marksentries()
            ->where('studentcr_id', $studentcr_id)
            ->get();


        $this->exams = Exam::all();
        $this->examDetails = $this->myclassSection->myclass->examdetails()->get();
        // $this->myclasses = Myclass::where('id', $myclass_id)->get();        
        // $this->sections = Myclasssection::where('class_id', $myclass_id)->get();  

    }



    public function render()
    {
        return view('livewire.admin-myclass-section-individual-marksheet-component');
    }
}
