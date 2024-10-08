<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- <x-app-layout> --}}
    {{-- <x-slot:header> --}}
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>
        <h2>
            {{-- xxxAdmin Admission Component : {{ $myclssec_id }} --}}
        </h2>
    @endsection
    {{-- </x-slot> --}}
    <div class="min-w-full mx-auto bg-green-300 text-center text-4xl font-bold my-4">
        Admin Answer Script Distribution for <span class="text-red-500">Class: {{ $myclssec->myclass->name }}</span> &
        <span class="text-red-500">Section: {{ $myclssec->section->name }}</span>
    </div>

    <table class="mx-auto border-collapse border border-gray-600 ">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Exam Type</th>
                <th class="border border-gray-300 px-4 py-2">Subjects</th>

                @foreach ($exams as $exam)
                    <th class="border border-gray-300 px-4 py-2">{{ $exam->name }}
                        -{{ $myclasssubjects->where('examtype_id', 2)->count() }}
                    </th>
                    {{-- @foreach ($examtypes as $examtype)
                        <th class="border border-gray-300 px-4 py-2">{{ $examtype->name }}</th>                        
                    @endforeach --}}
                @endforeach

                {{-- <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll</th>
                <th class="border border-gray-300 px-4 py-2">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        <tbody>

            @foreach ($myclasssubjects as $myclasssubject)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $myclasssubject->subject->examtype->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $myclasssubject->subject->name }}-{{ $myclasssubject->examtype_id }}
                    </td>
                    @foreach ($exams as $exam)
                        @php
                            $ansScrDistribution = $answerscriptdistributions
                                ->where('subject_id', $myclasssubject->subject_id)
                                ->where('exam_id', $exam->id)
                                ->where('examtype_id', $myclasssubject->examtype_id)                                     
                        @endphp
                        <th class="border border-gray-300 px-4 py-2">
                            {{-- {{ $exam->name }} --}}

                            @if ($ansScrDistribution->count() > 0)
                                {{-- {{ $ansScrDistribution->count() }}-{{ $ansScrDistribution->first()->teacher->name }} --}}

                                @foreach($ansScrDistribution as $item )
                                <span class="text-red-500">{{ $item->exammode->name }}:</span> {{ $item->teacher->name }}<br/>
                                @endforeach
                            @endif
                            


                        </th>
                    @endforeach

                </tr>
            @endforeach
            {{-- @foreach ($studentdbsNotInStudentcrs as $studentdb)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentdb->myclass->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentdb->section->name }}</td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2">

                        <button wire:click="assignRollNo({{ $studentdb->id }})"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Assign Roll - {{ $studentdb->remarks ?? 'XX' }}
                        </button>
                      
                    </td>
                </tr>
                @endforeach --}}
        </tbody>
        </tbody>
    </table>
</div>
