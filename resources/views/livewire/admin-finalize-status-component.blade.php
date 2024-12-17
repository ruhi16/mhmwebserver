<div>
    <div>

        @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>
        @endsection

        <div class="h-fit min-w-full mx-auto">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center " role="tablist">
                    @foreach($exams as $key =>$exam)
                    <li class="me-2 text-bold  {{ $exam_term_active_tab_no == $exam->id ? 'font-extrabold text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500' : 'dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300' }}"
                        role="presentation">
                        <button wire:click="selectExamTermTab('{{ $exam->id }}')"
                            class="inline-block p-4 border-b-2 rounded-t-lg ">{{ $exam->name }}-{{$key}}</button>
                    </li>
                    @endforeach
                </ul>
            </div>

            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                @foreach($myclasses as $myclass)
                <li class="me-2">
                    <div
                        class="inline-block px-4 py-3 rounded-lg cursor-pointer
                                            {{ $myclass_active_tab_no == $myclass->id ? 'text-white bg-blue-600 active':'hover:text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                        <butoon wire:click="selectMyclassTab('{{ $myclass->id }}')"
                            class="inline-block p-2 border-b-2 rounded-t-lg">
                            {{$myclass->name}}
                        </butoon>
                    </div>
                </li>
                @endforeach
            </ul>

            


        </div>
    </div>
    @if($myclass_id)
    <table class="min-w-auto mx-auto my-8 border-collapse border border-gray-600 ">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Exam Type</th>
                <th class="border border-gray-300 px-4 py-2">Subjects</th>
                @foreach ($myclassSections as $myclasssection)
                <th class="border border-gray-300 px-4 py-2">{{ $myclasssection->section->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            
            {{-- Only for Summative Exam, with all its Mode (Oral, Written) options --}}
            @foreach ($examtypes->where('id', '!=', 1) as $examtype)
            
                @foreach ($myclassSubjects->where('examtype_id', $examtype->id) as $myclasssubject)

                    @php
                    $examdetail = $this->examdetials
                        ->where('exam_id', $exam_id)
                        ->where('myclass_id', $myclass_id)
                        ->where('examtype_id', $examtype->id)
                        ->where('subject_id', $myclasssubject->subject->id)
                    @endphp

                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $examtype->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $myclasssubject->subject->name}}({{$myclasssubject->subject->id}})</td>
                        @foreach ($myclassSections as $myclasssection)
                            <td class="border border-gray-300 px-4 py-2">

                                @foreach($exammodes as $exammode)

                                    @if($examdetail->where('exammode_id', $exammode->id)->first() != null &&
                                    $examdetail->where('exammode_id', $exammode->id)->first()->exammode_id == $exammode->id)

                                    {{$exammode->name}}:
                                    
                                    @php
                                    $anscrdist = $answerscriptdistributions                                        
                                        ->where('examtype_id', $examtype->id)
                                        ->where('section_id', $myclasssection->section_id)
                                        ->where('exammode_id', $exammode->id)
                                        ->where('subject_id', $myclasssubject->subject_id)
                                        ->first();
                                    @endphp

                                    <span class="text-red-500 font-bold">
                                        {{-- {{ $anscrdist ? $anscrdist->teacher->name : '--' }} --}}
                                        {{-- {{ $anscrdist ? ($anscrdist->finalize_dt ? 'Finalized ' : '--' ) : 'XX'}} --}}
                                        {{-- {{ $examdetail ? $examdetail->first()->id : 'E' }} --}}
                                        @if($anscrdist)
                                            @if($anscrdist->finalize_dt)
                                            <a href="{{ route('admin.marksentryentity', [
                                                'myclassSection_id' => $myclasssection->id,
                                                'myclassSubject_id' => $myclasssubject->id,
                                                'examdetail_id' => $examdetail->first()->id

                                            ])}}" class="font-bold text-red-600 dark:text-red-500 hover:underline">
                                            Finalized
                                            </a>
                                            @else
                                            --
                                            @endif
                                        @else
                                            X
                                        @endif
                                    </span>
                                    <span class="text-green-500 font-bold">
                                        {{ $anscrdist ? $anscrdist->teacher->nickName : ''}}

                                    </span>
                                    @endif                                
                                @endforeach
                            </td>
                        @endforeach

                    </tr>
                @endforeach
            @endforeach
            
        </tbody>
    </table>
    @endif
</div>