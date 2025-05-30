<div class="h-auto min-w-full mx-auto">

    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Marks Entry: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    @endsection
    {{-- </x-slot> --}}

    <div class="min-w-full mx-auto bg-green-300 text-center text-4xl font-bold my-4">
        Admin Answer Script Distribution for
        <span class="text-red-500">Class: {{ $myclassSections->myclass->name }}</span> &
        <span class="text-red-500">Section: {{ $myclassSections->section->name }}</span>

    </div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="min-w-full mx-auto font-bold text-center">
        ExamDetails (exam, examtype, exammode, myclass, section, school, session, subject, teacher)
    </div>
    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            
            <tr class="text-sm">
                <th rowspan="2" class="border border-gray-300 px-4 py-2">Sl</th>
                <th rowspan="2" class="border border-gray-300 px-4 py-2">ExamType</th>                
                <th rowspan="2" class="border border-gray-300 px-4 py-2">Subject</th>
                @foreach($exams as $exam)
                    <th colspan="4" class="border border-gray-300 px-4 py-2">{{ $exam->name }}</th>
                @endforeach
            </tr>
            <tr>                
                @foreach($exams as $exam)                
                    <th class="border border-gray-300 px-4 py-2">Mode</th>
                    <th class="border border-gray-300 px-4 py-2">FM</th>
                    <th class="border border-gray-300 px-4 py-2">PM</th>
                    <th class="border border-gray-300 px-4 py-2">Time</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-sm">
        

        @foreach($myclassSubjects as $myclassSubject)        
            
            <tr class=" {{ $myclassSubject->examtype->id == 1 ? 'text-purple-600' : '' }}">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->examtype->name }}</td>                    
                <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->subject->name }}</td>

                    @foreach($exams as $exam)                                
                        @php
                            $examDetails = $this->examDetails
                                ->where('exam_id', $exam->id)                                
                                ->where('subject_id', $myclassSubject->subject_id)                                
                                ;
                        @endphp

                        <td class="border border-gray-300 px-4 py-2">
                            {{-- {{ $exam->id }}-{{ $myclassSubject->subject_id}}
                            {{ $examDetails->count() }} --}}
                            @foreach($examDetails as $examDetail)
                                {{ $examDetail->exammode->name }}<br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $key => $examDetail)
                                {{ $examDetail->full_mark ?? 'X' }}<br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $key => $examDetail)
                                {{ $examDetail->pass_mark ?? 'X' }}<br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $key => $examDetail)
                                {{ $examDetail->time_alloted ?? 'X' }} min<br/>
                            @endforeach
                        </td>                                
                    
                    @endforeach
            </tr>

        @endforeach


        </tbody>
    </table>


    {{-- 
    @foreach($examDetails->where('examtype_id', $examtype->id) as $index => $examDetail)
                <tr class="{{ $examDetail->examtype->id == 1 ? 'text-red-600' : '' }}">
                    <th class="border border-gray-300 px-4 py-2 text-left">{{ $loop->iteration }}-{{$examDetail->id}}</th>
                    <th class="border border-gray-300 px-4 py-2 ">{{ $examDetail->examtype->name }}</th>
                    
                    <th class="border border-gray-300 px-4 py-2">{{ $examDetail->exammode->name }} </th>
                    <th class="border border-gray-300 px-4 py-2 text-left">{{ $examDetail->subject->name }} </th>
                    @foreach($exams as $exam)
                        @if($examDetail->exam_id == $exam->id)
                            <th class="border border-gray-300 px-4 py-2">{{ $examDetail->full_mark }}-{{$examDetail->exam_id}} </th>
                            <th class="border border-gray-300 px-4 py-2">{{ $examDetail->pass_mark }} </th>
                            <th class="border border-gray-300 px-4 py-2">{{ $examDetail->time_alloted }} minxx{{$exam->id}}</th>
                        @endif
                    @endforeach
                </tr>
            @endforeach
    --}}



{{-- 
    <div class="min-w-full mx-auto font-bold text-center">
        ExamDetails (exam, examtype, exammode, myclass, section, school, session, subject, teacher)
    </div>
    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Subjects</th>
                <th class="border border-gray-300 px-4 py-2">Type</th>

                @foreach($exams as $exam)
                @foreach($examtypes as $examtype)
                <th class="border border-gray-300 px-4 py-2">
                    {{ $exam->details }}-{{ $examtype->name }}
                </th>
                @endforeach
                @endforeach

            </tr>
        </thead>
        <tbody>
            @foreach($myclassSubjects->sortBy('subject_id') as $index => $myclassSubject)
            @if($myclassSubject->examtype->id != 1)
            <tr class="{{ $myclassSubject->examtype->id == 1 ? 'text-purple-600' : '' }}">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->subject->name }}({{
                    $myclassSubject->subject->id }})</td>
                <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->examtype->name }}</td>

                @foreach($exams as $exam)
                    @foreach($examtypes as $examtype)

                    <th class="border border-gray-300 px-4 py-2">

                        @foreach($examDetails
                            ->where('subject_id', $myclassSubject->subject->id)
                            ->where('exam_id', $exam->id)
                            ->where('examtype_id', $examtype->id)
                            ->sortBy('subject_id')
                                as $examdetail)

                        <div class="flex flex-col gap-2">
                            <div>
                                Mode:<span class="text-red-500 text-sm m-2 p-2">{{ $examdetail->exammode->name }}</span>
                            </div>

                            <a class="text-white text-sm {{$examdetail->exammode->id == 1 ? 'bg-purple-500' : 'bg-blue-500'}}  hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1.5 py-1.5 focus:outline-none"
                                href="{{ route('admin.marksentryentity', [
                                                'myclassSection_id' => $myclassSections->id,
                                                'myclassSubject_id'=> $myclassSubject->id,
                                                'examdetail_id'=> $examdetail->id
                                                ]) }}">
                                Marks Entry
                            </a>
                        </div>
                        @endforeach

                    </th>

                    @endforeach
                @endforeach

            </tr>
            @endif
            @endforeach --}}

            {{--
            <select id="exam" wire:model="selectedExam">
                <option value=""></option>
                @foreach($exams as $exam)
                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                @endforeach
            </select>

            <select id="examtype" wire:model="selectedexamtype" {{$selectedExam ? '' : 'disabled' }}>
                <option value=""></option>
                @foreach($examtypes as $examtype)
                <option value="{{ $examtype->id }}">{{ $examtype->name }}</option>
                @endforeach
            </select>

            <br />
            Message: {{$message}} <br />
            Exam:{{ $selectedExam }} <br />
            Examtype:{{ $selectedexamtype }} --}}


</div>