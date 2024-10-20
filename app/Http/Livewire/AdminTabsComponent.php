<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminTabsComponent extends Component
{
    public $selectedTab = 'tab1';
    protected $history = [];

    public $tabs = [
        'tab1' => [
            'title' => 'ALL Classes',
            'component' => 'admin-tab-one-component',
        ],
        'tab2' => [
            'title' => 'Class V',
            'component' => 'admin-tab-two-component',
        ],
        'tab3' => [
            'title' => 'Class VI',
            'component' => 'admin-tab-three-component',
        ], 
        'tab4' => [
            'title' => 'Class VII',
            'component' => 'admin-tab-four-component',
        ],
        'tab5' => [
            'title' => 'Class VIII',
            'component' => 'admin-tab-five-component',
        ],
        'tab6' => [
            'title' => 'Class IX',
            'component' => 'admin-tab-six-component',
        ],
        'tab7' => [
            'title' => 'Class X',
            'component' => 'admin-tab-seven-component',
        ],
        'tab8' => [
            'title' => 'Class XI',
            'component' => 'admin-tab-eight-component',
        ],
        'tab9' => [
            'title' => 'Class XII',
            'component' => 'admin-tab-nine-component',
            ]
    ];

    public function mount(){
        $this->history = session()->get('history', []);
        $this->history[] = request()->route()->getName();
        $this->history[] = $this->route()->getName();
    }

    public function addToHistory(){
        session()->put('history', $this->history);
    }

    public function goBack(){
        $this->history = session()->get('history');
        $this->history = array_reverse($this->history);
        $this->selectedTab = $this->history[0];
        array_pop($this->history);
    }

    public function selectTab($tab){
        $this->selectedTab = $tab;
    }


    public function render()
    {
        return view('livewire.admin-tabs-component',[
            'tabs' => $this->tabs
        ]);
    }
}
