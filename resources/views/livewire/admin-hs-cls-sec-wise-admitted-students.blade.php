
<div>
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


    {{-- Newly Addmitted Students, records from HsStudentDbs --}}
    <div class="min-h-screen overflow-y-auto">
        {{-- Active Class: {{ $hsClassId ?? 'N/A' }} --}}
        <div>
            <h2>For Class(New): {{ $hsClassId ?? 'Not Assigned' }}</h2>
        </div>
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
                @forelse($new_admitted_hsStudentdbs as $hsStudentdb)
                <tr>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">{{ $loop->iteration }}</td>
                
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">SDB Id:{{ $hsStudentcr->id }}<br/>Session:{{ $hsStudentcr->hsSession->name }}</td>
                    <td class="px-4 py-2 text-left text-xs text-gray-900 border-b font-semibold">
                        <span class="font-semibold text-red-900">{{ $hsStudentdb->name ?? 'X'}}</span>, {{$hsStudentdb->ssex ?? 'X'}}<br/>
                        DOB:{{ $hsStudentdb->dob }}<br/>
                        REG No:{{ $hsStudentdb->registration_no ?? 'X' }}<br/>
                        PEN:{{ $hsStudentdb->pen ?? 'X' }}<br/>
                        StdId:{{ $hsStudentdb->studentid ?? 'X' }}
                    </td>
                    <td class="px-4 py-2 text-left text-xs text-gray-600 border-b">
                        Class:{{ $hsStudentdb->hsClass->name ?? 'X'}}<br/>
                        Section:{{ $hsStudentdb->st_hs_section_id ?? 'X'}}<br/>
                        Semester:{{ $hsStudentdb->st_hs_semester_id ?? 'X'}}<br/>
                        Roll No:{{ $hsStudentdb->remarks ?? 'X'}}
                    </td>






                @empty
                <tr>
                    <td colspan="10" class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">No Records Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>



    {{-- Promoted Students, records from HsStudentCrs, from previous session, previous class --}}
    <div class="min-h-screen overflow-y-auto">
        {{-- Active Class: {{ $hsClassId ?? 'N/A' }} --}}
        <div>
            <h2>For Class(CLS): {{ $hsClassId ?? 'Not Assigned' }}</h2>
        </div>
        {{-- <table class="min-w-full border-collapse bg-white shadow-sm rounded-lg mx-8">
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
                @forelse($promoted_hsStudentcrs as $hsStudentcr)
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
                </td>






                @empty
                <tr>
                    <td colspan="10" class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">No Records Found</td>
                </tr>
                @endforelse
            </tbody>
        </table> --}}
    </div>



</div>
