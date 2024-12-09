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
            if($myclass->id < 7){
                $myCurrentClassSubjects = $myclassSubjects->where('myclass_id', $myclass->id)->where('examtype_id', 2)->sortBy('subject_order');
            }else{
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
                <td class="border border-gray-300 px-4 py-2">
                    {{ $weeklymyclasssubjectschedules->where('myclass_id', $myclass->id)
                        ->where('mysubject_id', $myclassSubject->subject_id)
                        ->first()->weekly_no_of_classes_allowed ?? 'x' }}
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
                    <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                        Edit
                    </button>
                </td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
    @endforeach
</div>


