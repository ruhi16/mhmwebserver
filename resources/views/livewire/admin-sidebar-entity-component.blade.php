<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    {{-- <h1>Sidebar Entity</h1>
    R:{{ $route }} - O:{{ $option }} --}}
    {{-- {{ $activeOption === $route  ? 'bg-gray-900 text-white' : '' }} --}}
    {{-- {{ $activeOption === $route  ? 'bg-gray-900 text-white' : '' }} --}}
    <li class="py-2">
        <a 
            href="{{ route($route) }}" 
            {{-- wire:click="setActiveOption('{{ $route }}')"   --}}
            class="flex items-center py-2 px-1 rounded-md {{ $isActive  ? 'bg-gray-900 text-white' : '' }}">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round"   stroke-linejoin="round" stroke-width="2"
                    d="M3 12l9-9 9 9M5 18l14-14 14 14" />
            </svg>

            {{$option}}
            {{-- {{ $isActive ? 'AC' : 'INAC' }}-{{ $option }}-{{ $route }} :{{ route($route) }}  --}}
            
        </a>
    </li>

</div>
