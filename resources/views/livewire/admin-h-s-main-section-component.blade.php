<div class="max-w-full mx-8">

    <div class="flex flex-row items-start gap-2 my-4">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Sl
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student Name, DOB & Registration 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Father Name & Mother Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class-Section-Roll & Semester
                    </th>
                    
                    
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hs_studentdbs as $studentdb)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Name: <b>{{ $studentdb->name }}</b><br/>
                        Date of Birth:{{ $studentdb->dob }}<br/>
                        Registration No:{{ $studentdb->registration_no }}
                    </th>
                    <td class="px-6 py-4">
                        Father Name: <b>{{ $studentdb->fname }}</b><br/>
                        Mother Name: <b>{{ $studentdb->mname }}</b>
                    </td>
                    <td class="px-6 py-4">
                        {{ $studentdb->myclass->name ?? 'x' }}-
                        {{ $studentdb->section->name ?? 'x' }}-
                        {{ $studentdb->roll_no ?? 'x' }}
                    </td>
                    <td class="px-6 py-4">
                    </td>
                    <td class="px-6 py-4">
                    </td>
                    <td class="px-6 py-4">
                        <a href="javascript:void(0)" wire:click="edit({{ $studentdb->id }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



</div>