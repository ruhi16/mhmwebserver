<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        #top-page-info tr td {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;

            padding: 0px;
            text-align: center;
            /* background-color: #8eb6c1c3 */
            /* border-bottom: 1px solid #ddd; */
        }

        h1, h2 {
            text-align: center;
            color: #339;
            padding: 0;
            margin: 0;
        }
        
        .school-title {
            width: 100%;
            display: flexbox;

        }

        .school-title #left-logo {
            float: left;
            width: 10%;
            margin-left: 50px;
            /* background-color: #6b856b; */
        
        }
        .school-title  .school-description {
            width: 100%;
            margin-bottom: 5px;
            text-align: center;
            float: right;
            /* background-color: #867373; */
            /* display: flex; */
        }

        .school-title .school-description p {
            margin: 5px;
            padding: 0;         
        }
        .school-title .school-description #p-report {
            margin: 5px;
            padding: 0;
            font-size: 20px;
            font-weight: bold;
            
        }


        .school-title #right-logo {
            float: right;
            width: 10%;
            /* background-color: #339; */
        }


        
        .student-details {
            margin: 0;
            padding: 0;
            text-align: left;            
        }

        .student-details #student-name{
            font-size: 20px;
        }

        #student-info {
            width:100%;
            /* height: fit-content; */
            /* background-color: aqua; */
            
        }

        #student-info .student-details {
            float:left; 
            width: 80%;
            /* background-color: #8eb6c1c3 */
        }

        #student-info .student-details p{
            margin: 5px;
            padding: 0;  
            font-size: 15px;
            font-weight: bold;
        }

        #student-info .student-qrcode p{
            /* float: right; */
            width: 20%;
            /* background-color: #d3a5a5; */
            /* text-align: center;            */
           
        }

        

        #student-marks{
            width: 100%;
            height: auto;
            align: center;
            border-collapse: collapse;
            margin-top: 5px;            
            background-color: #c3def3c3 
        }

        #student-marks th, #student-marks td {
            border: 1px solid black;
            
            padding: 5px;
            text-align: center;
            font-size: 13px;
        }

        #student-marks td span{
            border: 1px solid black;
            
            padding: 5px;
            text-align: left;
            font-size: 13px;
        }

        

        #student-marks table, th, td{            
            display: table-row-group;
            vertical-align: top;
            align: center;
            
            border-color: inherit;
            border-collapse: collapse;
        }

        

        .summary{
            margin: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
        }


        .bottom-page-info tbody tr{
            /* width: 100%; */
            /* height: 300px; */
            /* text-align:center; */
            /* background-color: #8eb6c1c3; */
        }

        .bottom-page-info td{
            /* width: 100%; */
            height: 45px;
            text-align:center;
            /* height: 200px; */
            /* background-color: #8eb6b123; */
        }

        #bottom-page-info td{
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        #formative-marks, #summative-marks{
            width: 100%;
        }

        
        
    </style>

</head>

