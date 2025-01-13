<?php

namespace App\Http\Livewire;

use App\Models\Myclasssection;
use Livewire\Component;
use App\Models\Promotionalrule;
use App\Models\Session;
use App\Models\Studentcr;
use App\Models\Studentcr_eoy_summary;
use Exception;

class AdminStudentcrPromotionalComponent extends Component
{
    public $componentName;
    public $studentcrEOYSummary;

    public $promotionalRules;
    public $classSections;
    public $nextClassSections;
    
    public $section_id;


    public $studentcrs;
    public $session;

    public function mount(){
        $myclass_id = 1;
        $section_id = 1;
        
        $this->session = Session::where('status', 'ACTIVE')->first();
        

        $this->studentcrEOYSummary = Studentcr_eoy_summary::where('session_id', $this->session->id)
            ->where('c_id', $myclass_id)
            ->where('s_id', $section_id)
            ->orderBy('total_ob_marks', 'desc')
            ->get();

        $this->promotionalRules = Promotionalrule::where('session_id', $this->session->id)->get();

        $this->classSections = Myclasssection::where('session_id', $this->session->id)
            ->where('myclass_id', $myclass_id)
            ->get();

        // dd($this->classSections);
        $this->nextClassSections = Myclasssection::where('myclass_id', $this->classSections->first()->myclass->next_class_id)->get();
            
        
        $sortedIds = $this->studentcrEOYSummary->pluck('studentcr_id')->toArray();
        $this->studentcrs = Studentcr::where('myclass_id', $myclass_id)
            ->where('section_id', $section_id)
            ->get()
            ;
            
    }

    public function promotedToNextClass($studentcr_id){
        // dd($studentcr_id);
        // $session = Session::where('status', 'ACTIVE')->first();
        $studentcr = Studentcr::find($studentcr_id);
        try{
            if($this->section_id != null){
                $studentcr
                    ->update([
                        'next_class_id' => $studentcr->myclass->next_class_id,
                        'next_section_id' => $this->section_id,
                        'next_session_id' => $this->session->next_session_id
                    ]);
            }
            session()->flash('message', 'Promoted to next class successfully');
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.admin-studentcr-promotional-component');
    }
}
