<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminHsClsSecWisePromotedStudents extends Component
{

    public $hsClassId = null, $hsSectionId = null, $hsSemesterId = null;    
    
    public $hsStudentcrs_promoted, $hsStudentcrs_admitted;

    public $assignedRollNo = [];
    
    public function mount($hsClassId = null, $hsSectionId = null, $hsSemesterId = null){
        // dd($hsClassId, $hsSectionId, $hsSemesterId, \App\Models\HsSession::currentlyActive()->id);
        $this->hsClassId = $hsClassId;
        $this->hsSectionId = $hsSectionId;
        $this->hsSemesterId = $hsSemesterId;

        $this->refreshData();
        // dd($this->hsStudentcrs);
    }

    public function refreshData(){
        $this->hsStudentcrs_promoted = \App\Models\HsStudentCr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('next_hs_session_id', \App\Models\HsSession::currentlyActive()->id) 
            ->where('next_class_id', $this->hsClassId)
            ->get();

        $this->hsStudentcrs_admitted = \App\Models\HsStudentDb::with('hsStudentcrs', 'hsClass', 'hsSection', 'hsSemester')            
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id) 
            ->where('st_hs_class_id', $this->hsClassId)
            ->get();

        
    }

    public function updatedAssignedRollNo($value, $key){
        // dd('val:'.$value, 'scrid:'.$key);
        $rules = [
            'assignedRollNo.'.$key => 'required|numeric',
        ];
        $messages = [
            'assignedRollNo.'.$key => 'Roll No. is required.',
        ];
        $this->validateOnly('assignedRollNo.'.$key, [
            'assignedRollNo.'.$key => 'required|numeric',
        ],[
            'assignedRollNo.' . $key . '.required' => 'Roll No. is required.',
        ]);

        $this->assignedRollNo[$key] = $value;

        try{
            // $hsStudentcr = \App\Models\HsStudentCr::findOrFail($key);
            // $hsStudentcr->update(['roll_no'=> $value]);

            // session()->flash('success', "Roll No. " . $key . " updated successfully.");
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }

    public function assignRollNo($hsStudentcrId){
        $hsStudentcr = \App\Models\HsStudentCr::find($hsStudentcrId);

        
        $hsStudentcrMaxRollNo = null;
        if($this->assignedRollNo[$hsStudentcr->id]){
            $hsStudentcrMaxRollNo = $this->assignedRollNo[$hsStudentcr->id];
        }else{    
            $hsStudentcrMaxRollNo = \App\Models\HsStudentCr::where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
                ->where('hs_class_id', $hsStudentcr->next_class_id)            
                ->max('roll_no') + 1;
        }


        try{

            $hsStudentcr_new = \App\Models\HsStudentCr::updateOrCreate([
                'hs_studentdb_id' => $hsStudentcr->hs_studentdb_id,
                'hs_session_id' => \App\Models\HsSession::currentlyActive()->id,            
            ],[
                'hs_studentdb_id' => $hsStudentcr->hs_studentdb_id,
                'hs_session_id' => \App\Models\HsSession::currentlyActive()->id,
                'hs_class_id' => $hsStudentcr->next_class_id,
                'hs_section_id' => $hsStudentcr->next_section_id,
                'hs_semester_id' => $hsStudentcr->next_semester_id,
                'crstatus'  => 'ACTIVE',
                'roll_no' => $hsStudentcrMaxRollNo != null ? $hsStudentcrMaxRollNo : 1,
                'school_id' => $hsStudentcr->school_id,
                // 'next_studentcr_id' => null
            ]);

            $hsStudentcr->update(['next_hs_studentcr_id' => $hsStudentcr_new->id]);



            // dd($hsStudentcr_new);

            session()->flash('success', "Roll No. " . $hsStudentcr_new->roll_no . " assigned successfully, to Student Name: " . $hsStudentcr->hsStudentDb->name);
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
        }

        $this->refreshData();




    }









    public function render()
    {
        return view('livewire.admin-hs-cls-sec-wise-promoted-students');
    }
}
