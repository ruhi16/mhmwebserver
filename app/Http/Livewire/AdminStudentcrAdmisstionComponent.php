<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Myclasssection;
use App\Models\Promotionalrule;
use App\Models\Session;
use App\Models\Studentcr;
use App\Models\Studentcr_eoy_summary;
use App\Models\Studentdb;

class AdminStudentcrAdmisstionComponent extends Component{
    public $componentName;
    public $studentcrEOYSummary;

    public $promotionalRules;
    public $classSections;
    public $nextClassSections;
    
    public $section_id;


    public $studentcrs;
    public $session;

    public $myclass_id;
    public $mysection_id;



    public function mount(){
        $this->myclass_id = 2;
        $this->mysection_id = 1;
        // $this->componentName = request()->route()->getName();

        $this->session = Session::where('status', 'ACTIVE')->first();

        $this->classSections = Myclasssection::where('myclass_id', $this->myclass_id)
            ->where('section_id', $this->mysection_id)
            ->get();

        $this->studentcrEOYSummary = Studentcr_eoy_summary::
            // where('session_id', $this->session->prev_session_id) // have to add 'session_id'
            where('c_id', 1)
            ->where('s_id', 1)
            ->orderBy('total_ob_marks', 'desc')
            ->get();
        
        
        // for Admission Table only
        $this->studentcrs = Studentcr::where('session_id', $this->session->prev_session_id)
            ->where('next_session_id', $this->session->id)
            ->where('next_class_id', $this->myclass_id)
            ->where('next_section_id', $this->mysection_id)    
            ->where('next_studentcr_id', 0)        
            ->get()
            ;
            
    }

    public function admitStudent($studentcr_id){
        try{
        $studentcr_old = Studentcr::where('id', $studentcr_id)->firstOrFail();

        $studentcr_curr = Studentcr::where('session_id', $this->session->id)
            ->where('myclass_id', $this->myclass_id)
            ->where('section_id', $this->mysection_id)
            ->orderBy('roll_no', 'desc')
            ->get();
        
        $studentcr = new Studentcr();
        $studentcr->studentdb_id = $studentcr_old->studentdb_id;
        $studentcr->session_id = $this->session->id;
        $studentcr->myclass_id = $studentcr_old->next_class_id;
        $studentcr->section_id = $studentcr_old->next_section_id;
        $studentcr->roll_no = (int) ($studentcr_curr[0]->roll_no ?? 0) + 1;
        $studentcr->crstatus = 'Running';
        $studentcr->school_id = 1;
        $studentcr->save();


        $studentcr_old->next_studentcr_id = $studentcr->id;
        $studentcr_old->save();

            session()->flash('message', 'Student Admitted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }






    public function render()
    {
        return view('livewire.admin-studentcr-admisstion-component');
    }
}
