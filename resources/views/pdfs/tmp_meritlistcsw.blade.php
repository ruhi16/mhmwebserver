<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            padding: 10px;
            /* background-color: #f4f4f4; */
        }

        .container {
            width: 100%;
            margin: 5px auto;
            /* background-color: #c2c2c2; */
            padding: 20px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        table {
            width: 100%;
            border: 1px solid black;            
            border-collapse: collapse;
        }

        th, td {
            /* width: 100%; */
            width: auto;
            text-align: center;
            font-size: 12px;
            height: 20px;

            margin-top: 15px;
            border: 1px solid black;            
            border-collapse: collapse;

            padding: 0px;
            text-align: center;
            /* background-color: #8eb6c1c3 */
            /* border-bottom: 1px solid #ddd; */
        }

        h1, h2, h3{
            text-align: center;
            margin: 0px;
            padding: 2px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Manikchak High Madrasah(H.S)</h1>
        <h2>Manikchak, Lalgola, Murshidabad</h2>
        <h3>Class Section wise Meritlist-2024</h3>

        {{-- {{ $data['content'] }} --}}
        <h3>Class:{{ $myclassSection->myclass->name }}, Section:{{ $myclassSection->section->name }}</h3>

        {{-- @foreach($myclassSubjects as $myclassSubject)
            {{ $myclassSubject->subject->name }}<br/>
        @endforeach --}}
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Cl-Sec-Roll</th>
                        <th>Total</th>
                        <th>Rank</th>
                        <th style="width:80px;">New Roll No</th>
                        <th style="width:120px;">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($markentries as $markentry)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                            {{-- SCR:{{ $markentry->studentcr->id ?? 'X'}}, SDB:{{ $markentry->studentcr->studentdb->id ?? 'X'}} --}}
                        </td>
                        <td style="text-align: left; padding: 5px;">
                            {{ $markentry->studentcr->studentdb->name  ?? 'X'}}
                            {{-- <br/>{{ $markentry->studentcr->studentdb->studentid  ?? 'X'}} --}}
                            
                        </td>
                        <td>                            
                            {{ $markentry->studentcr->myclass->name ?? 'X'}}-{{ $markentry->studentcr->section->name ?? 'X'}}-{{ $markentry->studentcr->roll_no ?? 'X'}}
                        </td>
                       
                        @if($myclassSection->myclass->id > 4)
                            <td>{{ $markentry->total/2 }}</td>
                        @else
                            <td>{{ $markentry->total }}</td>
                        @endif
                        <td>{{ $loop->iteration }}</td>
                        <td></td>
                        <td></td>
                    @endforeach

                </tbody>

            </table>
        </div>
    

    </div>
    <htmlpagefooter name="page-footer">
        Page: {PAGENO} of {nbpg} on {DATE j-m-Y} for Class:{{ $myclassSection->myclass->name }}, Section:{{ $myclassSection->section->name }}
    </htmlpagefooter>
</body>

</html>