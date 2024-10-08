<div class="min-h-screen p-4">
    <p>Admin Studentdb</p>
    <div class="container mx-auto bg-slate-400">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="">
            {{-- Admin StudentDB Component --}}
            {{-- {{dd($teachers)}} --}}
            <form wire:submit.prevent="search" class="max-w-sm mx-auto grid grid-cols-2 gap-2">
                <div>
                    <label for="myclass" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                        Class
                    </label>
                    <select id="myclass" wire:model="selectedClass" name="clss"
                        class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>All</option>
                        @foreach ($myclasses as $myclass)
                            <option value={{ $myclass->id }}>{{ $myclass->name }}</option>
                        @endforeach

                    </select>
                    {{-- {{ $selectedClass }} --}}
                </div>


                <div>
                    <label for="section" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                        Section
                    </label>
                    <select id="section" wire:model="selectedSection" name="section"
                        class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @if ($myclasssections != null)
                            <option selected>All</option>
                            @foreach ($myclasssections as $myclasssection)
                                <option value={{ $myclasssection->section->id }}>{{ $myclasssection->section->name }}
                                </option>
                            @endforeach
                        @else
                            <option selected>All</option>
                            @foreach ($sections as $section)
                                <option value={{ $section->id }}>{{ $section->name }}</option>
                            @endforeach
                        @endif

                    </select>
                    {{-- {{ $selectedSection }} --}}

                </div>

                {{-- <div>
                    <button wire:click="handleButtonClick" type="submit" class="btn btn-success">Save</button>
                </div> --}}
            </form>

            {{-- <div class="h-4">Student Database</div> --}}
            {{-- <@livewire('component', ['user' => $user], key($user->id)) --}}
            <div>
                {{-- <button wire:click="showModal" data-bs-toggle="modal" data-bs-target="#modal"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Show Modal
                </button> --}}

                {{-- @livewire('admin-modal-test-component') --}}

                {{-- showmodal: {{ $showModal ? 'true' : 'false' }} --}}

                <div class=" {{ $showModal ? '' : 'hidden' }}">
                    <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
                        id="modal" aria-labelledby="modal-title" aria-modal="true" role="dialog"
                        aria-hidden="true">
                        <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Modal Title</h3>
                                <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="showModal">

                                    <svg width="25" height="25" viewbox="0 0 40 40">
                                        <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                                    </svg>
                                </button>
                            </div>
                            {{-- <p class="text-gray-700">This is the modal content.</p>
                            <div class="flex justify-end mt-4">
                                <button wire:click="showModal" type="button"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                                    wire:click="saveChanges()">
                                    Save Changes
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>


            </div>

            <table class="mx-auto border-collapse border border-gray-600 ">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Class</th>
                        <th class="border border-gray-300 px-4 py-2">Section</th>
                        <th class="border border-gray-300 px-4 py-2">Roll</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentdbs as $studentdb)
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->myclass->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->section->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->remarks }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button wire:click="assignRollNo({{ $studentdb->id }})"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Assign Roll
                            </button>
                            {{ $message[$studentdb->id] ?? 'XX' }}

                        </td>
                    </tr>


                </tbody>
                @endforeach

                </tbody>
            </table>

            {{-- @livewire('admin-studentdb-entity-component', ['studentdb_id'=>$studentdb->id], key($studentdb->id))     --}}
            {{-- <livewire:admin-studentdb-entity-component :studentdb_id="$studentdb->id" :wire:key="'stdb-'.$studentdb->id" />     --}}


        </div>
    </div>

    {{-- 
      document.getElementById("open-modal-btn").addEventListener("click", function() {
        document.getElementById("modal").classList.remove("hidden");
      });
      
      document.getElementById("close-modal-btn").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
      }); 
      --}}


</div>
