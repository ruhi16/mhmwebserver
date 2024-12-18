<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use App\Models\Studentcr;
use Illuminate\Http\Request;
use Livewire\Component;

// use PDF;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class AdminMyclassSectionIndividualMarksheetComponent extends Component
{

    public $myclassSection_id;    
    public $myclassSection;
    public $myclassSubjects;


    public $studentcr_id;
    public $studentcr;

    public $markEntries;

    public $exams;
    public $examDetails;

    public $grades;
    



    public function mount($myclassSection_id, $studentcr_id){

        $this->myclassSection_id = $myclassSection_id;
        $this->myclassSection = Myclasssection::find($myclassSection_id);
        $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)->orderBy('examtype_id', 'asc')->get();
        // $this->myclassSubjects = $this->myclassSection->myclass->myclasssubjects();


        
        $this->studentcr_id = $studentcr_id;
        $this->studentcr = Studentcr::where('id', $studentcr_id)->first();

        $this->markEntries = $this->myclassSection->marksentries()
            ->where('studentcr_id', $studentcr_id)
            ->get();


        $this->exams = Exam::all();
        $this->examDetails = $this->myclassSection->myclass->examdetails()->get();
        // $this->myclasses = Myclass::where('id', $myclass_id)->get();        
        // $this->sections = Myclasssection::where('class_id', $myclass_id)->get();  

        $this->grades = Grade::all();
        
    }

    public function generatePDF(){
        $data = ['title' => 'My PDF Title', 'content' => 'This is the content of the PDF.'];

        $pdf = PDF::loadView('pdfs.template', $data, [], [
            'title' => 'Another Title',
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => 0]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'xxx.pdf');
    }

    public function exportUprMarksheetPdf(Request $request)
    {
        $data = ['title' => 'My UPR PDF Title', 'content' => 'This is the content of the Upper Primary PDF.'];
        $this->mount($request->myclassSection_id, $request->studentcr_id);
        $url = url('/');
        $qrcode_str = $url.'/'.'generate-upr-marksheetpdf'.'/'. $request->myclassSection_id.'/'. $request->studentcr_id;
        $qrcode = QrCode::size(80)->generate($qrcode_str);
        
        // $studentcr = Studentcr::where('id', $this->studentcr_id)->firstOrFail();


        $pdf = PDF::loadView('pdfs.tmp_upr_marksheet', [
            'data' => $data,
            'qrcode' => $qrcode,

            'studentcr' => $this->studentcr,
            'myclassSection' => $this->myclassSection,
            'myclassSubjects' => $this->myclassSubjects,
            'markEntries'   => $this->markEntries,
            'exams' => $this->exams,
            'examDetails' => $this->examDetails,
            'grades' => $this->grades,

        ], [], [
            'title' => 'Another Title',            
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => 0]);

        $file_name = 'MS-2024 '.$this->myclassSection->myclass->name.' - '.$this->myclassSection->section->name.' - '.$this->studentcr->studentdb->name.'.pdf';
        
        // $pdf->setFilename($file_name);
        return response()->streamDownload(function () use ($pdf) {
            // echo $pdf->stream();
            echo $pdf->Output('', 'S'); // Output the PDF content as a string
        }, $file_name, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="ccc.pdf"']);
    }

    public function exportSecMarksheetPdf(){
        $data = ['title' => 'My SEC PDF Title', 'content' => 'This is the content of the Secondary PDF.'];

        $pdf = PDF::loadView('pdfs.tmp_sec_marksheet', $data, [], [
            'title' => 'Another Title',
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => 0]);

        

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'yyy.pdf', ['Content-Type' => 'application/pdf']);
    }





    public function render(){
        return view('livewire.admin-myclass-section-individual-marksheet-component');
    }



    public function numberToWords($num = ''){
        $num    = ( string ) ( ( int ) $num );        
        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );
             
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
             
            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');
             
            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');
             
            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');
             
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
             
            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                 
                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }
             
            $words  = implode( ', ' , $words );
             
            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' and' , $words );
            }
             
            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }


}
