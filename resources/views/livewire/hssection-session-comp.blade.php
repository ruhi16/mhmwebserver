<div>

    <table class="max-w-6xl m-4 p-4 text-sm text-left  bg-white border border-gray-300">
        <thead class="bg-gray-200 text-gray-700 uppercase">
            <tr>
                <th class="px-4 py-2 border border-gray-300">SL</th>
                <th class="px-4 py-2 border border-gray-300">Session</th>
                <th class="px-4 py-2 border border-gray-300">Start</th>
                <th class="px-4 py-2 border border-gray-300">End</th>
                <th class="px-4 py-2 border border-gray-300">Status</th>
                <th class="px-4 py-2 border border-gray-300">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($hsSessions as $session)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{$loop->iteration}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$session->name}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$session->stdate}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$session->endate}}</td>
                    <td class="px-4 py-2 border border-gray-300  {{ $session->status == 'ACTIVE' ? 'bg-green-400' : 'bg-red-400'}}">{{$session->status}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        @if(strtoupper($session->status) != 'ACTIVE')
                            <button wire:click="setActiveSession({{$session->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Set Active</button>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>


</div>