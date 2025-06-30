<div class="max-w-full mx-8">

    <div class="flex flex-row items-start gap-2 my-4">

        <aside class="w-64" aria-label="Sidebar">
            {{ QrCode::size(200)->generate('Welcome to Manikchak High Madrasah(H.S)') }}
            <div class="min-h-screen px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800">
                <div class="flex flex-col items-start justify-center">
                    <div>
                        <ul class="space-y-2">
                        @foreach($items as $key => $item)
                            <li>
                            <button wire:click="selectedItem('{{ $key }}')"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white w-full hover:bg-gray-300 dark:hover:bg-gray-700 {{ $selectedItem == $key ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">{{ $item['title'] }}</span>
                            </button>
                            </li>
                        @endforeach                            

                        </ul>
                    </div>


                </div>
            </div>
        </aside>

        <main class="w-full mx-auto px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800 min-h-screen">
            
            Selected Item: {{ $studentsStatusSelected }} 
            @if($selectedItem == 'item1')
                <livewire:admin-session-management-component />
            @endif


            @if($selectedItem == 'item1') {{-- Dashboard --}}
                {{-- <livewire:admin-weekly-class-schedule-container-component> --}}
                {{-- <livewire:admin-weekly-class-schedule-day-wise-component> --}}
                {{-- <livewire:admin-weekly-class-schedule-component> --}}

                <div class="flex flex-row items-start gap-2 my-4">                
                    <aside class="w-auto bg-green-200" aria-label="Sidebar">
                        
                        <livewire:admin-myclass-section-control-component />
                        
                    </aside>
                    <main class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">
                        
                        <div class="mb-4 p-4">
                            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                <li class="me-2">
                                    <button wire:click="selectStudentsStatus('item1')" class="inline-block px-4 py-3 rounded-lg {{ $studentsStatusSelected == 'item1' ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white'}}" aria-current="page">
                                        Running Students
                                    </button>
                                </li>
                                <li class="me-2">
                                    <button  wire:click="selectStudentsStatus('item2')" class="inline-block px-4 py-3 rounded-lg {{ $studentsStatusSelected == 'item2' ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white'}}">
                                        Promotion-Detention 
                                    </button>
                                </li>
                                <li class="me-2">
                                    <button wire:click="selectStudentsStatus('item3')" class="inline-block px-4 py-3 rounded-lg {{ $studentsStatusSelected == 'item3' ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white'}}">
                                        New Admission 
                                    </button>
                                </li>                                
                            </ul>
                        </div>

                        @if($studentsStatusSelected == 'item1')
                            <livewire:admin-studentcr-running-component />
                        @elseif($studentsStatusSelected == 'item2')
                            <livewire:admin-studentcr-promotional-component />
                        @elseif($studentsStatusSelected == 'item3')
                            <livewire:admin-studentcr-admisstion-component />
                        @endif

                        
                    </main>
                </div>

            @elseif($selectedItem == 'item2') {{-- Profile Management --}}
                <livewire:admin-user-previledge-control-component />

            @elseif($selectedItem == 'item3') {{-- Class Management --}}
                {{-- <livewire:admin-myclass-section-component> --}}
                    <livewire:admin-myclass-management-component>

            @elseif($selectedItem == 'item4') {{-- Class Section Task --}}
                <livewire:admin-myclass-section-component>

            @elseif($selectedItem == 'item5') {{-- Answer Script Distribution --}}
                <livewire:admin-myclass-anser-script-distribution-base-component />
            @elseif($selectedItem == 'item6') {{-- Finalize Status --}}
                <livewire:admin-finalize-status-component />

            @elseif($selectedItem == 'item7') {{-- HS Section --}}
                <livewire:admin-h-s-main-section-component />

            @elseif($selectedItem == 'item8') {{-- Teachers Marks Entry --}}
                <livewire:admin-teacher-wise-marks-entry-status-component />
            

            @elseif($selectedItem == 'item9') {{-- Voter List --}}
                <livewire:admin-voter-list-component />

                {{-- <livewire:admin-teacher-wise-marks-entry-links-component /> --}}
            @elseif($selectedItem == 'item10')
                {{-- <livewire:admin-teacher-wise-marks-entry-links-component /> --}}
            @endif

                {{-- <livewire:admin-tabs-component /> --}}
        </main>

    </div>

</div>