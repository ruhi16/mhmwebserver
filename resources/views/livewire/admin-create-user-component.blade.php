
<div class="h-screen min-w-full mx-auto gap-2">
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">        
            {{ __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) . ': Create New User ' }}
        </h2>
        <p>Create New User</p>
    @endsection

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">
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
    </div>

    {{-- Modal for Admin: Create New User --}}
    <div class=" {{ $showModal ? '' : 'hidden' }}">

        <div wire:ignore.self class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" id="modal"
            aria-labelledby="modal-title" aria-modal="true" role="dialog" aria-hidden="true">
            <div class="relative w-full max-w-2xl max-h-full px-4 py-6 bg-white rounded-lg shadow-lg">
                <div class="flex flex-row justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">
                        For Admin To Create New User
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
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" id="name" name="name" placeholder="Enter User Name"
                                    wire:model="name"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error ('name') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-4 mb-4">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter User Email"
                                    wire:model="email"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                        
                                    @error ('email') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-4 mb-4">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter User Password"
                                    wire:model="password"                                
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                        
                                    @error ('password') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>                        
                            

                            <div class="col-span-4 mb-4">
                                <label for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    wire:model="confirm_password" placeholder="Enter User Password Again"                               
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                        
                                    @error ('confirm_password') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>

                            
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
                                >                            
                                Save Change
                            </button>
                            
                        </div>

                    </form>
                </div>                   
            </div>
        </div>

    </div>
</div>




