<?php

namespace App\Http\Livewire;

use App\Models\Answerscriptdistribution;
use App\Models\Exam;
use App\Models\Examdetails;
use App\Models\Exammode;
use App\Models\Examtype;
use App\Models\Myclasssection;
use App\Models\Myclasssubject;
use Livewire\Component;

class SubadminMarksEntryEditComponent extends Component
{
    public $examDetail_id;
    public $myclassSection_id;
    public $myclassSubject_id;
    public $examDetails;
    public $answerscriptdistribution;

    public $myclassSections;
    public $myclassSubjects;

    public $exams;
    public $examtypes;
    public $examModes;

    public $selectedExam = null;
    public $selectedexamtype = null;

    public $message = null;

    // Editable fields for each examDetail
    public $editingFullMarks = [];
    public $editingPassMarks = [];
    public $editingTime = [];

    public function mount($myclassSection_id)
    {
        $this->myclassSection_id = $myclassSection_id;

        $this->myclassSections = Myclasssection::find($myclassSection_id);
        $this->myclassSubjects = Myclasssubject::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->where('myclass_id', $this->myclassSections->myclass_id)
            ->orderBy('examtype_id', 'asc')
            ->get();

        $this->exams = Exam::all();
        $this->examtypes = Examtype::all();
        $this->examModes = Exammode::where('name', 'Oral')->orWhere('name', 'Written')->get();
        $this->examDetails = Examdetails::where('session_id', \App\Models\Session::currentlyActive()->id)
            ->where('myclass_id', $this->myclassSections->myclass_id)
            ->get();

        $this->answerscriptdistribution = Answerscriptdistribution::where('myclass_id', $this->myclassSections->myclass_id)
            ->where('section_id', $this->myclassSections->section_id)
            ->get();

        // Initialize editing arrays
        foreach ($this->examDetails as $examDetail) {
            $this->editingFullMarks[$examDetail->id] = $examDetail->full_mark;
            $this->editingPassMarks[$examDetail->id] = $examDetail->pass_mark;
            $this->editingTime[$examDetail->id] = $examDetail->time_alloted;
        }
    }

    public function updatedSelectedExam($selectedExam)
    {
        $this->selectedExam = $selectedExam;
        $this->message = 'Exam selected';

        $this->selectedexamtype = $this->selectedExam ? null : $this->selectedexamtype;
    }

    public function updateMarks($examDetailId)
    {
        $this->validate([
            "editingFullMarks.$examDetailId" => 'required|numeric|min:0|max:1000',
            "editingPassMarks.$examDetailId" => 'required|numeric|min:0|max:1000',
            "editingTime.$examDetailId" => 'required|numeric|min:0|max:300',
        ]);

        $examDetail = Examdetails::find($examDetailId);
        if ($examDetail) {
            $examDetail->full_mark = $this->editingFullMarks[$examDetailId];
            $examDetail->pass_mark = $this->editingPassMarks[$examDetailId];
            $examDetail->time_alloted = $this->editingTime[$examDetailId];
            $examDetail->save();

            $this->message = 'Marks updated successfully';
        }
    }

    public function render()
    {
        return view('livewire.subadmin-marks-entry-edit-component');
    }
}
