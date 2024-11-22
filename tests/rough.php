<div class="grid md:grid-cols-3 auto-rows-[210px] gap-4">

                    <div
                        class="relative flex flex-col my-6 cursor-pointer bg-yellow-100 hover:bg-yellow-200 shadow-sm border border-slate-200 rounded-lg w-96">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-ellipsis line-clamp-1">
                                Website Review Check Update from Our Team in San Francisco
                            </h5>
                            <p class="text-slate-600 leading-normal font-light line-clamp-2">
                                The place is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place
                                is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place is close
                                to Barceloneta Beach.
                            </p>
                        </div>
                        <div class="mx-3 border-t border-slate-200 pb-3 pt-2 px-1">
                            <span class="text-sm text-slate-600 font-medium">
                                Last updated: 4 hours ago
                            </span>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col my-6 cursor-pointer bg-yellow-100 hover:bg-yellow-200 shadow-sm border border-slate-200 rounded-lg w-96">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-ellipsis line-clamp-1">
                                Website Review Check Update from Our Team in San Francisco
                            </h5>
                            <p class="text-slate-600 leading-normal font-light line-clamp-2">
                                The place is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place
                                is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place is close
                                to Barceloneta Beach.
                            </p>
                        </div>
                        <div class="mx-3 border-t border-slate-200 pb-3 pt-2 px-1">
                            <span class="text-sm text-slate-600 font-medium">
                                Last updated: 4 hours ago
                            </span>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col my-6 cursor-pointer bg-yellow-100 hover:bg-yellow-200 shadow-sm border border-slate-200 rounded-lg w-96">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-ellipsis line-clamp-1">
                                Website Review Check Update from Our Team in San Francisco
                            </h5>
                            <p class="text-slate-600 leading-normal font-light line-clamp-2">
                                The place is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place
                                is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place is close
                                to Barceloneta Beach.
                            </p>
                        </div>
                        <div class="mx-3 border-t border-slate-200 pb-3 pt-2 px-1">
                            <span class="text-sm text-slate-600 font-medium">
                                Last updated: 4 hours ago
                            </span>
                        </div>
                    </div>

                    <div
                        class="relative md:col-span-2 flex flex-col my-6 cursor-pointer bg-purple-100 hover:bg-purple-200 shadow-sm border border-slate-200 rounded-lg min-w-96">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-ellipsis line-clamp-1">
                                Website Review Check Update from Our Team in San Francisco
                            </h5>
                            <p class="text-slate-600 leading-normal font-light line-clamp-2">
                                The place is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place
                                is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place is close
                                to Barceloneta Beach.
                            </p>
                        </div>
                        <div class="mx-3 border-t border-slate-200 pb-3 pt-2 px-1">
                            <span class="text-sm text-slate-600 font-medium">
                                Last updated: 4 hours ago
                            </span>
                        </div>
                    </div>

                    <div
                        class="relative flex flex-col my-6 cursor-pointer bg-yellow-100 hover:bg-yellow-200 shadow-sm border border-slate-200 rounded-lg w-96">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-ellipsis line-clamp-1">
                                Website Review Check Update from Our Team in San Francisco
                            </h5>
                            <p class="text-slate-600 leading-normal font-light line-clamp-2">
                                The place is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place
                                is close to Barceloneta Beach. The place is close to Barceloneta Beach. The place is close
                                to Barceloneta Beach.
                            </p>
                        </div>
                        <div class="mx-3 border-t border-slate-200 pb-3 pt-2 px-1">
                            <span class="text-sm text-slate-600 font-medium">
                                Last updated: 4 hours ago
                            </span>
                        </div>
                    </div>
                </div>















<table class="min-w-auto mx-auto my-8 border-collapse border border-gray-600 ">
            <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
                Teacher wise answer script distribution link xx
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
                        $teachersAnswerScripts = $answerscriptdistributions->where('teacher_id', $teacher->id)->sortBy('exam_id');  
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
                                    <td class="border border-gray-300 px-4 py-2 font-bold {{ $teachersAnswerScript->exam->id == 1 ? 'text-lime-600' : ($teachersAnswerScript->exam->id == 2 ? 'text-blue-600' : 'text-red-600') }}">
                                        {{ $teachersAnswerScript->exam->name }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $teachersAnswerScript->myclass->name }}-{{
                                        $teachersAnswerScript->section->name }}:
                                        {{ $teachersAnswerScript->subject->code }}-{{
                                        $teachersAnswerScript->exammode->name }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">

                                        @if(auth()->user()->role_id == 2) {{-- Teacher, Sub-Admin --}}
                                        <a class="{{ $teachersAnswerScript->exammode->name == 'Oral' ? 'bg-red-500 hover:bg-red-700 ' : 'bg-violet-500 hover:bg-violet-700 '}} text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('subadmin.marksentryentity', [
                                                    'myclassSection_id' => $clssec_id->id, 
                                                    'myclassSubject_id' => $clssub_id->id, 
                                                    'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                ]) }}">
                                            {{ $teachersAnswerScript->finalize_dt ? 'Finalized': $teachersAnswerScript->exammode->name . ' Entry' }}
                                        </a>
                                        @elseif(auth()->user()->role_id == 3) {{-- Admin --}}
                                            {{-- @if($teachersAnswerScript->finalize_dt == null)
                                            <a class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('admin.marksentryentity', [
                                                        'myclassSection_id' => $clssec_id->id, 
                                                        'myclassSubject_id' => $clssub_id->id, 
                                                        'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                    ]) }}">
                                                Marks
                                            </a>
                                            @endif --}}
                                            @if($teachersAnswerScript->finalize_dt == null)

                                                <a class="{{$teachersAnswerScript->exammode->name == 'Oral' ? 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' : 'bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded'}} bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                                    href="{{ route('admin.marksentryentity', [
                                                            'myclassSection_id' => $clssec_id->id, 
                                                            'myclassSubject_id' => $clssub_id->id, 
                                                            'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                        ]) }}">
                                                    {{$teachersAnswerScript->exammode->name}}-Marks
                                                </a>
                                            @else
                                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('admin.marksentryentity', [
                                                        'myclassSection_id' => $clssec_id->id, 
                                                        'myclassSubject_id' => $clssub_id->id, 
                                                        'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                    ]) }}">                                                    
                                                    <span class="text-white font-bold ">Finalized</span>
                                                </a>
                                                
                                            @endif
                                        @endif
                                    </td>
                                    {{-- <td class="border border-gray-300 px-4 py-2">
                                        {{ $teachersAnswerScript->finalize_dt ? 'Finalized': '--' }}

                                    </td> --}}

                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(auth()->user()->role_id == 3 && $teachersAnswerScript->finalize_dt != null)
                                        {{-- Admin --}}
                                        <button
                                            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
                                            wire:click="adminUnfinalizeMarksEntry({{ $teachersAnswerScript->id }})">
                                            Un-Finalize
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                        @endif
                        {{-- <a href=""
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enter
                            Marks</a> --}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
