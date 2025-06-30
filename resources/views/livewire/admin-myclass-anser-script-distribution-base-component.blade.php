<div>
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
    </h2>
    @endsection


    <div class="h-screen min-w-full mx-auto">

            
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center " role="tablist">
                @foreach($exams as $key =>$exam)
                <li class="me-2 text-bold  {{ $exam_term_active_tab_no == $exam->id ? 'font-extrabold text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500' : 'dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300' }}" role="presentation">
                    <button wire:click="selectExamTermTab('{{ $exam->id }}')" class="inline-block p-4 border-b-2 rounded-t-lg ">{{ $exam->name }}</button>
                </li>
                @endforeach               
                
            </ul>
        </div>


        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">            
            @foreach($myclasses as $myclass)
            <li class="me-2">
                <div  class="inline-block px-4 py-3 rounded-lg 
                                        {{ $myclass_active_tab_no == $myclass->id ? 'text-white bg-blue-600 active':'hover:text-gray-900 hover:bg-gray-300 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                    <butoon wire:click="selectMyclassTab('{{ $myclass->id }}')" class="inline-block p-2 border-b-2 rounded-t-lg">
                        {{$myclass->name}}
                    </butoon>
                </div>
            </li>    
            @endforeach            
        </ul>

        {{-- Exam: {{ $exam_term_active_tab_no }} Myclass: {{ $myclass_active_tab_no }} --}}


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

        @if($exam_id == 1)
            @switch($myclass_id)
                @case(1) <livewire:admin-ansscr-distributioncw-component :myclass_id=1 :exam_id=1 /> @break
                @case(2) <livewire:admin-ansscr-distributioncw-component :myclass_id=2 :exam_id=1 /> @break
                @case(3) <livewire:admin-ansscr-distributioncw-component :myclass_id=3 :exam_id=1 /> @break
                @case(4) <livewire:admin-ansscr-distributioncw-component :myclass_id=4 :exam_id=1 /> @break
                @case(5) <livewire:admin-ansscr-distributioncw-component :myclass_id=5 :exam_id=1 /> @break
                @case(6) <livewire:admin-ansscr-distributioncw-component :myclass_id=6 :exam_id=1 /> @break
                @case(7) <livewire:admin-ansscr-distributioncw-component :myclass_id=7 :exam_id=1 /> @break
                @case(8) <livewire:admin-ansscr-distributioncw-component :myclass_id=8 :exam_id=1 /> @break
            @endswitch
            
        @elseif($exam_id == 2)
            @switch($myclass_id)
                @case(1) <livewire:admin-ansscr-distributioncw-component :myclass_id=1 :exam_id=2 /> @break
                @case(2) <livewire:admin-ansscr-distributioncw-component :myclass_id=2 :exam_id=2 /> @break
                @case(3) <livewire:admin-ansscr-distributioncw-component :myclass_id=3 :exam_id=2 /> @break
                @case(4) <livewire:admin-ansscr-distributioncw-component :myclass_id=4 :exam_id=2 /> @break
                @case(5) <livewire:admin-ansscr-distributioncw-component :myclass_id=5 :exam_id=2 /> @break
                @case(6) <livewire:admin-ansscr-distributioncw-component :myclass_id=6 :exam_id=2 /> @break
                @case(7) <livewire:admin-ansscr-distributioncw-component :myclass_id=7 :exam_id=2 /> @break
                @case(8) <livewire:admin-ansscr-distributioncw-component :myclass_id=8 :exam_id=2 /> @break
            @endswitch
        
        @elseif($exam_id == 3)
            @switch($myclass_id)
                @case(1) <livewire:admin-ansscr-distributioncw-component :myclass_id=1 :exam_id=3 /> @break
                @case(2) <livewire:admin-ansscr-distributioncw-component :myclass_id=2 :exam_id=3 /> @break
                @case(3) <livewire:admin-ansscr-distributioncw-component :myclass_id=3 :exam_id=3 /> @break
                @case(4) <livewire:admin-ansscr-distributioncw-component :myclass_id=4 :exam_id=3 /> @break
                @case(5) <livewire:admin-ansscr-distributioncw-component :myclass_id=5 :exam_id=3 /> @break
                @case(6) <livewire:admin-ansscr-distributioncw-component :myclass_id=6 :exam_id=3 /> @break
                @case(7) <livewire:admin-ansscr-distributioncw-component :myclass_id=7 :exam_id=3 /> @break
                @case(8) <livewire:admin-ansscr-distributioncw-component :myclass_id=8 :exam_id=3 /> @break
            @endswitch
        @endif  
    </div>


</div>