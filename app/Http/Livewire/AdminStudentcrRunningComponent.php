<?php

namespace App\Http\Livewire;

use App\Models\Session;
use App\Models\Studentcr;

use App\Models\Myclasssection;
use App\Models\Promotionalrule;

use App\Models\Studentcr_eoy_summary;
use App\Models\Studentdb;
use Livewire\Component;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use SimpleSoftwareIO\QrCode\Generator;

class AdminStudentcrRunningComponent extends Component
{

    public $session = null;
    public $studentcrs = null;

    public $classSections;


    public $qrcode;

    // public $data;
    // public $qrCode_new=null;


    public function mount(){
        // $myclass_id = 2;
        // $section_id = 1;


        $this->session = Session::currentlyActive();
        
        $this->classSections = Myclasssection::where('session_id', $this->session->id)            
            ->where('status', 'ACTIVE')
            ->first();

        $this->studentcrs = Studentcr::where('session_id', $this->session->id)
            ->where('myclass_id', $this->classSections->myclass_id)
            ->where('section_id', $this->classSections->section_id)
            ->orderBy('roll_no', 'asc')
            ->get();

        // $data = 'Hello Students';
        // $this->qrCode_new = (new Generator)->size(200)->generate($data);

            
    }


    public function generateQRCode($studentcr_id){
        $studentcr = Studentcr::find($studentcr_id);

        // dd($studentcr->studentdb);

        $url = url('/');
        $qrcode_str = $url.'/'.'generate-student-details'.'/'. $studentcr->studentdb->uuid.'/'. $studentcr->id;

        $this->qrcode = QrCode::format('svg')
            // ->merge($url.'/img/logo.jpg')
            ->merge('../public/img/logo2.svg')
            ->generate($qrcode_str, '../public/img/'. 
                $studentcr->myclass->name .'-'. 
                $studentcr->section->name .'-'. 
                $studentcr->roll_no .'-'. 
                $studentcr->studentdb->name .'.svg' 
            );

            

        // $this->qrcode = $qrcode_str;
        // Get the file path
        // $filePath = '../public/img/'. 
        // $studentcr->myclass->name .'-'. 
        // $studentcr->section->name .'-'. 
        // $studentcr->roll_no .'-'. 
        // $studentcr->studentdb->name .'.svg';
        
        // return response()->streamDownload(function () use ($qrcode) {
        //     // echo $pdf->stream();
        //     echo $qrcode->Output('', 'S'); // Output the PDF content as a string
        // }, $filePath, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="ccc.pdf"'
        // ]);



        // // Download the file
        // if (file_exists($filePath)) {
        //     header('Content-Description: File Transfer');
        //     header('Content-Type: application/octet-stream');
        //     header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        //     header('Expires: 0');
        //     header('Cache-Control: must-revalidate');
        //     header('Pragma: public');
        //     header('Content-Length: ' . filesize($filePath));
        //     readfile($filePath);
        // exit;
        // } else {
        //     // Handle file not found error
        //     echo "QR Code file not found.";
        // }
    }




    public function render()
    {
        return view('livewire.admin-studentcr-running-component');
    }
}
