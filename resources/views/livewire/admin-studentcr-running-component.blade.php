<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="h-fit min-w-full mx-auto">        
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
    </div>

    <div>Running StudentCRs Status: {{ $session->name }}</div>
    <table class="max-w-full mx-10 my-6 ">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">SDB Id</th>
                <th class="border border-gray-300 px-4 py-2">SCR Id</th>
                <th class="border border-gray-300 px-4 py-2">Curr Session</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll No</th>
                
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>                    
        <tbody>
            @foreach ($studentcrs as $studentcr)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->session_id }}-{{ $studentcr->session->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->myclass->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->section->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button wire:click="" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Action
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
