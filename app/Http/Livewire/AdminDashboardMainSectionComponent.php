<?php

namespace App\Http\Livewire;

use App\Models\Promotionalrule;
use App\Models\Studentcr_eoy_summary;
use Livewire\Component;



class AdminDashboardMainSectionComponent extends Component
{   
    protected $history = [];

    public $selectedItem = 'item1';
    public $componentName;
    public $studentcrEOYSummary;

    public $promotionalRules;

    public $items = [
        'item1' => [
            'title' => 'Dashboard',
            'component' => 'admin-item-one-component',
        ],
        'item2' => [
            'title' => 'Profile Manage',
            'component' => 'admin-item-two-component',
        ],
        'item3' => [
            'title' => 'Class Sec Tasks',
            'component' => 'admin-item-three-component',
        ], 
        'item4' => [
            'title' => 'Answer Script',
            'component' => 'admin-item-four-component',
        ],
        'item5' => [
            'title' => 'Finalize Status',
            'component' => 'admin-item-five-component',
        ],
        'item6' => [
            'title' => 'Teacher Entry',
            'component' => 'admin-item-six-component',
        ],
        'item7' => [
            'title' => 'Notice Board',
            'component' => 'admin-item-seven-component',
        ],
        'item8' => [
            'title' => 'Voter List 2024',
            'component' => 'admin-item-eight-component',
        ],
        'item9' => [
            'title' => '---',
            'component' => 'admin-item-nine-component',
        ],
    ];

    public function mount(){
        $this->componentName = request()->route()->getName();
        $this->studentcrEOYSummary = Studentcr_eoy_summary::where('c_id', 1)->where('s_id', 1)->orderBy('total_ob_marks', 'desc')->get();
        $this->promotionalRules = Promotionalrule::where('session_id', 1)->get();

        // $this->history[] = $this->route()->getName();
        // $this->history = []; //session()->get('history');
    }

    public function addToHistory(){
        // session()->put('history', $this->history);
    }

    public function goBack(){
        // $this->history = session()->get('history');
        // $this->history = array_reverse($this->history);
        // $this->selectedItem = $this->history[0];
        // array_pop($this->history);
    }

    public function selectedItem($key){
        $this->selectedItem = $key;
    }


    public function render()
    {
        return view('livewire.admin-dashboard-main-section-component', [
            'items' => $this->items
        ]);
    }
}
