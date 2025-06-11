<x-app-layout>
    {{-- <x-slot name="header"> --}}
    @section('header')
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ 'Dashboard: ' . __(auth()->user()->role->name) . ': ' . __(auth()->user()->teacher->id).'-' . __(auth()->user()->teacher->name).' (User Name: '.__(auth()->user()->name).')' }}
        </h2>
    @endsection
    {{-- </x-slot> --}}

    <div class="h-fit min-w-full mx-auto">

        <div class="min-w-fit mx-auto bg-purple-300 text-center text-4xl font-bold my-4">
            Teacher Dashboard
        </div>
        <livewire:users-profile-detais-component >
            {{-- {{auth()->user()->teacher->myclassteachers }} --}}
        
        {{-- Count: {{ $myclassTeachers->where('teacher_id', auth()->user()->teacher->id)->count() }} --}}

        @if($myclassTeachers->where('teacher_id', auth()->user()->teacher->id)->count() > 0)

        @foreach($myclassTeachers->where('teacher_id', auth()->user()->teacher->id) as $myclassTeacher)
            {{-- {{ $myclassTeacher->myclass->name }}-{{  $myclassTeacher->section->name }} --}}
        

            @php
            // if($myclassTeachers->where('teacher_id', auth()->user()->teacher->id)->count() > 0 ){
                $myclassSection = $myclassSections
                    ->where('myclass_id', $myclassTeacher->myclass->id)
                    ->where('section_id', $myclassTeacher->section->id)
                    // ->where('myclass_id', $myclassTeachers->where('teacher_id', auth()->user()->teacher->id)->first()->myclass_id)
                    // ->where('section_id', $myclassTeachers->where('teacher_id', auth()->user()->teacher->id)->first()->section_id)
                    ->first()
                    ;
                // }
                $colors = ['purple', 'orange', 'rose'];
            @endphp
            
            {{-- <livewire:subadmin-marks-entry-entity-component :myclassSection_id='{{ $myclassSection->id }}' :examterm_id='1' :examtype_id='1' > --}}
            <table class="min-w-auto mx-auto my-8 border-collapse border border-gray-600 ">
                <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
                    Formative Marks Entry For: {{ $myclassSection->myclass->name }}-{{  $myclassSection->section->name }}
                </caption>
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Sl</th>                        
                        <th class="border border-gray-300 px-4 py-2 font-bold">Formative Exam Term</th>                        
                        <th class="border border-gray-300 px-4 py-2">Action</th>
            
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        
                        <td class="border border-gray-300 px-4 py-2">{{ $exam->name }}</td>
                        
                        <td class="border border-gray-300 px-4 py-2">
                            <a class="bg-{{$colors[$exam->id-1]}}-500 hover:bg-{{$colors[$exam->id-1]}}-700 text-white font-bold py-2 px-4 rounded"
                                href="{{ route('subadmin.formativemarksentryentity', [
                                    'myclassSection_id' => $myclassSection->id, 
                                    'examterm_id' => $exam->id, 
                                    'examtype_id' => 1,
                                ]) }}">Formative {{ $exam->name }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @endforeach
    
        @endif
kkk
        <livewire:admin-teacher-wise-marks-entry-links-component :teacher_id="auth()->user()->teacher->id" >

        {{-- <livewire:admin-teacher-wise-marks-entry-links-component> --}}

        
        {{-- <livewire: user-change-password-component > --}}


        
    </div>
    






    {{-- <livewire:users-profile-detais-component > --}}
    {{-- <livewire:footer-component /> --}}

</x-app-layout>
