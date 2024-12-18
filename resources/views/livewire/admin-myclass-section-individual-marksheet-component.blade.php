<div>
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Class Section Individual Marksheet: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name))
        }}
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

    {{-- <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
        Class: {{ $myclassSection->myclass->name }} - Section: {{ $myclassSection->section->name }}<br />
        Student Name:{{ $studentcr->where('id', $studentcr_id)->first()->studentdb->name }}
    </div> --}}

    <div class="min-w-full mx-auto m-8 p-4">
        <button type="button" wire:click="generatePDF" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Marksheet PDF</button>
        <button onclick="openUprMarksheetPdfInNewTab({{$myclassSection->id}},{{$studentcr->id}})" class="focus:outline-none text-white bg-violet-400 hover:bg-violet-500 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-violet-900">Open Upr Marksheet PDF</button>
        <button onclick="openSecMarksheetPdfInNewTab()" class="focus:outline-none text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-orange-900">Open Sec Marksheet PDF</button>
        
        <table class="min-w-full ">
            <thead>
                <tr>
                    <th class="py-3 px-6 text-lg border border-gray-300 font-extrabold tracking-wider text-left text-gray-700 uppercase bg-gray-50">
                        Student Name: {{ $studentcr->studentdb->name }}<br/>Student Id: {{ $studentcr->studentdb->studentid }}<br/>
                        Class: {{ $studentcr->myclass->name }} - Section: {{ $studentcr->section->name }} - Roll No: {{ $studentcr->roll_no }}
                    </th>
                    <th class="py-3 px-6 text-lg border border-gray-300 font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50">
                        
                    </th> 
                </tr>
            </thead>
            <thead>

                <tr>
                    <th
                        class="py-3 px-6 text-lg border border-gray-300 font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50">
                        Formative
                    </th>
                    <th
                        class="py-3 px-6 text-lg border border-gray-300 font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50">
                        Summative
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td
                        class="py-3 px-6 text-lg font-extrabold  tracking-wider border border-gray-300 text-center text-gray-700 uppercase bg-gray-50">
                        <table class="min-w-full mx-auto">
                            <thead>
                                <tr>
                                    <th
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Subject
                                    </th>
                                    @php $for_fm_total = 0; @endphp
                                    @foreach($exams as $exam)
                                    <th
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $exam->name }}<br/>
                                        FM:{{ $examDetails->where('examtype_id', 1)->where('exam_id', $exam->id)->first()->full_mark }}
                                        @php $for_fm_total += $examDetails->where('examtype_id', 1)->where('exam_id', $exam->id)->first()->full_mark ?? 0; @endphp
                                    </th>
                                    @endforeach
                                    <th
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grand Total<br/>
                                        FM:{{ $for_fm_total }}
                                    </th>

                                    <th
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grade
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myclassSubjects->where('examtype_id', 1) as $myclassSubject)
                                <tr>
                                    <td
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $myclassSubject->subject->code }}
                                    </td>
                                    @foreach($exams as $exam)
                                    <td
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        @php
                                            $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id',
                                            $myclassSubject->subject->id)->first()->id;
                                        @endphp
                                        {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks ?? 'X'}}
                                    </td>
                                    @endforeach
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)->sum('marks') ?? 'X' }}
                                        /{{ $examDetails->where('examtype_id', 1)->where('subject_id', $myclassSubject->subject_id)->sum('full_mark') }}
                                    </td>
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        @php 
                                            $for_ob_marks = $markEntries->where('myclasssubject_id', $myclassSubject->id)->where('marks', '>=', '0')->sum('marks');
                                            $for_fl_marks = $examDetails->where('examtype_id', 1)->where('subject_id', $myclassSubject->subject_id)->sum('full_mark');
                                            $for_percentage = ($for_ob_marks / $for_fl_marks) * 100;
                                            $for_percentage = round($for_percentage, 0);
                                            $for_percentage = $for_percentage >= 0 ? $for_percentage : 0;
                                            $for_grade = $grades->where('examtype_id', 1)
                                                ->where('stpercentage', '<=', $for_percentage)
                                                ->where('enpercentage', '>=', $for_percentage)
                                                ->first()->gradeparticular->name
                                        @endphp

                                        {{ $for_grade ?? 'X' }}
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td
                        class="py-3 px-6 text-lg font-extrabold tracking-wider border border-gray-300 text-center text-gray-700 uppercase bg-gray-50">
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
                                        Percentage
                                    </th>

                                    <th class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50  border border-gray-300">
                                        Grade
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $grandTotal = 0;
                                    $grandTotalFM = 0;
                                    $total_d_counts = 0;
                                    $active_subject_ids = $myclassSubjects->where('examtype_id', 2)->where('is_additional', 0)->pluck('id');
                                @endphp
                                @foreach($myclassSubjects->where('examtype_id', 2) as $myclassSubject)
                                <tr>
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $myclassSubject->subject->code }}
                                        <br />
                                        <span class="text-xs">{{ $myclassSubject->is_additional > 0 ? '(Additional)' : '' }}</span>
                                    </td>

                                    @foreach($exams as $exam)
                                    <td
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        @php
                                            $examDetail_id = $examDetails->where('exam_id', $exam->id)->where('subject_id',
                                            $myclassSubject->subject->id)->first()->id;
                                        @endphp
                                        @if($markEntries->where('examdetail_id', $examDetail_id)->first())
                                            
                                            @if( $markEntries->where('examdetail_id', $examDetail_id)->first()->marks >= 0)
                                                {{ $markEntries->where('examdetail_id', $examDetail_id)->first()->marks}}
                                                @php 
                                                    $grandTotal += $markEntries->where('examdetail_id',
                                                    $examDetail_id)->first()->marks; 
                                                @endphp
                                            @else
                                                <span class="text-red-500">AB</span>
                                            @endif

                                        @else
                                            <span class="text-green-500">NA</span>
                                        @endif
                                        /{{ $examDetails->where('id', $examDetail_id)->first()->full_mark ?? 'X' }}
                                    </td>
                                    @endforeach
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $markEntries->where('myclasssubject_id', $myclassSubject->id)
                                            ->where('marks', '>=', '0')->sum('marks') ?? 'X' }}
                                        
                                        /{{ $examDetails->where('examtype_id', 2)
                                            ->where('subject_id', $myclassSubject->subject_id)
                                            ->sum('full_mark') ?? 'X' }}

                                        @php
                                        if($myclassSubject->is_additional == 0) {
                                            $grandTotalFM += $examDetails->where('examtype_id', 2)
                                                ->where('subject_id', $myclassSubject->subject_id)
                                                ->sum('full_mark');
                                        }
                                        @endphp
                                        {{-- -{{ $myclassSubjects->where('examtype_id', 2)->where('is_additional',
                                        0)->pluck('id') ?? 'X' }} --}}
                                    </td>
                                    @php
                                        $ob_marks = $markEntries->where('myclasssubject_id', $myclassSubject->id)->where('marks', '>=', '0')->sum('marks');
                                        $fl_marks = $examDetails->where('examtype_id', 2)
                                            ->where('subject_id',$myclassSubject->subject_id)
                                            ->sum('full_mark');
                                        $percentage = ($ob_marks / $fl_marks) * 100;
                                        $percentage = round($percentage, 0);
                                        $percentage = $percentage >= 0 ? $percentage : 0;
                                        if($percentage < 25) {
                                            $total_d_counts++;
                                        }

                                    @endphp

                                    <td
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $percentage }}%
                                    </td>
                                    <td
                                        class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $grades->where('examtype_id', 2)
                                            ->where('stpercentage', '<=', $percentage)
                                            ->where('enpercentage', '>=', $percentage)
                                            ->first()->gradeparticular->name ?? 'X' }}

                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        Grand Total<br/>
                                        {{ $this->numberToWords($grandTotal) }}
                                    </td>
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $grandTotal >= 0 ? $grandTotal : 'AB' }}/{{ $grandTotalFM }} 
                                        {{-- have to ninus additional subjects fm --}}
                                    </td>
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        {{ $grandTotal >= 0 ? round(($grandTotal / $grandTotalFM) * 100, 0).'%' : 'AB' }}
                                    </td>
                                    <td class="py-3 px-6 text-lg font-extrabold tracking-wider text-center text-gray-700 uppercase bg-gray-50 border border-gray-300">
                                        D's: {{ $total_d_counts >= 0 ? $total_d_counts : 'AB' }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


    {{-- @foreach($markEntries as $markEntry)
    @if($markEntry->examdetail->examtype_id == 1)
    {{ $markEntry->examdetail->subject->code ?? 'X' }}<br />
    @endif
    @endforeach --}}









    <script>
        function openUprMarksheetPdfInNewTab(myclassSection_id, studentcr_id) {
            window.open('{{route('livewire.generate-upr-marksheetpdf', [
                'myclassSection_id' => $myclassSection->id,
                'studentcr_id' => $studentcr->id,
            ])}}', '_blank');
        }

        function openSecMarksheetPdfInNewTab() {
            window.open('{{ route('livewire.generate-sec-marksheetpdf') }}', '_blank');
        }
    </script>
</div>