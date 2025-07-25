<div>    
    {{-- Admin Hs Class Section Wise Promoted Students --}}
    
    <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 border border-blue-400 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-bold">Info alert!</span> {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('alert-container').innerHTML = '';
                }, 5000);
            </script>
        @endif
        @if (session()->has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-400 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-bold">Danger alert!</span> {{ session('error') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('alert-container').innerHTML = '';
                }, 5000);
            </script>
        @endif
    </div>

    <div class="min-h-screen overflow-y-auto">
        {{-- Active Class: {{ $hsClassId ?? 'N/A' }} --}}
        <table class="min-w-full border-collapse bg-white shadow-sm rounded-lg mx-8">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Sl</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">SCRID</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Name-DOB-Pen</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Cls-Sec-Sem-Roll</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Registration No</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Parent's Name</th>                    
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Mobiles</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Bank Details</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Action</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">QR Code</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($hsStudentcrs_promoted as $hsStudentcr)
                <tr>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">SCR Id:{{ $hsStudentcr->id }},SDB Id:{{ $hsStudentcr->hs_studentdb_id }}<br/>Session:{{ $hsStudentcr->hsSession->name }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-900 border-b font-semibold">
                        <span class="font-semibold text-red-900">{{ $hsStudentcr->hsStudentDb->name ?? 'X'}}</span>, {{$hsStudentcr->hsStudentdb->ssex ?? 'X'}}<br/>
                        DOB:{{ $hsStudentcr->hsStudentdb->dob }}<br/>
                        REG No:{{ $hsStudentcr->hsStudentdb->registration_no ?? 'X' }}<br/>
                        PEN:{{ $hsStudentcr->hsStudentdb->pen ?? 'X' }}<br/>
                        StdId:{{ $hsStudentcr->hsStudentdb->studentid ?? 'X' }}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        Class:{{ $hsStudentcr->hsClass->name ?? 'X'}}<br/>
                        Section:{{ $hsStudentcr->hs_section_id ?? 'X'}}<br/>
                        Semester:{{ $hsStudentcr->hs_semester_id ?? 'X'}}<br/>
                        Roll No:{{ $hsStudentcr->roll_no ?? 'X'}}
                        {{-- Roll No:{{ $hsStudentdb->hsStudentcrs->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)->first()->roll_no ?? 'X'}} --}}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b"></td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b"></td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{ $hsStudentcr->hsStudentdb->registration_no ?? 'X' }}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{-- {{ $hsStudentcr->roll_no ?? 'X' }}: --}}
                        <input 
                            id="assignedRollNo.{{ $hsStudentcr->id }}" 
                            {{-- value="{{ $hsStudentcr->roll_no ?? 'X' }}" --}}
                            wire:model.debounce.1000ms="assignedRollNo.{{ $hsStudentcr->id }}"
                            type="number" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/>
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{-- @if($hsStudentcr->next_hs_studentcr_id == null) --}}
                        <button 
                            wire:click="assignRollNo('{{ $hsStudentcr->id }}')" 
                        class="bg-blue-400 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full uppercase">
                            Assign Roll No (max)
                        </button>
                        {{-- @else
                            <Span class="text-red-600 text-lg font-bold">Roll No Assigned</Span>
                        @endif --}}
                    </td>



                </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">No Records Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

</div>
