<?php

namespace App\Http\Livewire;

use App\Models\Myclass;
use App\Models\Examtype;
use App\Models\Session;
use Livewire\Component;

class AdminMyclassManagementComponent extends Component{

    public $session;
    public $myclasses;
    public $myclasstypes;

    public function mount(){

        $this->session = Session::currentlyActive();
        
        // Myclass is a basic table
        $this->myclasses = Myclass::all();
        
        $this->myclasstypes = Examtype::all();
        // dd($this->myclasses[0]->examdetails());
    }



    public function render(){
        return view('livewire.admin-myclass-management-component');
    }
}
