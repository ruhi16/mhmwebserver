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
            Formative Marks Entry Entity for Teachers (Sub-Admin)
            {{-- <span class="text-red-500">Class: {{ $myclassSection->myclass->name }}</span> &
            <span class="text-red-500">Section: {{ $myclassSection->section->name }}</span> --}}
        </div>
    </div>
    <div>
        {{-- {{ $marksentry ?? "No Marks Entered!!" }} --}}
        {{-- {{ 
            ($marksentry->where('studentcr_id', $studentcr->id)->first()->marks ?? false)
            ? ($marksentry->where('studentcr_id', $studentcr->id)->first()->marks < 0 
                ? 'AB' : $marksentry->where('studentcr_id', $studentcr->id)->first()->marks) 
            : ($marksentry->where('studentcr_id', $studentcr->id)->first() == Null ? '--' : 0) 
        }} --}}
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

    {{-- @foreach($examdetails as $examdetail)
        {{ $examdetail->subject->name }}<br/>
    @endforeach --}}
    {{-- {{ explode('-', $key) ?? 'X'}}-- --}}
    {{-- StudentCR:{{ explode('-', $key)[0] ?? 'X' }}<br/>
    Subject:{{ explode('-', $key)[1] ?? 'X' }}
    Marks:{{$value ?? 'X'}}<br/>
    ExamDetail:{{ $examdetail->id ?? 'X'}}<br/>
    ClassSection:{{ $myclassSection->myclass->name ?? 'X'}}<br/>
    ClassSection:{{ $myclassSection->section->name ?? 'X'}}<br/>
    ClassSubject:{{ $myclassSubject->subject->name ?? 'X'}}<br/> --}}
    
    {{-- xx: {{ $this->myclassSubjects->pluck('id') }}
    <br/>
    @foreach($enteredMarks as $enteredMark)
        Marks:{{ $enteredMark }}<br/>
    @endforeach --}}
    
    {{-- @foreach($myclassSubjects as $myclassSubject)
        ss:{{ $myclassSubject }}
    @endforeach --}}
    {{-- @foreach($examdetails as $examdetail)
        {{$examdetail}}
    @endforeach --}}

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
                            <div class="relative">
                                <input type="number"
                                    {{-- placeholder="{{ isset($cbmarks[$studentcr->id]) && $cbmarks[$studentcr->id] ? 'AB' : 'Number' }}" --}}
                                    
                                    min="0" max="{{ $examdetail->full_mark }}"
                                    class="pl-10 pr-4 w-48 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    {{-- {{ 
                                        isset($cbmarks[$studentcr->id]) && $cbmarks[$studentcr->id] ? 'disabled' : ''
                                    }} --}}
                                    wire:model.debounce.250ms="formativeMarks.{{ $studentcr->id }}-{{ $examdetail->subject_id }}"
                                    {{-- wire:model.debounce.250ms="formativeMarks.[{{ $studentcr->id }},{{ $examdetail->subject_id }}]" --}}
                                    oninput="if (this.value < 0 || this.value> {{$examdetail->full_mark}}) this.value ='';"
                                    />
                                    <input type="checkbox" 
                                        {{-- wire:model="formativeAbsentMarks.{{ $studentcr->id }}-{{ $examdetail->subject_id }}" --}}
                                        class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500" />
                            </div>                            
                            {{
                                $this->enteredMarks->where('studentcr_id', $studentcr->id)
                                    ->where('myclasssubject_id', $myclassSubjects->where('subject_id', $examdetail->subject_id)->first()->id)
                                    // ->where('examdetail_id', $examdetail->subject_id)
                                    ->first()->marks 
                                    ?? 'XXX'
                            }}
                            {{-- {{ 
                                ($marksentry->where('studentcr_id', $studentcr->id)->first()->marks ?? false)
                                ? ($marksentry->where('studentcr_id', $studentcr->id)->first()->marks < 0 
                                    ? 'AB' : $marksentry->where('studentcr_id', $studentcr->id)->first()->marks) 
                                : ($marksentry->where('studentcr_id', $studentcr->id)->first() == Null ? '--' : 0) 
                            }} --}}
                        </th>
                    @endforeach
                    {{-- <th class="border border-gray-300 px-4 py-2"></th> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



</div>
