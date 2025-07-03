<div>
    {{-- Stop trying to control. --}}
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

    {{-- <div>Admission Component: {{ $session->name }}</div> --}}

    <table class="min-w-full mx-auto my-6 ">
        <caption class="caption-top p-4 font-extrabold text-xl text-pink-800 bg-pink-100 rounded-t-md">
            New Students Admission: Class Section Details, 
            Class: {{ $classSections ? $classSections->myclass->name : '-' }}, 
            Section:{{$classSections ? $classSections->section->name : '-'}} 
            for Session: {{ \App\Models\Session::currentlyActive()->name }}
        </caption>
        <button wire:click="openNewAdmissionModal"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New Student to StudentDB
        </button>
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
                        Assign Roll No {{ $studentcr_max_roll_no + 1 }}
                        {{-- {{$studentdb->remarks ?? 'NA'}} --}}
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
                        {{-- {{ $studentcr_max_roll_no + 1 }} --}}
                        
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




        {{-- Modal for Class-Section: Teacher Selection --}}
        <div class=" {{ $showNewAdmissionModal ? '' : 'hidden' }}">
            <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
                aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
                <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">
                            New Student Admission for Class: {{ $classSections ? $classSections->myclass->name : '-' }}, 
                            Section:{{$classSections ? $classSections->section->name : '-'}} 
                            for Session: {{ \App\Models\Session::currentlyActive()->name }}
                        </h3>
    
    
                        {{-- <div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Small input</label>
                            <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div> --}}
                        <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeNewAdmissionModal">
                            <svg width="25" height="25" viewbox="0 0 40 40">
                                <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                            </svg>
                        </button>
                    </div>
    
                    <div>
                        <form class="max-w-sm mx-auto" wire:submit.prevent="saveNewlyAdmittedStudent">
                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-4 mb-6 text-md font-bold">
                                    Highest Student's Roll No Assigned: {{ $studentcr_max_roll_no ?? 'XX' }}
                                </div>
                            </div>    
                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-2 mb-6">
                                    <label for="myclass"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                    <input type="text" id="myclass"
                                        value="{{ $classSections ? $classSections->myclass->name : '-' }}"
                                        {{-- value="{{ $myclassSections->where('id', $myclassSection_id)->first()->myclass->name ?? 'NA' }}" --}}
                                        {{-- wire:model="selectedClass" --}}
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        disabled readonly>
                                </div>
    
                                <div class="col-span-2 mb-6">
                                    <label for="section"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                                    <input type="text" id="section"
                                        value="{{$classSections ? $classSections->section->name : '-'}}"
                                        {{-- value="{{ $myclassSections->where('id', $myclassSection_id)->first()->section->name ?? 'NA' }}" --}}
                                        {{-- wire:model="selectedSection" --}}
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        disabled readonly>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-3 mb-6">
                                    <label for="myclass"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                                    <input type="text" id="studentName"
                                        {{-- value="{{ $classSections ? $classSections->myclass->name : '-' }}" --}}
                                        {{-- value="{{ $myclassSections->where('id', $myclassSection_id)->first()->myclass->name ?? 'NA' }}" --}}
                                        wire:model="studentName"
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        >
                                        @error('studentName')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="col-span-1 mb-6">
                                    <label for="myclass"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roll No:</label>
                                    <input type="text" id="studentRollNo"
                                        
                                        wire:model="studentRollNo"
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        >
                                        @error('studentRollNo')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

    
    
                            {{-- <label for="teachers"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your teacher</label>
                            <select id="teachers" wire:model="selectedTeacher"
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Select One</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{ $teacher->name }}</option>
                                @endforeach
    
                            </select> --}}
                            {{-- @error('selectedTeacher')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror --}}
    
                            <div class="flex justify-end">
                                <button type="button"
                                    class="text-white mb-2 mr-4 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    wire:click="closeNewAdmissionModal">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="text-white mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
    
    
                    
    
                </div>
            </div>
        </div>
    

    

</div>
