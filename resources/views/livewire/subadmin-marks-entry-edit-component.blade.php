<div class="h-auto min-w-full mx-auto">

    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Edit Marks Entry: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    @endsection

    <div class="min-w-full mx-auto bg-yellow-300 text-center text-4xl font-bold my-4">
        Edit Admin Answer Script Distribution for
        <span class="text-red-500">Class: {{ $myclassSections->myclass->name }}</span> &
        <span class="text-red-500">Section: {{ $myclassSections->section->name }}</span>
        <div class="mt-4">
            <a href="{{ route('admin.marksentry', $myclassSection_id) }}"
               class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 text-base font-medium">
                Back to View Mode
            </a>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if ($message)
    <div class="alert alert-info">
        {{ $message }}
    </div>
    @endif

    <div class="min-w-full mx-auto font-bold text-center">
        ExamDetails (exam, examtype, exammode, myclass, section, school, session, subject, teacher)
    </div>
    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr class="text-sm">
                <th rowspan="2" class="border border-gray-300 px-4 py-2">Sl</th>
                <th rowspan="2" class="border border-gray-300 px-4 py-2">ExamType</th>
                <th rowspan="2" class="border border-gray-300 px-4 py-2">Subject</th>
                @foreach($exams as $exam)
                    <th colspan="4" class="border border-gray-300 px-4 py-2">{{ $exam->name }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach($exams as $exam)
                    <th class="border border-gray-300 px-4 py-2">Mode</th>
                    <th class="border border-gray-300 px-4 py-2">FM</th>
                    <th class="border border-gray-300 px-4 py-2">PM</th>
                    <th class="border border-gray-300 px-4 py-2">Time (min)</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-sm">

            @foreach($myclassSubjects as $myclassSubject)
                <tr class="{{ $myclassSubject->examtype->id == 1 ? 'text-purple-600' : '' }}">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->examtype->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $myclassSubject->subject->name }}</td>

                    @foreach($exams as $exam)
                        @php
                            $examDetails = $this->examDetails
                                ->where('exam_id', $exam->id)
                                ->where('subject_id', $myclassSubject->subject_id);
                        @endphp

                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $examDetail)
                                {{ $examDetail->exammode->name }}<br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $examDetail)
                                <input type="number"
                                       wire:model="editingFullMarks.{{ $examDetail->id }}"
                                       class="w-16 border border-gray-300 px-1 text-center"
                                       min="0"/>
                                
                                <br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $examDetail)
                                <input type="number"
                                       wire:model="editingPassMarks.{{ $examDetail->id }}"
                                       class="w-16 border border-gray-300 px-1 text-center"
                                       min="0"/>
                                <br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($examDetails as $examDetail)
                                <input type="number"
                                       wire:model="editingTime.{{ $examDetail->id }}"
                                       class="w-20 border border-gray-300 px-1 text-center"
                                       min="0"/>
                                {{-- <span> min</span> --}}
                                
                            @endforeach
                            <button type="button"
                                    wire:click="updateMarks({{ $examDetail->id }})"
                                    class="ml-1 px-2 py-2 bg-blue-500 text-white text-xs rounded hover:bg-blue-700">
                                Update
                            </button>
                        </td>

                    @endforeach
                </tr>

            @endforeach

        </tbody>
    </table>

</div>
