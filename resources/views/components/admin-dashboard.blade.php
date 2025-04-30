
<x-app-layout>
    
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Dashboard: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2> 

    @endsection



    <!-- This is Admin Main Section  component -->
    {{-- Hello Admin --}}
    <livewire:admin-dashboard-main-section-component />
    
    
</x-app-layout>