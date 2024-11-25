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
        School Routine, Teacher Wise

    </div>

    <div>
        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th rowspan="2" class="border border-gray-300 px-4 py2 font-bold">Sl</th>
                    <th rowspan="2" class="border border-gray-300 px-4 py2 font-bold">Teacher</th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Days</th>
                    @for($i=0; $i < 8; $i++)
                        <th class="border border-gray-300 px-4 py2 font-bold">{{$i+1}}th</th>
                    @endfor
                    <th class="border border-gray-300 px-4 py2 font-bold">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 text-sm">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $days->count() }}" class="border border-gray-300 px-4 py2 text-sm">
                        {{ $teacher->nickName }}<br/>({{ $weeklySchedules->where('teacher_id', $teacher->id)->count() }})
                    </td>

                    @foreach($days as $day)
                        @php 
                            $teacher_schedule = $weeklySchedules
                                ->where('teacher_id', $teacher->id)
                                ->where('day_id', $day->id);
                        @endphp

                        @if($loop->first)
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>
                            {{-- @for($i=0; $i < $day->max_periods; $i++) --}}
                            @for($i=0; $i < 8; $i++)
                            <td class="border border-gray-300 px-4 py2 text-xs text-{{$teacher->notes}}-600 font-extrabold">
                                @if( $teacher_schedule->where('period_id', $i+1) != null )                                
                                    @foreach($teacher_schedule->where('period_id', $i+1) as $schedule)
                                        {{ $schedule->myclass->name }}{{ $schedule->section->name }}:
                                        {{ $schedule->subject->code }}<br/>
                                    @endforeach
                                @endif
                                
                            </td>
                            @endfor
                            
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $teacher_schedule->count() }}</td>
                            </tr>
                        @elseif(!$loop->last)
                        <tr>
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>
                            {{-- @for($i=0; $i < $day->max_periods; $i++) --}}
                            @for($i=0; $i < 8; $i++)
                            <td class="border border-gray-300 px-4 py2 text-xs text-{{$teacher->notes}}-600 font-extrabold">
                                @if( $teacher_schedule->where('period_id', $i+1) != null )                                
                                    @foreach($teacher_schedule->where('period_id', $i+1) as $schedule)
                                        {{ $schedule->myclass->name }}{{ $schedule->section->name }}:
                                        {{ $schedule->subject->code }}<br/>
                                    @endforeach
                                @endif
                                
                            </td>
                            @endfor
                            
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $teacher_schedule->count() }}</td>
                        </tr>
                        @else
                            <tr>
                            <td class="border border-gray-300 px-4 py2 font-bold">{{ $day->short_name }}</td>
                            {{-- @for($i=0; $i < $day->max_periods; $i++) --}}
                            @for($i=0; $i < 8; $i++)
                            <td class="border border-gray-300 px-4 py2 text-xs text-{{$teacher->notes}}-600 font-extrabold">
                                @if( $teacher_schedule->where('period_id', $i+1) != null )                                
                                    @foreach($teacher_schedule->where('period_id', $i+1) as $schedule)
                                        {{ $schedule->myclass->name }}{{ $schedule->section->name }}:
                                        {{ $schedule->subject->code }}<br/>
                                    @endforeach
                                @endif
                                
                            </td>
                            @endfor
                        @endif
                    @endforeach
                    <td class="border border-gray-300 px-4 py2 font-bold">{{ $teacher_schedule->count() }}</td>
                </tr>
                @endforeach
            </tbody>

            {{-- <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td class="border border-gray-300 px-4 py2 text-sm">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py2 text-sm">{{ $teacher->nickName }}</td>

                    @foreach($days as $day)
                        @for($i=0; $i < $day->max_periods; $i++)
                            <td class="border border-gray-300 px-4 py2 text-sm">
                                {{ $weeklySchedules
                                    ->where('day_id', $day->id)
                                    ->where('period_id', $i+1)
                                    ->where('teacher_id', $teacher->id)
                                    ->first()
                                    ->myclass->name
                                    ?? '--' 
                                }}{{ $weeklySchedules
                                    ->where('day_id', $day->id)
                                    ->where('period_id', $i+1)
                                    ->where('teacher_id', $teacher->id)
                                    ->first()
                                    ->section->name
                                    ?? '--' 
                                }}:
                                {{ $weeklySchedules
                                    ->where('day_id', $day->id)
                                    ->where('period_id', $i+1)
                                    ->where('teacher_id', $teacher->id)
                                    ->first()
                                    ->subject->code
                                    ?? '--' 
                                }}
                            </td>
                        @endfor
                    @endforeach

                </tr>
                @endforeach
            </tbody> --}}

        </table>
    </div>
</div>