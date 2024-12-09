<div>    
    <div class="text-lg font-medium text-center text-gray-500 mb-4 border-b border-blue-600 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            @foreach($items as $key =>$item)
            <li class="me-2">
                <button wire:click="selectedItem('{{ $key }}')"
                    class="flex items-center p-2 py-4 text-base font-normal text-gray-900 rounded-t-lg dark:text-white w-full hover:bg-gray-300 dark:hover:bg-gray-700 {{ $selectedItem == $key ? 'bg-blue-400 dark:bg-blue-700' : '' }}">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">{{ $item['title'] }}-{{$selectedItem}}</span>
                </button>
                {{-- <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">WTPerios</a> --}}
            </li>
            @endforeach

        </ul>
    </div>


        
    <div class="min-w-full mx-auto grid grid-cols-12 gap-6">
        <div class="col-span-12">
            @if($selectedItem == 'item1')
                <livewire:admin-weekly-class-schedule-subject-wise-component>
            @elseif($selectedItem == 'item2')
                <livewire:admin-weekly-class-schedule-teachers-auto-component>
                {{-- <livewire:admin-weekly-class-schedule-day-wise-component> --}}
            @elseif($selectedItem == 'item3')
                <livewire:admin-weekly-class-schedule-teachers-component>
            @elseif($selectedItem == 'item4')
                <livewire:admin-weekly-class-schedule-day-wise-auto-component>
            {{-- @elseif($selectedItem == 'item5') --}}
                
            @endif
        </div>

    </div>
        


    <div class="min-w-full mx-auto grid grid-cols-12 gap-6">
        {{-- <div class="flex flex-col"> --}}
        <div class="col-span-6">
            {{-- <livewire:admin-weekly-class-schedule-day-wise-component > --}}
                {{-- <livewire:admin-weekly-class-schedule-subject-wise-component> --}}
                {{-- <livewire:admin-weekly-class-schedule-day-wise-auto-component > --}}
        </div>
        <div class="col-span-6">
            
            {{-- <livewire:admin-weekly-class-schedule-teachers-component > --}}
                {{-- <livewire:admin-weekly-class-schedule-teachers-auto-component> --}}
        </div>
        {{-- </div> --}}
    </div>
</div>




