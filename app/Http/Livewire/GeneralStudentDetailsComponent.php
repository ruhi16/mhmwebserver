<?php

namespace App\Http\Livewire;

use App\Models\Studentcr;
use App\Models\Studentdb;
use Illuminate\Http\Request;
use Livewire\Component;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GeneralStudentDetailsComponent extends Component
{


    public $qrcode;

    public function mount(Request $request){

    }

    public function exportStudentDetails(Request $request){
        $url = url('/');
        $qrcode_str = $url.'/'.'generate-student-details'.'/'. $request->uuid.'/'. $request->scr_id;

        $this->qrcode = $qrcode_str;
        // $this->qrcode = QrCode::size(80)->generate($qrcode_str);

        $studentcr = Studentcr::findOrFail($request->scr_id);
        // echo($data->name);
        // dd($qrcode);
        //return $qrcode;
        // $this->render();
        QrCode::format('svg')->merge('../public/img/logo2.svg')->generate($this->qrcode, '../public/img/'. $studentcr->myclass->name .'-'. $studentcr->section->name .'-'. $studentcr->roll_no .'-'. $studentcr->studentdb->name .'.svg' );

        // $this->render();

        return view('livewire.general-student-details-component');
    }


    public function render()
    {
        return view('livewire.general-student-details-component', [
            // 'qrcode_str' => $this->qrcode_str
        ]);
    }
}
