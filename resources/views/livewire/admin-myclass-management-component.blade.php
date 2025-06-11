<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Base: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
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

        <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300">
            
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Sl</th>
                    <th class="border border-gray-300 px-4 py-2">Class</th>
                    {{-- <th class="border border-gray-300 px-4 py-2">Section</th> --}}
                    {{-- <th class="border border-gray-300 px-4 py-2">Class Teacher</th> --}}
                    <th class="border border-gray-300 px-4 py-2">Subjects</th>
                    <th class="border border-gray-300 px-4 py-2">Exam Type</th>
                    <th class="border border-gray-300 px-4 py-2">Marks</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                    <th class="border border-gray-300 px-4 py-2">Formative</th>

                </tr>
            </thead>
            <tbody>

                @foreach($myclasses as $myclass)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $myclass->name }}<br/>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($myclass->myclasssubjects as $myclasssubject ) 
                                {{ $myclasssubject->subject->name }}-
                                {{ $myclasssubject->session_id }}

                                <br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @foreach($myclass->examdetails as $examdetail)
                                {{ $examdetail->exam->name }}: {{ $examdetail->examtype->name }}-{{ $examdetail->exammode->name }}:
                                 - {{ $examdetail->subject->name }} - 
                                {{ $examdetail->full_mark }}/{{ $examdetail->pass_mark }}
                                
                                <br/>
                            @endforeach
                        </td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


        
</div>
