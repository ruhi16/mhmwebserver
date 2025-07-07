<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
    

    {{-- <div>Promotional Component: {{ $session->name }}</div> --}}
    <table class="max-w-full mx-10 my-6">
        <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
            Promotional Component: Class Section Details, Class: {{ $classSections ? $classSections->myclass->name : '-' }}, Section:{{$classSections ? $classSections->section->name : '-'}} for Session: {{ \App\Models\Session::currentlyActive()->name }}
        </caption>
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">SDB Id</th>
                <th class="border border-gray-300 px-4 py-2">SCR Id</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">C-S-Roll</th>
                {{-- <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll No</th> --}}
                <th class="border border-gray-300 px-4 py-2">Ob Marks</th>
                <th class="border border-gray-300 px-4 py-2">FM</th>
                {{-- <th class="border border-gray-300 px-4 py-2">Perc</th> --}}
                <th class="border border-gray-300 px-4 py-2">D's</th>
                <th class="border border-gray-300 px-4 py-2">Result</th>
                <th class="border border-gray-300 px-4 py-2">Next Class</th>
                <th class="border border-gray-300 px-4 py-2">Next Section</th>
                <th class="border border-gray-300 px-4 py-2">Next Session</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>                    
        <tbody>
            
            @if(! is_null($this->classSections) && $classSections->count() > 0 )
                @foreach($studentcrs as $studentcr)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $studentcr->myclass->name }}-{{ $studentcr->section->name }}-{{ $studentcr->roll_no }}
                    </td>                
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->total_ob_marks }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->fm }}</td>
                    {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->fm != 0 ? $studentcr->total_ob_marks/$studentcr->fm*100 : 0 }}</td> --}}
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->No_of_Ds }}</td>
                    <td class="border border-gray-300 px-4 py-2">     
                        @if($promotionalRules != null)
                            {{-- {{ $studentcr->No_of_Ds <= 0 ? 'Promoted' : 'Not Promoted' }} --}}
                            {{ $studentcr->No_of_Ds <= $promotionalRules->allowableds ? 'Promoted' : 'Not Promoted' }}
                        @endif
                    </td>

                    <th class="border border-gray-300 px-4 py-2">                    
                        {{ $classSections->first()->myclass->next_class_id}}
                    </th>
                    <th class="border border-gray-300 px-4 py-2">
                        {{-- x:{{ $studentcrs->find($studentcr->id)->next_class_id }}-{{$stdcrsection[$studentcr->id] ?? 'y'}}:x --}}
                        
                        @if ($studentcrs->find($studentcr->id)->next_class_id == null)
                        
                            <select id="section_id"  wire:model="stdcrsection.{{$studentcr->id}}" @if ($studentcrs->find($studentcr->id)->next_class_id != null) disabled @endif class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="">Select</option>
                                @foreach($nextClassSections as $nextClassSection)
                                    <option value={{$nextClassSection->id}}>{{ $nextClassSection->section->name }}</option>
                                @endforeach
                            </select>                        
                        @else
                        {{ $studentcrs->find($studentcr->id)->next_section_id ?? '-' }}
                        @endif

                    </th>
                    <th class="border border-gray-300 px-4 py-2">{{ $session->next_session_id }}</th>

                    



                    <th class="border border-gray-300 px-4 py-2">
                        @if ($studentcrs->find($studentcr->id)->next_class_id == null) 
                            @if($stdcrsection && isset($stdcrsection[$studentcr->id]) )
                            <button wire:click="promotedToNextClass({{ $studentcr->id }})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Transfer {{ $studentcr->id }}</button>
                            @endif
                        @else
                            Transferred!!<br/>
                            <div>Cancel</div>
                        @endif
                    </th>
                </tr>
                
                @endforeach
            @else
            <tr>
                <td colspan='13' class="border border-gray-300 px-4 py-2">No Records Found!!</td>
            </tr>
            @endif
            
        </tbody>
    </table>


</div>
