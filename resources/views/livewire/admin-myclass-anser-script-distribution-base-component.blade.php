<div>
    {{-- The Master doesn't talk, he acts. --}}
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

    <div class="h-screen min-w-full mx-auto">
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



    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Class</th>
                <th class="border border-gray-300 px-4 py-2">Nos</th>
                <th class="border border-gray-300 px-4 py-2">Sections</th>
                @foreach ($exams as $exam)
                    <th class="border border-gray-300 px-4 py-2">{{ $exam->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($myclasses as $index => $myclass)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $myclass->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $myclassSections->where('myclass_id', $myclass->id)->count() }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        @php $sections = $myclassSections->where('myclass_id', $myclass->id) @endphp
                        {{-- {{ json_encode($xx) }}  --}}

                        @if ($sections->count() > 0)
                            {{-- xx {{$xx->first() }} --}}
                            @foreach ($sections as $section)
                                {{ $section->section->name }},
                            @endforeach
                        @endif
                    </td>
                    @foreach ($exams as $exam)
                        <td class="border border-gray-300 px-4 py-2">
                            
                            <a class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                href="{{ route('admin.ansscrdistributioncw', [
                                    'myclass_id' => $myclass->id,
                                    'exam_id' => $exam->id
                                    ]) }}">
                                Ans Scr Dist - {{$exam->id}}
                            </a>

                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


    </div>


</div>
