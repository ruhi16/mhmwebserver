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

    {{-- <div>Running StudentCRs Status: {{ $session->name }}</div> --}}
    <table class="max-w-full mx-10 my-6 ">
        <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
            Running Students: Class Section Details, Class: {{ $classSections ? $classSections->myclass->name : '-' }}, Section:{{$classSections ? $classSections->section->name : '-'}} for Session: {{ \App\Models\Session::currentlyActive()->name }}
        </caption>
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">SDB SCR</th>
                <th class="border border-gray-300 px-4 py-2">UUID</th>
                <th class="border border-gray-300 px-4 py-2">Curr Session</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll No</th>
                
                <th class="border border-gray-300 px-4 py-2">Action</th>
                <th class="border border-gray-300 px-4 py-2">QR Code</th>
            </tr>
        </thead>                    
        <tbody>
            @foreach ($studentcrs as $studentcr)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb_id }}<br/>{{ $studentcr->id }}</td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->session_id }}-{{ $studentcr->session->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb->name }}<br/>{{ $studentcr->studentdb->uuid_auto }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->myclass->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->section->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        
                        @php 
                            $url_string = url('/img').'/'. $studentcr->myclass->name .'-'. $studentcr->section->name .'-'. $studentcr->roll_no .'-'.$studentcr->studentdb->name .'.svg'; 

                        @endphp
                        
                        {{-- <img src="data:image/png;base64,{{ $qrcode_new }}" alt="QR Code" /> --}}

                        {{-- x:{{ $url_string }} --}}
                        @if(!file_exists($url_string))
                            <img class="w-24 h-24 mb-3 shadow-lg " src="{{ $url_string }}" alt="QR_Code"/>
                            {{-- <a href="{{ $url_string }}"  download="{{ $studentcr->myclass->name }}-{{ $studentcr->section->name }}-{{ $studentcr->roll_no }}-{{ $studentcr->studentdb->name }}.svg">Download</a> --}}
                        @else
                            Not Found
                        @endif

                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button wire:click="generateQRCode({{ $studentcr->id }})" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            QR Code
                        </button>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
