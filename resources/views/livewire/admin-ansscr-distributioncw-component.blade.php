<div>
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
                Admin Answer Script Distribution <span class="text-red-500">Exam: {{ $exam->name }} </span> wise
                <span class="text-red-500">Class: {{ $myclass->first()->name }}</span>
            </div>

            {{-- message: --}}
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

           

            <table class="min-w-auto mx-auto border-collapse border border-gray-600 ">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>
                        <th class="border border-gray-300 px-4 py-2">Exam Type</th>
                        <th class="border border-gray-300 px-4 py-2">Subjects</th>
                        @foreach ($myclasssections as $myclasssection)
                            <th class="border border-gray-300 px-4 py-2">{{ $myclasssection->section->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    {{-- Only for Summative Exam, with all its Mode (Oral, Written) options --}}
                    @foreach ($examtypes->where('id', '!=', 1) as $examtype)
                    {{-- @foreach ($examtypes as $examtype) --}}
                        @foreach ($myclasssubjects->where('examtype_id', $examtype->id) as $myclasssubject)
                        
                        @php 
                            $examdetail = $examdetails                                
                                ->where('examtype_id', $examtype->id)                                
                                ->where('subject_id', $myclasssubject->subject->id)
                        @endphp

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $examtype->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $myclasssubject->subject->name}}({{$myclasssubject->subject->id}})</td>
                            

                            @foreach ($myclasssections as $myclasssection)
                                <td class="border border-gray-300 px-4 py-2">
                                    
                                    @foreach($exammodes as $exammode)
                                        
                                        @if($examdetail->where('exammode_id', $exammode->id)->first() != null && 
                                            $examdetail->where('exammode_id', $exammode->id)->first()->exammode_id == $exammode->id)
                                             
                                            {{$exammode->name}}: 
                                                {{--
                                                FM:{{$examdetail->where('exammode_id', $exammode->id)->first()->full_mark }}
                                                PM:{{$examdetail->where('exammode_id', $exammode->id)->first()->pass_mark }}
                                                TM:{{$examdetail->where('exammode_id', $exammode->id)->first()->time_alloted }}
                                                exdetail_id:{{$examdetail->where('exammode_id', $exammode->id)->first()->id }}
                                                exdetail_subj_id:{{$examdetail->where('exammode_id', $exammode->id)->first()->subject_id }} --}}

                                                @php
                                                    $anscrdist = $answerscriptdistributions
                                                        ->where('examtype_id', $examtype->id)
                                                        ->where('section_id', $myclasssection->section_id)
                                                        ->where('exammode_id', $exammode->id)
                                                        ->where('subject_id', $myclasssubject->subject_id)
                                                        ->first()

                                                @endphp
                                                <span class="text-red-500 font-bold">
                                                    {{ $anscrdist ? $anscrdist->teacher->name : '--' }}
                                                </span>
                                            {{-- {{$exam->details}}- {{ $examtype->name }}- {{ $myclasssection->section->name }} --}}
                                            <button
                                                wire:click="showModal({{ $myclasssection->section_id }}, {{ $myclasssubject->subject_id }}, {{ $examtype->id }}, {{ $exammode->id }})"
                                                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                Teacher
                                            </button>    
                                            
                                            {{-- {{ $myclasssection->myclass->name }} --}}
                                            {{-- {{ $myclasssection->section->name }} --}}
                                            {{-- {{ $myclasssubject->subject->id }} --}}
                                            <br/>    
                                        
                                        @endif                                
                                    @endforeach
                                </td>
                            @endforeach

                        </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>


            {{-- Modal for Class-Section: Teacher Selection --}}
            <div class=" {{ $showModal ? '' : 'hidden' }}">
                <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
                    id="modal" aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
                    <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                        {{-- Title & Close Button --}}
                        <div class="flex justify-between items-center mb-4">

                            <h3 class="text-lg font-bold">
                                For Exam Class Section Subject > Teacher Selection
                            </h3>

                            <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                                <svg width="25" height="25" viewbox="0 0 40 40">
                                    <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <form class="max-w-sm mx-auto" wire:submit.prevent="saveChanges">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-2 mb-6">
                                        <label for="exam"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Exam</label>
                                        <input type="text" id="exam"
                                            value="{{ $exam->where('id', $exam_id)->first()->name ?? 'NA' }}" {{--
                                            wire:model="selectedClass" --}}
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled readonly>
                                    </div>

                                    <div class="col-span-2 mb-6">
                                        <label for="myclass"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Class</label>
                                        <input type="text" id="myclass" value="{{ $myclass->first()->name ?? 'NA' }}"
                                            {{-- wire:model="selectedClass" --}}
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled readonly>
                                    </div>

                                    <div class="col-span-2 mb-6">
                                        <label for="section"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Section</label>
                                        <input type="text" id="section"
                                            value="{{ $myclasssections->where('section_id', $section_id)->first()->section->name ?? 'NA' }}"
                                            {{-- wire:model="selectedSection" --}}
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled readonly>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-span-2 mb-6">
                                        <label for="myclass"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Subject</label>
                                        <input type="text" id="myclass"
                                            value="{{ $myclasssubjects->where('subject_id', $subject_id)->first()->subject->name ?? 'NA' }}"
                                            {{-- wire:model="selectedClass" --}}
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            disabled readonly>
                                    </div>
                                </div>

                                <div>
                                    <label for="selectedTeacher"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Select
                                        your
                                        teacher</label>
                                    <select id="selectedTeacher" name="selectedTeacher" wire:model="selectedTeacher"
                                        class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Select One</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{ $teacher->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('selectedTeacher')
                                    <span class="text-red-500 mb-6">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex justify-end">
                                    <button type="button"
                                        class="text-white mb-2 mr-4 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        wire:click="closeModal">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="text-white mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
</div>