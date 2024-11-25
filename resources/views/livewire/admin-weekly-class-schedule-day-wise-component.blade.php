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
        School Routine, Day Wise
        
    </div>

    {{-- Key: {{$key}}
    Value: {{$value}}
    Day: {{$selectedDay ?? 'no day'}}
    Selected Days: {{$changedSelectedDays ?? 'XXX'}}
    <br/>
    Selected myDays:{{var_export($mydays)}}, --}}
    {{-- Days: {{ var_export( array_values($all_days_selected) ) }} --}}
    {{-- X:{{var_export($all_days_selected)}},
    @if(!empty($all_days_selected))
        X ,{{ var_export(array_values($all_days_selected) )}}
    @else
        Y
    @endif
    @foreach($all_days_selected as $day_id => $selected)
        {{ $selected }}
    @endforeach --}}
    {{-- x{{$show_allotment ? 'x':'y'}} --}}
    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                @foreach($all_days as $day)
                    <th class="border border-gray-300 px-4 py2 font-bold">                        
                        <div class="flex items-center m-4">
                            <input id="default-checkbox" type="checkbox" value="{{$day->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                wire:model="all_days_selected.{{ $day->id }}">
                            <label for="default-checkbox" class="ms-2 text-lg font-bold text-gray-900 dark:text-gray-300">{{ $day->short_name }}</label>
                        </div>
                    </th>
                @endforeach

                <th class="border border-gray-300 px-4 py2">
                    <label class="inline-flex items-center m-2 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer"
                            wire:model="show_allotment" @if($show_allotment) checked @endif>
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                        <span class="ms-3 text-lg font-bold text-rose-900 dark:text-gray-300">Allotment</span>
                    </label>
                </th>
                
            </tr>
        </thead>
    </table>

    <div>
        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            
            <thead>
                <tr>
                    <th rowspan="2" class="border border-gray-300 px-4 py2 font-bold">Sl</th>
                    <th rowspan="2" class="border border-gray-300 px-4 py2 font-bold">Cl/Sec</th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Days</th>
                    @for($i=0; $i < 8; $i++)
                        <th class="border border-gray-300 px-4 py2 font-bold">{{$i+1}}th</th>
                    @endfor
                    
                </tr>
            </thead>


            <tbody>
                @foreach($myclassSections as $myclassSection)                
                <tr>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">{{ $myclassSection->myclass->name }}-{{ $myclassSection->section->name }}</td>
                    @foreach($days as $day)
                        @php 
                            $myclassSection_schedule = $weeklySchedules
                                ->where('myclass_id', $myclassSection->myclass->id)
                                ->where('section_id', $myclassSection->section->id)
                                ->where('day_id', $day->id);
                        @endphp

                        @if($loop->first)
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>
                            @for($i=0; $i < $day->max_periods; $i++)
                                <td class="border border-gray-300 px-4 py2 text-sm">
                                    @if( $myclassSection_schedule->where('period_id', $i+1) != null )                                
                                        @foreach($myclassSection_schedule->where('period_id', $i+1) as $schedule)
                                            {{ $schedule->subject->code }}:{{$schedule->teacher->nickName}}<br/>
                                        @endforeach
                                    @endif
                                    @if($show_allotment)
                                    <button wire:click="showModal({{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }}, {{ $day->id }}, {{ $i+1 }})"
                                        class="text-white bg-{{$myclassSection->status}}-500 hover:bg-{{$myclassSection->status}}-700 focus:ring-4 focus:ring-{{$myclassSection->status}}-300 font-medium rounded-lg button-sm text-sm px-1 py-.5 focus:outline-none">
                                        Allot
                                    </button>
                                    @endif
                                </td>
                            @endfor
                            </tr>
                        @elseif(!$loop->last)
                            <tr>
                                <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>
                                @for($i=0; $i < $day->max_periods; $i++)
                                    <td class="border border-gray-300 px-4 py2  text-sm">
                                        @if( $myclassSection_schedule->where('period_id', $i+1) != null )                                
                                            @foreach($myclassSection_schedule->where('period_id', $i+1) as $schedule)
                                                {{ $schedule->subject->code }}:{{$schedule->teacher->nickName}}<br/>
                                            @endforeach
                                        @endif
                                        @if($show_allotment)
                                        <button wire:click="showModal({{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }}, {{ $day->id }}, {{ $i+1 }})"
                                            class="text-white bg-{{$myclassSection->status}}-500 hover:bg-{{$myclassSection->status}}-700 focus:ring-4 focus:ring-{{$myclassSection->status}}-300 font-medium rounded-lg button-sm text-sm px-1 py-.5 focus:outline-none">
                                            Allot
                                        </button>
                                        @endif
                                    </td>
                                @endfor
                            </tr>
                        @else
                        <tr>
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>                            
                            @for($i=0; $i < $day->max_periods; $i++)
                                <td class="border border-gray-300 px-4 py2  text-sm">
                                    @if( $myclassSection_schedule->where('period_id', $i+1) != null )                                
                                        @foreach($myclassSection_schedule->where('period_id', $i+1) as $schedule)
                                            {{ $schedule->subject->code }}:{{$schedule->teacher->nickName}}<br/>
                                        @endforeach
                                    @endif
                                    @if($show_allotment)
                                    <button wire:click="showModal({{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }}, {{ $day->id }}, {{ $i+1 }})"
                                        class="text-white bg-{{$myclassSection->status}}-500 hover:bg-{{$myclassSection->status}}-700 focus:ring-4 focus:ring-{{$myclassSection->status}}-300 font-medium rounded-lg button-sm text-sm px-1 py-.5 focus:outline-none">
                                        Allot
                                    </button>
                                    @endif
                                </td>
                            @endfor
                        @endif
                    @endforeach
                </tr>
                

                @endforeach
            </tbody>
        </table>
    </div>


    {{-- Modal Window --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">
        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">
                        For Class Section Schedule
                    </h3>                    

                    <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                        <svg width="25" height="25" viewbox="0 0 40 40">
                            <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                        </svg>
                    </button>
                </div>

                <div>
                    <form class="max-w-lg mx-auto" wire:submit.prevent="saveChanges">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-2 mb-6">
                                <label for="myclass"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input type="text" id="myclass"
                                    value="{{ $selectedMyclass->name ?? 'NA' }}"                                    
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled readonly >
                            </div>

                            <div class="col-span-2 mb-6">
                                <label for="section"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                                <input type="text" id="section"
                                    value="{{ $selectedSection->name ?? 'NA' }}"                                    
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled readonly >
                            </div>

                            <div class="col-span-2 mb-6">
                                <label for="period"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Period</label>
                                <input type="text" id="period"
                                    value="{{ $selectedPeriod->period_index ?? 'NA' }}"                                    
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled readonly >
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6">                            
                            @foreach($days as $day)
                            <div class="col-span-1 mb-6">
                                <label for="day.{{$day->id}}" class="inline-flex items-center ">
                                    <input id="day.{{$day->id}}" type="checkbox" 
                                        
                                        wire:model="mydays" value="{{$day->id}}"

                                        {{-- wire:model="changedSelectedDays.{{$day->id}}" value="{{$day->id}}" --}}
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                        {{-- {{ $selectedDay ? ($selectedDay->id == $day->id ? 'checked disabled':''):'' }} --}}
                                        @if($selectedDay && $selectedDay->id == $day->id) checked readonly  @endif

                                        >
                                    <span class="ml-2 text-sm text-gray-900">{{ __($day->short_name) }}</span>
                                </label>
                            </div>
                            @endforeach

                        </div>

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3 mb-6">
                                <label for="subjects"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select subject</label>
                                <select id="subjects" wire:model="selectedMySubject"
                                    class="bg-gray-50 border mb-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Select One</option>
                                    {{-- {{ $selectedMyclass ? $selectedMyclass->id : 'x' }} --}}
                                    @if($selectedMyclass)
                                        {{-- <option>Select One-{{ $myclasses->find($selectedMyclass->id)->myclasssubjects }}</option> --}}
                                        @php
                                            $modal_selectedSubjects = $weeklySchedules
                                                ->where('day_id', $selectedDay->id)
                                                ->where('myclass_id', $selectedMyclass->id)
                                                ->where('section_id', $selectedSection->id)
                                                ->pluck('subject_id')->toArray();

                                            $modal_myclassSubject = $myclasses->find($selectedMyclass->id)
                                                ->myclasssubjects
                                                ->where('examtype_id', 2)
                                                ->whereNotIn('subject_id', $modal_selectedSubjects);

                                        @endphp
                                        @foreach ( $modal_myclassSubject as $myclassSubject)
                                            <option value="{{ $myclassSubject->subject->id }}">{{ $myclassSubject->subject->id }}-{{ $myclassSubject->subject->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('selectedMySubject')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            
                            <div class="col-span-3 mb-6">
                                <label for="teachers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select teacher</label>
                                @php
                                    $modal_selectedTeachers = $weeklySchedules
                                        // ->where('day_id', $selectedDay->id)
                                        // ->where('period_id', $selectedPeriod->id)
                                        ->pluck('teacher_id')->toArray();
                                    $modal_teachers = $teachers
                                        ->whereNotIn('id', $modal_selectedTeachers);
                                @endphp
                                

                                <select id="teachers" wire:model="selectedMyTeacher"
                                    class="bg-gray-50 border mb-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Select One</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedMyTeacher')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button"
                                class="text-white mb-2 mr-4 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                wire:click="closeModal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>


                

            </div>
        </div>
    </div>



</div>
