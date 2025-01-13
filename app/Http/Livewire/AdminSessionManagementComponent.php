<?php

namespace App\Http\Livewire;

use App\Models\Session;
use Livewire\Component;

class AdminSessionManagementComponent extends Component
{

    public $sessions;


    public function mount(){
        $this->sessions = Session::all();
    }


    public function setActiveSession($session_id){
        Session::where('status', 'ACTIVE')->update(['status' => 'INACTIVE']);
        Session::where('id', $session_id)->update(['status' => 'ACTIVE']);
        $this->mount();
    }



    public function render()
    {
        return view('livewire.admin-session-management-component');
    }
}
