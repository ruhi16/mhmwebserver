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
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
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
                <th class="border border-gray-300 px-4 py-2">{{ $myclassSection->myclass->name }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ $myclassSection->section->name }}</th>
                {{-- <th class="border border-gray-300 px-4 py-2">{{ $myclassSection->myclass->name }}</th> --}}
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
