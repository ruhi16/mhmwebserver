<?php

namespace App\Http\Livewire;

use App\Models\HsStudentdb;
use App\Models\HsClass;
use App\Models\HsExamDetails;
use App\Models\HsExamName;
use App\Models\HsStudentCr;
use App\Models\HsSubject;
use App\Models\HsMarksentry;
use App\Models\HsClassSemester;

use Illuminate\Support\Facades\DB;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


use Livewire\Component;




class AdminHSMainSectionComponent extends Component
{


    public $statusButtons = [
        'running' => false,
        'admission' => false,
        'promotion' => false,
        'marksentry' => false,
        'report' => false,
        
    ];

    public $items = [
        'classes' => [
            ['name' => 'Class XI',
            'id' => 1, 
            'is_active' => false,
            'semesters' => [
                ['name' => 'Semester 1', 'id'=>1, 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
                ['name' => 'Semester 2', 'id'=>2, 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
            ]],
            ['name' => 'Class XII', 
            'id' => 2,
            'is_active' => false,
            'semesters' => [
                ['name' => 'Semester 3', 'id'=>3, 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
                ['name' => 'Semester 4', 'id'=>4, 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
            ]],
        ]
        
    ];

    public $activeClassId = null, $activeClassSemesterId = '', $activeStatus = '';


    public function mount()
    {
        $this->statusButtons['running'] = true;


    }


    public function changeButtonStatus($id){
        
        foreach($this->statusButtons as $key => $value){
            $this->statusButtons[$key] = false;
        }
        $this->statusButtons[$id] = true;
        
        $this->render();
        
    }

    public function activeClass($key){
        
        foreach ($this->items['classes'] as $item_key => $value) {
            // if ($key != $key) {
                $this->items['classes'][$item_key]['is_active'] = false;
            // }
        }

        $this->items['classes'][$key]['is_active'] = true;
        $this->activeClassId = $this->items['classes'][$key]['id'];

        
    }

    public function activeClassSemester($keyClass, $keyClassSemester){
        // dd($keyClass, $keyClassSemester);

        $this->activeClassSemesterId = $this->items['classes'][$keyClass]['semesters'][$keyClassSemester]['id'];
        // dd($this->activeClassSemesterId);
    }


    public function render()
    {
        return view('livewire.admin-h-s-main-section-component');
    }
}
