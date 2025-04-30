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

        table,
        th,
        td {
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

        h1,
        h2,
        h3 {
            text-align: center;
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body>
    <h1>Manikchak High Madrasah(H.S)</h1>
    <h3>Markregister-2024 for the Class:{{ $classSection->myclass->name }}, Section:{{ $classSection->section->name}}
    </h3>

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
            {{-- @foreach($studentcrs->where('id', 820) as $studentcr) --}}
            {{-- only for IX, testing purpose --}}
            <tr>
                <td rowspan="{{ $exams->count()+2 }}">{{ $loop->iteration }}-{{ $studentcr->id ?? 'X'}}</td>
                <td rowspan="{{ $exams->count()+2 }}">{{ $studentcr->studentdb->name ?? 'X'}}<br />{{
                    $studentcr->studentdb->studentid ?? 'X'}}</td>
                <td rowspan="{{ $exams->count()+2 }}">{{ $studentcr->roll_no ?? 'X'}}</td>

                @foreach($exams as $exam)
                @if(!$loop->first)
            <tr> @endif
                <td>{{ $exam->details ?? '-'}}</td>

                @foreach($myclassSubjects as $classSubject)
                @php
                $subjectId = $classSubject->subject->id;
                $key = $exam->id . '_' . $subjectId;
                $examDetails = $processedData['examDetailsByExamAndSubject'][$key] ?? [];
                @endphp

                <td class="border border-gray-300 px-4 py2 font-bold">
                    @foreach($examDetails as $examDetail)
                    @php
                    $markKey = $studentcr->id . '_' . $examDetail->id;
                    $marks = $processedData['marksByStudentAndExamDetail'][$markKey] ?? [];
                    @endphp

                    @foreach($marks as $mark)
                    {{ $mark->marks == -999 ? 'AB' : $mark->marks }}
                    @endforeach
                    @endforeach
                </td>
                @endforeach

            </tr>
            @endforeach

            @for($i=0; $i<2; $i++) <tr>
                @if( $i==0 )<td>Total</td>
                @else <td>Grade</td>
                @endif

                @foreach($myclassSubjects as $classSubject)
                @php
                $subjectId = $classSubject->subject->id;
                $studentData = $processedData['studentTotalsAndGrades'][$studentcr->id][$subjectId] ?? [];
                @endphp

                @if($i == 0)
                <td class="border border-gray-300 px-4 py2 font-bold">
                    {{ $studentData['total_marks'] ?? 0 }}/{{ $studentData['full_marks'] ?? 0 }}
                    {{ $studentData['percentage'] ?? 0 }}%
                </td>
                @else
                <td>
                    {{ $studentData['grade'] ?? '--' }}
                </td>
                @endif
                @endforeach
                </tr>
                @endfor
                </tr>
                @endforeach
        </tbody>
    </table>

    <htmlpagefooter name="page-footer">
        Page: {PAGENO} of {nbpg} on {DATE j-m-Y} for Class:{{ $classSection->myclass->name }}, Section:{{
        $classSection->section->name}}
    </htmlpagefooter>
</body>

</html>