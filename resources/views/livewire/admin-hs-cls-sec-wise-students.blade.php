<div>

    HS Class Section Wise Students
    <div>
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

    </div>


    {{-- HS_StudentDB Records --}}
    <div class="overflow-x-auto">
        Active Class: {{ $hsClassId ?? 'N/A' }}
        <table class="min-w-full border-collapse bg-white shadow-sm rounded-lg">
            <thead class="bg-gray-100">
                <tr>

                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Sl</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">SCRID</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Name-DOB-Pen</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Cls-Sec-Sem-Roll</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Registration No</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Parent's Name</th>
                    {{-- <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Address</th> --}}
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Mobiles</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Bank Details</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Action</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">QR Code</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($hsStudentdbs as $hsStudentdb)
                <tr>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $hsStudentdb->id }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-900 border-b font-semibold">
                        <span class="font-semibold text-red-900">{{ $hsStudentdb->name ?? 'X'}}</span>, {{$hsStudentdb->ssex ?? 'X'}}<br/>
                        DOB:{{ $hsStudentdb->dob }}<br/>
                        PEN:{{ $hsStudentdb->pen ?? 'X' }}<br/>
                        StdId:{{ $hsStudentdb->studentid ?? 'X' }}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        Class:{{ $hsStudentdb->st_hs_class_id ?? 'X'}}<br/>
                        Section:{{ $hsStudentdb->st_hs_section_id ?? 'X'}}<br/>
                        Semester:{{ $hsStudentdb->st_hs_semester_id ?? 'X'}}<br/>
                        Roll No:{{ $hsStudentdb->hsStudentcrs->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)->first()->roll_no ?? 'X'}}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">UUID:{{ $hsStudentdb->uuid_auto ?? 'X' }}<br/>REG_No:{{ $hsStudentdb->registration_no ?? 'X' }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $hsStudentdb->fname ?? 'X'}}<br/>{{ $hsStudentdb->mname ?? 'X' }}</td>
                    {{-- <td class="px-4 py-2 text-left text-xs text-gray-600 border-b"></td> --}}
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $hsStudentdb->mobl ?? 'X' }}<br/>{{ $hsStudentdb->mobl2 ?? 'X'}}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{$hsStudentdb->accNo ?? 'X'}}<br/>{{$hsStudentdb->ifsc ?? 'X'}}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{-- <input type="number"
                            wire:model.debounce.250ms="assignRollNo.{{ $hsStudentdb->id }}"
                            class="border border-gray-300 px-4 py-2 w-32 rounded-md" 
                        />
                        @error('records.'.$hsStudentdb->id.'.roll_no')
                            <span class="text-red-600 text-xs">{{ $message }}</span>                            
                        @enderror
                        {{ $assignRollNo[$hsStudentdb->id] ?? 'X' }}
                        <br/>{{ $message ?? 'XXX' }} --}}
                        @if($hsStudentdb->hsStudentcrs->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)->first() == null)
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mx-2" 
                            wire:click="assignRollNo({{ $hsStudentdb->id }})" >
                            Assign Roll No
                        </button>
                        @endif
                        {{-- <br/>{{ $message ?? 'X' }} --}}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        {{-- @if($hsStudentdb->hsStudentcrs->where('hs_session_id', \App\Models\HsSession::currentlyActive()->id)->first() == null) --}}
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mx-2" 
                            wire:click="generateQRCode({{ $hsStudentdb->id }})" >
                            Gen QR Code
                        </button>
                        {{-- @endif --}}
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- End of HS_StudentDB Records --}}    

    


    
    <script>
        // External link with event listener
        document.getElementById('externalLinkBtn').addEventListener('click', function() {
            window.open('https://example.com', '_blank', 'noopener,noreferrer');
        });

        // Internal Laravel route
        function openInternalLink() {
            window.open('{{ route('home') }}', '_blank');
        }
    </script>
</div>
