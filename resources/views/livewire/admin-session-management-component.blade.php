<div>
    {{-- Do your work, then step back. --}}
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

    {{-- <div>Session Component: {{ $session->name }}</div> --}}

    <table class="max-w-full mx-10 my-6 ">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Id</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Start</th>
                <th class="border border-gray-300 px-4 py-2">End</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
            @foreach($sessions as $session)
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800"></tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $session->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $session->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $session->stdate }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $session->endate }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $session->status }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($session->status != 'ACTIVE')
                            <button wire:click="setActiveSession({{ $session->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Set Active</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        <tbody>

        </tbody>
    </table>
</div>
