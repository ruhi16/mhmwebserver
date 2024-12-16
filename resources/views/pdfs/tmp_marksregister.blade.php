<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>{{ $clsSec_id }}</title>
    {{-- <title>Result Sheet</title> --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: 5px auto;
            /* background-color: #c2c2c2; */
            padding: 20px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }
        table tr td {
            text-align: center;
            
            /* width: 100%; */
            
            border: 1px solid black;            
            border-collapse: collapse;

            margin-top: 5px;

            padding: 0px;
            text-align: center;
            /* background-color: #8eb6c1c3 */
            /* border-bottom: 1px solid #ddd; */
        }

    </style>
</head>
<body>
    <h1>Hello Markregisters</h1>

    <table>
        <thead>
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Term</th>
            @foreach($myclassSubjects as $classSubject)
                <th class="border border-gray-300 px-4 py2 font-bold">{{ $classSubject->subject->code ?? 'X'}}</th>
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
                        
                        @if($student_examdetails)
                            @foreach($student_examdetails as $student_examdetail)
                            @php $subj_marks = $marks->where('examdetail_id', $student_examdetail->id)->first(); @endphp

                                {{ $student_examdetail->exammode->name }}:
                               
                                {{ isset($subj_marks) ? ($subj_marks->marks == -999 ? 'AB' : $subj_marks->marks) : '--'  }}

                                
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


</body>
</html>