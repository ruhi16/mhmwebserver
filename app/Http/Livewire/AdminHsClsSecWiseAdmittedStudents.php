<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminHsClsSecWiseAdmittedStudents extends Component
{

    
    public $hsClassId = null, $hsSectionId = null, $hsSemesterId = null;    
    
    public $promoted_hsStudentcrs;
    
    public function mount($hsClassId = null, $hsSectionId = null, $hsSemesterId = null){
        // dd($hsClassId, $hsSectionId, $hsSemesterId);
        $this->hsClassId = $hsClassId;
        $this->hsSectionId = $hsSectionId;
        $this->hsSemesterId = $hsSemesterId;


        $this->refreshDAta();
    }

    public function refreshDAta(){
        $this->promoted_hsStudentcrs = \App\Models\HsStudentCr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('next_hs_session_id', \App\Models\HsSession::currentlyActive()->id)

            ->where('hs_class_id', $this->hsClassId)
            ->get();
    }









    public function render()
    {
        return view('livewire.admin-hs-cls-sec-wise-admitted-students');
    }
}
