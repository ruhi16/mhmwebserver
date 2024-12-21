<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    {{-- {{ $data['content'] }} --}}
    Class:{{ $myclassSection->myclass->name }}, Section:{{ $myclassSection->section->name }}<br/>

    @foreach($myclassSubjects as $myclassSubject)
        {{ $myclassSubject->subject->name }}<br/>
    @endforeach

    <table>
        <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Cl-Sec-Roll</th>
                <th>Total</th>
                <th>Rank</th>
                <th>New Roll No</th>
            </tr>
        </thead>

    </table>

    @foreach($markentries as $markentry)
        {{ $loop->iteration }}--
        {{ $markentry->studentcr->studentdb->name }}-
        {{ $markentry->studentcr->roll_no }}-
        @if($myclassSection->myclass->id > 4)
            {{ $markentry->total/2 }}
        @endif
        <br/>
    @endforeach


</body>

</html>