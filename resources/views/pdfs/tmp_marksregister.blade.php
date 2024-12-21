<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Markregister 2024: {{ $classSection->myclass->name }}{{ $classSection->section->name}}</title>
    {{-- <title>Result Sheet</title> --}}
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 10px;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: 5px auto;
            /* background-color: #c2c2c2; */
            padding: 20px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        table, th, td {
            /* width: 100%; */
            text-align: center;
            font-size: 12px;
                        
            border: 1px solid black;            
            border-collapse: collapse;

            margin-top: 15px;

            padding: 0px;
            text-align: center;
            /* background-color: #8eb6c1c3 */
            /* border-bottom: 1px solid #ddd; */
        }

        h1, h2, h3{
            text-align: center;
            margin: 0px;
            padding: 0px;
        }

    </style>
</head>
<body>
    <h1>Manikchak High Madrasah(H.S)</h1>
    <h3>Markregister-2024 for the Class:{{ $classSection->myclass->name }}, Section:{{ $classSection->section->name}}</h3>

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
            {{-- @foreach($studentcrs->where('id', 820) as $studentcr)    --}}
            {{-- only for IX, testing purpose --}}
            <tr>  
                <td rowspan="{{ $exams->count()+2 }}">{{ $loop->iteration }}-{{ $studentcr->id  ?? 'X'}}</td>
                <td rowspan="{{ $exams->count()+2 }}">{{ $studentcr->studentdb->name  ?? 'X'}}<br/>{{ $studentcr->studentdb->studentid  ?? 'X'}}</td>
                <td rowspan="{{ $exams->count()+2 }}">{{ $studentcr->roll_no  ?? 'X'}}</td>

                @foreach($exams as $exam)
                    @if(!$loop->first) <tr> @endif
                    <td>{{ $exam->details ?? '-'}}</td>


                    @foreach($myclassSubjects as $classSubject)
                        @php
                            $student_examdetails = $examdetails
                                ->where('exam_id', $exam->id)
                                ->where('myclass_id', $classSubject->myclass->id)
                                ->where('subject_id', $classSubject->subject->id);
                                

                            $marks = $marksentries
                                ->whereIn('examdetail_id', $examdetails->where('exam_id', $exam->id)->where('subject_id', $classSubject->subject->id)->pluck('id')->toArray()   )                       
                                ->where('studentcr_id', $studentcr->id)
                                // ->where('myclasssubject_id', $classSubject->where('subject_id', $classSubject->subject_id)->first()->id)
                                // ->whereIn('myclasssubject_id', $classSubject->where('subject_id', $classSubject->subject_id)->pluck('id')->toArray() )                                
                                ;
                        @endphp

                        <td class="border border-gray-300 px-4 py2 font-bold">
                            {{-- {{ $classSubject->subject->id }} --}}
                            @if($student_examdetails)
                                @foreach($student_examdetails as $student_examdetail)
                                    @php $subj_marks = $marks->where('examdetail_id', $student_examdetail->id); @endphp

                                        {{-- {{ substr($student_examdetail->exammode->name, 0,1) }}: --}}
                                        {{-- {{ isset($subj_marks) ? ($subj_marks->marks == -999 ? 'AB' : $subj_marks->marks) : '--'  }} --}}
                                        @foreach($subj_marks as $subj_mark)
                                            {{ isset($subj_mark) ? ($subj_mark->marks == -999 ? 'AB' : $subj_mark->marks) : '--'  }}
                                            
                                        @endforeach

                                        
                                @endforeach 
                            @endif

                            
                        </td>
                    @endforeach

                    </tr>
                    {{-- @if(!$loop->last) </tr> @endif --}}
                @endforeach

                @for($i=0; $i<2; $i++)
                    <tr>
                        @if( $i==0 )<td>Total</td> 
                        @else <td>Grade</td>
                        @endif

                        @foreach($myclassSubjects as $classSubject)                            
                            @php
                                $student_examdetails = $examdetails
                                    // ->where('exam_id', $exam->id)
                                    ->where('subject_id', $classSubject->subject->id)                            
                                    ;                                    

                                $ob_marks = $marksentries
                                    // ->where('examdetail_id', $examdetails->where('exam_id', $exam->id)->where('subject_id', $myclassSubject->subject->id)->first()->id)                           
                                    ->where('studentcr_id', $studentcr->id)
                                    ->whereIn('examdetail_id', $student_examdetails->pluck('id')->toArray())
                                    ->where('marks', '>=', '0')->sum('marks')
                                    // ->where('myclasssubject_id', $classSubject->where('subject_id', $classSubject->subject_id)->first()->id)
                                    // ->first()
                                    ;
                                $ob_percentage = round(($ob_marks / $student_examdetails->sum('full_mark')) * 100, 2);
                                $ob_grade = $grades->where('stpercentage', '<=', $ob_percentage)->where('enpercentage', '>=', $ob_percentage)->first() ;

                            @endphp
                            @if($i == 0)
                            
                            <td class="border border-gray-300 px-4 py2 font-bold">
                                @if($student_examdetails)     

                                    {{-- {{ print_r($student_examdetails->pluck('id')->toArray()) }} --}}
                                    {{ $ob_marks }}
                                    /{{ $student_examdetails->sum('full_mark')}}
                                    {{ $ob_percentage }}%                                    
                                @endif                                                               
                            </td>

                            @else if($i == 1)
                            <td>
                                {{ $ob_grade->gradeparticular->name ?? '--' }}                                
                            </td>
                            @endif

                            
                        @endforeach
                    
                    @if($i != 2-1) </tr> @endif
                @endfor
                            

            </tr>
            @endforeach
        </tbody>
    </table>

    <htmlpagefooter name="page-footer">
        Page: {PAGENO} of {nbpg} on {DATE j-m-Y} for Class:{{ $classSection->myclass->name }}, Section:{{ $classSection->section->name}}
    </htmlpagefooter>
</body>
</html>