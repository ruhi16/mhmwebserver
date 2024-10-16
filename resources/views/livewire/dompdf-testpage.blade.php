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
    {{-- {{ json_encode($data) }} --}}
    <h1>Hello Dom Pdf</h1>
    <p>আমি বাংলা লিখতে পারি।</p>
    <p style="font-family: 'NotoSansBengali;">
        বাংলা লেখা দিস ইজ বাংলা 
        This text will be rendered in Bengali.
    </p>
    @foreach($voters as $voter)
        {{ $voter->student_name_en ?? 'NAME NOT FOUND'}}-{{ $voter->student_name_bn ?? 'NAME NOT FOUND'}}<br/>
    @endforeach
</body>
</html>
