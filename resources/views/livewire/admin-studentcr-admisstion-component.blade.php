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

    {{-- <div>Admission Component: {{ $session->name }}</div> --}}

    <table class="max-w-full mx-10 my-6 ">
        <caption class="caption-top p-4 font-extrabold text-xl text-pink-800 bg-pink-100 rounded-t-md">
            New Students Admission: Class Section Details, Class: {{ $classSections ? $classSections->myclass->name : '-' }}, Section:{{$classSections ? $classSections->section->name : '-'}} for Session: {{ \App\Models\Session::currentlyActive()->name }}
        </caption>
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">SDB/SCR Session</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Rank</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- for New Admission --}}
            @foreach($studentdbs as $studentdb)
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id ?? 'x'}}<br/>{{ $studentdb->session->name ?? 'x' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name ?? 'x'}}</td>
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentdb->session_id }}</td> --}}
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->myclass->name ?? 'x' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->section->name ?? 'x'}}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->remarks ?? 'x' }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{-- <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">New Admission</span> --}}
                    <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 border border-pink-400">New Admission</span>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <button wire:click="admitNewStudent({{ $studentdb->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Assign Roll No {{$studentdb->remarks}}
                    </button>
                </td>

            </tr>
            @endforeach
        </tbody>

        <tbody>
            {{-- for Promoted Admission --}}
            @foreach($studentcrs_promoted as $studentcr)
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->id }}/{{ $studentcr->id }}<br/>{{ $studentcr->session->name }}</td>
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->id }}</td> --}}
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->session_id }}</td> --}}
                <td class="border border-gray-300 px-4 py-2">
                    {{ $studentcr->studentdb->name }}<br/>
                    <div class="text-xs">Prev: {{ $studentcr->myclass->name }}{{ $studentcr->section->name }} {{ $studentcr->roll_no }}</div>
                </td>

                 
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->myclass->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->section->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no }}</td> --}}

                <td class="border border-gray-300 px-4 py-2">{{ $myclasses->find($studentcr->next_class_id)->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $mysections->find($studentcr->next_section_id)->name }}</td>
                
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->total_ob_marks ?? 'X'  }}</td>
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->fm ?? 'X' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->total_ob_marks ?? 'X' }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentcr->No_of_Ds ?? 'X' }}</td> --}}
                
                <td class="border border-gray-300 px-4 py-2">
                    <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 border border-pink-400">Promotion</span>
                </td>
                
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $studentcr->next_session_id }}</td> --}}

                <td class="border border-gray-300 px-4 py-2">
                    <button wire:click="admitPromotedStudent({{ $studentcr->id }})" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Assign 
                        {{-- {{ dd(($studentcr_curr[0]->roll_no) ) }} --}}
                        {{ isset($studentcr_curr[0]) ?  ($studentcr_curr[0]->roll_no + 1) : 1 }}
                        
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    

</div>
