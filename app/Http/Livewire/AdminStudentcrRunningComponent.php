<?php

namespace App\Http\Livewire;

use App\Models\Session;
use App\Models\Studentcr;
use Livewire\Component;

class AdminStudentcrRunningComponent extends Component
{

    public $session = null;
    public $studentcrs = null;


    public function mount(){
        $myclass_id = 2;
        $section_id = 1;


        $this->session = Session::currentlyActive();
        $this->studentcrs = Studentcr::where('session_id', $this->session->id)
            ->where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

    }




    public function render()
    {
        return view('livewire.admin-studentcr-running-component');
    }
}
