<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Session;
use App\Models\Myclasssection;

class AdminMyclassSectionControlComponent extends Component
{
    public $session;
    public $myclassSections;

    public function mount(){
        $this->session = Session::where('status', 'ACTIVE')->first();
        // dd($this->session);

        $this->myclassSections = Myclasssection::where('session_id', $this->session->id)
            ->get();

    }


    public function render()
    {
        return view('livewire.admin-myclass-section-control-component');
    }
}
