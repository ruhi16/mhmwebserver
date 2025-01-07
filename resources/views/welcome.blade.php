<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manikchak High Madrasah(HS)</title>

    <!-- For Tailwind CSS -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        /* html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}} */
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="min-w-full">
    {{--
    <livewire:navbar-component /> --}}

    <!-- <div class="relative flex items-top justify-center min-h-[60vh] 
                    bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> -->
    <div class="">
        <nav class="bg-purple-300 border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                     <svg version="1.0" xmlns="http://www.w3.org/2000/svg"  width="30.000000pt" height="30.000000pt" viewBox="0 0 300.000000 300.000000"  preserveAspectRatio="xMidYMid meet">  <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path d="M1190 2970 c-552 -114 -997 -542 -1142 -1098 -28 -107 -31 -134 -36 -324 -5 -243 7 -337 68 -519 78 -234 184 -404 364 -585 208 -207 416 -326 706 -402 101 -26 115 -27 350 -27 235 0 249 1 354 28 384 97 696 320 908 647 93 143 149 269 195 438 24 90 26 115 28 342 3 208 0 259 -16 342 -55 279 -194 533 -409 749 -200 200 -430 331 -705 401 -116 29 -539 34 -665 8z m593 -50 c292 -60 524 -185 738 -399 214 -214 336 -440 400 -741 32 -149 32 -410 1 -557 -84 -393 -310 -724 -637 -935 -161 -104 -362 -181 -554 -213 -129 -21 -403 -16 -521 10 -569 125 -1000 556 -1125 1125 -26 117 -31 394 -11 522 87 524 453 958 959 1137 83 29 243 65 332 75 88 9 317 -4 418 -24z"/> <path d="M1345 2869 c-458 -54 -860 -338 -1067 -754 -295 -591 -125 -1302 405 -1701 116 -88 302 -182 432 -219 526 -151 1088 18 1434 431 169 203 275 441 312 703 15 106 7 350 -15 451 -118 545 -534 960 -1074 1070 -116 23 -316 32 -427 19z m371 -34 c383 -64 689 -263 913 -594 48 -70 129 -236 154 -316 68 -214 83 -456 42 -670 -21 -110 -82 -283 -127 -365 -38 -66 -72 -125 -80 -135 -5 -5 -30 -39 -57 -75 -63 -85 -197 -212 -292 -277 -156 -107 -334 -181 -524 -219 -120 -24 -367 -24 -480 0 -44 10 -89 19 -100 21 -93 20 -295 109 -396 176 -387 256 -613 678 -608 1134 3 229 45 406 142 595 73 141 130 221 242 336 95 98 242 214 270 214 7 0 15 4 17 9 5 14 184 96 263 121 184 58 436 76 621 45z"/> <path d="M1321 2762 c-18 -19 -26 -21 -32 -11 -12 21 -84 17 -109 -6 -13 -12 -33 -18 -54 -17 -20 2 -38 -4 -46 -13 -7 -8 -28 -15 -47 -15 -21 0 -36 -6 -39 -15 -4 -8 -14 -15 -23 -15 -9 0 -27 -9 -40 -19 l-23 -18 23 -64 c13 -35 31 -78 42 -96 12 -20 14 -33 7 -38 -13 -8 -32 4 -25 16 4 5 0 9 -8 9 -18 0 -77 65 -77 85 0 8 -9 24 -21 36 -16 16 -23 18 -35 8 -8 -6 -14 -8 -14 -3 0 5 -7 -2 -16 -14 -8 -12 -21 -22 -28 -22 -19 0 -47 -46 -40 -64 9 -24 -4 -36 -29 -27 -43 17 -86 -32 -65 -73 9 -17 7 -18 -23 -12 -32 5 -37 2 -79 -49 -25 -30 -45 -62 -45 -70 0 -9 -11 -21 -25 -28 -28 -14 -50 -51 -50 -84 0 -13 -6 -23 -13 -23 -8 0 -18 -10 -24 -22 -35 -73 -47 -105 -48 -120 0 -9 -6 -23 -12 -29 -7 -7 -13 -23 -13 -35 0 -12 -6 -34 -14 -49 -20 -38 -30 -119 -18 -142 8 -15 6 -22 -9 -31 -26 -17 -25 -66 2 -86 l22 -15 -25 -23 c-22 -20 -25 -31 -26 -95 0 -49 4 -76 14 -83 8 -7 55 -12 114 -13 133 -1 132 -2 136 145 1 62 10 147 18 188 19 90 65 226 89 260 9 13 17 30 17 36 0 7 7 14 15 18 14 5 38 48 39 70 1 5 31 41 69 79 37 39 67 77 67 84 0 7 6 13 14 13 7 0 33 17 57 38 24 20 56 44 72 52 15 7 30 25 34 39 9 39 12 42 32 29 18 -11 75 7 177 54 12 6 39 11 60 12 22 1 50 8 63 15 13 7 55 15 93 17 38 2 73 6 78 9 6 4 10 51 10 106 0 133 -10 150 -89 146 -43 -1 -61 -7 -80 -25z m139 -64 c0 -40 3 -90 6 -110 6 -34 4 -38 -15 -38 -17 0 -21 6 -21 33 0 40 -13 62 -33 54 -11 -4 -13 -17 -10 -51 5 -42 4 -46 -16 -46 -17 0 -21 6 -22 33 0 17 -4 67 -7 110 -7 76 -7 77 15 77 20 0 23 -5 23 -35 0 -29 4 -35 21 -35 20 0 21 4 15 40 -6 38 -5 40 19 40 24 0 25 -2 25 -72z m-179 21 c15 -29 -3 -49 -30 -32 -10 7 -22 9 -25 6 -9 -10 -7 -69 4 -98 11 -30 43 -31 48 -2 2 11 -1 15 -11 11 -10 -3 -16 3 -19 20 -4 20 -1 26 13 28 11 0 24 1 31 2 15 1 30 -60 23 -91 -7 -29 -40 -46 -72 -38 -47 11 -82 141 -53 196 15 27 75 26 91 -2z m-124 -111 c30 -98 31 -117 1 -118 -6 0 -68 188 -68 209 0 6 8 11 18 11 13 0 24 -24 49 -102z m-71 -29 c29 -65 38 -96 30 -101 -20 -13 -26 -9 -42 32 -14 34 -19 38 -35 29 -19 -10 -19 -11 1 -49 20 -38 20 -40 1 -49 -16 -9 -22 -4 -41 42 -12 28 -33 74 -46 101 -18 38 -21 52 -12 58 21 13 27 9 42 -27 11 -25 19 -33 30 -29 20 8 20 17 1 54 -11 22 -12 30 -2 33 24 10 32 0 73 -94z m-181 -135 c28 -21 52 -39 54 -41 3 -2 -4 -10 -15 -17 -17 -13 -22 -12 -51 16 -40 39 -54 30 -28 -18 14 -26 16 -37 7 -46 -14 -14 -14 -15 -85 89 -48 71 -53 84 -40 95 12 10 17 9 23 -2 5 -8 16 -24 24 -35 15 -19 16 -17 9 24 -5 36 -3 46 13 58 18 13 20 11 29 -36 9 -43 17 -54 60 -87z m-137 -69 c71 -52 80 -61 67 -74 -12 -12 -17 -12 -30 -1 -13 11 -19 11 -32 -3 -13 -12 -14 -19 -5 -30 10 -11 9 -17 -3 -27 -9 -7 -17 -11 -19 -9 -11 13 -106 181 -106 187 0 15 23 31 35 24 6 -4 48 -34 93 -67z m-39 -171 c-10 -12 -17 -10 -46 12 -31 23 -37 25 -49 12 -13 -13 -11 -18 21 -43 33 -24 35 -29 22 -42 -14 -14 -23 -9 -89 47 -40 34 -77 66 -82 71 -5 5 -4 15 4 24 12 14 16 13 41 -11 25 -24 30 -25 45 -13 15 12 13 16 -16 41 -28 23 -31 30 -21 42 11 13 24 6 97 -56 68 -57 82 -73 73 -84z m-225 0 c22 -9 21 -46 -1 -42 -12 2 -18 -3 -18 -15 0 -25 75 -70 95 -57 12 7 11 12 -4 29 -17 19 -17 21 -2 27 44 17 78 -74 36 -96 -51 -27 -180 52 -180 111 0 38 34 58 74 43z m-85 -138 c22 -35 53 -46 134 -46 40 0 44 -6 24 -34 -11 -14 -19 -16 -55 -7 -52 11 -54 -6 -4 -29 35 -16 36 -18 23 -39 -8 -12 -26 -7 -105 30 -53 24 -96 49 -96 56 0 21 19 24 50 8 36 -19 38 -10 5 25 -17 18 -23 32 -18 48 8 30 18 28 42 -12z m98 -191 c6 -2 9 -13 6 -23 -5 -19 -8 -19 -86 10 -45 17 -92 33 -104 36 -24 5 -27 11 -18 35 5 11 23 7 98 -20 51 -19 97 -36 104 -38z m-117 -39 c78 -19 95 -27 95 -42 0 -16 -10 -20 -52 -24 -70 -7 -75 -16 -14 -25 54 -7 64 -14 52 -33 -6 -9 -32 -7 -112 10 -84 19 -104 26 -101 39 3 16 42 29 88 29 44 0 25 18 -26 25 -27 4 -50 8 -50 10 0 11 13 35 19 35 3 -1 49 -11 101 -24z m76 -162 c-3 -9 -6 -19 -6 -24 0 -4 -8 -7 -17 -6 -12 0 -19 -7 -21 -21 -2 -16 2 -23 12 -23 9 0 16 -8 16 -20 0 -11 -4 -20 -9 -20 -5 0 -52 16 -105 36 -83 32 -96 40 -96 60 0 23 3 23 103 27 56 1 108 4 116 5 8 1 11 -4 7 -14z m-16 -150 c0 -10 -15 -14 -62 -15 -66 -1 -64 -4 15 -14 82 -11 48 -45 -46 -45 -17 0 -27 -3 -24 -7 4 -4 32 -5 62 -4 47 2 55 0 55 -16 0 -16 -9 -18 -107 -16 -108 2 -108 2 -111 27 -3 23 0 26 30 27 18 1 47 5 63 9 26 6 22 8 -32 15 -56 7 -63 10 -63 30 0 12 2 24 4 26 2 2 52 3 110 1 84 -3 106 -6 106 -18z"/> <path d="M700 2373 c1 -14 27 -43 39 -43 19 0 12 17 -14 34 -14 9 -25 13 -25 9z"/> <path d="M326 1640 c15 -15 56 -17 61 -2 3 8 -7 12 -33 12 -25 0 -35 -3 -28 -10z"/> <path d="M1561 2769 c-18 -42 -41 -180 -35 -204 6 -25 22 -34 66 -40 15 -2 54 -9 88 -15 33 -6 65 -8 70 -5 5 3 34 -8 65 -25 30 -16 69 -30 85 -30 17 0 30 -4 30 -9 0 -5 14 -14 30 -21 17 -7 47 -26 67 -42 20 -15 47 -31 60 -34 25 -7 83 -60 110 -101 8 -13 19 -21 23 -18 4 3 15 -6 24 -19 8 -14 23 -27 33 -30 10 -3 24 -20 32 -38 8 -18 25 -44 38 -57 12 -13 23 -29 23 -36 0 -23 38 -48 64 -41 30 7 123 67 154 98 25 25 29 63 9 75 -8 4 -20 22 -28 38 -11 23 -23 31 -49 35 -34 5 -35 6 -32 43 5 50 -11 68 -55 63 -33 -4 -34 -4 -28 27 5 27 1 37 -24 61 -29 28 -36 29 -91 15 -11 -3 -15 5 -15 34 0 55 -40 80 -83 53 -17 -10 -20 -7 -24 26 -7 49 -64 87 -121 79 -9 -1 -29 11 -43 28 -14 17 -33 31 -43 31 -9 0 -22 5 -28 11 -8 8 -16 6 -29 -9 -10 -12 -21 -19 -26 -16 -4 3 -8 0 -8 -6 0 -22 -18 0 -23 29 -7 35 -39 49 -73 30 -21 -11 -27 -10 -45 9 -11 12 -30 22 -43 22 -13 0 -44 3 -69 6 -42 6 -47 4 -56 -17z m53 -5 c12 -5 16 -20 16 -62 0 -64 7 -63 24 5 11 42 15 48 37 45 13 -2 24 -5 25 -5 0 -1 -6 -51 -14 -110 -13 -89 -18 -107 -31 -104 -9 2 -15 8 -14 13 1 6 4 35 7 65 l6 54 -16 -50 c-8 -27 -17 -56 -19 -62 -3 -7 -11 -13 -19 -13 -12 0 -14 13 -10 73 3 50 1 66 -5 52 -5 -11 -10 -34 -10 -52 -1 -42 -10 -63 -27 -63 -17 0 -16 -6 -4 83 22 151 19 144 54 131z m207 -34 c5 0 9 -49 9 -110 0 -103 -1 -110 -20 -110 -13 0 -20 7 -20 19 0 25 -31 37 -46 17 -13 -19 -48 -22 -41 -3 49 125 84 196 95 192 8 -3 18 -5 23 -5z m133 -45 c23 -10 38 -24 42 -40 11 -43 -37 -156 -73 -169 -16 -7 -83 11 -83 21 0 8 72 203 75 203 2 0 19 -7 39 -15z m182 -96 c19 -21 6 -58 -29 -86 -16 -12 -27 -34 -32 -63 l-7 -45 38 35 c22 19 57 52 79 72 35 33 43 36 58 25 17 -12 16 -16 -9 -72 -14 -33 -35 -80 -45 -104 -16 -36 -22 -41 -34 -31 -9 7 -13 21 -9 35 6 25 -24 45 -37 23 -6 -9 -16 -7 -43 7 -38 21 -41 31 -27 83 13 44 -5 42 -26 -3 -16 -34 -36 -45 -48 -26 -3 5 18 52 47 104 l53 95 28 -17 c16 -9 35 -23 43 -32z m232 -161 c14 -14 16 -47 4 -66 -13 -19 -44 -3 -37 18 3 10 1 21 -5 25 -16 10 -23 -21 -10 -45 22 -42 -27 -110 -79 -110 -11 0 -28 11 -36 24 -15 22 -15 27 0 56 13 26 19 29 31 20 8 -8 12 -21 8 -36 -4 -17 -2 -24 9 -24 20 0 29 27 17 50 -16 29 -12 49 15 75 26 27 64 32 83 13z m49 -206 c-33 -48 -62 -89 -64 -91 -1 -2 -9 2 -17 8 -12 10 -13 17 -4 31 17 27 -6 54 -33 37 -14 -9 -21 -9 -31 1 -14 14 -21 8 87 75 82 51 91 55 107 41 15 -15 12 -22 -45 -102z m118 -28 c-11 -9 -27 -19 -35 -24 -13 -8 -13 -11 1 -25 14 -14 18 -14 42 5 27 22 47 20 47 -4 0 -7 -39 -39 -86 -70 -76 -51 -88 -56 -101 -43 -13 13 -10 17 21 36 35 22 46 44 26 56 -5 3 -25 -5 -44 -20 -30 -23 -35 -24 -47 -9 -11 13 -11 17 1 24 8 5 49 33 90 63 66 48 77 53 90 40 13 -13 13 -16 -5 -29z"/> <path d="M1782 2645 c-14 -31 -15 -45 -3 -45 10 0 26 58 19 66 -3 2 -10 -7 -16 -21z"/> <path d="M1912 2589 c-11 -30 -18 -57 -15 -61 10 -18 25 -5 45 38 18 41 18 48 5 61 -13 13 -17 9 -35 -38z"/> <path d="M2065 2560 c-8 -26 -1 -35 20 -26 18 7 17 37 -2 43 -6 2 -14 -5 -18 -17z"/> <path d="M2171 2446 c-18 -19 -19 -25 -8 -29 9 -3 19 4 26 20 16 34 9 38 -18 9z"/> <path d="M2381 2261 c-14 -11 -21 -23 -17 -30 5 -8 14 -3 28 14 25 32 20 39 -11 16z"/> <path d="M1365 2434 c-85 -14 -177 -38 -218 -60 -16 -8 -37 -14 -48 -14 -10 0 -19 -3 -19 -8 0 -4 -17 -16 -37 -27 -47 -25 -207 -144 -212 -157 -2 -6 -14 -20 -28 -31 -55 -48 -193 -286 -193 -333 0 -15 -11 -56 -28 -104 -10 -26 -11 -52 -13 -185 -1 -136 26 -304 57 -352 8 -12 14 -31 14 -43 0 -11 4 -20 9 -20 5 0 13 -10 17 -22 28 -88 215 -300 319 -360 115 -68 244 -118 349 -137 109 -20 341 -11 406 16 8 3 17 7 20 8 77 23 113 36 139 49 17 9 31 13 31 9 0 -5 7 1 16 12 8 11 17 19 20 17 6 -3 150 98 179 126 62 59 142 163 160 206 8 19 19 37 23 40 5 3 24 45 41 93 18 48 35 95 38 103 14 36 35 237 28 259 -9 31 12 34 53 9 33 -20 49 -23 141 -22 71 0 106 4 109 12 2 7 9 12 17 12 7 0 18 7 25 15 10 12 9 20 -4 39 -9 14 -12 28 -7 31 5 3 8 26 7 51 -4 74 -50 95 -145 68 -19 -6 -22 -3 -20 11 4 18 9 22 64 46 63 28 82 62 50 89 -9 7 -14 19 -11 25 2 7 -2 25 -10 40 -8 15 -14 35 -14 45 0 10 -6 22 -12 28 -16 13 -108 22 -108 10 0 -4 -10 -8 -22 -8 -13 0 -36 -9 -52 -19 -16 -11 -35 -17 -42 -14 -8 3 -14 -2 -14 -11 0 -9 -4 -16 -9 -16 -5 0 -13 -9 -16 -20 -4 -11 -10 -18 -13 -16 -4 2 -12 -7 -19 -20 -9 -19 -8 -24 3 -24 8 0 14 -4 14 -10 0 -5 10 -10 23 -10 34 0 48 -13 58 -56 6 -21 15 -57 20 -79 6 -22 9 -59 6 -82 -3 -26 0 -44 7 -47 6 -2 0 -5 -13 -5 -14 -1 -32 -8 -42 -17 -19 -17 -21 -12 -35 96 -3 30 -20 91 -36 135 -16 44 -30 85 -31 91 -2 6 -10 23 -20 37 -9 15 -17 29 -17 32 0 6 -76 119 -100 149 -49 60 -179 165 -262 210 -76 41 -192 86 -224 86 -11 0 -24 3 -28 7 -19 20 -249 31 -341 17z m325 -41 c563 -117 876 -735 639 -1261 -107 -239 -323 -425 -584 -503 -101 -30 -312 -37 -426 -15 -270 55 -510 240 -634 491 -69 140 -90 232 -90 400 0 114 5 155 23 224 45 166 126 306 243 422 221 218 522 306 829 242z m980 -392 c0 -5 -16 -12 -36 -16 -53 -9 -143 -51 -186 -85 -49 -40 -65 -18 -17 23 49 41 106 69 169 83 55 11 70 10 70 -5z m23 -70 c3 -15 -4 -21 -33 -30 -31 -9 -37 -15 -33 -31 6 -24 5 -24 48 -6 32 14 35 13 40 -5 4 -11 5 -21 3 -23 -1 -1 -48 -16 -103 -34 -75 -24 -101 -29 -107 -19 -13 21 -9 26 32 38 29 9 40 18 40 32 0 15 -5 18 -22 13 -67 -19 -78 -19 -78 0 0 15 20 25 98 50 119 39 109 38 115 15z m-113 -191 c0 -11 -6 -20 -14 -20 -8 0 -21 -3 -30 -6 -11 -4 -16 0 -16 14 0 21 12 30 43 31 11 1 17 -6 17 -19z m169 -52 c14 -24 14 -28 -3 -47 -21 -23 -56 -28 -56 -8 0 7 5 18 11 24 12 12 3 37 -11 28 -4 -3 -11 -17 -15 -32 -9 -36 -32 -52 -76 -53 -69 0 -93 71 -33 99 22 10 29 9 35 -1 13 -19 11 -28 -5 -28 -21 0 -31 -21 -16 -30 18 -11 40 -1 40 17 0 7 11 25 25 39 34 34 83 30 104 -8z m-104 -124 c44 3 90 8 103 12 15 4 22 2 22 -8 0 -20 -77 -38 -159 -38 -75 0 -131 15 -131 35 0 10 9 11 43 3 23 -5 78 -7 122 -4z"/> <path d="M1352 2359 c-340 -60 -613 -318 -693 -654 -27 -117 -27 -284 1 -403 57 -242 233 -462 455 -572 115 -56 210 -80 345 -87 157 -7 274 17 414 86 565 277 655 1036 171 1444 -79 66 -234 146 -335 172 -77 20 -282 28 -358 14z m334 -69 c280 -70 498 -279 586 -560 20 -65 23 -96 23 -225 0 -129 -3 -160 -23 -225 -85 -269 -278 -464 -547 -550 -87 -28 -271 -38 -371 -21 -241 42 -462 210 -573 433 -67 136 -85 212 -85 363 0 151 18 227 85 362 113 229 316 381 584 437 62 12 247 5 321 -14z"/> <path d="M1097 1977 c-14 -11 -87 -136 -87 -150 0 -3 71 -49 158 -102 86 -54 192 -119 235 -146 87 -54 87 -54 87 -36 0 7 -101 75 -225 151 -124 76 -225 140 -225 143 0 3 16 34 36 70 26 46 40 61 47 54 8 -8 5 -24 -11 -57 -22 -45 -22 -47 -5 -66 10 -11 60 -40 113 -65 105 -50 164 -88 228 -146 23 -22 42 -35 42 -29 0 26 -120 114 -241 177 -72 38 -133 74 -136 80 -5 16 45 130 54 122 3 -4 -4 -30 -18 -58 l-23 -51 24 -20 c14 -11 61 -38 105 -60 95 -48 169 -95 209 -132 15 -15 30 -25 33 -23 11 12 -101 93 -199 143 -60 30 -108 58 -105 60 6 6 180 -80 220 -108 16 -11 31 -18 34 -15 3 3 -10 15 -28 26 -19 12 -29 21 -22 21 6 0 32 -16 57 -35 25 -19 46 -31 46 -25 0 15 -77 64 -197 124 l-113 56 27 43 26 43 78 -28 c102 -35 128 -49 163 -87 l30 -31 35 34 c42 40 81 60 172 91 l66 23 22 -38 c11 -21 21 -43 21 -49 0 -5 -52 -35 -115 -65 -64 -30 -139 -73 -167 -96 -46 -37 -53 -39 -68 -25 -26 24 -36 17 -12 -8 27 -28 54 -28 84 0 13 11 34 27 48 37 14 9 25 22 25 28 0 6 7 13 15 15 13 4 13 3 0 -6 -27 -19 -2 -12 54 16 30 15 53 30 50 35 -3 4 2 5 10 2 8 -3 29 2 46 11 18 9 34 15 36 12 2 -2 -46 -29 -108 -60 -109 -54 -198 -117 -198 -140 0 -6 15 3 33 19 50 48 90 73 218 135 66 32 119 63 119 68 0 5 -11 34 -25 65 -14 31 -21 56 -16 56 4 0 21 -28 36 -62 33 -74 44 -62 -135 -153 -124 -64 -200 -117 -221 -158 -7 -11 19 6 57 38 44 37 109 77 180 112 61 29 123 62 137 74 l26 20 -23 54 c-20 44 -22 55 -10 59 10 4 25 -16 49 -63 l34 -69 -219 -132 c-121 -73 -225 -139 -231 -146 -28 -34 6 -23 88 29 48 30 156 96 240 147 l152 92 -40 80 c-39 77 -41 80 -70 74 -16 -3 -29 -1 -29 4 0 19 -77 10 -161 -19 -109 -36 -162 -64 -188 -97 -17 -21 -22 -23 -27 -11 -10 28 -80 67 -182 102 -102 35 -165 44 -177 25 -5 -8 -11 -8 -19 -1 -9 8 -17 7 -29 -2z m79 -55 c-17 -33 -22 -53 -15 -57 6 -4 13 -4 16 -1 4 3 1 6 -6 6 -7 0 -5 13 8 38 31 60 54 82 26 25 -14 -29 -25 -55 -25 -58 0 -3 48 -28 107 -55 58 -28 104 -52 102 -54 -2 -3 -46 15 -97 39 -50 25 -98 42 -105 40 -7 -3 -21 1 -32 9 -20 14 -20 15 8 71 15 32 30 55 33 52 3 -3 -6 -28 -20 -55z m688 1 c31 -63 27 -74 -31 -79 l-38 -2 28 14 c15 8 27 18 27 22 0 4 -11 27 -25 51 -14 23 -25 44 -25 45 0 1 8 2 18 3 13 1 27 -15 46 -54z"/> <path d="M1820 1967 c0 -4 9 -26 21 -48 17 -33 18 -43 8 -57 -12 -16 -12 -16 5 -1 17 16 17 19 -8 65 -14 27 -25 45 -26 41z"/> <path d="M1240 1910 c-6 -12 -10 -23 -8 -25 2 -1 29 -12 61 -24 74 -27 133 -57 175 -89 32 -24 32 -24 32 -3 0 48 -126 139 -217 157 -25 5 -33 2 -43 -16z"/> <path d="M1709 1915 c-93 -34 -189 -110 -189 -149 0 -22 3 -21 59 19 26 19 79 46 116 60 103 39 107 42 92 65 -14 23 -28 24 -78 5z"/> <path d="M1508 1627 c-5 -10 -8 -44 -8 -76 0 -31 -5 -62 -10 -67 -15 -15 12 -36 35 -28 12 5 15 13 9 28 -3 11 -9 53 -13 91 -4 46 -9 64 -13 52z"/> <path d="M1262 1580 c-28 -27 -41 -80 -21 -80 13 0 79 44 79 53 0 10 -7 9 -41 -9 -44 -22 -47 -10 -4 16 64 40 90 1 33 -50 -18 -17 -56 -42 -84 -57 -46 -24 -94 -76 -82 -89 4 -3 133 71 287 163 10 6 -3 19 -47 46 -33 20 -67 37 -75 37 -9 0 -29 -13 -45 -30z"/> <path d="M1637 1573 c-51 -32 -56 -37 -40 -47 10 -7 78 -47 151 -91 73 -44 129 -81 124 -83 -5 -1 -75 36 -155 84 -81 47 -152 84 -158 82 -7 -2 61 -48 150 -102 89 -54 164 -97 166 -95 10 11 8 38 -4 67 -10 23 -30 41 -71 63 -31 16 -71 43 -88 59 -57 52 -31 90 33 50 43 -26 40 -38 -4 -16 -34 18 -41 19 -41 9 0 -10 66 -53 80 -53 21 0 2 64 -26 87 -37 30 -47 28 -117 -14z"/> <path d="M1302 1435 c-78 -47 -147 -85 -153 -85 -6 0 -9 -6 -6 -12 2 -7 9 -12 14 -11 14 3 313 183 313 189 0 14 -41 -6 -168 -81z"/> <path d="M940 1145 l0 -95 55 0 c48 0 55 2 55 20 0 18 -4 20 -40 14 -38 -6 -40 -5 -40 20 0 24 3 26 41 26 33 0 40 3 37 18 -3 13 -12 16 -41 15 -34 -2 -37 0 -37 23 0 24 3 26 40 22 33 -3 40 0 40 14 0 15 -9 18 -55 18 l-55 0 0 -95z"/> <path d="M1094 1215 c-23 -35 -7 -69 41 -85 41 -14 45 -43 7 -48 -17 -3 -25 2 -29 17 -7 26 -33 28 -33 3 0 -46 72 -69 103 -34 33 36 19 78 -34 99 -42 16 -49 30 -23 40 10 4 22 -1 29 -10 16 -22 35 -22 35 1 0 47 -69 59 -96 17z"/> <path d="M1220 1226 c0 -8 10 -16 22 -18 20 -3 21 -8 19 -80 -2 -74 -1 -78 19 -78 21 0 22 3 19 78 -4 74 -3 77 19 80 12 2 22 10 22 18 0 11 -15 14 -60 14 -45 0 -60 -3 -60 -14z"/> <path d="M1360 1145 l0 -95 43 0 c60 0 82 25 82 95 0 70 -22 95 -82 95 l-43 0 0 -95z m80 55 c10 -6 15 -25 15 -55 0 -47 -15 -68 -44 -62 -11 1 -15 17 -14 60 1 31 2 59 2 62 2 8 25 5 41 -5z"/> <path d="M1683 1210 c-32 -40 -28 -71 5 -38 9 9 12 -3 12 -55 0 -53 3 -67 15 -67 12 0 15 17 15 95 0 105 -8 115 -47 65z"/> <path d="M1796 1224 c-20 -20 -21 -78 -1 -94 8 -7 24 -10 35 -7 21 5 24 -1 14 -27 -7 -17 -34 -22 -34 -6 0 6 -7 10 -15 10 -8 0 -15 -6 -15 -13 0 -20 22 -37 48 -37 25 0 52 48 52 95 0 14 -7 41 -14 60 -16 39 -44 46 -70 19z m44 -33 c12 -23 3 -54 -14 -48 -14 5 -21 67 -7 67 6 0 15 -9 21 -19z"/> <path d="M1916 1218 c-9 -12 -16 -26 -16 -30 0 -14 22 -8 35 9 13 18 35 10 35 -13 0 -7 -16 -34 -35 -60 -48 -63 -46 -74 15 -74 44 0 50 3 50 21 0 18 -4 20 -31 14 l-31 -7 31 43 c34 47 39 79 15 103 -22 22 -50 20 -68 -6z"/> <path d="M2053 1210 c-32 -40 -28 -71 5 -38 9 9 12 -3 12 -55 0 -53 3 -67 15 -67 12 0 15 17 15 95 0 105 -8 115 -47 65z"/> <path d="M1520 1120 c0 -16 7 -20 30 -20 23 0 30 4 30 20 0 16 -7 20 -30 20 -23 0 -30 -4 -30 -20z"/> <path d="M2622 1418 c-5 -7 -12 -22 -14 -33 -3 -16 -11 -20 -47 -20 -47 0 -66 -19 -39 -39 25 -19 28 -44 6 -71 -16 -20 -18 -29 -8 -40 8 -9 18 -12 29 -7 34 17 54 8 63 -27 12 -46 20 -33 12 19 -7 45 -3 44 -84 24 -23 -5 -22 -3 12 30 l37 35 -36 30 c-20 17 -34 33 -32 36 3 3 25 -2 49 -10 53 -19 50 -19 50 8 0 31 11 67 20 67 4 0 11 -20 14 -45 4 -25 9 -45 12 -45 3 0 21 7 41 15 49 21 55 10 14 -27 l-34 -31 34 -28 c42 -34 32 -47 -20 -27 l-39 16 -9 -49 c-6 -27 -6 -49 -2 -49 4 0 11 15 14 34 7 33 7 33 51 28 36 -4 44 -2 44 12 0 9 -8 24 -17 34 -25 26 -25 37 -3 57 39 35 17 65 -34 46 -27 -11 -34 -6 -40 31 -2 18 -16 38 -25 38 -5 0 -13 -6 -19 -12z"/> <path d="M369 1283 c-13 -36 -25 -42 -68 -37 -33 4 -32 3 14 -14 l50 -19 9 43 c12 55 22 56 31 3 8 -44 3 -43 85 -23 23 5 21 2 -13 -31 l-38 -36 27 -22 c15 -12 32 -25 38 -29 23 -15 -3 -17 -44 -3 -23 8 -44 15 -45 15 -2 0 -6 -20 -9 -45 -4 -25 -11 -45 -15 -45 -5 0 -12 20 -15 45 -4 25 -9 45 -10 45 -2 0 -20 -7 -41 -16 -50 -21 -57 -9 -16 28 l33 30 -33 28 c-37 30 -53 32 -26 2 21 -23 22 -46 2 -62 -8 -7 -15 -21 -15 -32 0 -17 5 -18 43 -13 43 7 44 6 53 -27 12 -42 39 -49 49 -11 5 15 7 32 6 37 -1 5 18 6 43 3 54 -8 67 5 38 36 -24 26 -24 47 1 72 27 26 15 40 -34 40 -40 0 -44 2 -53 33 -11 39 -33 42 -47 5z"/> <path d="M2524 1140 c-30 -12 -62 -56 -76 -104 -7 -22 -21 -49 -30 -58 -10 -10 -18 -25 -18 -34 0 -18 -17 -37 -41 -46 -9 -4 -23 -20 -30 -37 -8 -17 -18 -31 -22 -31 -5 0 -6 -4 -2 -9 5 -9 -13 -33 -38 -48 -7 -5 -20 -20 -30 -35 -10 -16 -22 -28 -28 -28 -17 0 -107 -61 -113 -76 -3 -8 -11 -14 -19 -14 -7 0 -24 -11 -36 -24 -13 -14 -49 -33 -80 -42 -31 -9 -67 -24 -81 -33 -14 -8 -27 -16 -30 -16 -55 -8 -103 -21 -155 -41 -20 -8 -118 -14 -211 -14 -58 0 -71 -10 -74 -60 -9 -125 5 -152 78 -144 26 3 88 6 138 7 58 2 97 7 107 15 9 8 24 12 34 11 18 -2 130 28 148 40 6 4 17 7 25 6 8 -1 34 9 57 22 23 12 48 23 55 23 8 0 24 9 36 20 12 11 28 20 35 20 8 0 20 7 27 15 7 8 17 15 22 15 5 0 18 9 30 20 12 10 25 17 30 14 4 -3 8 -1 8 3 0 5 12 16 28 26 46 28 132 114 132 131 0 9 6 16 14 16 17 0 112 102 121 130 3 11 10 20 15 20 5 0 15 18 21 40 7 22 20 47 31 56 10 10 18 21 18 26 0 5 10 25 23 46 45 73 26 135 -50 167 -40 17 -40 17 -69 5z m86 -49 c14 -10 27 -26 29 -36 4 -21 -19 -95 -29 -95 -11 0 -140 61 -140 66 0 14 41 83 52 87 20 9 60 -2 88 -22z m-74 -133 c49 -9 64 -15 62 -27 -2 -9 -12 -17 -23 -20 -26 -4 -36 -21 -31 -46 5 -19 -9 -55 -17 -45 -2 3 -27 30 -56 62 -48 51 -51 58 -39 77 7 12 19 19 26 16 7 -2 42 -10 78 -17z m-104 -88 c7 -11 19 -20 27 -20 17 0 51 -29 51 -44 0 -14 -51 -86 -61 -86 -11 0 -119 81 -119 89 0 14 62 81 76 81 7 0 19 -9 26 -20z m-66 -132 c38 -17 71 -33 73 -34 10 -9 -24 -34 -39 -29 -20 6 -45 -19 -35 -35 3 -5 0 -19 -8 -30 -14 -20 -16 -19 -42 32 -15 29 -34 62 -41 72 -12 17 -11 23 3 38 9 10 17 18 18 18 2 0 34 -14 71 -32z m-85 -79 c39 -42 38 -77 -3 -117 l-33 -31 -52 63 -52 63 37 27 c48 34 68 33 103 -5z m-107 -101 c42 -56 44 -63 29 -72 -10 -5 -19 -9 -21 -8 -2 1 -23 28 -47 60 -32 44 -40 63 -32 71 18 18 23 14 71 -51z m-69 -15 c15 -27 35 -56 43 -66 14 -16 14 -19 2 -27 -24 -15 -36 -12 -48 15 -10 22 -15 24 -33 15 -19 -11 -20 -13 -4 -36 13 -20 14 -28 4 -40 -17 -21 -22 -18 -52 37 -22 38 -33 49 -45 43 -10 -4 -27 -6 -39 -5 -13 0 -23 -3 -23 -9 0 -5 19 -10 42 -12 37 -3 44 -7 53 -32 8 -25 6 -31 -18 -52 -34 -29 -58 -30 -80 -6 -22 24 -11 34 30 26 26 -5 33 -3 33 10 0 12 -10 16 -40 16 -43 0 -66 25 -55 59 8 27 58 46 84 32 17 -10 20 -9 15 4 -8 20 25 33 37 14 5 -8 10 -18 12 -23 2 -5 13 -3 26 3 21 12 21 14 7 35 -11 17 -12 26 -3 35 18 18 23 14 52 -36z m-249 -115 c0 -24 8 -46 22 -61 27 -28 27 -34 5 -40 -10 -2 -30 8 -45 21 -32 30 -43 25 -29 -11 5 -14 7 -28 4 -31 -11 -11 -43 -6 -43 7 0 6 -9 39 -20 72 l-19 60 6 -63 c7 -75 -10 -102 -63 -102 -42 0 -59 25 -68 96 -6 46 -4 52 14 57 22 6 27 -7 32 -73 2 -28 8 -36 26 -38 23 -3 23 -2 16 56 l-6 59 53 16 c30 9 68 15 84 14 28 -2 30 -5 31 -39z m-267 -78 c2 -67 -1 -80 -14 -80 -11 0 -15 11 -15 45 0 25 -4 45 -10 45 -5 0 -10 -10 -10 -22 -1 -78 -38 -90 -55 -18 l-10 45 -3 -52 c-2 -36 -7 -53 -16 -53 -16 0 -26 44 -26 111 0 48 1 49 30 49 25 0 30 -4 36 -35 8 -45 24 -55 24 -16 0 46 10 61 39 61 27 0 27 0 30 -80z"/> <path d="M2525 1059 c-9 -13 -7 -15 38 -34 35 -14 37 -14 37 3 0 10 -5 23 -12 30 -15 15 -55 16 -63 1z"/> <path d="M2392 838 c-7 -7 -12 -16 -12 -20 0 -12 28 -10 36 3 10 17 -10 31 -24 17z"/> <path d="M2434 799 c-3 -6 -1 -16 5 -22 9 -9 14 -8 21 3 5 8 10 18 10 23 0 11 -28 8 -36 -4z"/> <path d="M2204 639 c-7 -13 45 -71 58 -63 14 9 9 40 -10 57 -21 20 -38 22 -48 6z"/> <path d="M1790 430 c-11 -7 -12 -12 -3 -21 13 -13 33 -4 33 17 0 16 -9 18 -30 4z"/> <path d="M495 1042 c-24 -8 -72 -39 -102 -65 -17 -15 -21 -27 -16 -46 10 -40 41 -91 89 -144 24 -27 44 -53 44 -59 0 -23 158 -181 198 -197 18 -8 41 -26 52 -41 11 -15 40 -37 64 -49 24 -11 47 -25 50 -30 10 -15 64 -41 133 -62 34 -11 65 -24 68 -29 9 -14 49 -12 63 2 7 7 12 43 12 93 0 69 -3 85 -20 100 -25 23 -59 14 -102 -27 -33 -33 -33 -33 -36 -9 -2 13 0 26 5 30 7 5 8 12 4 47 -1 15 -108 94 -126 94 -8 0 -15 5 -15 11 0 5 -4 8 -9 4 -6 -3 -15 5 -22 17 -21 41 -50 61 -89 62 -37 1 -38 2 -34 33 3 25 -1 36 -21 51 -14 11 -25 25 -25 31 0 5 -13 24 -29 40 -25 26 -33 28 -64 22 -19 -5 -40 -11 -46 -15 -7 -5 -11 1 -11 13 0 12 5 21 10 21 6 0 20 10 31 21 22 22 22 23 4 55 -18 35 -24 37 -60 26z m55 -52 c0 -4 -22 -17 -50 -30 -27 -13 -50 -26 -50 -29 0 -4 7 -17 16 -30 14 -19 14 -25 3 -32 -22 -14 1 -10 70 11 35 11 65 19 65 18 1 -2 7 -10 14 -20 11 -14 6 -26 -35 -82 -37 -51 -50 -63 -60 -54 -8 6 -11 19 -7 30 7 22 -11 48 -35 48 -9 0 -31 28 -52 65 l-37 64 67 39 c58 34 68 37 79 24 6 -9 12 -19 12 -22z m130 -185 c10 -12 6 -19 -20 -42 -18 -16 -39 -32 -47 -36 -12 -7 -11 -13 7 -32 22 -23 22 -55 1 -55 -5 0 -24 18 -41 41 l-33 40 54 49 c30 27 57 49 60 50 4 0 12 -7 19 -15z m104 -106 c15 -12 26 -30 26 -45 0 -32 -28 -32 -40 1 -11 29 -35 32 -62 8 -24 -22 -23 -50 3 -64 20 -10 21 -9 15 14 -9 36 7 41 34 12 l23 -25 -22 -24 c-20 -21 -27 -23 -50 -15 -68 26 -81 80 -32 130 35 34 68 37 105 8z m114 -89 c30 -28 28 -71 -4 -109 -31 -37 -68 -40 -101 -9 -32 30 -29 69 6 107 34 36 68 40 99 11z m80 -48 c10 -7 7 -19 -13 -53 -31 -55 -31 -63 1 -78 18 -8 24 -17 20 -29 -6 -16 4 -6 75 76 25 28 32 31 50 21 20 -10 21 -16 14 -87 -4 -43 -8 -79 -10 -80 -10 -10 -43 11 -38 23 6 18 -38 38 -49 22 -6 -11 -133 36 -143 53 -7 11 58 139 70 139 6 0 16 -3 23 -7z"/> <path d="M553 847 c-14 -8 -19 -17 -14 -25 6 -9 12 -7 26 8 22 25 17 32 -12 17z"/> <path d="M825 566 c-18 -28 -14 -56 8 -56 21 0 49 36 45 57 -5 28 -35 27 -53 -1z"/> <path d="M1273 460 c-13 -5 -23 -14 -23 -21 0 -6 -7 -8 -17 -5 -10 4 -14 4 -10 0 4 -4 -2 -17 -14 -30 l-20 -22 26 -50 c27 -51 47 -68 68 -55 40 22 87 67 87 82 0 20 -56 111 -67 110 -5 0 -18 -4 -30 -9z m56 -50 c17 -28 31 -52 31 -55 0 -2 -21 -20 -47 -40 l-47 -36 -29 52 -30 52 44 38 c24 21 45 39 46 39 1 0 15 -23 32 -50z"/> </g> </svg> 


                    {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> --}}

                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Manikchak High Madrasah(H.S)</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="z-10 hidden font-normal  divide-y divide-gray-100  dark:bg-gray-700 dark:divide-gray-600  absolute top-10 right-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="google.com" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Signout</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        


        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block bg-slate-400">
            @auth
            <a wire:navigate href="{{ url('/dashboard') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a wire:navigate href="{{ route('login') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

            @if (Route::has('register'))
            <a wire:navigate href="{{ route('login') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
        {{-- --}}
        {{-- --}}
        <div class="h-fit">
            <div class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% h-2/4">
                <section class="">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                        <h1
                            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-16xl dark:text-black">
                            Manikchak High Madrasah (H.S)
                        </h1>
                        <p
                            class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                            Manikchak * Lalgola * Murshidabad
                        </p>
                        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                            <a href="#"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Get started
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <a href="#"
                                class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
                                Learn more
                            </a>
                        </div>
                    </div>
                    <div>

                    </div>
                </section>
            </div>

            @php
            $bg_colors = ['blue', 'indigo', 'red', 'yellow', 'green', 'purple', 'pink'];

            @endphp
            {{-- bg-gradient-to-r from-teal-100 from-10% via-sky-100 via-30% to-rose-100 to-90% --}}
            <div class="mx-auto max-w-screen-4xl px-4 pt-8 sm:px-6 lg:px-8 ">

                <div class="grid md:grid-cols-3 gap-4">
                    {{-- ... --}}
                    @foreach($notices as $notice)
                    @php $bg_color_index = random_int(0, count($bg_colors) - 1); @endphp
                    <div
                        class="block max-w-sm mx-auto p-6 bg-{{$bg_colors[$bg_color_index]}}-100 border border--200 cursor-pointer rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-1">
                            Notice: {{ $notice->id}}-{{ $notice->title}}-{{ $bg_color_index }}-
                            bg-{{$bg_colors[$bg_color_index]}}-100
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-2">
                            Desc: {{ $notice->desc }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Published: {{ $notice->dop }} Expire: {{ $notice->doe }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Status: {{ $notice->is_active }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Download Link: <a href="{{ url( $notice->fileaddr )}}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $notice->title
                                }}</a>
                        </p>
                    </div>
                    @endforeach
                    <!-- ... -->
                </div>

                <div class="px-4 mx-auto max-w-screen-xl text-center py-2 lg:py-8 lg:px-12">
                    <button type="button"
                        class="inline-flex items-center gap-2 px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>More, Notices...</div>
                    </button>
                </div>
            </div>


        </div>

        <livewire:footer-component />


        @livewireScripts
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/bootstrap.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

        <script>
            $(document).ready(function() {
              $('#dropdownNavbarLink').on('click', function() {
                $('#dropdownNavbar').toggle(); 
              });
            });
          </script>
          
</body>

</html>