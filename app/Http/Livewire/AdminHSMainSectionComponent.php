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
    public $items = [
        'classes' => [
            ['name' => 'Class XI',
            'id' => 1, 
            'is_active' => false,
            'semesters' => [
                ['name' => 'Semester 1', 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
                ['name' => 'Semester 2', 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
            ]],
            ['name' => 'Class XII', 
            'id' => 2,
            'is_active' => false,
            'semesters' => [
                ['name' => 'Semester 3', 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
                ['name' => 'Semester 4', 'is_active' => false, 'status' => 'Running','status_options' => ['Running', 'Admission', 'Promotion' ]],
            ]],
        ]
        // 'item1' => [
        //     'name' => 'Class',
        //     'submenus' => [
        //         ['name' => 'Class XI',
        //         'is_active' => false,
        //         'semesters' => [
        //             'name' => 'Semester 1', 
        //             'is_active' => false,
        //             'status' => [
        //                 ['name' => 'Runniing', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'Promotion', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'New Admission', 'is_active' => false, 'is_modified' => false],
        //             ],
        //             'name' => 'Semester 2', 
        //             'is_active' => false,
        //             'status' => [
        //                 ['name' => 'Runniing', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'Promotion', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'New Admission', 'is_active' => false, 'is_modified' => false],
        //             ]
        //         ]

        //         ],
        //         ['name' => 'Class XII',
        //         'is_active' => false,
        //         'semesters' => [
        //             'name' => 'Semester 3', 
        //             'is_active' => false,
        //             'status' => [
        //                 ['name' => 'Runniing', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'Promotion', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'New Admission', 'is_active' => false, 'is_modified' => false],
        //             ],
        //             'name' => 'Semester 4', 
        //             'is_active' => false,
        //             'status' => [
        //                 ['name' => 'Runniing', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'Promotion', 'is_active' => false, 'is_modified' => false],
        //                 ['name' => 'New Admission', 'is_active' => false, 'is_modified' => false],
        //             ]
        //         ]

        //         ],
        //     ],
        //     [
        //         'name' => 'Exam',
        //         'submenu' => [
        //             ['name' => 'Class XI',
        //             'is_active' => false],
        //             ['name' => 'Class XII',
        //             'is_active' => false],
        //         ],
        //     ]
        // ]
    ];

    public $activeClassId = null, $activeSemester = '', $activeStatus = '';


    public function mount()
    {
        

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


    public function render()
    {
        return view('livewire.admin-h-s-main-section-component');
    }
}
