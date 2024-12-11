<div>
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Class Section Individual Marksheet: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    @endsection

    <div class="h-fit min-w-full mx-auto">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
        Class: {{ $myclassSection->myclass->name }} - Section: {{ $myclassSection->section->name }}<br/>
        Student Name:{{ $studentcr->first()->studentdb->name }}
    </div>

    <div class="min-w-full mx-auto m-8 p-4">
        <table class="min-w-full mx-auto h-screen">
            <thead>

                <tr></tr>
                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50">
                        Formative
                    </th>
                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50">
                        Summative
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider border border-gray-500 text-center text-gray-700 uppercase bg-gray-50">
                        <table class="min-w-full mx-auto">
                            <thead>
                                <tr>
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Subject
                                    </th>
                                    @foreach($exams as $exam)   
                                        <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            {{ $exam->name }}
                                        </th>
                                    @endforeach
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grand Total
                                    </th>
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grade
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myclassSubjects->where('examtype_id', 1) as $myclassSubject)
                                    <tr>
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            {{ $myclassSubject->subject->code }}
                                        </td>
                                        @foreach($exams as $exam)
                                            <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                                @php
                                                    $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id', $myclassSubject->subject->id)->first()->id;
                                                @endphp
                                                {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks ?? 'X' }}                                            
                                            </td>
                                        @endforeach
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">                                            
                                            {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)->sum('marks') ?? 'X' }}
                                        </td>
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider border border-gray-500 text-center text-gray-700 uppercase bg-gray-50">
                        <table class="min-w-full mx-auto">
                            <thead>
                                <tr>
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Subject
                                    </th>
                                    @foreach($exams as $exam)   
                                        <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            {{ $exam->name }}
                                        </th>
                                    @endforeach
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grand Total
                                    </th>
                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grade
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myclassSubjects->where('examtype_id', 2) as $myclassSubject)
                                    <tr>
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            {{ $myclassSubject->subject->code }}
                                        </td>
                                        @foreach($exams as $exam)
                                            <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                                @php
                                                    $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id', $myclassSubject->subject->id)->first()->id;
                                                @endphp
                                                {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks ?? 'X' }}                                            
                                            </td>
                                        @endforeach
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">                                            
                                            {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)->sum('marks') ?? 'X' }}
                                        </td>
                                        <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                            
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


        {{-- @foreach($markEntries as $markEntry)
            @if($markEntry->examdetail->examtype_id == 1)
            {{ $markEntry->examdetail->subject->code ?? 'X' }}<br/>
            @endif
        @endforeach --}}










</div>
