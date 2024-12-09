<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminWeeklyClassScheduleContainerComponent extends Component
{

    public $selectedItem = 'item4';
    public $componentName;

    public $items = [
        'item1' => [
            'title' => 'CW TPeriods',
            'component' => 'admin-item-one-component',
        ],
        'item2' => [
            'title' => 'TW TPeriods',
            'component' => 'admin-item-two-component',
        ],
        'item3' => [
            'title' => 'CS Schedule',
            'component' => 'admin-item-three-component',
        ], 
        'item4' => [
            'title' => 'TW Schedule',
            'component' => 'admin-item-four-component',
        ],





        // 'item5' => [
        //     'title' => 'Finalize Status',
        //     'component' => 'admin-item-five-component',
        // ],
        // 'item6' => [
        //     'title' => 'Teacher Entry',
        //     'component' => 'admin-item-six-component',
        // ],
        // 'item7' => [
        //     'title' => 'Notice Board',
        //     'component' => 'admin-item-seven-component',
        // ],
        // 'item8' => [
        //     'title' => 'Voter List 2024',
        //     'component' => 'admin-item-eight-component',
        // ],
        // 'item9' => [
        //     'title' => '---',
        //     'component' => 'admin-item-nine-component',
        // ],
    ];


    public function mount(){
        $this->componentName = request()->route()->getName();
    }

    public function selectedItem($item){
        $this->selectedItem = $item;
    }


    public function render()
    {
        return view('livewire.admin-weekly-class-schedule-container-component',[
            'items' => $this->items
        ]);
    }
}
