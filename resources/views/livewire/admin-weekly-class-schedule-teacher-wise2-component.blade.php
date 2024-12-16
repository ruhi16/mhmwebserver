<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
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
        School Routine, "Teacher Wise 2", Auto Generated        
    </div>

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
                        <span class="text-red-500 text-lg">{{ $myclassSection->myclass->name }}-{{ $myclassSection->section->name }}</span><br/>
                        @foreach($myclassSubjects->where('myclass_id', $myclassSection->myclass_id) as $myclassSubject)
                            {{ $myclassSubject->subject->name }} id-({{ $myclassSubject->subject_id }}):
                            [{{ $weeklymyclasssubjects->where('myclass_id', $myclassSection->myclass_id)->where('subject_id', $myclassSubject->subject_id)->first()->weekly_no_of_classes_allowed ?? 'x' }}]
                            @php 
                                $data = $myclassSectionTeachers->where('myclass_id', $myclassSection->myclass_id)->where('section_id', $myclassSection->section_id);
                            @endphp
                            @foreach($data->where('subject_id', $myclassSubject->subject_id) as $myclassSectionTeacher)
                                {{ $myclassSectionTeacher->teacher->nickName }}:{{ $myclassSectionTeacher->wtperiods }},
                            @endforeach 
                            <br/>
                            
                            @php 
                                $schedules = $myclassSchedules->where('myclass_id', $myclassSection->myclass_id)->where('section_id', $myclassSection->section_id);
                            @endphp
                            @foreach($schedules->where('subject_id', $myclassSubject->subject_id) as $myclassSchedule)
                                ({{ $myclassSchedule->day_id }}/{{ $myclassSchedule->period_id }}-{{ $myclassSchedule->teacher->nickName ?? 'x' }})

                            @endforeach
                            <br/>
                        @endforeach
                    </td>

                    @foreach($days as $day)
                        @if(!$loop->first) <tr> @endif

                        <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}({{$day->id}})</td>

                        @for($i=1; $i <= 8; $i++)                            
                            @if($i <= $day->max_periods)                                
                                <td class="border border-gray-300 px-4 py2 bg-teal-100"></td>  
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
