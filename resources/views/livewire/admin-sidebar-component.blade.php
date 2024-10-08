<div>
    {{-- Sidebar start --}}

    <div class="h-screen flex">
        <aside
            class="w-64 bg-gray-800 text-white transition-all duration-300 ease-in-out {{ $isSidebarOpen ? 'translate-x-0' : '-translate-x-full' }}">
            <div class="p-4">

                {{-- Profile Card Start --}}
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 object-cover">
                    <div class="flex justify-end px-4 pt-4">
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg border border-md border-gray-600"
                            src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?cs=srgb&dl=pexels-andrea-piacquadio-3763188.jpg&fm=jpg"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                        {{-- <div class="flex mt-4 md:mt-6">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Profile</a>
                            <a href="#"
                                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Message</a>
                        </div> --}}
                        <div class="flex justify-center mt-5 space-x-5">
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-block text-gray-400"><span class="sr-only">Facebook</span>
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19,3H5C3.895,3,3,3.895,3,5v14c0,1.105,0.895,2,2,2h7.621v-6.961h-2.343v-2.725h2.343V9.309 c0-2.324,1.421-3.591,3.495-3.591c0.699-0.002,1.397,0.034,2.092,0.105v2.43h-1.428c-1.13,0-1.35,0.534-1.35,1.322v1.735h2.7 l-0.351,2.725h-2.365V21H19c1.105,0,2-0.895,2-2V5C21,3.895,20.105,3,19,3z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-block text-gray-400"><span class="sr-only">GitHub</span>
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21.582,6.186c-0.23-0.86-0.908-1.538-1.768-1.768C18.254,4,12,4,12,4S5.746,4,4.186,4.418 c-0.86,0.23-1.538,0.908-1.768,1.768C2,7.746,2,12,2,12s0,4.254,0.418,5.814c0.23,0.86,0.908,1.538,1.768,1.768 C5.746,20,12,20,12,20s6.254,0,7.814-0.418c0.861-0.23,1.538-0.908,1.768-1.768C22,16.254,22,12,22,12S22,7.746,21.582,6.186z M10,15.464V8.536L16,12L10,15.464z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-block text-gray-400"><span class="sr-only">Linkedin</span>
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M 8 3 C 5.239 3 3 5.239 3 8 L 3 16 C 3 18.761 5.239 21 8 21 L 16 21 C 18.761 21 21 18.761 21 16 L 21 8 C 21 5.239 18.761 3 16 3 L 8 3 z M 18 5 C 18.552 5 19 5.448 19 6 C 19 6.552 18.552 7 18 7 C 17.448 7 17 6.552 17 6 C 17 5.448 17.448 5 18 5 z M 12 7 C 14.761 7 17 9.239 17 12 C 17 14.761 14.761 17 12 17 C 9.239 17 7 14.761 7 12 C 7 9.239 9.239 7 12 7 z M 12 9 A 3 3 0 0 0 9 12 A 3 3 0 0 0 12 15 A 3 3 0 0 0 15 12 A 3 3 0 0 0 12 9 z">
                                    </path>
                                </svg>
                            </a>
                            {{-- <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-block text-gray-400"><span class="sr-only">Linkedin</span>
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z">
                                    </path>
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
                {{-- Profile Card End --}}

                <h2 class="text-xl font-bold pt-4">
                    Menu Bar
                </h2>
                <ul>
                    @foreach($sidebarOptions as $key => $option)
                    <div wire:click="setActiveOption('{{$key}}')" 
                        class="{{$activeOption == $key ? 'bg-gray-900 text-white' : ''}}  text-white cursor-pointer p-2 mb-2">
                        {{ $option}}
                        {{-- {{$key}}-{{$option}}-{{$activeOption}}<br/> --}}

                    </div>

                    @endforeach


                    

                </ul>

            </div>
        </aside>
        <main class="overflow-y-auto bg-gray-100 w-full">
            Content: Key:{{ $activeOption }}  Option:{{ $content }}
            {{-- <livewire: admin-user-previledge-control-component /> --}}

            @if($activeOption == 'profile')
                <livewire:admin-user-previledge-control-component>
            @elseif($activeOption == 'answerscriptdistribution')
                <livewire:admin-myclass-section-component />
            
            @endif
            
        </main>
    </div>
</div>