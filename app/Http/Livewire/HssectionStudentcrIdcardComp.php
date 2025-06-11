<?php

namespace App\Http\Livewire;

use App\Models\HsStudentCr;
use Illuminate\Http\Request;
use Livewire\Component;

class HssectionStudentcrIdcardComp extends Component
{

    public $uuid, $studentcr_id;

    public function mount(Request $request){

    }


    public function exportIdcard(Request $request, $uuid, $scr_id){
        $this->uuid = $request->uuid;
        $this->studentcr_id = $request->scr_id;


        return view('livewire.hssection-studentcr-idcard-comp', [
            'uuid' => $request->uuid,
            'hsStudentcr' => HsStudentCr::findOrFail($request->scr_id)
        ]);
        
    }


    public function render()
    {
        return view('livewire.hssection-studentcr-idcard-comp');
    }
}
