<div>


    <div class="flex flex-row items-start gap-2 my-4"> 
        <aside class="w-64 min-h-screen px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-green-200" >
            <div class="flex items-center justify-between px-3 py-4">
                {{-- Sidebar Card --}}
                <div class="w-full max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    
                    <div class="flex flex-col items-center pb-0">
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Higher Secondary</h5>
                        {{-- <span class="text-sm text-gray-500 dark:text-gray-400">Dashboard</span> --}}
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('mhm_logo.png')}}" alt="Bonnie image"/>
                        
                    </div>
                </div>
                
            </div>
            <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-gray-800">
            
            <ul class="space-y-2 font-medium">
                @foreach($items['classes'] as $key =>$item)                
                    <li>
                    <a wire:click="activeClass('{{ $key }}')" class="flex items-center p-2 text-gray-900 cursor-pointer rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group {{ $items['classes'][$key]['is_active'] == true ? 'bg-blue-400 dark:bg-blue-700' : '' }}">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="ms-3">{{ $item['name'] }}-{{$key}}</span>
                        <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">New</span>
                    </a>
                    @if($items['classes'][$key]['is_active'] == true)

                        <!-- Submenu -->
                        
                            <ul class="pl-6 mt-1 space-y-1">
                            @foreach($item['semesters'] as $key =>$semester)   
                                <li>
                                    <a class="flex items-center p-2 cursor-pointer hover:bg-red-300 text-gray-700 text-sm rounded-lg dark:text-gray-300  dark:hover:bg-gray-600">
                                        <span class="ms-3">{{$semester['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach                            
                            </ul>
                    @endif

                    </li>
                @endforeach               
            </ul>
            </div>


        </aside>
        <main class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">            
            @livewire('hssection-session-comp')
                       
            @foreach($items['classes'] as $key =>$item)
                @if($items['classes'][$key]['is_active'] == true)
                    {{-- <div class="w-full m-4 px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 "> --}}
                        <div class="w-full mx-auto px-4 py-0 overflow-y-auto rounded bg-amber-200 dark:bg-gray-800 ">
                            {{ $items['classes'][$key]['name'] }}
                        </div>
                        
                    {{-- </div> --}}
                        {{-- @livewire('admin-hs-cls-sec-wise-students', ['hsClassId' => $key, 'hsSectionId' => '', 'hsSemesterId' => '']) --}}
                    
                    
                    
                    {{-- @livewire('admin-hs-cls-sec-wise-students', ['hsClassId' => 1, 'hsSectionId' => '', 'hsSemesterId' => '']) --}}
                    
                @endif
            @endforeach

            Active Class Id: {{$activeClassId ?? 'Default'}}
            @if($activeClassId == 1)
                This is XI
                @livewire('about')
                @livewire('admin-hs-cls-sec-wise-students',[
                    'hsClassId' => 1,
                    'hsSectionId' => 1,
                    'hsSemesterId' => 1,
                ]);
            @else
                This is XII
                @livewire('home')
            @endif
        </main>

    </div>

    {{-- @livewire('admin-hs-cls-sec-wise-students',[
        'hsClassId' => 1,
        'hsSectionId' => 1,
        'hsSemesterId' => 1,
    ]) --}}

</div>