<?php

namespace App\Http\Livewire;

use App\Models\Session;
use App\Models\Studentcr;

use App\Models\Myclasssection;
use App\Models\Promotionalrule;

use App\Models\Studentcr_eoy_summary;
use App\Models\Studentdb;
use Livewire\Component;

class AdminStudentcrRunningComponent extends Component
{

    public $session = null;
    public $studentcrs = null;

    public $classSections;


    public function mount(){
        // $myclass_id = 2;
        // $section_id = 1;


        $this->session = Session::currentlyActive();
        
        $this->classSections = Myclasssection::where('session_id', $this->session->id)            
            ->where('status', 'ACTIVE')
            ->first();

        $this->studentcrs = Studentcr::where('session_id', $this->session->id)
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

    }




    public function render()
    {
        return view('livewire.admin-studentcr-running-component');
    }
}
