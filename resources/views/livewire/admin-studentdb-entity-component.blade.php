<div>
    
    <tr>
        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->id }} </td>
        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->name }} </td>
        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->myclass->name }} </td>
        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->section->name }} </td>
        <td class="border border-gray-300 px-4 py-2">{{ $studentdb->remarks }} </td>
        <td class="border border-gray-300 px-4 py-2">
            {{-- <button
            id="edit-modal-btn"
            type="button"
            class="border border-gray-200 px-4 py-2 mt-2 bg-blue-500 hover:bg-blue-600 text-white rounded  tracking-wider"
          >
            Edit
          </button> --}}
        </td>
    </tr>



</div>