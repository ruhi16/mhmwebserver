<div>

    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'About: ' . __(auth()->user()->name . ': ' . __(auth()->user()->teacher->name)) }}
        </h2>        
    @endsection
    
    <div class="h-fit min-w-full mx-auto">
        <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">Info alert!</span> {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('alert-container').innerHTML = '';
                    }, 5000);
                </script>
            @endif
            @if (session()->has('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{ session('error') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('alert-container').innerHTML = '';
                    }, 5000);
                </script>
            @endif
        </div>

        
    <table class="min-w-auto mx-auto my-6 border-collapse border border-gray-300 rounded-lg">
        <caption class="caption-top p-4 font-extrabold text-xl text-gray-800 bg-gray-400 rounded-t-md">
                User Previledge Control Section
            </caption>
        <thead>
            <tr class="bg-gray-700 text-white">
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Role</th>
                <th class="border border-gray-300 px-4 py-2">Teacher Prof</th>
                <th class="border border-gray-300 px-4 py-2">Previledge-Role</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
                <th class="border border-gray-300 px-4 py-2">Teacher Prof</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{$loop->iteration}}-{{$user->id}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->name}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->email}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->role->description ?? 'XXX'}}</td>
                <td class="border border-gray-300 px-4 py-2 {{$user->teacher ? 'font-bold' : ''}}">{{$user->teacher->name ?? 'Not Attached!'}}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{$user->description ?? 'No Description'}} --}}
                    {{-- <select wire:model="userPreviledge.{{ $user->id }}}">
                        <option value=""></option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{$role->name}}-{{ $role->description }}</option>
                        @endforeach
                    </select> --}}
                    {{ $user->is_requested ? 'Request Pending' : '' }}
                </td>

                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{$user->teacher->name ?? 'Not Connected'}} --}}
                    @if($user->teacher_id == 0 )
                        <select wire:model="teacherProfile.{{ $user->id }}">
                            <option value=""></option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </td>

                <td class="border border-gray-300 px-4 py-2">
                    @if( $user->teacher_id ==0 )
                        <button wire:click="grantPreviledge({{ $user->id }})" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Grant</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <table class="min-w-auto mx-auto my-6 border-collapse border border-red-300 rounded-lg">
        <caption class="caption-top p-4 font-extrabold text-xl text-red-800 bg-red-400 rounded-t-md">
                Already Attached Users, Disattached Teachers
            </caption>
        <thead>
            <tr class="bg-red-700 text-white">
                <th class="border border-gray-300 px-4 py-2">Sl</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Role</th>
                <th class="border border-gray-300 px-4 py-2">Teacher Prof</th>
                <th class="border border-gray-300 px-4 py-2">Previledge-Role</th>
                <th class="border border-gray-300 px-4 py-2">Teacher Prof</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            @if($user->teacher_id != 0)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{$user->id}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->name}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->email}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->role->description ?? 'XXX'}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$user->teacher->name ?? 'Not Attached!'}}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{$user->description ?? 'No Description'}} --}}
                    {{-- <select wire:model="userPreviledge.{{ $user->id }}}">
                        <option value=""></option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{$role->name}}-{{ $role->description }}</option>
                        @endforeach
                    </select> --}}
                    {{ $user->is_requested ? 'Request Pending' : '' }}
                </td>

                <td class="border border-gray-300 px-4 py-2">
                    {{-- {{$user->teacher->name ?? 'Not Connected'}} --}}
                    {{-- @if($user->teacher_id == 0 )
                        <select wire:model="teacherProfile.{{ $user->id }}">
                            <option value=""></option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->id }}-{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    @endif --}}
                </td>

                <td class="border border-gray-300 px-4 py-2">
                    @if($user->role->id < 3)
                    <button wire:click="revokePreviledge({{ $user->id }}, {{ $user->teacher_id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Revoke
                    </button>
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    @if($user->role->id < 3)
                    <button 
                        wire:click="deleteUser({{ $user->id }}, {{ $user->teacher_id }})" 
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Delete User
                    </button>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>    
</div>
