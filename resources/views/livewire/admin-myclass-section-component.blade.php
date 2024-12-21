<div>
    {{-- <x-app-layout> --}}
    {{-- <x-slot:header> --}}
        @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Base: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>
        <h2>
            {{-- xxxAdmin Admission Component : {{ $myclssec_id }} --}}
        </h2>
    @endsection

    <div class="h-fit min-w-full mx-auto">
        {{-- </x-slot> --}}
        {{-- <p>Admin Myclass Section</p>
        message: --}}
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


    {{-- Success is as dangerous as failure. --}}
        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Sl</th>
                    <th class="border border-gray-300 px-4 py-2">Cls-Sec<br/>Cl Teacher</th>
                    {{-- <th class="border border-gray-300 px-4 py-2">Section</th> --}}
                    {{-- <th class="border border-gray-300 px-4 py-2">Class Teacher</th> --}}
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                    <th class="border border-gray-300 px-4 py-2">Admission</th>
                    <th class="border border-gray-300 px-4 py-2">Students</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                    <th class="border border-gray-300 px-4 py-2">Formative</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($myclassSections as $index => $myclassSection)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $myclassSection->myclass->name }}-{{ $myclassSection->section->name }}<br/>
                            {{ $myclassteachers->where('myclass_id', $myclassSection->myclass_id)->where('section_id', $myclassSection->section_id)->first()->teacher->name ?? 'NA' }}
                        </td>
                        {{-- <td class="border border-gray-300 px-4 py-2"></td> --}}


                        {{-- <td class="border border-gray-300 px-4 py-2">
                            {{ $myclassteachers->where('myclass_id', $myclassSection->myclass_id)->where('section_id', $myclassSection->section_id)->first()->teacher->name ?? 'NA' }}
                        </td> --}}

                        <td class="border border-gray-300 px-4 py-2">
                            <button wire:click="showModal({{ $myclassSection->id }})"
                                class="text-white bg-purple-500 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                Cl Tcher </button>
                            {{-- {{ $myclassSection_id }} --}}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.ansscrdistribution', ['myclassSection_id' => $myclassSection->id]) }}">
                                Ans Scr
                            </a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.admission', ['myclassSection_id' => $myclassSection->id]) }}">
                                Stds
                            </a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.marksentry', ['myclassSection_id' => $myclassSection->id]) }}">
                                FMrk
                            </a>
                        </td>

                        <td class="border border-gray-300 px-4 py-2 font-bold">
                            @if($myclassSection->myclass->id <= 4)
                            @foreach($exams as $exam)
                                @php $colors = ['green', 'violet', 'rose'];  @endphp 
                            <a 
                                class="text-white gap-2 bg-{{$colors[$exam->id-1]}}-500 hover:bg-{{$colors[$exam->id-1]}}-700 focus:ring-4 focus:ring-bg-{{$colors[$exam->id-1]}}-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.formativemarksentryentity', [
                                    'myclassSection_id' => $myclassSection->id,                                    
                                    'examterm_id'=> $exam->id,      // should varry for different term
                                    'examtype_id'=> 1
                                    ]) }}">
                                {{ $exam->details }}
                            </a> 
                            @endforeach
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.markregister', ['myclassSection_id' => $myclassSection->id]) }}">
                                Reg
                            </a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.markregisterpdf', ['myclassSection_id' => $myclassSection->id]) }}">
                                Reg PDF
                            </a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.meritlistcswpdf', ['myclassSection_id' => $myclassSection->id]) }}">
                                Merit List
                            </a>
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- C:{{ $selectedClass }},
    S:{{ $selectedSecton }},
    T:{{ $selectedTeacher }}, --}}



    {{-- Modal for Class-Section: Teacher Selection --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">
        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">
                        For Class Section Teacher Selection
                    </h3>


                    {{-- <div>
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Small input</label>
                        <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div> --}}
                    <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                        <svg width="25" height="25" viewbox="0 0 40 40">
                            <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                        </svg>
                    </button>
                </div>

                <div>
                    <form class="max-w-sm mx-auto" wire:submit.prevent="saveChanges">
                        <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-2 mb-6">
                                <label for="myclass"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input type="text" id="myclass"
                                    value="{{ $myclassSections->where('id', $myclassSection_id)->first()->myclass->name ?? 'NA' }}"
                                    {{-- wire:model="selectedClass" --}}
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="col-span-2 mb-6">
                                <label for="section"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                                <input type="text" id="section"
                                    value="{{ $myclassSections->where('id', $myclassSection_id)->first()->section->name ?? 'NA' }}"
                                    {{-- wire:model="selectedSection" --}}
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled readonly>
                            </div>
                        </div>


                        <label for="teachers"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
                            teacher</label>
                        <select id="teachers" wire:model="selectedTeacher"
                            class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Select One</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{ $teacher->name }}</option>
                            @endforeach

                        </select>
                        @error('selectedTeacher')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button type="button"
                                class="text-white mb-2 mr-4 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                wire:click="closeModal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white mb-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>


                {{-- <p class="text-gray-700">This is the modal content: {{ $myclassSection_id }}</p> --}}
                {{-- <div class="flex justify-end mt-4 ">
                    <button type="button"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mx-2"
                        wire:click="closeModal">
                        Cancel
                    </button>

                    <button type="button"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mx-2"
                        wire:click="saveChanges">
                        Submit
                    </button>
                </div> --}}

            </div>
        </div>
    </div>



</div>
