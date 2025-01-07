
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }} --}}
            
        </h2>
    </x-slot>
{{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}

    
    {{-- <livewire:s-a-side-bar-component /> --}}
    
        
    {{-- <livewire:footer-component/> --}}

</x-app-layout>







