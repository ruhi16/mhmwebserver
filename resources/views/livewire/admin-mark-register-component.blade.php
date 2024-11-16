<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Formative Marks Entry: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>        
    @endsection


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
                        <th class="border border-gray-300 px-4 py2 font-bold">{{$exam->details}}</th>
                    @endif
                        
                    <th class="border border-gray-300 px-4 py2 font-bold"></th>
                    @endforeach
                    </tr>
                @endforeach

                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
