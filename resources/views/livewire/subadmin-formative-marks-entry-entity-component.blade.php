<div>    
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Formative Marks Entry: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>        
    @endsection
    {{-- Exam::{{$this->examterm->name}} --}}

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
    
    <div>
        <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
            Formative Marks Entry Entity for Class: {{ $myclassSection->myclass->name }}, Section: {{  $myclassSection->section->name }}            
        </div>
    </div>
    
    <div>
        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py2 font-bold">Class/Sec</th>
                    <td class="border border-gray-300 px-4 py2">{{ $myclassSection->myclass->name }}/{{ $myclassSection->section->name}}</td>
                    <th class="border border-gray-300 px-4 py2"></th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Subject</th>
                    <td class="border border-gray-300 px-4 py2">All</td>
                    {{-- <td class="border border-gray-300 px-4 py2">{{ $myclassSubject->subject->name}}</td> --}}
                    <th class="border border-gray-300 px-4 py2"></th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Pass Marks</th>
                    {{-- <td class="border border-gray-300 px-4 py2">{{ $examdetail->pass_mark ?? 'X' }}</td> --}}
                    <th class="border border-gray-300 px-4 py2"></th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Full Mark</th>
                    {{-- <td class="border border-gray-300 px-4 py2">{{ $examdetail->full_mark ?? 'X' }}</td> --}}
    
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py2 font-bold">Exam</th>
                    <td class="border border-gray-300 px-4 py2">{{ $this->examterm->name ?? 'X'}}</td>
                    <th class="border border-gray-300 px-4 py2"></th>
                    {{-- <th class="border border-gray-300 px-4 py2 font-bold"></th> --}}
                    <th class="border border-gray-300 px-4 py2 font-bold">Exam Type</th>
                    <td class="border border-gray-300 px-4 py2">Formative</td>
                    {{-- <td class="border border-gray-300 px-4 py2">{{ $examterm->examtype->name ?? 'X'}}</td> --}}
                    <th class="border border-gray-300 px-4 py2"></th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Exam Mode</th>
                    {{-- <td class="border border-gray-300 px-4 py2">{{ $examterm->exammode->name ?? 'X'}}</td> --}}
                    <th class="border border-gray-300 px-4 py2"></th>
                    <th class="border border-gray-300 px-4 py2 font-bold">Teacher</th>
                    <td class="border border-gray-300 px-4 py2">Class Teacher
                        {{-- <span class="text-red-500 font-extrabold"> {{ $ansscriptdistribution->first()->teacher->name ?? 'NA' }}</span> --}}
                    </td>
                </tr>
            </thead>
            <tbody>    
            </tbody>
        </table>
    </div>

    

    <div>
        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Sl</th>
                    <th class="border border-gray-300 px-4 py-2">Name<br/>Student Id</th>                    
                    <th class="border border-gray-300 px-4 py-2">Roll</th>                    
                    @foreach($examdetails as $examdetail)
                        <th class="border border-gray-300 px-4 py-2">
                            {{ $examdetail->subject->code }}<br/>
                            <span class="text-sm">{{ $examdetail->pass_mark ?? 'X' }}/{{ $examdetail->full_mark ?? 'X' }}</span>
                        </th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach($studentcrs as $studentcr)
                <tr class="text-sm">
                    <th class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}/{{$studentcr->id  ?? 'X'}}</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">{{ $studentcr->studentdb->name  ?? 'X'}}<br/>{{ $studentcr->studentdb->studentid  ?? 'X'}}</th>                    
                    <th class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no  ?? 'X'}}</th>
                    @foreach($examdetails as $examdetail)
                        <th class="border border-gray-300 px-4 py-2">
                            @php
                                $test_marks = null;
                                if( $myclassSubjects->where('subject_id', $examdetail->subject_id)->first() ){
                                    $myclassSubject_id = $myclassSubjects->where('subject_id', $examdetail->subject_id)->first()->id;

                                    $test_marks = $this->enteredMarks->where('examdetail_id',  $examdetail->id)
                                        ->where('studentcr_id', $studentcr->id)
                                        ->where('myclasssubject_id', $myclassSubject_id)
                                        // ->where('examdetail_id', $examdetail->subject_id)
                                        ->first() 
                                            ;
                                }
                            @endphp
                            <div class="relative">
                                <input type="number"
                                    
                                    placeholder="{{ isset($test_marks) && $test_marks->marks == -999 ? 'AB' : 'Number' }}"

                                    min="0" max="{{ $examdetail->full_mark }}"
                                    class="pl-10 pr-4 w-48 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    {{-- {{  isset($test_marks) && ($test_marks->marks == -999) ? 'disabled' : '' }} --}}

                                    wire:model.debounce.250ms="formativeMarks.{{ $studentcr->id }}-{{ $examdetail->subject_id }}"                                    
                                    oninput="if (this.value < 0 || this.value > {{ $examdetail->full_mark }}) this.value ='';"
                                    />

                                    <input type="checkbox"                                         
                                        wire:model.debounce.250ms="formativeAbsentMarks.{{ $studentcr->id }}-{{ $examdetail->subject_id }}"
                                        class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500" 
                                        {{-- {{  isset($test_marks) && ($test_marks->marks == -999) ? 'checked' : '' }} --}}
                                    >
                            </div>
                                
                            {{-- {{$test_marks->studentcr_id ?? 'xx'}}-{{$test_marks->myclasssubject_id ?? 'xx'}}-{{$test_marks->myclasssubject->subject_id ?? 'xx'}}: --}}
                            {{ isset($test_marks) ? ($test_marks->marks == -999 ? 'AB' : $test_marks->marks) : '--' }}

                            {{-- Key:{{ $key}}, Value:{{$value}} --}}
                            {{-- {{ $test->where('myclasssubject_id', $myclassSubjects->where('subject_id', $examdetail->subject_id)->first()->id ) }}<br/> --}}
                    
                            </th>
                    @endforeach
                
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



</div>
