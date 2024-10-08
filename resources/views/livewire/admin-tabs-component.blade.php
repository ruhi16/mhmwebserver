<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    
    <div class="mb-4 border border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap mb-px text-sm font-medium text-center">
            @foreach ($tabs as $key => $tab)
                <li class="m-2" role="presentation">
                    <button 
                        wire:click="selectTab('{{ $key }}')" 
                        class="inline-block p-4 rounded-t-lg border-b-10 border border-gray-400 hover:bg-purple-200
                            {{$selectedTab == $key ? 'bg-purple-200':''}}">
                        {{ $tab['title'] }}
                    </button>
                </li>
            @endforeach            
        </ul>
    </div>
    

    <div class="p-4">            
        @if($selectedTab == 'tab1')
            {{-- @livewire($tabs['tab1']['component']) --}}
            <livewire:admin-voter-list-component /> 

        @elseif($selectedTab == 'tab2')
            <livewire:admin-voter-list-component :class_id=1 /> {{-- for Class V --}}
        @elseif($selectedTab == 'tab3')
            <livewire:admin-voter-list-component :class_id=2 /> {{-- for Class VI --}}
        @elseif($selectedTab == 'tab4')
            <livewire:admin-voter-list-component :class_id=3 /> {{-- for Class VII --}}
        @elseif($selectedTab == 'tab5')
            <livewire:admin-voter-list-component :class_id=4 /> {{-- for Class VIII --}}
        @elseif($selectedTab == 'tab6')
            <livewire:admin-voter-list-component :class_id=5 /> {{-- for Class IX --}}
        @elseif($selectedTab == 'tab7')
            <livewire:admin-voter-list-component :class_id=6 /> {{-- for Class X --}}
        @elseif($selectedTab == 'tab8')
            <livewire:admin-voter-list-component :class_id=7 /> {{-- for Class XI --}}
        @elseif($selectedTab == 'tab9')
            <livewire:admin-voter-list-component :class_id=8 /> {{-- for Class XII --}}
        
        @endif
        
    </div>
  
    
</div>
