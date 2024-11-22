<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Formative Marks Entry: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>        
    @endsection
    <div>
        <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
            Formative Marks Entry Entity for Class: {{ $myclassSection->myclass->name }}, Section: {{  $myclassSection->section->name }}
            {{-- <span class="text-red-500">Class: {{ $myclassSection->myclass->name }}</span> &
            <span class="text-red-500">Section: {{ $myclassSection->section->name }}</span> --}}
        </div>
    </div>

    {{-- @foreach($examdetails as $data)
        {{ $data }}
    @endforeach --}}

    {{-- @foreach($marksentries as $marksentry)
        {{ $marksentry->where('examdetail_id', $examdetails->id)->first()->marks ?? 'X') }}
    @endforeach --}}

    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py2 font-bold">Sl</th>
                <th class="border border-gray-300 px-4 py2 font-bold">Name/Student Id</th>                
                <th class="border border-gray-300 px-4 py2 font-bold">Roll</th>
                <th class="border border-gray-300 px-4 py2 font-bold">Term</th>
                @foreach($myclassSubjects as $myclassSubject)
                    <th class="border border-gray-300 px-4 py2 font-bold">{{ $myclassSubject->subject->code ?? 'X'}}</th>
                @endforeach



            </tr>
        </thead>
        <tbody>
            @foreach($studentcrs as $studentcr)
            <tr>                
                @foreach($exams as $exam)
                    @if($loop->first)
                        <td rowspan="{{$exams->count()+1}}" class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}/{{$studentcr->id  ?? 'X'}}</td>
                        <td rowspan="{{$exams->count()+1}}"class="border border-gray-300 px-4 py-2 text-left">{{ $studentcr->studentdb->name  ?? 'X'}}<br/>{{ $studentcr->studentdb->studentid  ?? 'X'}}</td>                
                        <td rowspan="{{$exams->count()+1}}"class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no  ?? 'X'}}</td>
                    @endif
                
                    
                
                    <tr>
                    @foreach($myclassSubjects as $myclassSubject)
                    @if($loop->first)
                        <th class="border border-gray-300 px-4 py2 font-bold">{{$exam->details}}</th>{{-- short name of exam, in each row --}}
                    @endif

                    @php
                        $student_examdetails = $examdetails
                            ->where('exam_id', $exam->id)
                            ->where('subject_id', $myclassSubject->subject->id)
                            // ->first()
                            ;

                        $marks = $marksentries
                            // ->where('examdetail_id', $examdetails->where('exam_id', $exam->id)->where('subject_id', $myclassSubject->subject->id)->first()->id)                           
                            ->where('studentcr_id', $studentcr->id)
                            ->where('myclasssubject_id', $myclassSubject->where('subject_id', $myclassSubject->subject_id)->first()->id)
                            // ->first()
                            ;
                    @endphp
                        
                    <td class="border border-gray-300 px-4 py2 text-sm">
                        {{-- {{ $exam->id }}: --}}
                        {{-- @foreach($examdetails->where('exam_id', $exam->id)->where('subject_id', $myclassSubject->subject->id) as $examdetail)
                            {{ $examdetail->id  }},
                        @endforeach --}}
                        @if($student_examdetails)
                            @foreach($student_examdetails as $student_examdetail)
                            @php $subj_marks = $marks->where('examdetail_id', $student_examdetail->id)->first(); @endphp

                                {{ $student_examdetail->exammode->name }}:
                                {{-- {{$student_examdetail->id}}- --}}
                                {{-- {{ $marks->where('examdetail_id', $student_examdetail->id)->first()->id ?? '' }}: --}}
                                
                                {{ isset($subj_marks) ? ($subj_marks->marks == -999 ? 'AB' : $subj_marks->marks) : '--'  }}

                                {{-- {{ $marksentries->where('studentcr_id', $studentcr->id)->first() ?? '' }} --}}
                                {{-- @foreach($marksentries->where('studentcr_id', $studentcr->id)  as $test)
                                    {{$test->id}},
                                    @endforeach --}}
                            @endforeach
                            {{-- {{ $marks->where('examdetail_id', $student_examdetails->id)->first()->marks ?? '' }} --}}
                        @endif
                        
                    </td>
                    @endforeach
                    </tr>
                @endforeach

                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
