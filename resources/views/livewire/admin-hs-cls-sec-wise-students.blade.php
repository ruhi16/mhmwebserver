<div>

    HS Class Section Wise Students
    <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-medium">Info alert!</span> {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('alert-container').innerHTML = '';
                }, 5000);
            </script>
        @endif
        @if (session()->has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Danger alert!</span> {{ session('error') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('alert-container').innerHTML = '';
                }, 5000);
            </script>
        @endif
    </div>
    {{-- <div>
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Info alert!</span> {{ session('message') }}
          </div>
        @endif
        @if(session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> {{ session('error') }}
          </div>
        @endif
    </div> --}}


    {{-- HS_StudentDB Records --}}
    <div class="min-h-screen overflow-y-auto">
        Active Class: {{ $hsClassId ?? 'N/A' }}
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
                @forelse($hsStudentcrs as $hsStudentcr)
                <tr>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">SCR Id:{{ $hsStudentcr->id }}<br/>Session:{{ $hsStudentcr->hsSession->name }}</td>
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
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        
                        {{-- @forelse($hsStudentcr->hsStudentDb->hsSubjects as $hsStudentcrSubject ) --}}
                            {{-- <span class="font-semibold text-slate-900"> 
                                Subj{{ $loop->iteration }}:</span>{{ $hsStudentcrSubject->hsSubject->name }}<br/> --}}
                                {{-- {{ $hsStudentcrSubject->hsSubject->hsMarksentries }} --}}
                                {{-- @foreach($hsStudentcr->hsMarksentries as $data)
                                    {{ $data->id }},
                                @endforeach --}}
                                {{-- <br/> --}}
                        {{-- @empty
                            <span class="text-red-500 text-center">No Record Found!!</span>
                        @endforelse --}}

                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{ $hsStudentcr->result }}
                    </td>

                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        <input type="number"
                            wire:model.debounce.250ms="inputRollNo.{{ $hsStudentcr->id }}"
                            class="border border-gray-300 px-4 py-2 w-32 rounded-md" 
                        />
                        @error('records.'.$hsStudentcr->id.'.roll_no')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        @if($hsStudentcr->next_class_id == null)
                        <button type="button" 
                            wire:click="promotedToNextClass('{{ $hsStudentcr->id }}')"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Promoted To Next Class</button>
                        @else
                            <Span class="text-red-600 text-lg font-bold">Promoted</Span>
                        @endif
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
    {{-- End of HS_StudentDB Records --}}    

    


    
    <script>
        // External link with event listener
        //document.getElementById('externalLinkBtn').addEventListener('click', function() {
        //    window.open('https://example.com', '_blank', 'noopener,noreferrer');
        //});

        // Internal Laravel route
        //function openInternalLink() {
        //    window.open('{{ route('home') }}', '_blank');
        //}
    </script>
</div>
