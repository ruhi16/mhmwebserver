<div>
    {{-- <x-app-layout> --}}
        {{-- <x-slot name="header"> --}}
            @section('header')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Voter List 2024: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
            </h2>

            @yield('component_name')
            @endsection
            {{--
        </x-slot> --}}
        <button wire:click='generatePDF' class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Generate PDF
        </button>
        {{ $pdf_msg }}  
        <div class="flex justify-start">
            <h>Hello</h><br/>
            
            {{-- Total Voters:{{ $this->test_voters_all->count() }}<br/> --}}
            {{-- Voters only Brothers:{{ $this->test_voters_only_brothers->count() }}<br/>
            Voters only Non Brothers:{{ $this->test_voters_only_non_brothers->count() }}<br/>
            Voters only Brothers Alone:{{ $this->test_voters_only_brothers_alone->count() }}<br/>
            Voters only Findings:{{ $this->findings->count() }}<br/> --}}
            {{-- @foreach($this->test_voters as $brother)
                {{ $brother->id }}=={{ $brother->student_name_en}}=={{$brother->brother_id}}<br/>
            @endforeach --}}

            @foreach($this->test_voters_all as $brother)
                ({{ $brother->id }},{{$brother->brother_id}}),
            @endforeach
            ==============<br/>
            @foreach($this->test_voters_only_brothers as $brother)
                ({{ $brother->id }},{{$brother->brother_id}}),
            @endforeach
            <br/>==============<br/>

            @foreach($this->studentvl_active_brothers as $brother)
                ({{$brother->id}},{{$brother->brother_id}}),
            @endforeach
            <br/>==============<br/>
            @foreach($this->test_voters_only_brothers_alone as $brother)
                ({{ $brother->id }},{{$brother->brother_id}}),
            @endforeach
            <br/>==============<br/>
            @foreach($this->test_voters_only_non_brothers as $brother)
                ({{ $brother->id }},{{$brother->brother_id}}),
            @endforeach
            <br/>==============<br/>




            {{-- @foreach($this->test_voters_only_brothers as $brother)
                {{ $brother->id }}=={{ $brother->student_name_en}}=={{$brother->brother_id}}<br/>
            @endforeach
            ==============<br/>
            @foreach($this->test_voters_only_brothers_alone as $brother)
                {{ $brother->id }}=={{ $brother->student_name_en}}=={{$brother->brother_id}}<br/>
            @endforeach
            ==============<br/>
            @foreach($this->findings as $finding)
                {{ $finding->id }}=={{ $finding->student_name_en}}=={{$finding->roll_no}}=={{$finding->brother_id}}<br/>
            @endforeach --}}


        </div>


        <div class="h-auto  min-w-full mx-auto ">
            <table class="mx-auto mt-5 border-collapse border border-gray-600 ">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>
                        <th class="border border-gray-300 px-4 py-2">Father Name</th>
                        <th class="border border-gray-300 px-4 py-2">Village</th>
                        <th class="border border-gray-300 px-4 py-2">Student Name</th>
                        <th class="border border-gray-300 px-4 py-2">Class</th>
                        <th class="border border-gray-300 px-4 py-2">Section</th>
                        <th class="border border-gray-300 px-4 py-2">Roll</th>
                        <th class="border border-gray-300 px-4 py-2">Sibling_id</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($voters as $voter)
                    <tr class="border border-red-300">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-sm">{{ $voter->gurdian_name_en }}<br/>{{ $voter->gurdian_name_bn }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->village }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->student_name_en }}<br/>{{ $voter->student_name_bn }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->myclass->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->section->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->roll_no }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $voter->brother_id }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            
                        </td>

                        <td class="border border-gray-300 px-4 py-2">
                            @if($voter->brother_id == $voter->id)
                                <button
                                    wire:click="openModal({{ $voter->id }})"
                                    id="edit-votar-modal-btn"
                                    type="button"
                                    class="border border-gray-200 px-4 py-2 mt-2 bg-blue-500 hover:bg-blue-600 text-white rounded  tracking-wider">
                                    Add
                                </button>
                            @endif
                        </td>                        
                    </tr>

                        @foreach($voters_all->where('brother_id', '=', $voter->id) as $sibling)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"></td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->gurdian_name_en}}<br/>{{$sibling->gurdian_name_bn}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->village}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->student_name_en}}<br/>{{$sibling->student_name_bn}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->myclass->name}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->section->name}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->roll_no}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$sibling->brother_id}}</td>
                                <td class="border border-gray-300 px-4 py-2">                                    
                                    <button
                                        wire:click="removeBrotherhood({{ $sibling->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                        Remove
                                    </button>                                    
                                </td> 
                                <td class="border border-gray-300 px-4 py-2"></td>
                            </tr>
                        @endforeach                    

                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- </x-app-layout> --}}

    {{-- Modal for Class-Section: Teacher Selection --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">
        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
            id="modal" aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-4xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                {{-- Title & Close Button --}}
                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-lg font-bold">
                        Student's Sibling Details
                    </h3>

                    <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                        <svg width="25" height="25" viewbox="0 0 40 40">
                            <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                        </svg>
                    </button>
                </div>

                <form class="max-w-2xl mx-auto" wire:submit.prevent="saveChanges">
                    <div class="grid grid-cols-12 gap-6">

                        {{-- -------------------------------------------------------------------------------- --}}

                        <div class="col-span-6 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Gurdian Name</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->gurdian_name_en ?? 'NA' }} / {{ $studentvl->gurdian_name_bn ?? 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        <div class="col-span-6 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Village</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->village ?? 'NA' }} / {{ $studentvl->relation ?? 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>
                        
                        
                        {{-- -------------------------------------------------------------------------------- --}}

                        <div class="col-span-6 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Student Name</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->student_name_en ?? 'NA' }} / {{ $studentvl->student_name_bn ?? 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        <div class="col-span-2 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Class</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->myclass->name ?? 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        <div class="col-span-2 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Section</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->section->name ?? 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        <div class="col-span-2 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Roll No</label>
                            <input type="text" id="exam"
                                value="{{ $studentvl->roll_no ?? 'NA' }} " 
                                {{-- wire:model="selectedClass" --}}
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        {{-- -------------------------------------------------------------------------------- --}}
                        
                        <div class="col-span-2 mb-4">
                            <label for="selectedMyclass"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Class</label>
                            <select id="selectedMyclass" name="selectedMyclass" wire:model="selectedMyclass"
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select</option>
                                @foreach ($myclasses as $myclass)
                                    <option value="{{ $myclass->id }}">{{ $myclass->id }}-{{ $myclass->name }}</option>
                                @endforeach
                            </select>
                            {{-- @error('selectedMyclass')
                                <span class="text-red-500 mb-6">{{ $message }}</span>
                            @enderror --}}
                        </div>

                        <div class="col-span-2 mb-4">
                            <label for="selectedSection"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Section</label>
                            <select id="selectedSection" name="selectedSection" wire:model="selectedSection"
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select</option>
                                @if($selectedMyclass)
                                    @foreach ($myclasssections as $section)
                                        <option value="{{ $section->section_id }}">{{ $section->section_id }}-{{ $section->section->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- @error('selectedSection')
                                <span class="text-red-500 mb-6">{{ $message }}</span>
                            @enderror --}}
                        </div>


                        <div class="col-span-2 mb-4">
                            <label for="selectedRollno"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Roll Nos</label>
                            <select id="selectedRollno" name="selectedRollno" wire:model="selectedRollno"
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select</option>
                                @if($selectedMyclass && $selectedSection)
                                    @foreach ($myclssecStudents as $myclssecStudent)
                                        <option value="{{ $myclssecStudent->roll_no }}">{{ $myclssecStudent->id }}-{{ $myclssecStudent->roll_no }}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- @error('selectedRollno')
                                <span class="text-red-500 mb-6">{{ $message }}</span>
                            @enderror --}}
                        </div>


                        <div class="col-span-6 mb-4">
                            <label for="exam"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Sibling Name</label>
                            <input type="text" id="exam"
                                value="{{ $mysibling ? $mysibling->student_name_en : 'NA' }} / {{ $mysibling ? $mysibling->student_name_bn : 'NA' }}" 
                                {{-- wire:model="selectedClass" --}}
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>


                        {{-- -------------------------------------------------------------------------------- --}}
                        
                        <div class="col-span-6 mb-4">
                            <label for="sibfname"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Father Name</label>
                            <input type="text" id="sibfname"
                                value="{{ $mysibling ? $mysibling->gurdian_name_en : 'NA' }} / {{ $mysibling ? $mysibling->gurdian_name_bn : 'NA' }}" 
                                
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>

                        <div class="col-span-6 mb-4">
                            <label for="sibfaddr"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <input type="text" id="sibfaddr"
                                value="{{ $mysibling ? $mysibling->gurdian_name_en : 'NA' }} / {{ $mysibling ? $mysibling->gurdian_name_bn : 'NA' }}" 
                                
                                class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled readonly>
                        </div>
                         {{-- -------------------------------------------------------------------------------- --}}





                    </div>

                    <div class="flex justify-end">                        

                        <button type="button"
                            class="border border-gray-200 px-4 py-2 mt-2 bg-red-500 hover:bg-red-600 text-white rounded  tracking-wider"
                            wire:click="closeModal">
                            Cancel
                        </button>

                        <button
                                
                                type="submit"
                                class="border border-gray-200 px-4 py-2 mt-2 ml-2 bg-blue-500 hover:bg-blue-600 text-white rounded  tracking-wider"
                                {{ $mysibling ? '' : 'disabled' }}>                            
                                Save Change
                        </button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>




</div>