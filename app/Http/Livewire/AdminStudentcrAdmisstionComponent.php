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

    public $studentdbs;

    // #[On('refreshStudentcrsPromotions')]
    protected $listeners = ['refreshStudentcrsPromotions' => 'mount'];

    
    public function mount(){
        // $this->myclass_id = 2;
        // $this->mysection_id = 1;
        // $this->componentName = request()->route()->getName();

        $this->session = Session::currentlyActive();
        $this->classSections = Myclasssection::where('session_id', $this->session->id)
            // ->where('myclass_id', $this->myclass_id)
            // ->where('section_id', $this->mysection_id)
            ->where('status', 'ACTIVE')
            ->first();

        // dd($this->classSections);

        $this->studentcrEOYSummary = Studentcr_eoy_summary::
            // where('session_id', $this->session->prev_session_id) // have to add 'session_id'
            where('c_id', 1)
            ->where('s_id', 1)
            ->orderBy('total_ob_marks', 'desc')
            ->get();


            $studentdb_running_ids = Studentcr::where('session_id', $this->session->id)
                ->where('myclass_id', $this->classSections->myclass_id)
                ->where('section_id', $this->classSections->section_id)
                ->pluck('studentdb_id')
                ->toArray()
                ;

            $this->studentdbs = Studentdb::where('session_id', $this->session->id)
                ->where('stclass_id', $this->classSections->myclass_id)
                ->where('stsection_id', $this->classSections->section_id)
                ->whereNotIn('id', $studentdb_running_ids)
                ->get()
                ;
            // dd($this->studentdbs);
        
        // for Admission Table only, for Promoted Studentcrs
        // $this->studentcrs = Studentcr::where('session_id', $this->session->prev_session_id)
        //     ->where('next_session_id', $this->session->id)
        //     ->where('next_class_id', $this->myclass_id)
        //     ->where('next_section_id', $this->mysection_id)    
        //     ->where('next_studentcr_id', 0)        
        //     ->get()
        //     ;

            // $this->nextClassSections = Myclasssection::where('myclass_id', $this->classSections->myclass->next_class_id)->get();                            
                        
            $this->studentcrs = Studentcr::where('studentcrs.session_id', $this->session->id)
                ->where('myclass_id', $this->classSections->myclass_id)
                ->where('section_id', $this->classSections->section_id)
                ->join('Studentcr_eoy_summary', 'studentcrs.id', '=', 'Studentcr_eoy_summary.id')  
                ->select('studentcrs.*', 'Studentcr_eoy_summary.total_ob_marks', 'Studentcr_eoy_summary.No_of_Ds', 'Studentcr_eoy_summary.fm')
                ->orderBy('total_ob_marks', 'desc')
                ->get()
                ;
            
    }

    public function admitNewStudent($studentdb_id){
        try{            
            $studentdb = Studentdb::find($studentdb_id);
            // dd($studentdb);

            $studentcr = Studentcr::firstOrCreate([
                'session_id' => Session::currentlyActive()->id,
                'studentdb_id' => $studentdb_id
            ],[
                'myclass_id' => $studentdb->stclass_id,
                'section_id' => $studentdb->stsection_id,
                'roll_no' => (int) $studentdb->remarks,
                'crstatus' => 'Running',

            ]);
            
            // dd($studentcr);
            // $studentcr->save(); // whenever we use firstOrNew, we have to save() exclusively


            session()->flash('message', 'New Student Admitted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error', $e->getMessage());
        }

        $this->mount();
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
