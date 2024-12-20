<div>
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'Class Section Individual Marksheet: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name))
        }}
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

    {{-- <div class="min-w-full mx-auto bg-slate-200 text-center text-2xl font-bold my-4">
        Class: {{ $myclassSection->myclass->name }} - Section: {{ $myclassSection->section->name }}<br />
        Student Name:{{ $studentcr->where('id', $studentcr_id)->first()->studentdb->name }}
    </div> --}}

    <div class="min-w-full mx-auto m-8 p-4">
        <button type="button" wire:click="generatePDF" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Marksheet PDF</button>
        @if($myclassSection->myclass->id < 5)
        <button onclick="openUprMarksheetPdfInNewTab({{$myclassSection->id}},{{$studentcr->id}})" class="focus:outline-none text-white bg-violet-400 hover:bg-violet-500 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-violet-900">Open Upr Marksheet PDF</button>
        @else
        <button onclick="openSecMarksheetPdfInNewTab({{$myclassSection->id}},{{$studentcr->id}})" class="focus:outline-none text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-orange-900">Open Sec Marksheet PDF</button>
        @endif
        
    </div>


    {{-- @foreach($markEntries as $markEntry)
    @if($markEntry->examdetail->examtype_id == 1)
    {{ $markEntry->examdetail->subject->code ?? 'X' }}<br />
    @endif
    @endforeach --}}









    <script>
        function openUprMarksheetPdfInNewTab(myclassSection_id, studentcr_id) {
            window.open('{{route('livewire.generate-upr-marksheetpdf', [
                'myclassSection_id' => $myclassSection->id,
                'studentcr_id' => $studentcr->id,
            ])}}', '_blank');
        }

        function openSecMarksheetPdfInNewTab(myclassSection_id, studentcr_id) {
            window.open('{{ route('livewire.generate-sec-marksheetpdf', [
                'myclassSection_id' => $myclassSection->id,
                'studentcr_id' => $studentcr->id,
            ]) }}', '_blank');
        }
    </script>
</div>