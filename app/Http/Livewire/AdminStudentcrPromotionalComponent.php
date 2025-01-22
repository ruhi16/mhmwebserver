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

    public $stdcrsection = [];
    public $myclasssection_id;

    // #[On('refreshStudentcrsPromotions')]
    protected $listeners = ['refreshStudentcrsPromotions' => 'mount'];


    public function mount(){
        $this->session = Session::currentlyActive();

        $this->classSections = Myclasssection::where('session_id', $this->session->id)
            ->where('status', 'ACTIVE')
            ->first();     
            
            
        if( ! is_null($this->classSections )     ){
            if($this->classSections->count() > 0){

                $this->promotionalRules = Promotionalrule::where('session_id', $this->session->id)
                // ->where('myclass_id', $this->classSections->myclass_id)
                ->first();


                // $this->nextClassSections = Myclasssection::where('myclass_id', $this->classSections->first()->myclass->next_class_id)->get();                            
                        
                $this->nextClassSections = Myclasssection::where('session_id', Session::currentlyActive()->next_session_id)
                    ->where('myclass_id', $this->classSections->myclass->next_class_id)
                    ->get();
                
                // dd($this->nextClassSections);

                $this->studentcrs = Studentcr::where('studentcrs.session_id', $this->session->id)
                    ->where('myclass_id', $this->classSections->myclass_id)
                    ->where('section_id', $this->classSections->section_id)
                    ->join('Studentcr_eoy_summary', 'studentcrs.id', '=', 'Studentcr_eoy_summary.id')  
                    ->select('studentcrs.*', 'Studentcr_eoy_summary.total_ob_marks', 'Studentcr_eoy_summary.No_of_Ds', 'Studentcr_eoy_summary.fm' )
                    ->orderBy('total_ob_marks', 'desc')
                    ->get()
                    ;
            }    
        }
    }



     

    public function updatedStdcrsection($key, $value){

        // dd($key, $value, $this->stdcrsection[$value]);
        // dd(Myclasssection::find($key)->section->id);

        $this->myclasssection_id = $key;
        // $this->promotedToNextClass($value);

        // $key = Myclasssection->id
        // $value = Studentcr->id
        // $this->section_id = $value;
        // $myclasssection = Myclasssection::find($key);
        // $this->refreshStudentcrs($myclasssection->myclass_id, $myclasssection->section_id);
        $this->refreshStudentcrs();
    }

    public function promotedToNextClass($studentcr_id){
        // dd($studentcr_id);
        // $session = Session::where('status', 'ACTIVE')->first();
        $studentcr = Studentcr::find($studentcr_id);
        try{
            if($this->stdcrsection[$studentcr_id] != null){
                $studentcr
                    ->update([
                        'next_class_id' => $studentcr->myclass->next_class_id,
                        'next_section_id' => Myclasssection::find($this->myclasssection_id)->section->id,
                        'next_session_id' => $this->session->next_session_id
                    ]);
            }
            session()->flash('message', 'Promoted to next class successfully');
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
        }

        // $this->mount();
        $this->refreshStudentcrs();
    }


    public function render()
    {
        return view('livewire.admin-studentcr-promotional-component');
    }


    public function refreshStudentcrs(){
        $this->studentcrs = Studentcr::where('studentcrs.session_id', $this->session->id)
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->join('Studentcr_eoy_summary', 'studentcrs.id', '=', 'Studentcr_eoy_summary.id')  
            ->select('studentcrs.*', 'Studentcr_eoy_summary.total_ob_marks', 'Studentcr_eoy_summary.No_of_Ds', 'Studentcr_eoy_summary.fm' )
            ->orderBy('total_ob_marks', 'desc')
            ->get()
            ;
        
        // $this->studentcrs = Studentcr::where('studentcrs.session_id', Session::currentlyActive()->id)
        //     ->where('myclass_id', $myclass_id)
        //     ->where('section_id', $section_id)
        //     ->join('Studentcr_eoy_summary', 'studentcrs.id', '=', 'Studentcr_eoy_summary.id')  
        //     ->select('studentcrs.*', 'Studentcr_eoy_summary.total_ob_marks', 'Studentcr_eoy_summary.No_of_Ds', 'Studentcr_eoy_summary.fm' )
        //     ->orderBy('total_ob_marks', 'desc')
        //     ->get()
        //     ;
    }
}
