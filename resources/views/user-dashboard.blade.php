
<x-app-layout>  
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{ 'Dashboard: ' . __(auth()->user()->role->name . ': ' . __(auth()->user()->name)). ': (Prof Name: __)'  }}
        </h2>
    @endsection

    <livewire:user-account-component>
    
</x-app-layout>