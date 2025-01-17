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
        $this->session = Session::currentlyActive();
        // dd($this->session);

        $this->refresh();

    }

    public function activeMyclassSection($myclasssection_id){
        Myclasssection::where('session_id', Session::currentlyActive()->id)
            ->update(['status' => 'INACTIVE']);

        Myclasssection::find($myclasssection_id)
            ->update(['status' => 'ACTIVE']);

        // $myclasssection->status = 'ACTIVE';
        // $myclasssection->save();

        $this->refresh();
        $this->emit('refreshStudentcrsPromotions');
    }


    public function render()
    {
        return view('livewire.admin-myclass-section-control-component');
    }

    public function refresh(){
        $this->myclassSections = Myclasssection::where('session_id', Session::currentlyActive()->id)
            ->get();
    }
}
