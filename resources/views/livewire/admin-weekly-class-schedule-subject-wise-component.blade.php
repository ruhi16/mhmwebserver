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
        School Routine, Subject Wise, Class-Section Teachers Alotment Auto Generated
    </div>
    @foreach($myclasses as $myclass)
    <table class="min-w-full mx-auto my-6 border-collapse border border-gray-300 text-sm">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Subjects</th>
                <th class="border border-gray-300 px-4 py-2">WT Periods</th>
                @foreach($myclassSections->where('myclass_id', $myclass->id) as $myclassSection)
                    <th class="border border-gray-300 px-4 py-2">
                        {{ $myclassSection->myclass->name }}-{{ $myclassSection->section->name }}
                    </th>
                @endforeach
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            if($myclass->id < 7){ // for V to X class 
                $myCurrentClassSubjects = $myclassSubjects->where('myclass_id', $myclass->id)->where('examtype_id', 2)->sortBy('subject_order');
            }else{          // for XI to XII
                $myCurrentClassSubjects = $myclassSubjects->where('myclass_id', $myclass->id)->sortBy('subject_order');
            }
            @endphp

            @foreach($myCurrentClassSubjects as $myclassSubject)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ $myclassSubject->myclass->name }}
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ $myclassSubject->subject->code }}
                </td>
                <td class="border border-gray-300 px-4 py-2 text-lg text-right">
                    {{ $weeklymyclasssubjectschedules->where('myclass_id', $myclass->id)
                        ->where('subject_id', $myclassSubject->subject_id)
                        ->first()->weekly_no_of_classes_allowed ?? 'x' }}
                    
                    <button type="button" wire:click="showModalForWTPeriods({{ $myclassSubject->myclass->id }}, {{ $myclassSubject->subject->id }})" 
                        class="px-3 py-2 text-xs font-medium text-center text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                        Edit
                    </button>
                </td>
                @foreach($myclassSections->where('myclass_id', $myclass->id) as $myclassSection)
                    <td class="border border-gray-300 px-4 py-2">
                        @php 
                           $myclassSectionTeacher_TotalClasses = $myclasssectionteachers->where('myclass_id', $myclassSection->myclass_id)
                            ->where('section_id', $myclassSection->section_id)
                            ->where('subject_id', $myclassSubject->subject_id)
                            ->where('day_id', null)
                            
                        @endphp
                        @foreach($myclassSectionTeacher_TotalClasses as $myclassSectionTeacher_TotalClass)
                            {{ $myclassSectionTeacher_TotalClass->teacher->nickName ?? 'X' }}:
                            {{ $myclassSectionTeacher_TotalClass->wtperiods ?? 'X' }}<br/>
                        @endforeach
                    </td>
                @endforeach
                <td class="border border-gray-300 px-4 py-2">
                    {{-- <button type="button" wire:click="showModalForWTPeriods({{ $myclassSubject->myclass->id }}, {{ $myclassSubject->subject->id }})" class="px-3 py-2 text-xs font-medium text-center text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                        Edit
                    </button> --}}
                </td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
    @endforeach









    {{-- Modal for Class-Section: Teacher Selection --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">
        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-6 py-6 bg-white rounded-lg shadow-lg">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-2 mb-6 md:py-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        For Class: , Subject: Weekly Total Periods
                        
                    </h3>
                    <button type="button" wire:click="closeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form  wire:submit.prevent="updateWeeklyMyclassSubjectTotalPeriods">                    
                    <div class="grid gap-4 mb-4 grid-cols-6">                        
                        <div class="col-span-6 sm:col-span-2">
                            <label for="myclass_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class </label>
                            <input type="text" id="myclass_id"
                                value="{{ $myclasses->where('id', $myclass_id)->first()->name ?? 'NA' }}" 
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <input type="text" id="mysubject_id"
                                value="{{ $myclassSubjects->where('myclass_id', $myclass_id)
                                    ->where('subject_id', $subject_id)->first()->subject->name ?? 'NA' }}" 
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="my_wtperiods" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weekly Total Periods </label>
                            <input type="number" id="my_wtperiods" wire:model="wtperiods" min="0" max="6"
                                {{-- value="{{ $myclassSubjects->where('myclass_id', $myclass_id)->where('subject_id', $subject_id)->first()->weekly_no_of_classes_allowed ?? 0 }}"  --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>                            
                        </div>                        
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






