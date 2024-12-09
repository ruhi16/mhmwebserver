<?php

namespace App\Http\Livewire;

use App\Models\Myclass;
use App\Models\Myclasssection;
use App\Models\Studentcr;
use Livewire\Component;

class AdminMyclassSectionIndividualMarksheetComponent extends Component
{

    public $myclassSection_id;    
    public $studentcr_id;

    public $myclassSection;
    public $sections;
    public $studentcr;

    public $markEntries;



    public function mount($myclassSection_id, $studentcr_id){

        $this->myclassSection_id = $myclassSection_id;
        $this->myclassSection = Myclasssection::find($myclassSection_id);
        // $this->section_id = $section_id;
        $this->studentcr_id = $studentcr_id;
        $this->studentcr = Studentcr::find($studentcr_id)->get();

        $this->markEntries = $this->myclassSection->marksentries()
            ->where('studentcr_id', $studentcr_id)
            ->get();

        // $this->myclasses = Myclass::where('id', $myclass_id)->get();        
        // $this->sections = Myclasssection::where('class_id', $myclass_id)->get();  

    }



    public function render()
    {
        return view('livewire.admin-myclass-section-individual-marksheet-component');
    }
}
