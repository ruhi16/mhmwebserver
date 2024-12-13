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
        School Routine, "Day Wise", Auto Generated        
    </div>

    {{-- <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
            @foreach($days as $day)
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
                        wire:model="show_allotment" 
                        @if($show_allotment) checked @endif
                        >
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                    <span class="ms-3 text-lg font-bold text-rose-900 dark:text-gray-300">Allotment</span>
                </label>
            </th>

            </tr>
        </thead>

        <tbody>

        </tbody>
    </table> --}}
    {{-- @foreach($myclasssectionteachers as $myclasssectionteacher)
        {{ $myclasssectionteacher }}<br/>
    @endforeach --}}

    {{-- {{ print_r($test_classSchedules) ?? 'X' }} --}}
    @if($test_myclasssectionteachers)
        @foreach($test_myclasssectionteachers as $test_myclasssectionteacher)
            {{ $test_myclasssectionteacher->teacher->nickName }}:{{ $test_myclasssectionteacher->subject->code }}-{{ $test_myclasssectionteacher->wtperiods }}<br/>
            {{ $test_classSchedules->where('subject_id', $test_myclasssectionteacher->subject_id)->count() }}:<br/>
            
                @foreach($test_classSchedules->where('subject_id', $test_myclasssectionteacher->subject_id) as $test_classSchedule)
                    {{ $test_classSchedule->day_id }}-{{ $test_classSchedule->period_id }}:{{ $test_classSchedule->subject->code }}<br/>
                @endforeach
            ====<br/>
        @endforeach
    @endif

    <div>
        <table class="min-w-full mx-auto my-6 text-sm border-collapse border border-gray-300">            
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
                @foreach($myclassSections as $myclassSection)
                <tr>                    
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 font-bold">
                        {{ $myclassSection->myclass->name }}-{{ $myclassSection->section->name }}<br/>
                        <button type="button" wire:click="myclassDayWiseRandomSubjects( {{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }} )" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Generate
                        </button>
                        
                        <button type="button" wire:click="saveMyclassSectionSubjectsWeeklySchedule( {{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }} )" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Save
                        </button>
                        <br/>
                        <button type="button" wire:click="assignMyclassScheduleTeachers( {{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }} )" class="px-3 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            Teacher
                        </button>
                        <button type="button" wire:click="clearMyclassSectionSchedule( {{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }} )" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Clear DB
                        </button>
                        <button type="button" wire:click="deleteMyclassSectionWeeklyExtraPeriods( {{ $myclassSection->myclass->id }}, {{ $myclassSection->section->id }} )" class="px-3 py-2 text-xs font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            Del Extras
                        </button>
                        {{-- {{ $randomNumbers ? print_r($randomNumbers) : 'X' }} --}}
                        {{-- @foreach($myclassSubjects->where('myclass_id', $myclassSection->myclass_id)->where('examtype_id', 2) as $myclassSubject)
                            {{ $myclassSubject->subject->id }},
                        @endforeach --}}
                    </td>

                    @foreach($days as $day)
                        @if(!$loop->first) <tr> @endif

                        <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>

                        @for($i=1; $i <= 8; $i++)                            
                            @if($i <= $day->max_periods)
                                @php 
                                    $data = $myclassSchedules->where('myclass_id', $myclassSection->myclass_id)
                                        ->where('section_id', $myclassSection->section_id)
                                        ->where('day_id', $day->id)
                                        ->where('period_id', $i)
                                        ;
                                @endphp
                                @php
                                    $arrayDayPeriodSubject = null;
                                    if(isset($myclassDayWiseRandomSubjects[$myclassSection->myclass_id][$myclassSection->section_id][$day->id][$i-1])){ 
                                        $arrayDayPeriodSubject = $myclassSubjects->where('myclass_id', $myclassSection->myclass_id)->where('subject_id', $myclassDayWiseRandomSubjects[$myclassSection->myclass_id][$myclassSection->section_id][$day->id][$i-1]); 
                                    }
                                @endphp

                                
                                @if(($arrayDayPeriodSubject))
                                    {{-- From Temporary Array --}}                                    
                                    <td class="border border-gray-300 px-4 py2 bg-teal-100">
                                        {{-- {{ $myclassDayWiseRandomSubjects[$myclassSection->myclass_id][$myclassSection->section_id][$day->id][$i-1] ?? 'x'}} --}}
                                        {{-- {{ $myclassDayWiseRandomSubjects[$myclassSection->myclass_id][$myclassSection->section_id][$day->id][$i-1] ? --}}
                                        {{-- {{ $arrayDayPeriodSubject->first()->subject->code ?? 'X' }} --}}

                                        @foreach($arrayDayPeriodSubject as $arrayDayPeriodSubj)
                                            {{ $arrayDayPeriodSubj->subject->code ?? 'x'}}
                                        @endforeach
                                    </td>
                                
                                @elseif( ($data->first()) )
                                    {{-- From DataBase --}}
                                    <td class="border border-gray-300 px-4 py2 text-red-500 font-bold">                                                                        
                                        {{ $data->first()->subject ? Str::title($data->first()->subject->code) : '' }}:
                                        {{ $data->first()->teacher ? Str::upper($data->first()->teacher->nickName) : '' }}<br/>                                
                                    </td>
                                    
                                @else
                                    <td class="border border-gray-300 px-4 py2 bg-orange-50"></td>
                                @endif


                            @else
                                <td class="border border-gray-300 px-4 py2 bg-rose-100"></td>
                            @endif
                        @endfor

                        @if(!$loop->last) </tr> @endif
                        
                    @endforeach
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


    



</div>
