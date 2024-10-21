<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <style>
        @font-face {
            font-family: 'Bangla Libre';
            src: url('/fonts/NotoSerifBengali-VariableFont_wdth,wght.ttf') format('truetype');
        }
    </style> --}}
    {{-- <style>
        @font-face {
            font-family: 'NotoSansBengali';
            src: url('/fonts/NotoSansBengali-VariableFont_wdth,wght.ttf') format('truetype');
        }
    
    </style> --}}
    {{-- <style>
        @font-face {
        font-family: 'Noto Sans Bengali';
        src: url('/fonts/NotoSansBengali-Regular.ttf') format('truetype');
    }
    
    body {
        font-family: 'NotoSansBengali', sans-serif;
    }

    </style> --}}

    <title>Document</title>
</head>
<body>
    
    <h2 align="center">Manikchak High Madrasah(H.S)</h2>
    <h3 align="center">Manikchak * Lalgola * Murshidabad</h3>
    <h4 align="center">Provitional Voter List - 2024</h4>
    
    <table border="1">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Gurdian Name</th>
                <th>Address</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Roll</th>
                <th>Relation</th>
                <th>Adm Sl & Dt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voters as $voter)        
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $voter->gurdian_name_en ?? 'N/A' }}<br/>{{ $voter->gurdian_name_bn ?? 'N/A' }}</td>
                <td>{{ $voter->village ?? 'N/A' }}</td>
                <td>{{ $voter->student_name_en ?? 'N/A' }}<br/>{{ $voter->student_name_bn ?? 'N/A' }}</td>
                <td>{{ $voter->myclass->name ?? 'N/A' }}</td>
                <td>{{ $voter->section->name ?? 'N/A' }}</td>
                <td>{{ $voter->roll_no ?? 'N/A' }}</td>
                <td>{{ $voter->relataion ?? 'N/A' }}</td>
                <td>{{ $voter->adm_sl_no ?? 'N/A' }} - {{ $voter->adm_date ?? 'N/A' }}</td>
            </tr>
                @foreach($voters_all->where('brother_id', '=', $voter->id) as $sibling)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->gurdian_name_en}}<br/>{{$sibling->gurdian_name_bn}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->village}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->student_name_en}}<br/>{{$sibling->student_name_bn}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->myclass->name}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->section->name}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->roll_no}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$sibling->relataion}}</td>                     
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->adm_sl_no ?? 'N/A' }} - {{ $voter->adm_date ?? 'N/A' }}</td>
                    </tr>
                @endforeach   
            @endforeach
        </tbody>
    </table>

    @foreach($voters as $voter)
        {{ $voter->student_name_en ?? 'NAME NOT FOUND'}}-{{ $voter->student_name_bn ?? 'NAME NOT FOUND'}}<br/>
    @endforeach
</body>
</html>
