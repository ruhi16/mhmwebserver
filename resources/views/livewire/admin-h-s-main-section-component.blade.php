<div>
<div class="max-w-full mx-8">

    {{-- <div class="flex flex-row items-start gap-2 my-4"> --}}

        {{--<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Sl
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student Name, DOB & Registration
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Father Name & Mother Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class-Section-Roll & Semester
                    </th>


                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hs_studentdbs as $studentdb)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Name: <b>{{ $studentdb->name }}</b><br />
                        Date of Birth:{{ $studentdb->dob }}<br />
                        Registration No:{{ $studentdb->registration_no }}
                    </th>
                    <td class="px-6 py-4">
                        Father Name: <b>{{ $studentdb->fname }}</b><br />
                        Mother Name: <b>{{ $studentdb->mname }}</b>
                    </td>
                    <td class="px-6 py-4">
                        {{ $studentdb->hsClass->name ?? 'x' }}-
                        {{ $studentdb->hsSection->name ?? 'x' }}-
                        {{ $studentdb->roll_no ?? 'x' }}
                    </td>
                    <td class="px-6 py-4">

                        @foreach($studentdb->hsSubjects as $hsSdbSubject)
                        {{ $hsSdbSubject->hsSubject->name ?? 'x' }}<br />
                        @endforeach
                    </td>
                    <td class="px-6 py-4">

                    </td>
                    <td class="px-6 py-4">
                        <a href="javascript:void(0)" wire:click="edit({{ $studentdb->id }})"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>--}}

        <table class="min-w-1/3 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Sl</th>
                    <th scope="col" class="px-6 py-3">Class-Semester</th>
                    <th scope="col" class="px-6 py-3">Exam Name</th>
                    <th scope="col" class="px-6 py-3">Subject Details</th>
                    {{-- <th scope="col" class="px-6 py-3">Class-Section-Roll & Semester</th> --}}
                    {{-- <th scope="col" class="px-6 py-3">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($hs_classes as $hs_class)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                </tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $hs_class->name ?? 'x' }}-{{ $hs_class->semester ?? 'x' }}
                </th>
                <td class="px-6 py-4">

                    @foreach($hs_class->hsExamNames as $hsExamName)
                    {{ $hsExamName->name ?? 'x' }}
                    {{ $hsExamName->hsExamDetails ?? 'x' }}
                    @foreach($hsExamName->hsExamDetails as $hsExamDetail)
                    {{ $hsExamDetail->hsExamMode->name ?? 'x' }}
                    {{ $hsExamDetail->hsSubjectType->name ?? 'x' }}
                    {{ $hsExamDetail->hsSubjectType->hsSubjects ?? 'x' }}
                    @endforeach
                    @endforeach
                </td>
                <td class="px-6 py-4">

                </td>
                </tr>
                @endforeach --}}
                <div class="flex">
                    <div>
                        <label for="selectedHsClassSemester" class="block mb-2 text-xl font-extrabold text-gray-900 dark:text-white">Select HS Class-Semester: {{ $hsClassId }}-{{ $hsClassIdMessage }}</label>
                        <select id="selectedHsClassSemester" wire:model.live="hsClassSemesterId" class="block w-1/4 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value={{ null }}>Select One</option>
                            @foreach($hsClassSemesters as $hsClassSemester)
                                <option value="{{ $hsClassSemester->id }}">{{$hsClassSemester->hsClass->name}}-{{ $hsClassSemester->hsSemester->name }}</option>
                            @endforeach                    
                        </select>
                    </div>
                    {{-- <div>
                        <label for="selectedHsClassSemester" class="block mb-2 text-xl font-extrabold text-gray-900 dark:text-white">Select HS Class-Semester: {{ $hsClassId }}-{{ $hsClassIdMessage }}</label>
                        <select id="selectedHsClassSemester" wire:model.live="hsClassId" class="block w-1/4 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value={{ null }}>Select One</option>
                            @foreach($hsClassSemesters as $hsClassSemester)
                                <option value="{{ $hsClassSemester->id }}">{{$hsClassSemester->hsClass->name}}-{{ $hsClassSemester->hsSemester->name }}</option>
                            @endforeach                    
                        </select>
                    </div> --}}
                </div>

                @foreach($hs_exam_details as $hs_exam_detail)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}-ED:{{ $hs_exam_detail->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $hs_exam_detail->hsExamName->hsClass->name ?? 'x' }}-{{ $hs_exam_detail->hsExamName->hsSemester->name ?? 'x' }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $hs_exam_detail->hsExamName->name ?? 'x' }}-{{ $hs_exam_detail->hsExamMode->name ?? 'x' }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $hs_exam_detail->hsSubjectType->name ?? 'x' }}:Subject Id:{{ $selectedHsSubjectId ??
                        'NA'}}<br />
                        @foreach($hs_exam_detail->hsSubjectType->hsSubjects as $hs_subject)
                        <a wire:click="changeSelectedHsSubjectId({{ $hs_subject->id }}, {{ $hs_exam_detail->id }})"
                            class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer hover:underline">{{
                            $hs_subject->name ?? 'XXX' }}</a>,
                        @endforeach
                    </td>
                    {{-- <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"> </td>--}}

                @endforeach
            </tbody>
        </table>

        <div class="min-w-2/3 mx-auto flex flex-col items-center">
            Exam Detail ID: {{ $examDetailId ?? 'NA' }}, 
            Class Id: {{ $hs_exam_details->find($examDetailId)->hsExamName->hsClass->name ?? 'NA' }}, 
            Semester Id: {{ $hs_exam_details->find($examDetailId)->hsExamName->hsSemester->name ?? 'NA' }}, <br/>
            Subject Id: {{ $hs_subjects->where('id', $selectedHsSubjectId)->first()->name ?? 'NA' }},


            {{-- Subject Id: {{ $hs_exam_details->find($examDetailId)->hsSubjectType->hsSubjects->find($selectedHsSubjectId)->name ?? 'NA' }}, --}}

            {{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="col" class="px-6 py-3 border-l-2 border-gray-300">Sl</th>
                        <th scope="col" class="px-6 py-3">Student Name</th>
                        <th scope="col" class="px-6 py-3">Exam Name <br />Semester - Mode<br />Subject - FM</th>
                        <th scope="col" class="px-6 py-3">Marks</th>
                        <th scope="col" class="px-6 py-3">Gress</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                    </tr>
                </thead>
            </table> --}}


            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Sl</th>
                        <th scope="col" class="px-6 py-3">Student Name</th>
                        <th scope="col" class="px-6 py-3">Exam Name <br />Semester - Mode<br />Subject - FM</th>
                        <th scope="col" class="px-6 py-3">Marks</th>
                        <th scope="col" class="px-6 py-3">Gress</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody>
                @if($selectedHsSubjectId != null)
                    @foreach($hs_Studentcrs as $hs_studentcr) 
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                            SCR:{{ $hs_studentcr->id ?? 'x' }}, SDB:{{ $hs_studentcr->hs_studentdb_id ?? 'x' }}, 
                            {{-- {{ json_encode($hs_studentcr) ?? 'x' }} --}}
                        </th>
                        <td class="px-6 py-4">
                            
                            <b>{{ $hs_studentcr->hsStudentDb->name ?? 'N' }}</b> <br />Reg No:{{ $hs_studentcr->hsStudentDb->registration_no ?? 'M'}}
                            Subject Id:{{ $selectedHsSubjectId ?? 'NA'}}
                        </td>
                        
                        <td class="px-6 py-4"> {{ $hs_studentcr->id ?? 'x' }}</td>

                        <td class="px-6 py-4">
                            <input type="number" min="0" max="500"
                                class="border border-gray-300 px-4 py-2 w-32 rounded-md"                                
                                wire:model.debounce.250ms="marks.{{$hs_studentcr->id}}" />                            
                        </td>
                        
                        <td class="px-6 py-4">{{ $marks[$hs_studentcr->id] ?? 'X'}}</td>
                        <td class="px-6 py-4"></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        
    {{-- </div> --}}

    <button wire:click="generatePDF" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">generate PDF</button>
    <div class="">
        <div class="flex flex-wrap gap-4 overflow-x-auto py-4">

            @foreach($hs_res_studentcrs as $hs_res_studentcr)
            <table class="min-w-fit gap-2 text-xs border border-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th colspan="1" class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            SL: {{ $loop->iteration }}, SCR: {{ $hs_res_studentcr->id }}, SDB: {{ $hs_res_studentcr->hs_studentdb_id }}
                        </th>
                        <th colspan="3" class="px-2 py-1 text-left font-bold text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            {{ $hs_res_studentcr->hsStudentDb->name }}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="1" class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Reg. No
                        </th>
                        <th colspan="3" class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            {{ $hs_res_studentcr->hsStudentDb->registration_no }}
                        </th>
                    </tr>
                    
                </thead>  




                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">Subject</th>
                        <th class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">Sem 1</th>
                        <th class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">Sem 2</th>
                        <th class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">Proj/Prac</th>
                    </tr>
                </thead>


                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-800">
                    @foreach($hs_res_studentcr->hsStudentdb->hsSubjects as $hsSubject)
                        <tr>
                            <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800"> {{ $hsSubject->hsSubject->name }}</td>

                            @foreach($hs_exam_details2->where('hs_subject_type_id', $hsSubject->hsSubject->hsSubjectType->id) as $exam_detail)        
                                <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800">
                                    {{ $hs_res_studentcr->hsMarksentries
                                        ->where('hs_subject_id', $hsSubject->hsSubject->id)
                                        ->where('hs_exam_detail_id', $exam_detail->id)
                                        ->first()->obtain_marks ?? '-'
                                    }}
                                </td>
                                
                            @endforeach
                            {{-- <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800">
                                <span class="px-1 inline-flex leading-5 font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                            </td> --}}
                            
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>

            
            @endforeach
          </div>
        
        
    
        {{-- @foreach($hs_res_studentcrs as $hs_res_studentcr)
            SCR:{{ $hs_res_studentcr->id }}, SDB:{{ $hs_res_studentcr->hsStudentdb->id }}-
            {{ $hs_res_studentcr->hsStudentdb->name }} (REG:{{ $hs_res_studentcr->hsStudentdb->registration_no }}) <br/>
            
            
            @foreach($hs_res_studentcr->hsStudentdb->hsSubjects as $hsSubject)                
                    {{ $hsSubject->hsSubject->name }}: ({{ $hsSubject->hsSubject->hsSubjectType->name }}):
                
                <br/>
                @foreach($hs_exam_details2->where('hs_subject_type_id', $hsSubject->hsSubject->hsSubjectType->id) as $exam_detail)
                    {{ $exam_detail->hsExamName->name }}:{{ $exam_detail->hsExamMode->name }}:{{ $exam_detail->hsSubjectType->name }}:

                    {{ $hs_res_studentcr->hsMarksentries
                        ->where('hs_subject_id', $hsSubject->hsSubject->id)
                        ->where('hs_exam_detail_id', $exam_detail->id)
                        ->first()->obtain_marks ?? '-'
                    }}<br/>
                @endforeach
                <br/>
            @endforeach
                
        @endforeach --}}

    </div>

</div>