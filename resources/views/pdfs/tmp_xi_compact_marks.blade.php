<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI Compact Marks Register</title>
    <style type="text/css">
        /* Tailwind CSS equivalent with hex colors */
/* Base styles */
.body {
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 
               "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, 
               "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  line-height: 1.5;
}

/* Container styles */
.container {
  display: flex;
}

table {
  flex: 1;
}
.flex {
  display: flex;
}

.flex-wrap {
  flex-wrap: wrap;
}

.gap-4 {
  gap: 16px;
}

.overflow-x-auto {
  overflow-x: auto;
}

.py-4 {
  padding-top: 16px;
  padding-bottom: 16px;
}

/* Table styles */
.min-w-fit {
  min-width: fit-content;
}

.text-xs {
  font-size: 0.75rem; /* 12px */
  line-height: 1rem; /* 16px */
}

.border {
  border-width: 1px;
}

.border-gray-800 {
  border-color: #1f2937; /* gray-800 */
}

/* Table header styles */
.bg-gray-50 {
  background-color: #f9fafb; /* gray-50 */
}

.dark .dark\:bg-gray-800 {
  background-color: #1f2937; /* gray-800 */
}

.px-2 {
  padding-left: 8px;
  padding-right: 8px;
}

.py-1 {
  padding-top: 4px;
  padding-bottom: 4px;
}

.text-left {
  text-align: left;
}

.font-medium {
  font-weight: 500;
}

.font-bold {
  font-weight: 700;
}

.text-gray-800 {
  color: #1f2937; /* gray-800 */
}

.dark .dark\:text-gray-300 {
  color: #d1d5db; /* gray-300 */
}

.text-gray-500 {
  color: #6b7280; /* gray-500 */
}

.uppercase {
  text-transform: uppercase;
}

.tracking-wider {
  letter-spacing: 0.05em;
}

.border-b {
  border-bottom-width: 1px;
}

/* Table body styles */
.bg-white {
  background-color: #ffffff;
}

.dark .dark\:bg-gray-900 {
  background-color: #111827; /* gray-900 */
}

.divide-y > :not([hidden]) ~ :not([hidden]) {
  border-top-width: 1px;
}

.divide-gray-800 > :not([hidden]) ~ :not([hidden]) {
  border-color: #1f2937; /* gray-800 */
}

.whitespace-nowrap {
  white-space: nowrap;
}

/* Additional utility classes */
.col-span-1 {
  grid-column: span 1 / span 1;
}

.col-span-3 {
  grid-column: span 3 / span 3;
}
    </style>






</head>

<body>
    XI Compact Marks Register
    <div class="">
        <div class="flex flex-wrap gap-4 overflow-x-auto py-4">

            @foreach($hs_res_studentcrs as $hs_res_studentcr)
            <table class="min-w-fit gap-2 text-xs border border-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th colspan="1"
                            class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            SL: {{ $loop->iteration }}, SCR: {{ $hs_res_studentcr->id }}, SDB: {{
                            $hs_res_studentcr->hs_studentdb_id }}
                        </th>
                        <th colspan="3"
                            class="px-2 py-1 text-left font-bold text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            {{ $hs_res_studentcr->hsStudentDb->name }}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="1"
                            class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Reg. No
                        </th>
                        <th colspan="3"
                            class="px-2 py-1 text-left font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            {{ $hs_res_studentcr->hsStudentDb->registration_no }}
                        </th>
                    </tr>

                </thead>




                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th
                            class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Subject</th>
                        <th
                            class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Sem 1</th>
                        <th
                            class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Sem 2</th>
                        <th
                            class="px-2 py-1 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider border-b border-gray-800">
                            Proj/Prac</th>
                    </tr>
                </thead>


                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-800">
                    @foreach($hs_res_studentcr->hsStudentdb->hsSubjects as $hsSubject)
                    <tr>
                        <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800"> {{ $hsSubject->hsSubject->name
                            }}</td>

                        @foreach($hs_exam_details2->where('hs_subject_type_id',
                        $hsSubject->hsSubject->hsSubjectType->id) as $exam_detail)
                        <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800">
                            {{ $hs_res_studentcr->hsMarksentries
                            ->where('hs_subject_id', $hsSubject->hsSubject->id)
                            ->where('hs_exam_detail_id', $exam_detail->id)
                            ->first()->obtain_marks ?? '-'
                            }}
                        </td>

                        @endforeach
                        {{-- <td class="px-2 py-1 whitespace-nowrap border-b border-gray-800">
                            <span
                                class="px-1 inline-flex leading-5 font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                        </td> --}}

                    </tr>

                    @endforeach
                </tbody>
            </table>

            @endforeach
        </div>
    </div>
</body>

</html>