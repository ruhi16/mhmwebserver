<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HsStudentDb;
use App\Models\HsStudentCr;
use App\Models\HsSession;
use Exception;


class AdminHsClsSecWiseAdmittedStudents extends Component
{

    
    public $hsClassId = null, $hsSectionId = null, $hsSemesterId = null;    
    
    public $promoted_hsStudentcrs, $new_admitted_hsStudentdbs;
    
    public function mount($hsClassId = null, $hsSectionId = null, $hsSemesterId = null){
        // dd($hsClassId, $hsSectionId, $hsSemesterId);
        $this->hsClassId = $hsClassId;
        $this->hsSectionId = $hsSectionId;
        $this->hsSemesterId = $hsSemesterId;


        $this->refreshDAta();
    }

    public function refreshDAta(){
        $this->new_admitted_hsStudentdbs = \App\Models\HsStudentDb::with('hsStudentCrs', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('st_hs_class_id', $this->hsClassId)
            ->whereNotIn('id', function ($query) {
                $query->select('hs_studentdb_id')
                  ->from('hs_student_crs');
            })->get();
        
        $this->promoted_hsStudentcrs = \App\Models\HsStudentCr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('next_hs_session_id', \App\Models\HsSession::currentlyActive()->id)
            ->where('hs_class_id', $this->hsClassId)
            ->whereNotIn('id', function ($query) {
                $query->select('next_hs_studentcr_id')
                  ->from('hs_student_crs');
            })
            ->get();

        

            // dd($this->new_admitted_hsStudentdbs);
    }

    public function assignRollNo($hsStudentdb_id){
        // $this->message =  "Roll No. " . $hsStudentdb_id . " assigned successfully.";
        $hsStudentdb = HsStudentDb::find($hsStudentdb_id);
        $hsStudentcrMaxRollNo = HsStudentCr::where('hs_session_id', HsSession::currentlyActive()->id)
            ->max('roll_no');
        // dd($hsStudentcr);
            
        try{
            $hsStudentdb->hsStudentcrs()->updateOrCreate([
                'hs_session_id' => HsSession::currentlyActive()->id,
                'hs_studentdb_id' => $hsStudentdb_id,
            ], [
                'hs_studentdb_id' => $hsStudentdb_id,
                'hs_session_id' => HsSession::currentlyActive()->id,
                'hs_class_id' => $hsStudentdb->st_hs_class_id,
                'hs_section_id' => $hsStudentdb->st_hs_section_id,
                'hs_semester_id' => $hsStudentdb->st_hs_semester_id,
                'crstatus'  => 'ACTIVE',
                'roll_no' => $hsStudentcrMaxRollNo != null ? $hsStudentcrMaxRollNo + 1 : 1,
                'school_id' => $hsStudentdb->school_id
            ]);

            session()->flash('success', "Roll No. " . $hsStudentdb_id . " assigned successfully, to Student Name: " . $hsStudentdb->name);
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->refreshData();
    }







    public function render()
    {
        return view('livewire.admin-hs-cls-sec-wise-admitted-students');
    }
}
