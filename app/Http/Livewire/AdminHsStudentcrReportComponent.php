<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminHsStudentcrReportComponent extends Component{


    public $hsStudentcrs = null;
    public $hsClassId = null;


    public function mount($hsClassId = null){
        $this->hsClassId = $hsClassId;

        $hsClassId = 2;

        $this->hsStudentcrs = \App\Models\HsStudentcr::with([hs_student_db_subjects])
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('hs_class_id', $hsClassId)
            ->get();

        



    }




    public function render()
    {
        return view('livewire.admin-hs-studentcr-report-component');
    }
}
