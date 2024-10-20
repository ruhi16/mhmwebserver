<div class="h-screen min-w-full mx-auto gap-2">
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Home: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2> 
        <p>Change Password</p>
    @endsection

    
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div>
        <button
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
            wire:click="showModal">
                Show Modal
        </button>

        <button
            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded"
            wire:click="showWarningModal">
                Show Warning Modal
        </button>        
    </div>
    

    {{-- Modal for Admin or User: Change Password --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">

        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                <div class="flex flex-row justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">
                        For Class Section Teacher Selection
                    </h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" 
                        wire:click="closeModal">
                        <svg width="25" height="25" viewbox="0 0 40 40">
                            <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                        </svg>
                    </button>
                </div>
                <div>
                    
                    <form class="max-w-4xl mx-auto" wire:submit.prevent="saveChanges">
                        <div class="grid grid-cols-4 gap-4 mx-8">
                            
                            <div class="col-span-4 mb-4">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                    wire:model="name"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>                        
                                    {{-- @error ('email') <span class="text-danger">{{ $message }}</span> @enderror --}}
                            </div>

                            <div class="col-span-4 mb-4">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                    wire:model="email"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>                        
                                    {{-- @error ('email') <span class="text-danger">{{ $message }}</span> @enderror --}}
                            </div>

                            <div class="col-span-4 mb-4">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" id="password" name="password"
                                    wire:model="password"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                        
                                    @error ('password') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>                        
                            

                            <div class="col-span-4 mb-4">
                                <label for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    wire:model="confirm_password"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                        
                                    @error ('confirm_password') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>

                            
                        </div>

                        <div class="flex justify-end">                        

                            <button type="button"
                                class="border border-gray-200 px-4 py-2 mt-2 bg-red-500 hover:bg-red-600 text-white rounded  tracking-wider"
                                wire:click="closeModal">
                                Oke
                            </button>

                            <button                                
                                type="submit"
                                class="border border-gray-200 px-4 py-2 mt-2 ml-2 bg-blue-500 hover:bg-blue-600 text-white rounded  tracking-wider"
                                >                            
                                Save Change
                            </button>
                            
                        </div>

                    </form>

                </div>                   
            </div>
        </div>

    </div>
    {{-- Modal for Admin or User: Change Password --}}


    {{-- Warning Modal Start --}}
    <div class=" {{ $showWarningModal ? '' : 'hidden' }}">

        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" >
            <div class="relative w-full max-w-2xl max-h-min px-4 py-6 bg-white rounded-lg shadow-lg">
                <div class="flex flex-row justify-between items-center mb-4">
                    <div class="flex flex-row justify-start items-center gap-2">
                        <svg width="32" height="32" viewBox="0 0 200 300">
                            <path fill="currentColor" d="M236.8 188.09L149.35 36.22a24.76 24.76 0 0 0-42.7 0L19.2 188.09a23.51 23.51 0 0 0 0 23.72A24.35 24.35 0 0 0 40.55 224h174.9a24.35 24.35 0 0 0 21.33-12.19a23.51 23.51 0 0 0 .02-23.72m-13.87 15.71a8.5 8.5 0 0 1-7.48 4.2H40.55a8.5 8.5 0 0 1-7.48-4.2a7.59 7.59 0 0 1 0-7.72l87.45-151.87a8.75 8.75 0 0 1 15 0l87.45 151.87a7.59 7.59 0 0 1-.04 7.72M120 144v-40a8 8 0 0 1 16 0v40a8 8 0 0 1-16 0m20 36a12 12 0 1 1-12-12a12 12 0 0 1 12 12"/></svg>
                        <h3 class="text-lg font-bold text-orange-400">
                            Warning!! 
                        </h3>
                    </div>
                    <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeWarningModal">
                        <svg width="25" height="25" viewbox="0 0 40 40">
                            <path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="black" stroke-width="4" />
                        </svg>
                    </button>
                </div>

                <div class="h-12 p-2 md:p-3 border-t border-gray-200 rounded-b dark:border-gray-600 font-bold text-center">
                    Password Successfully Changed!! Please Login Again.
                </div>

                <div class="flex justify-end items-center  border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                        class="border border-gray-200 px-4 py-2 mt-2 bg-red-500 hover:bg-red-600 text-white rounded  tracking-wider"
                        wire:click="closeWarningModal">
                        Okey
                    </button>
                </div>
            </div>                   
        </div>
    </div>
    {{-- Warning Modal End --}}


</div>