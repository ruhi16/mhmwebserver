<div>
    {{-- Stop trying to control. --}}
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

    <div>Admission Component: {{ $session->name }}</div>

    <table class="max-w-full mx-10 my-6 ">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">StudentDB Id</th>
                <th class="border border-gray-300 px-4 py-2">StudentCR Id</th>
                <th class="border border-gray-300 px-4 py-2">Prev Session</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Prev Class</th>
                <th class="border border-gray-300 px-4 py-2">Prev Section</th>
                <th class="border border-gray-300 px-4 py-2">Prev Roll No</th>

                <th class="border border-gray-300 px-4 py-2">Obtained Marks</th>
                <th class="border border-gray-300 px-4 py-2">Full Marks</th>
                <th class="border border-gray-300 px-4 py-2">Percentage</th>
                <th class="border border-gray-300 px-4 py-2">No of D's</th>
                <th class="border border-gray-300 px-4 py-2">Result</th>

                <th class="border border-gray-300 px-4 py-2">Curr Class</th>
                <th class="border border-gray-300 px-4 py-2">Curr Section</th>
                <th class="border border-gray-300 px-4 py-2">Curr Session</th>

                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>            
        <tbody>
            @foreach($studentcrs as $studentcr)
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->session_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->name }}</td>

                 
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->myclass->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->section->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummary->where('id', $studentcr->id)->first()->total_ob_marks ?? 'X'  }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummary->where('id', $studentcr->id)->first()->fm ?? 'X' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummary->where('id', $studentcr->id)->first()->total_ob_marks ?? 'X' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummary->where('id', $studentcr->id)->first()->No_of_Ds ?? 'X' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcrEOYSummary->where('id', $studentcr->id)->first()->result ?? 'X' }}</td>

                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_class_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_section_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_session_id }}</td>

                <td class="border border-gray-300 px-4 py-2">
                    <button wire:click="admitStudent({{ $studentcr->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Assign Roll No
                    </button>
                </td>

                {{--<td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->roll_no }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->total_ob_marks }}</td>    
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->fm }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->percentage }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->No_of_Ds }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->result }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_class }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_section }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_session }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('admin.studentcr.edit', $studentcr->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td> 
                --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
