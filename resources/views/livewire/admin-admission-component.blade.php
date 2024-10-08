<div>
    {{-- <x-app-layout> --}}
    {{-- <x-slot:header> --}}
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>
        <h2>
            {{-- xxxAdmin Admission Component : {{ $myclssec_id }} --}}
        </h2>
    @endsection
    {{-- </x-slot> --}}

    <div>
        Admin Admission Class-Section: {{ $myclssec_id }} 
        Class: {{ $myclssec->myclass->name }} & Section: {{ $myclssec->section->name }}
    </div>

    <table class="mx-auto border-collapse border border-gray-600 ">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">StudentDB Id</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentdbsNotInStudentcrs as $studentdb)
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->myclass->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $studentdb->section->name }}</td>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2">
                    <button wire:click="assignRollNo({{ $studentdb->id }})"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Assign Roll - {{ $studentdb->remarks ?? 'XX' }}
                    </button>
                    {{-- {{ $message[$studentdb->id] ?? 'XX' }} --}}

                </td>
            </tr>


        </tbody>
        @endforeach

        </tbody>
    </table>



    {{-- <table class="min-w-auto mx-10 my-6 border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>
                        <th class="border border-gray-300 px-4 py-2">Student Id</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentdbs as $index => $studentdb)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name }}</td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>     --}}

    {{-- <table class="mx-auto my-6 border-collapse border border-gray-600 "> --}}
    <table class="mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">StudentDB Id</th>
                <th class="border border-gray-300 px-4 py-2">StudentCR Id</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Roll</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentcrs as $index => $studentcr)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->studentdb ? $studentcr->studentdb->name : '--' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->myclass->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->section->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $studentcr->roll_no }}</td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                </tr>
            @endforeach
        </tbody>
    </table>



    {{-- </x-app-layout> --}}

</div>
