<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Class Section Subject Schedule: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>        
    @endsection

    <div class="h-fit min-w-full mx-auto">        
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
        School Routine, Teacher Wise, Auto Generated        
    </div>

    <div>
        <table class="min-w-full mx-auto my-6 border-collapse border border-gray-300">            
            <thead>
            <tr>
                <th class="border border-gray-300 px-4 py2 font-bold">Sl</th>
                <th class="border border-gray-300 px-4 py2 font-bold">Cl/Sec</th>
                <th class="border border-gray-300 px-4 py2 font-bold">Days</th>
                @for($i=0; $i < 8; $i++)
                    <th class="border border-gray-300 px-4 py2 font-bold">{{$i+1}}th</th>
                @endfor
                
            </tr>
            </thead>

            <tbody>
                @foreach($teachers as $teacher)
                <tr>                    
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">
                        {{ $teacher->name }}
                        <button type="button" wire:click="openModal" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add
                        </button>
                        
                        <table class="min-w-full mx-auto my-6 border-collapse border border-gray-300">            
                            <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 font-bold text-xs">Sl</th>
                                <th class="border border-gray-300 px-4 py-2 font-bold text-xs">Class</th>
                                <th class="border border-gray-300 px-4 py-2 font-bold text-xs">Sec</th>
                                <th class="border border-gray-300 px-4 py-2 font-bold text-xs">WTP</th>
                                <th class="border border-gray-300 px-4 py-2 font-bold text-xs">Ac</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td class="border border-gray-300 px-2 py-1 text-xs">Sl</td>
                                <td class="border border-gray-300 px-2 py-1 text-xs">Class</td>
                                <td class="border border-gray-300 px-2 py-1 text-xs">Sec</td>
                                <td class="border border-gray-300 px-2 py-1 text-xs">WTP</td>
                                <td class="border border-gray-300 px-2 py-1 text-xs"></td>
                            </tbody>
                        </table>
                        {{-- <button type="button" wire:click="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Generate
                        </button> --}}
                    </td>

                    @foreach($days as $day)
                        @if(!$loop->first) <tr> @endif

                        <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>

                        @for($i=1; $i <= 8; $i++)                            
                            {{-- @if($i <= $day->max_periods) --}}
                            <td class="border border-gray-300 px-4 py2">
                                
                                {{-- @if(isset($myclassDayWiseRandomSubjects[$myclassSection->myclass->id][$myclassSection->section->id][$day->id][$i-1]))
                                {{$myclassSubjects->where('myclass_id', $myclassSection->myclass_id)
                                    ->where('subject_id', $myclassDayWiseRandomSubjects[$myclassSection->myclass->id][$myclassSection->section->id][$day->id][$i-1])
                                    ->first()->subject->name ?? 'x'
                                }}
                                @endif --}}
                                    
                            </td>
                            {{-- @else
                            <td class="border border-gray-300 px-4 py2 bg-rose-100">

                            </td>
                            @endif --}}
                        @endfor

                        {{-- @if(!$loop->last) </tr> @endif --}}
                        
                    @endforeach
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>






    {{-- Modal for Class-Section: Teacher Selection --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">
        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Add Class Section Wise Teacher's Subject
                    </h3>
                    <button type="button" wire:click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form  wire:submit.prevent="saveChanges">
                    {{-- <div class="p-4 md:p-5 space-y-4">
                        
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>                        
                    </div> --}}
                    <div class="grid gap-4 mb-4 grid-cols-4">
                        {{-- <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div> --}}
                        {{-- <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                        </div> --}}
                        <div class="col-span-4 sm:col-span-2">
                            <label for="myclass_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class {{$myclass_id ?? 'CI'}}:{{ $key ?? 'X' }}{{$value ?? 'Y'}}</label>
                            <select id="myclass_id" wire:model="myclass_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select any class</option>
                                @foreach($myclasses as $myclass)
                                    <option value="{{$myclass->id}}">{{$myclass->name}}</option>
                                @endforeach
                                {{-- <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option> --}}
                            </select>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="section_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                            <select id="section_id" wire:model="section_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                @foreach($myclassSections->where('myclass_id', $myclass_id) as $myclassSection)
                                    <option value="{{$myclassSection->section_id}}">{{$myclassSection->section->name}}</option>
                                @endforeach
                                {{-- <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option> --}}
                            </select>
                        </div>
                        {{-- <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div> --}}

                        <div class="col-span-4 sm:col-span-2">
                            <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <select id="subject_id" wire:model="subject_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                @foreach($myclassSubjects->where('myclass_id', $myclass_id) as $myclassSubject)
                                    <option value="{{$myclassSubject->subject_id}}">{{$myclassSubject->subject->name}}</option>
                                @endforeach

                                {{-- <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option> --}}
                            </select>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teacher</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option>
                            </select>
                        </div>

                        {{-- <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div> --}}
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 md:p-5 border-t  border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="medium-modal" wire:click="closeModal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                        <button data-modal-hide="medium-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    </div>
                </form>

                

            </div>
        </div>
    </div>



</div>
