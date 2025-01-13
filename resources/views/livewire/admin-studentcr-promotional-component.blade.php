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
    

    <div>Promotional Component: {{ $session->name }}</div>
    <table class="max-w-full mx-10 my-6 ">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">StudentDB Id</th>
                <th class="border border-gray-300 px-4 py-2">StudentCR Id</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll No</th>
                <th class="border border-gray-300 px-4 py-2">Obtained Marks</th>
                <th class="border border-gray-300 px-4 py-2">Full Marks</th>
                <th class="border border-gray-300 px-4 py-2">Percentage</th>
                <th class="border border-gray-300 px-4 py-2">No of D's</th>
                <th class="border border-gray-300 px-4 py-2">Result</th>
                <th class="border border-gray-300 px-4 py-2">Next Class</th>
                <th class="border border-gray-300 px-4 py-2">Next Section</th>
                <th class="border border-gray-300 px-4 py-2">Next Session</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>                    
        <tbody>
            @foreach($studentcrEOYSummary as $studentcrEOYSummaryIndi)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->sdb_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->std_name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->c_name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->s_name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->roll_no }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->total_ob_marks }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->fm }}</td>    
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->sdb_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummaryIndi->No_of_Ds }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{ $studentcrEOYSummaryIndi->std_name }}== --}}
                    {{ $studentcrEOYSummaryIndi->No_of_Ds <= $promotionalRules->where('myclass_id', 1)->first()->allowableds ? 'Promoted' : 'Not Promoted' }}
                </td>
                <th class="border border-gray-300 px-4 py-2">
                    {{-- {{ $studentcrEOYSummaryIndi->id }} --}}
                    {{ $classSections->first()->myclass->next_class_id}}
                </th>
                <th class="border border-gray-300 px-4 py-2">
                    
                    {{ $section_id ?? 'X' }}
                    <select id="section_id"  @if ($studentcrs->find($studentcrEOYSummaryIndi->id)->next_class_id != null) disabled @endif wire:model="section_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected value="">Select</option>
                        @foreach($nextClassSections as $nextClassSection)
                            <option value={{$nextClassSection->id}}>{{ $nextClassSection->section->name }}</option>
                        @endforeach
                    </select>

                </th>
                
                <th class="border border-gray-300 px-4 py-2">{{ $session->next_session_id }}</th>
                <th class="border border-gray-300 px-4 py-2">
                    @if ($studentcrs->find($studentcrEOYSummaryIndi->id)->next_class_id == null) 
                        <button wire:click="promotedToNextClass({{ $studentcrEOYSummaryIndi->id }})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Transfer {{ $studentcrEOYSummaryIndi->id }}</button>
                    @else
                        Transferred!!<br/>
                        <div>Cancel</div>
                    @endif
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <table class="max-w-full mx-10 my-6 ">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>

            </tr>
        </thead>
        <tbody>
            @foreach($studentcrs as $studentcr)
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->name }}</td>


            </tr>
            @endforeach
        </tbody> --}}

</div>
