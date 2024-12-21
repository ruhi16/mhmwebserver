<?php

namespace App\Http\Livewire;

use App\Models\Myclass;
use App\Models\Marksentry;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use Illuminate\Http\Request;
use Livewire\Component;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Tag\Mark;

class AdminMeritListComponent extends Component
{
    public $myclassSection_id;
    public $myclassSection;

    public $myclassSubjects;

    public $myclassSummativeSubject_ids;

    public $markentries;

    public function mount($myclassSection_id){
        $this->myclassSection = Myclasssection::find($myclassSection_id);


        if($this->myclassSection->myclass_id < 5){
            $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)            
                ->where('examtype_id', 2) //for V to VIII, summative only
                ->get();
        }else{
            $this->myclassSubjects = Myclasssubject::where('myclass_id', $this->myclassSection->myclass_id)            
                ->where('examtype_id', 2) //for IX summative, without additionals, arabic, hed, wed, coma
                ->where('is_additional', 0)
                ->get();
        }

        $this->myclassSummativeSubject_ids = $this->myclassSubjects //for summative only
            ->pluck('id')->toArray()
            ;

        $this->markentries = Marksentry::where('myclasssection_id', $myclassSection_id)
            // ->marksentries()
            ->whereIn('myclasssubject_id', $this->myclassSummativeSubject_ids)
            ->groupBy('studentcr_id')
            ->selectRaw('studentcr_id, sum(CASE WHEN marks > 0 THEN marks ELSE 0 END) as total')
            ->orderBy('total', 'desc')
            ->get()
            ;



    }


    public function exportMeritlistcswPdf(Request $request){
        $this->mount($request->myclassSection_id);
        $data = ['title' => 'Merit List Class Section', 'content' => 'This is the content of the Secondary PDF.'];
        
        $pdf = PDF::loadView('pdfs.tmp_meritlistcsw', [
            'data' => $data,
            'myclassSection' => $this->myclassSection,
            'myclassSubjects' => $this->myclassSubjects,
            'markentries'   => $this->markentries,


        ], [], [
            'title' => 'Another Title',
            'format' => 'A4-P',
            'orientation' => 'P',
            'margin_top' => 20,
            'default_font_size' => 8,
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            // echo $pdf->Output('', 'S'); // Output the PDF content as a string
        }, 'document.pdf', [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="ccc.pdf"'
        ]);

    }
    public function render()
    {
        return view('livewire.admin-merit-list-component');
    }
}
