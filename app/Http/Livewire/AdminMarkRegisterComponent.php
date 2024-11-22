<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Studentcr;
use Livewire\Component;

class AdminMarkRegisterComponent extends Component
{

    public $myclassSection = null;
    public $studentcrs = null;

    public $myclassSubjects = null;
    public $exams = null;
    public $examdetails = null;

    public $marksentries = null;




    public function mount($myclassSection_id){

        $this->myclassSection = Myclasssection::find($myclassSection_id);
        
        $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)
            ->orderBy('examtype_id', 'asc')
            ->orderBy('subject_order', 'asc')
            ->get();

        $this->exams = Exam::all();
        $this->examdetails = $this->myclassSection->myclass->examdetails()->get();

        $this->studentcrs = Studentcr::where('myclass_id', $this->myclassSection->myclass_id)
            ->where('section_id', $this->myclassSection->section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

        $this->marksentries = $this->myclassSection->marksentries()
            // ->whereColumn('examdetail_id', $this->exams->find(1)->examdetails()->pluck('id'))
            ->get();

        
    }


    public function render()
    {
        return view('livewire.admin-mark-register-component');
    }
}
