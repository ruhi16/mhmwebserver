<div>
<div class="max-w-full mx-8">

    <div class="flex flex-row items-start gap-2 my-4">

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
                    <td class="px-6 py-4"> --}}

                    </td>
                </tr>
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
                            {{ json_encode($hs_studentcr) ?? 'x' }}
                        </th>
                        <td class="px-6 py-4">
                            
                            <b>{{ $hs_studentcr->name ?? 'X' }}</b> <br />Reg No:{{ $hs_studentcr->registration_no ??
                            'X'}}
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

        
    </div>
    <div class="flex justify-start">
        @foreach($hs_res_studentcrs as $hs_res_studentcr)
        SCR:{{ $hs_res_studentcr->id }}, SDB:{{ $hs_res_studentcr->hsStudentdb->id }}-{{ $hs_res_studentcr->hsStudentdb->name }}<br/>
            {{-- {{ json_encode($hs_res_studentcr->hsStudentdb->hsSubjects) }}<br/> --}}
            @foreach($hs_res_studentcr->hsStudentdb->hsSubjects as $hsSubject)
                {{ json_encode($hsSubject->hsSubject->name) }}
                {{ json_encode($hs_res_marksentries->where('hs_student_cr_id', $hs_res_studentcr->id)->where('hs_subject_id', $hsSubject->hsSubject->id) ) ??  'X' }}
                
                {{-- {{ json_encode($hsSubject->hsMarksentries)  }} --}}

                <br/>
            @endforeach

        @endforeach
    </div>

</div>