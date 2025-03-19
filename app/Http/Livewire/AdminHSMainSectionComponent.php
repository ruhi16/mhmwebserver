<?php

namespace App\Http\Livewire;

use App\Models\HsStudentdb;

use Livewire\Component;

class AdminHSMainSectionComponent extends Component
{
    public $hs_studentdbs = [];

    public function mount(){
        $this->hs_studentdbs = HsStudentdb::all();
        // dd($this->hs_studentdbs);
    }


    public function render()
    {
        return view('livewire.admin-h-s-main-section-component');
    }
}
