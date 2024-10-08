<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    <h2>
        Admin: Teacher wise marks entry list
    </h2>
    @endsection


<div class="h-fit min-w-full mx-auto ">
    <table class="min-w-auto mx-auto my-8 border-collapse border border-gray-600 ">
        <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
            Teacher wise answer script distribution link
        </caption>
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Teacher Name</th>
                {{-- <th class="border border-gray-300 px-4 py-2">Subjects</th>
                <th class="border border-gray-300 px-4 py-2">Details</th> --}}
                <th class="border border-gray-300 px-4 py-2">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{$teacher->id}}-{{ $teacher->name }}</td>
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $teacher->subject->name }}</td> --}}

                @php
                    $teachersAnswerScripts = $answerscriptdistributions->where('teacher_id', $teacher->id);
                @endphp
                
                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{ $ansscriptdistribution ?? 'NO'}} --}}
                    

                    @if(count($teachersAnswerScripts) > 0)
                    <table class="min-w-auto mx-auto border-collapse border border-gray-600 ">
                        <thead>
                        @foreach ($teachersAnswerScripts as $teachersAnswerScript)
                            @php
                            $clssec_id = $myclasssections
                            ->where('myclass_id', $teachersAnswerScript->myclass_id)
                            ->where('section_id', $teachersAnswerScript->section_id)
                            ->first();

                            $clssub_id = $myclasssubjects
                            ->where('myclass_id', $teachersAnswerScript->myclass_id)
                            ->where('subject_id', $teachersAnswerScript->subject_id)
                            ->first();
                            @endphp

                            {{-- {{$clssec_id->id}}-{{$clssub_id->id}}-{{$teachersAnswerScript->examdetail_id}} --}}
                            
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-red-600 font-bold">
                                        {{ $teachersAnswerScript->exam->name }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $teachersAnswerScript->myclass->name }}-{{ $teachersAnswerScript->section->name }}:
                                        {{ $teachersAnswerScript->subject->code }}-{{ $teachersAnswerScript->exammode->name }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">

                                        @if(auth()->user()->role_id == 2)   {{-- Teacher, Sub-Admin --}}
                                            <a class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('subadmin.marksentryentity', [
                                                    'myclassSection_id' => $clssec_id->id, 
                                                    'myclassSubject_id' => $clssub_id->id, 
                                                    'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                ]) }}">
                                                Sub-Admin Marks Entry 
                                            </a>
                                        @elseif(auth()->user()->role_id == 3)   {{-- Admin --}}
                                            @if($teachersAnswerScript->finalize_dt == null)
                                            <a class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('admin.marksentryentity', [
                                                    'myclassSection_id' => $clssec_id->id, 
                                                    'myclassSubject_id' => $clssub_id->id, 
                                                    'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                ]) }}">
                                                Admin Marks Entry 
                                            </a>
                                            @else
                                            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('admin.marksentryentity', [
                                                    'myclassSection_id' => $clssec_id->id, 
                                                    'myclassSubject_id' => $clssub_id->id, 
                                                    'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                ]) }}">
                                                Admin Marks Entry 
                                            </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $teachersAnswerScript->finalize_dt ? 'Finalized': 'Not Finalized' }} 
                                        
                                    </td>

                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(auth()->user()->role_id == 3 && $teachersAnswerScript->finalize_dt != null)   {{-- Admin --}}                                    
                                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
                                            wire:click="adminUnfinalizeMarksEntry({{ $teachersAnswerScript->id }})">
                                            Admin Un-Finalize
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </thead>
                </table>
                    @endif
                    {{-- <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enter
                        Marks</a> --}}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>


</div>