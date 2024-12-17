<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Studentcr;
use Illuminate\Http\Request;
use Livewire\Component;


use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class AdminMarkRegisterComponent extends Component
{

    public $myclassSection = null;
    public $studentcrs = null;

    public $myclassSubjects = null;
    public $exams = null;
    public $examdetails = null;

    public $marksentries = null;

    public $grades = null;




    public function mount($myclassSection_id){

        $this->myclassSection = Myclasssection::find($myclassSection_id);
        
        $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)
            ->orderBy('examtype_id', 'asc')
            ->orderBy('subject_order', 'asc')
            ->get();

        $this->exams = Exam::all();
        $this->examdetails = $this->myclassSection->myclass->examdetails()->get();

        $this->studentcrs = Studentcr::where('myclass_id', $this->myclassSection->myclass_id)
            ->where('section_id', $this->myclassSection->section_id)
            ->orderBy('roll_no', 'asc')
            ->get()
            ;

        $this->marksentries = $this->myclassSection->marksentries()
            // ->whereColumn('examdetail_id', $this->exams->find(1)->examdetails()->pluck('id'))
            ->get()
            ;  
            
            
        $this->grades = Grade::all();
    }




    public function exportMarkregisterPdf(Request $request){
        $request->myclassSection_id;
        $this->mount($request->myclassSection_id);

        $data = ['title' => 'My PDF Title', 'content' => 'This is the content of the PDF.'];

        $pdf = PDF::loadView('pdfs.tmp_marksregister', [
            'data' => $data,
            'clsSec_id' => $request->myclassSection_id,

            'classSection' => $this->myclassSection,
            'myclassSubjects' => $this->myclassSubjects,
            'studentcrs' => $this->studentcrs,
            'exams' => $this->exams,
            'examdetails' => $this->examdetails,
            'marksentries' => $this->marksentries,
            'grades' => $this->grades,
        ], [], [
            'title' => 'Another Title',
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => 0]);
        
        // $pdf->setFooter('{PAGENO} of {nbpg}');
        // $pdf->SetHTMLFooter('<div style="text-align: center">{PAGENO} of {nbpg}</div>');


        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'document.pdf');


        // $mpdf = new \Mpdf\Mpdf([
        //     'default_font_size' => 8,
        //     'default_font' => 'nikosh',
        // ]);
        // $html = view('pdfs.tmp_marksregister',[
        //     'clsSec_id' => $request->myclassSection_id,
        // ])->render();

        // $mpdf->WriteHtml($html);
        // // $mpdf->WriteHTML('<h1>আমি আছি Hello World</h1>');
        // // $mpdf->Output('marksregister.pdf', \Mpdf\Output\Destination::INLINE);
        // $mpdf->Output();

    }


    public function render()
    {
        return view('livewire.admin-mark-register-component');
    }
}
