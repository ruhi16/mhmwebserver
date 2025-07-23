<div>
    
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

    <div class="px-8 pt-4 mb-4">
        <div class="relative inline-block w-64">
            
            <label for="hs-subject-select" class="block mb-0 text-sm font-medium text-gray-900">Select Subject: {{ $selectedHsSubjectId ?? 'N/A' }}</label>

            <select 
                wire:model="selectedHsSubjectId" 
                id="hs-subject-select"
                class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option disabled selected>Select Subject</option>
                <option selected value="0">All Subjects</option>
                @foreach($hsSubjects as $hsSubject)
                    <option value="{{ $hsSubject->id }}">{{ $hsSubject->id }}-{{ $hsSubject->name }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg> --}}
            </div>
        </div>
    </div>


    <div class="min-h-fit overflow-y-auto ">
        {{-- Active Class: {{ $hsClassId ?? 'N/A' }} --}}
        <table class="min-w-full border-collapse bg-white shadow-sm rounded-lg mx-8 mb-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Sl</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Name & Class Details</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Registration No</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Subject Details</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">Mobile No</th>
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">                
            @foreach($hsStudentcrs as $hsStudentcr)
            {{-- @if( $hsStudentcr->hsStudentdb->hsSubjects->contains(function($query){                
                return $query->hs_subject_id == 11; }) 
                ) --}}
            <tr>
                <td class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                    {{ $loop->iteration }}
                </td>
                <td class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                    <span class="font-semibold text-slate-900">{{ $hsStudentcr->hsStudentdb->name ?? 'X' }}</span>, {{ $hsStudentcr->hsStudentdb->ssex ?? 'X' }}<br/>
                    {{ $hsStudentcr->hsClass->name ?? 'X'}}-{{ $hsStudentcr->hsSection->name ?? 'X'}}-{{ $hsStudentcr->hsSemester->name ?? 'X' }}-{{ $hsStudentcr->roll_no ?? 'X'}}<br/>
                </td>
                <td class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                   Reg: {{ $hsStudentcr->hsStudentdb->registration_no ?? 'X' }}<br/>
                   Pen: {{ $hsStudentcr->hsStudentdb->pen ?? 'X' }}<br/>
                </td>
                
                <td class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                    <table class="min-w-fit border-collapse bg-white shadow-sm rounded-lg mx-8">
                        <tr>
                        @foreach($hsStudentcr->hsStudentdb->hsSubjects as $hsSubject)
                        <th class="px-4 py-2 text-left text-xs font-semibold {{ $hsSubject->hs_subject_id == $selectedHsSubjectId ? 'text-red-600 font-semibold' : 'text-gray-600' }}  uppercase tracking-wider border" >
                            {{ $hsSubject->hsSubject->id }}-{{ $hsSubject->hsSubject->name }}

                        </th>
                            
                        @endforeach
                        </tr>
                    </table>
                </td>
            </tr>
            {{-- @endif --}}
            @endforeach
            </tbody>
        </table>

    </div>







</div>
