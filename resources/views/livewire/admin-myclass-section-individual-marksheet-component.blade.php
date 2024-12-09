<div>
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Class Section Individual Marksheet: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    @endsection

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

    <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
        Class: {{ $myclassSection->myclass->name }} - Section: {{ $myclassSection->section->name }}<br/>
        Student Name:{{ $studentcr->first()->studentdb->name }}
    </div>

    

        @foreach($markEntries as $markEntry)
            {{ $markEntry ?? 'X' }}<br/>
        @endforeach










</div>
