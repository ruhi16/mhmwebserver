<?php

namespace App\Http\Livewire;

use App\Models\HsSession;
use Livewire\Component;

class HssectionSessionComp extends Component
{
    public $hsSessions;


    public function mount(){
        $this->hsSessions = HsSession::all();
    }

    public function setActiveSession($hsSessionId){
        HsSession::where('status', 'ACTIVE')->update(['status' => 'INACTIVE']);
        HsSession::where('id', $hsSessionId)->update(['status' => 'ACTIVE']);
        $this->mount();
    }



    public function render()
    {
        return view('livewire.hssection-session-comp');
    }
}
