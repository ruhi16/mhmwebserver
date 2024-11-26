<?php

namespace App\View\Components;

use App\Models\Exam;
use App\Models\Myclasssection;
use App\Models\Myclassteacher;
use Illuminate\View\Component;

class SubadminDashboard extends Component
{
    public $myclassTeachers;
    public $myclassSections;
    public $exams;
    public function __construct()
    {
        //
    }

    public function mount(){
        $this->myclassTeachers = Myclassteacher::all();
        $this->myclassSections = Myclasssection::all();
        $this->exams = Exam::all();
    }
    
    public function render()
    {
        return view('components.subadmin-dashboard', [
            'exams'=> $this->exams
        ]);
    }
}
