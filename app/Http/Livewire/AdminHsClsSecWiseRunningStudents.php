<?php

namespace App\Http\Livewire;
use Livewire\Component;


use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;






class AdminHsClsSecWiseRunningStudents extends Component{

    public $hsClassId = null, $hsSectionId = null, $hsSemesterId = null;    
    
    public $hsStudentcrs;

    public $qrcode;
    
    public function mount($hsClassId = null, $hsSectionId = null, $hsSemesterId = null){
        // dd($hsClassId, $hsSectionId, $hsSemesterId);
        $this->hsClassId = $hsClassId;
        $this->hsSectionId = $hsSectionId;
        $this->hsSemesterId = $hsSemesterId;


        $this->refreshDAta();

    }


    public function refreshDAta(){
        $this->hsStudentcrs = \App\Models\HsStudentCr::with('hsStudentDb', 'hsClass', 'hsSection', 'hsSemester')
            ->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id) 
            ->where('hs_class_id', $this->hsClassId)
            ->orderBy('roll_no')
            ->get();
    }


    public function generateQRCode($hsStudentcr_id){
        $hsStudentcr = \App\Models\HsStudentCr::find($hsStudentcr_id);

        $url = 'https://manikchakhighmadrasah.org/';

        $qrcode_url = $url.'hs-sections'.'/'. $hsStudentcr->hsStudentDb->uuid_auto.'/'.$hsStudentcr->id;

        $qrcode_img_ref = '/'. \App\Models\HsSession::currentlyActive()->name .'-'. 
                $hsStudentcr->hsClass->name .'-'. 
                $hsStudentcr->hsSection->name .'-'.
                $hsStudentcr->hsSemester->name .'-'. 
                $hsStudentcr->roll_no .'-'.
                $hsStudentcr->hsStudentDb->name .'.svg' ;

        try{

            $this->qrcode = QrCode::format('svg')
                // ->merge($url.'/img/logo.jpg')
                // ->merge('../public/img/logo2.svg')
                ->generate($qrcode_url, '../public/img' . $qrcode_img_ref);

            $this->refreshData();
        
            $hsStudentcr->qr_img_ref = $qrcode_img_ref;
            $hsStudentcr->save();

            session()->flash('success', "QR Code generated successfully, to Student Name: " . $hsStudentcr->hsStudentDb->name);
            
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }













    public function render()
    {
        return view('livewire.admin-hs-cls-sec-wise-running-students');
    }
}
