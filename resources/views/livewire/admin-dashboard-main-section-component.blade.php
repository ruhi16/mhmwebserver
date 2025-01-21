<div class="max-w-full mx-8">

    <div class="flex flex-row items-start gap-2 my-4">

        <aside class="w-64" aria-label="Sidebar">
            {{ QrCode::size(200)->generate('Manikchak High Madrasah(H.S)') }}
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

                    <div>
                        {{-- <ul class="space-y-2">
                            <li>
                                <button href="#" target="_blank"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                                </button>
                            </li>
                            <li>
                                <a href="#" target="_blank"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                                </a>
                            </li>
                        </ul> --}}
                    </div>


                </div>
            </div>
        </aside>

        <main class="w-full mx-auto px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800 min-h-screen">
            {{-- History: {{ $componentName }} --}}
            {{-- {{json_encode($studentcrEOYSummary) ?? 'X'}} --}}

            <livewire:admin-session-management-component />


            <div class="flex flex-row items-start gap-2 my-4">
                <aside class="w-auto bg-green-200" aria-label="Sidebar">
                    <livewire:admin-myclass-section-control-component />
                </aside>
                <main class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">
                    <livewire:admin-studentcr-admisstion-component />   
                    <livewire:admin-studentcr-promotional-component />
                    <livewire:admin-studentcr-running-component />
                </main>
            </div>


            

            {{-- <livewire:admin-studentcr-admisstion-component />
            <livewire:admin-studentcr-running-component /> --}}

            


            {{-- <ul>
                @foreach ($history as $routeName)
                    <li>{{ $routeName }}</li>
                @endforeach
            </ul> --}}
            @if($selectedItem == 'item1') {{-- Dashboard --}}
                {{-- <livewire:admin-weekly-class-schedule-container-component> --}}
                {{-- <livewire:admin-weekly-class-schedule-day-wise-component> --}}
                {{-- <livewire:admin-weekly-class-schedule-component> --}}

            @elseif($selectedItem == 'item2') {{-- Profile Management --}}
                <livewire:admin-user-previledge-control-component />

            @elseif($selectedItem == 'item3') {{-- Class Section Task --}}
                <livewire:admin-myclass-section-component>

            @elseif($selectedItem == 'item4') {{-- Answer Script Distribution --}}
                <livewire:admin-myclass-anser-script-distribution-base-component />
            @elseif($selectedItem == 'item5') {{-- Finalize Status --}}
                <livewire:admin-finalize-status-component />

            @elseif($selectedItem == 'item6') {{-- Teacher's Marks Entry --}}
                <livewire:admin-teacher-wise-marks-entry-status-component />

            @elseif($selectedItem == 'item7') {{-- Notice Board --}}
                Comming Soon

            @elseif($selectedItem == 'item8') {{-- Voter List --}}
                <livewire:admin-voter-list-component />

                {{-- <livewire:admin-teacher-wise-marks-entry-links-component /> --}}
            @elseif($selectedItem == 'item9')
                {{-- <livewire:admin-teacher-wise-marks-entry-links-component /> --}}
            @endif

                {{-- <livewire:admin-tabs-component /> --}}
        </main>

    </div>

</div>