<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $content }}</p> --}}
    

    <div class="container">
        <table class="top-page-info" id="top-page-info">
            <tr>
                <td>Dise: 1907 15 15 802</td>
                <td>Institution: 116 126</td>
                <td>Index: 12-04-03-01-035</td>
                <td>Mobile: 973507 71008</td>
            </tr>
        </table>

        <div class="school-title" style="display: flex">
            <div id="left-logo">
                {{-- Hello Left --}}
                {{-- <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="logo" width="100px" height="100px"> --}}
                {{-- <img src="{{ url('/img/myimage.jpg') }}" alt="logo" width="100px" height="100px"> --}}
            </div>
            <div class="school-description">            
                <h1>Manikchak High Madrasah(H.S)</h1>
                <p>Manikchak * Lalgola * Murshidabad</p>
                <p id="p-report">Progress Report for Session: 2024</p>            
            </div>
            <div id="right-logo">
                {{-- Hello Right --}}
                {{-- <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="logo" width="100px" height="100px"> --}}
            </div>
        </div>

        <div id="student-info">
            <div class="student-details">
                <p id="student-name">Student Name: {{ $studentcr->studentdb->name ?? 'x'}}</p>
                <p>Student Id: 031245829</p>
                <p>
                    Class: {{ $studentcr->myclass->name ?? 'x'}}, 
                    Section: {{ $studentcr->section->name ?? 'x'}}, 
                    Roll No: {{ $studentcr->roll_no ?? 'x'}}
                </p>
                
            </div>
            <div class="student-qrcode">
                <div>@if(isset($qrcode)) {!! str_replace('<?xml version="1.0" encoding="UTF-8"?>', '',$qrcode) !!}@endif</div>
            </div>
        </div>


        {{-- <h2>Result Sheet</h2> --}}
        <table id="student-marks">
            <thead>
                <tr id="heading">
                    <th>Formative</th>                    
                    <th>Summative</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table id="formative-marks">                            
                            {{-- @foreach($myclassSubjects->where('examtype_id', 1) as $myclassSubject)                                 --}}
                            <tr>
                                <th>Subject</th>
                                @php $for_fm_total = 0; @endphp
                                @foreach($exams as $exam)
                                    <th>{{ strtok($exam->name," ") }}<br/>
                                    FM:{{ $examDetails->where('examtype_id', 1)->where('exam_id', $exam->id)->first()->full_mark }}
                                        @php $for_fm_total += $examDetails->where('examtype_id', 1)->where('exam_id', $exam->id)->first()->full_mark ?? 0; @endphp
                                    </th>
                                @endforeach
                                <th>Total<br/>FM:{{ $for_fm_total }}</th>
                                <th>Grade</th>
                            </tr>
                            <tbody>
                                @foreach($myclassSubjects->where('examtype_id', 1) as $myclassSubject)
                                <tr>
                                    <td>{{ $myclassSubject->subject->code }}</td>
                                    @foreach($exams as $exam)
                                    <td>
                                        @php
                                            $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id',
                                            $myclassSubject->subject->id)->first()->id;
                                        @endphp
                                        {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks ?? 'X'}}
                                    </td>
                                    @endforeach
                                    
                                    <td>
                                        {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)->sum('marks') ?? 'X' }}
                                        /{{ $examDetails->where('examtype_id', 1)->where('subject_id', $myclassSubject->subject_id)->sum('full_mark') }}
                                    </td>
                                    <td>
                                        @php 
                                            $for_ob_marks = $markEntries->where('myclasssubject_id', $myclassSubject->id)->where('marks', '>=', '0')->sum('marks');
                                            $for_fl_marks = $examDetails->where('examtype_id', 1)->where('subject_id', $myclassSubject->subject_id)->sum('full_mark');
                                            $for_percentage = ($for_ob_marks / $for_fl_marks) * 100;
                                            $for_percentage = round($for_percentage, 0);
                                            $for_percentage = $for_percentage >= 0 ? $for_percentage : 0;
                                            $for_grade = $grades->where('examtype_id', 1)
                                                ->where('stpercentage', '<=', $for_percentage)
                                                ->where('enpercentage', '>=', $for_percentage)
                                                ->first()->gradeparticular->name
                                        @endphp

                                        {{ $for_grade ?? 'X' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>                            
                        </table>
                        <span style="align-self: left;">
                            Formative Subjects:
                            <div style="font-size: 10px;">
                                @foreach($myclassSubjects->where('examtype_id', 1) as $myclassSubject)
                                {{ $myclassSubject->subject->code}}:{{ $myclassSubject->subject->name}},
                                @endforeach
                            </div>
                            Summative Subjects:
                            <div style="font-size: 10px;">
                                @foreach($myclassSubjects->where('examtype_id', 2) as $myclassSubject)
                                {{ $myclassSubject->subject->code}}:{{ $myclassSubject->subject->name}},
                                @endforeach
                            </div>
                        </span>
                    </td>

                    <td>
                        <table id="summative-marks">
                            <tr>
                                <th>Subject</th>
                                @foreach($exams as $exam)
                                <th>{{ $exam->name }}</th>
                                @endforeach
                                
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                            </tr>
                            <tbody>
                                @php
                                    $grandTotal = 0;
                                    $grandTotalFM = 0;
                                    $total_d_counts = 0;
                                    $active_subject_ids = $myclassSubjects->where('examtype_id', 2)->where('is_additional', 0)->pluck('id');
                                @endphp
                                @foreach($myclassSubjects->where('examtype_id', 2) as $myclassSubject)
                                <tr>
                                    <td>{{ $myclassSubject->subject->code }}
                                        <br />
                                        <span class="text-xs">{{ $myclassSubject->is_additional > 0 ? '(Additional)' : '' }}</span>
                                    </td>
                                    @foreach($exams as $exam)
                                    <td>
                                        @php
                                            $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id',
                                            $myclassSubject->subject->id)->first()->id;
                                        @endphp
                                        @if($markEntries->where('examdetail_id', $examDetail_id)->first())
                                            
                                            @if( $markEntries->where('examdetail_id', $examDetail_id)->first()->marks >= 0)
                                                {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks}}
                                                @php 
                                                    $grandTotal += $markEntries->where('examdetail_id', $examDetail_id)->first()->marks; 
                                                @endphp
                                            @else
                                                <span class="text-red-500">AB</span>
                                            @endif

                                        @else
                                            <span class="text-green-500">NA</span>
                                        @endif
                                        /{{ $examDetails->where('id', $examDetail_id)->first()->full_mark ?? 'X' }}
                                    </td>
                                    @endforeach
                                    
                                    <td>
                                        {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)
                                            ->where('marks', '>=', '0')->sum('marks') ?? 'X' }}
                                        
                                        /{{ $examDetails->where('examtype_id', 2)
                                            ->where('subject_id', $myclassSubject->subject_id)
                                            ->sum('full_mark') ?? 'X' }}

                                        @php
                                        if($myclassSubject->is_additional == 0) {
                                            $grandTotalFM += $examDetails->where('examtype_id', 2)
                                                ->where('subject_id', $myclassSubject->subject_id)
                                                ->sum('full_mark');
                                        }
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                        $ob_marks = $markEntries->where('myclasssubject_id', $myclassSubject->id)->where('marks', '>=', '0')->sum('marks');
                                        $fl_marks = $examDetails->where('examtype_id', 2)
                                            ->where('subject_id',$myclassSubject->subject_id)
                                            ->sum('full_mark');
                                        $percentage = ($ob_marks / $fl_marks) * 100;
                                        $percentage = round($percentage, 0);
                                        $percentage = $percentage >= 0 ? $percentage : 0;
                                        if($percentage < 25) {
                                            $total_d_counts++;
                                        }

                                    @endphp
                                    {{ $percentage }}%
                                    </td>
                                    <td>
                                        {{ $grades->where('examtype_id', 2)
                                            ->where('stpercentage', '<=', $percentage)
                                            ->where('enpercentage', '>=', $percentage)
                                            ->first()->gradeparticular->name ?? 'X' }}

                                    </td>
                                </tr>
                                @endforeach
                            
                            
                                
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <div class="summary">
            <p>Percentage of Obtained Marks: 84.89%</p>
            <p>Results: Pass</p>
        </div> --}}
        <div class="summary">
            @php
            $words = '';

            function numToWords($number) {
                $units = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');

                $tens = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');

                $special = array('eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');

                $words = '';
                if ($number < 10) {
                    $words .= $units[$number];
                } elseif ($number < 20) {
                    $words .= $special[$number - 11];
                } else {
                    $words .= $tens[(int)($number / 10)] . ' '
                            . $units[$number % 10];
                }

                // return $words;
            }
            @endphp

            <table class="top-page-info" id="top-page-info">
                <tr>
                    <td>Obtained Marks: <span style="font-weight: bold">{{ $grandTotal >= 0 ? $grandTotal : 'AB' }}</span><br/>
                        [In Word: <span style="font-weight: bold"></span>]
                        {{-- {{ $this->numberToWords($grandTotal) }} --}}
                        {{-- <span id="words">{{ numToWords($grandTotal) }}</span> --}}
                    </td>
                    <td>Full Marks: <span style="font-weight: bold">{{ $grandTotalFM }}</span> </td>
                    <td>Percentage: <span style="font-weight: bold">{{ $grandTotal >= 0 ? round(($grandTotal / $grandTotalFM) * 100, 0).'%' : 'AB' }}</span></td>
                    <td>Results: <span style="font-weight: bold">Promoted</span></td>
                </tr>
            </table>
        </div>
        <table class="bottom-page-info" id="bottom-page-info">
            <tr>
                <th>Attendance</th>
                <th>Gurdian Sign</th>
                <th>Class Teacher Sign</th>
                <th>Headmaster Sign</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>


    <script >
        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }

    </script>

</body>

</html>