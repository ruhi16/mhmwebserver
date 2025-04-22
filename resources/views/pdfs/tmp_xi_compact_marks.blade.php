<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI Compact Marks Register</title>
    <style type="text/css">
        /* Base styles */
        body {
          font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 
                       "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, 
                       "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
          line-height: 1.3;
          margin: 0;
          padding: 8px;
          font-size: 10px;
        }

        /* Container styles */
        .container {
          width: 100%;
        }

        .row {
          display: flex;
          width: 100%;
          margin-bottom: 8px;
        }

        .student-table {
          width: 49%;
          margin-right: 2%;
          box-sizing: border-box;
        }

        .student-table:last-child {
          margin-right: 0;
        }

        /* Table styles */
        table {
          width: 100%;
          border-collapse: collapse;
          font-size: 0.65rem;
          line-height: 0.9rem;
          border: 1px solid #1f2937;
        }

        /* Table header styles */
        th {
          background-color: #f9fafb;
          padding: 2px 4px;
          text-align: left;
          font-weight: 500;
          color: #1f2937;
          text-transform: uppercase;
          letter-spacing: 0.05em;
          border-bottom: 1px solid #1f2937;
        }

        th.font-bold {
          font-weight: 700;
        }

        /* Table body styles */
        td {
          padding: 2px 4px;
          white-space: nowrap;
          border-bottom: 1px solid #1f2937;
          background-color: #ffffff;
          overflow: hidden;
          text-overflow: ellipsis;
        }

        h1 {
          font-size: 1.2rem;
          margin-bottom: 8px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
          .row {
            flex-direction: column;
          }
          .student-table {
            width: 100%;
            margin-right: 0;
            margin-bottom: 8px;
          }
          .student-table:last-child {
            margin-bottom: 0;
          }
        }

        /* Print styles */
        @media print {
          body {
            padding: 0;
            font-size: 8px;
          }
          
          .student-table {
            page-break-inside: avoid;
          }
          
          table {
            font-size: 0.6rem;
          }
        }
    </style>
</head>

<body>
    <h1>XI Compact Marks Register</h1>
    <div class="container">
        @php
            $studentCount = count($hs_res_studentcrs);
            $rows = ceil($studentCount / 2);
        @endphp

        @for($row = 0; $row < $rows; $row++)
        <div class="row">
            @for($col = 0; $col < 2; $col++)
                @php
                    $index = ($row * 2) + $col;
                @endphp
                
                @if(isset($hs_res_studentcrs[$index]))
                <div class="student-table">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="1">
                                    SL: {{ $index+1 }}, SCR: {{ $hs_res_studentcrs[$index]->id }}, SDB: {{ $hs_res_studentcrs[$index]->hs_studentdb_id }}
                                </th>
                                <th colspan="3" class="font-bold">
                                    {{ $hs_res_studentcrs[$index]->hsStudentDb->name }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="1">
                                    Reg. No
                                </th>
                                <th colspan="3">
                                    {{ $hs_res_studentcrs[$index]->hsStudentDb->registration_no }}
                                </th>
                            </tr>
                        </thead>

                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Sem 1</th>
                                <th>Sem 2</th>
                                <th>Proj/Prac</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($hs_res_studentcrs[$index]->hsStudentdb->hsSubjects as $hsSubject)
                            <tr>
                                <td>{{ $hsSubject->hsSubject->name }}</td>

                                @foreach($hs_exam_details2->where('hs_subject_type_id',
                                $hsSubject->hsSubject->hsSubjectType->id) as $exam_detail)
                                <td>
                                    {{ $hs_res_studentcrs[$index]->hsMarksentries
                                    ->where('hs_subject_id', $hsSubject->hsSubject->id)
                                    ->where('hs_exam_detail_id', $exam_detail->id)
                                    ->first()->obtain_marks ?? '-'
                                    }}
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endfor
        </div>
        @endfor
    </div>
</body>
</html>