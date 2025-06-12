<div>


    <div class="flex flex-row items-start gap-2 my-4"> 
        <aside class="w-64 min-h-screen px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-green-200" >
            <div class="flex items-center justify-between px-3 py-4">
                Higher Secondary
            </div>
            <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-gray-800">
            
            <ul class="space-y-2 font-medium">
                @foreach($items['classes'] as $key =>$item)
                
                <li>
                   <button wire:click="activeClass('{{ $key }}')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $items['classes'][$key]['is_active'] == true ? 'bg-blue-400 dark:bg-blue-700' : '' }}">
                      
                      <span class="ms-3">{{ $item['name'] }}-{{$key}}</span>
                   </button>
                </li>
                @endforeach
                
                <li>
                   <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                      {{-- <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                         <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                      </svg> --}}
                      <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                      <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                   </a>
                </li>
            </ul>
            </div>


        </aside>
        <main class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">
            @foreach($items['classes'] as $key =>$item)
            @if($items['classes'][$key]['is_active'] == true)
            <div class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">
                <div class="w-full mx-auto px-0 py-0 overflow-y-auto rounded bg-gray-200 dark:bg-gray-800 min-h-screen">
                    {{ $items['classes'][$key]['name'] }}
                </div>

            </div>
            @endif
            @endforeach

        </main>
    </div>

    @livewire('admin-hs-cls-sec-wise-students')

</div>