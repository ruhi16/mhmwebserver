<div>
    {{-- In work, do what you enjoy. --}}
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

    <div>
    <table class="max-w-full mx-10 my-6 ">
        <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
            Class Section Controls, Session: {{ \App\Models\Session::currentlyActive()->name }}
        </caption>
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                {{-- <th class="border border-gray-300 px-4 py-2">Session</th> --}}
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                {{-- <th class="border border-gray-300 px-4 py-2">C</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll No</th> --}}
                
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>                    
        <tbody>
            @if($myclassSections)
            @foreach($myclassSections as $myclassSection)
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">                
                <th class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</th>
                {{-- <th class="border border-gray-300 px-4 py-2">{{ \App\Models\Session::currentlyActive()->name }}</th> --}}
                <th class="border border-gray-300 px-4 py-2">{{ $myclassSection->myclass->name }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ $myclassSection->section->name }}</th>
                <th class="border border-gray-300 px-4 py-2">
                    <div class="flex justify-center">
                        <a href="javascript:void(0)" wire:click="activeMyclassSection({{ $myclassSection->id }})" class="px-3 py-2 text-white {{ $myclassSection->status == 'ACTIVE' ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} rounded ">Active</a>
                    </div>
                </th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
