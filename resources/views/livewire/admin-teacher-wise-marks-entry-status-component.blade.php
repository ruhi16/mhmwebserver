
<div>    
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    
    @endsection

    <div class="h-fit min-w-full p-4">      
            
        {{-- <div class="mx-auto grid grid-cols-4 gap-4 items-center justify-center">
        @foreach ($teachers as $teacher)
            <div >
                <div class="w-48 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">                
                    <div class="flex flex-row items-center pb-2">
                        <img class="w-16 h-16 m-2 rounded-full shadow-lg" src="https://images.pexels.com/photos/5384445/pexels-photo-5384445.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Profile Image"/>
                        <div class="flex flex-col justify-end">
                            <h5 class="text-sm font-bold line-clamp-1 text-gray-900 dark:text-white">{{ $teacher->name }}</h5>   
                            <h3 class="text-xs line-clamp-1 text-gray-900 dark:text-white">{{ $teacher->subject->name }}</h3>             
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div> --}}

        <label for="selectedTeacher" class="block mb-2 text-xl font-extrabold text-gray-900 dark:text-white">Select Teacher Name</label>
        <select id="selectedTeacher" wire:model.live="teacherId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Select One</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{$teacher->id}}-{{ $teacher->name }}</option>
            @endforeach
            <option value="-99">All Teachers at once</option>
        </select>

        @if( !$this->teacherId )
        <div class="p-4 m-4 text-bold text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Info alert!</span> Select a Teacher, to get its information.
        </div>
        
        @elseif( $this->teacherId && $selectedTeacher )

            <table class="min-w-auto mx-auto my-8 border-collapse border border-gray-600 ">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>
                        <th class="border border-gray-300 px-4 py-2">Teacher Name</th>                        
                        <th class="border border-gray-300 px-4 py-2">Action</th>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $selectedTeacher->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$selectedTeacher->id}}-{{ $selectedTeacher->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @php
                                $teachersAnswerScripts = $answerscriptdistributions->where('teacher_id', $selectedTeacher->id)->sortBy('exam_id');
                            @endphp
                            
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
                                            <a class="{{ $teachersAnswerScript->exammode->name == 'Oral' ? 'bg-red-500 hover:bg-red-700 ' : 'bg-violet-500 hover:bg-violet-700 '}} text-white font-bold py-2 px-4 rounded"
                                                href="{{ route('admin.marksentryentity', [
                                                        'myclassSection_id' => $clssec_id->id, 
                                                        'myclassSubject_id' => $clssub_id->id, 
                                                        'examdetail_id' => $teachersAnswerScript->examdetail_id
                                                    ]) }}">
                                                {{ $teachersAnswerScript->finalize_dt ? 'Finalized xx': $teachersAnswerScript->exammode->name . ' Entry' }}
                                            </a>
                                        </td>
                                        
                                        @if(auth()->user()->role_id == 3)
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
                                        @endif

                                    </tr>
                                    @endforeach                                    
                                </thead>
                            </table>
                            @endif
                        
                        </td>
                    </tr>
                </tbody>

            </table>

        @endif
    </div>
</div>

