<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminHsStudentcrReportComponent extends Component{


    public $hsStudentcrs = null, $hsSubjects = null, $selectedHsSubjectId = null;
    public $hsClassId = 2;


    public function mount($hsClassId = null){
        // $this->hsClassId = $hsClassId;

        // $this->hsClassId = $hsClassId = 2;

        $this->hsStudentcrs = \App\Models\HsStudentcr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('hs_class_id', $this->hsClassId)
            ->get();

        $this->hsSubjects = \App\Models\HsSubject::with('hsSubjectType')
            ->when($this->selectedHsSubjectId != null, function ($query)  {
                return $query->where('id', $this->selectedHsSubjectId);
            })            
            ->get();

    }


    public function updatedSelectedHsSubjectId($hsSubjectId){
        $this->selectedHsSubjectId = $hsSubjectId;

        if($hsSubjectId == 0){
            $this->hsStudentcrs = \App\Models\HsStudentcr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('hs_class_id', $this->hsClassId)
            ->get();
            return;
        }

        $this->hsStudentcrs = \App\Models\HsStudentcr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('hs_class_id', $this->hsClassId)
            ->whereHas('hsStudentDb.hsSubjects', function($query) use ($hsSubjectId) {
                $query->where('hs_subject_id', $hsSubjectId);
            })            
            ->get();
            // dd($this->hsStudentcrs);

    }




    public function render()
    {
        return view('livewire.admin-hs-studentcr-report-component');
    }
}
