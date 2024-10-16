<?php

namespace App\Http\Livewire;

use Livewire\Component;



class AdminDashboardMainSectionComponent extends Component
{

    public $selectedItem = 'item1';

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
            'title' => 'Teacher Entry',
            'component' => 'admin-item-five-component',
        ],
        'item6' => [
            'title' => 'Notice Board',
            'component' => 'admin-item-five-component',
        ],
        'item7' => [
            'title' => 'Voter List 2024',
            'component' => 'admin-item-five-component',
        ],
        'item8' => [
            'title' => '---',
            'component' => 'admin-item-five-component',
        ],
    ];

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
