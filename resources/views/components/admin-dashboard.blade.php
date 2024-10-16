
<x-app-layout>
    {{-- <x-slot name="header"> --}}
        @section('header')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Dashboard: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
            </h2>
            {{-- {{ $slot  }} --}}            
            {{-- <div class="min-w-full mx-auto bg-purple-300 text-center text-4xl font-bold my-4">        
                Hello
            </div> --}}

            @yield('component_name')
        @endsection
    {{-- </x-slot> --}}



    {{--  --}}
    <!-- This is Admin Main Section  component -->
    <livewire:admin-dashboard-main-section-component />

    {{--  --}}
    
    <div class="h-auto  min-w-full mx-auto ">
        {{-- <table class="mx-auto mt-5 border-collapse border border-gray-600 ">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Sl</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>            
                <tr>
                    <td class="border border-gray-300 px-4 py-2">1</td>
                    <td class="border border-gray-300 px-4 py-2">Profile management</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.profilemanagement') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Profile Management
                        </a>
                    </td>
                </tr>
                
                    <td class="border border-gray-300 px-4 py-2">2</td>
                    <td class="border border-gray-300 px-4 py-2">Class-Section Wise Task Management</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.myclasssectionmanagement') }}" class="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded">
                            Class-Section Task Management
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">3</td>
                    <td class="border border-gray-300 px-4 py-2">Class-Section Answer Script Distribution</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.myclasssectionwiseanswerscriptmanagement') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                            Class-Section Answer Script Distribution Management
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">4</td>
                    <td class="border border-gray-300 px-4 py-2">Teacher wise Marks Entry Links</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.teacherwisemarksentrylink') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Teacher wise marks entry
                        </a>
                        
                    </td>
                </tr>
                
            </tbody>
        </table> --}}
                   
        {{-- <div class="min-w-4xl mx-auto m-5 mt-5 border-collapse border border-gray-600 ">
            <livewire:admin-tabs-component />
        </div> --}}
    
    {{-- <livewire:admin-voter-list-component /> --}}

    {{-- <livewire:admin-studentdb-component />         --}}

    {{-- <livewire:admin-user-previledge-control-component> --}}
    {{-- Done --}}
    
    {{-- <livewire:admin-myclass-section-component /> --}}
    {{-- Done: This item should be open --}}


    {{-- <livewire:admin-myclass-anser-script-distribution-base-component> --}}
    {{-- Done: Answer Script Distribution Base, in Class-Section Page --}}


    {{-- all studentdbs of the school of current session --}}
     
    {{-- <livewire:exam-detail-component>               --}}
    {{-- XX: class section wise subjects of specific subject type of current session --}}

    

    {{-- <livewire:admin-teacher-wise-marks-entry-links-component> --}}
        
    </div>

</x-app-layout>