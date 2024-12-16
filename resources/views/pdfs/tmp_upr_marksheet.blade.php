<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Result Sheet</title> --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: 5px auto;
            /* background-color: #c2c2c2; */
            padding: 20px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        #top-page-info tr td {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;

            padding: 0px;
            text-align: center;
            /* background-color: #8eb6c1c3 */
            /* border-bottom: 1px solid #ddd; */
        }

        h1, h2 {
            text-align: center;
            color: #339;
            padding: 0;
            margin: 0;
        }
        
        .school-title {
            width: 100%;
            display: flex;

        }

        .school-title #left-logo {
            float: left;
            width: 10%;
            /* background-color: #6b856b; */
        
        }
        .school-title  .school-description {
            width: 100%;
            margin-bottom: 5px;
            text-align: center;
            float: left;
            /* background-color: #867373; */
            /* display: flex; */
        }

        .school-title .school-description p {
            margin: 5px;
            padding: 0;         
        }
        .school-title .school-description #p-report {
            margin: 5px;
            padding: 0;
            font-size: 20px;
            font-weight: bold;
            
        }


        .school-title #right-logo {
            float: right;
            width: 10%;
            /* background-color: #339; */
        }


        
        .student-details {
            margin: 0;
            padding: 0;
            text-align: left;            
        }

        .student-details #student-name{
            font-size: 20px;
        }

        #student-info {
            width:100%;
            /* height: fit-content; */
            /* background-color: aqua; */
            
        }

        #student-info .student-details {
            float:left; 
            width: 80%;
            /* background-color: #8eb6c1c3 */
        }

        #student-info .student-details p{
            margin: 5px;
            padding: 0;  
            font-size: 15px;
            font-weight: bold;
        }

        #student-info .student-qrcode p{
            /* float: right; */
            width: 20%;
            /* background-color: #d3a5a5; */
            /* text-align: center;            */
           
        }

        

        #student-marks{
            width: 100%;
            height: auto;
            align: center;
            border-collapse: collapse;
            margin-top: 5px;            
            background-color: #c3def3c3 
        }

        #student-marks th, #student-marks td {
            border: 1px solid black;
            
            padding: 5px;
            text-align: center;
            font-size: 13.5px;
        }

        #student-marks table, th, td{            
            display: table-row-group;
            vertical-align: top;
            align: center;
            
            border-color: inherit;
            border-collapse: collapse;
        }

        

        .summary{
            margin: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
        }


        .bottom-page-info tbody tr{
            /* width: 100%; */
            /* height: 300px; */
            /* text-align:center; */
            /* background-color: #8eb6c1c3; */
        }

        .bottom-page-info td{
            /* width: 100%; */
            height: 50px;
            text-align:center;
            /* height: 200px; */
            /* background-color: #8eb6b123; */
        }

        #bottom-page-info td{
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        #formative-marks, #summative-marks{
            width: 100%;
        }

        
        
    </style>
</head>

<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $content }}</p> --}}
    

    <div class="container">
        <table class="top-page-info" id="top-page-info">
            <tr>
                <td>Dise: 1907 15 15 802</td>
                <td>Institution: 116 126</td>
                <td>Index: 12-04-03-01-035</td>
                <td>Mobile: 973507 71008</td>
            </tr>
        </table>

        <div class="school-title" style="display: flex">
            <div id="left-logo">
                {{-- Hello Left --}}
                {{-- <img src="{{ url('/img/myimage.jpg') }}" alt="logo" width="100px" height="100px"> --}}
            </div>
            <div class="school-description">            
                <h1>Manikchak High Madrasah(H.S)</h1>
                <p>Manikchak * Lalgola * Murshidabad</p>
                <p id="p-report">Progress Report for Session: 2024</p>            
            </div>
            <div id="right-logo">
                {{-- Hello Right --}}
                {{-- <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="logo" width="100px" height="100px"> --}}
            </div>
        </div>

        <div id="student-info">
            <div class="student-details">
                <p id="student-name">Student Name: {{ $studentcr->studentdb->name ?? 'x'}}</p>
                <p>Student Id: 031245829</p>
                <p>Class: VIII, Section: A, Roll No: 1</p>
                
            </div>
            <div class="student-qrcode">
                <div>@if(isset($qrcode)) {!! str_replace('<?xml version="1.0" encoding="UTF-8"?>', '',$qrcode) !!}@endif</div>
            </div>
        </div>


        {{-- <h2>Result Sheet</h2> --}}
        <table id="student-marks">
            <thead>
                <tr id="heading">
                    <th>Formative</th>                    
                    <th>Summative</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table id="formative-marks">
                            <tr>
                                <th>Subject</th>
                                <th>Term 1</th>
                                <th>Term 2</th>
                                <th>Term 3</th>
                                <th>Total</th>
                                <th>Grade</th>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>B+</td>
                            </tr>
                            
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>B+</td>
                            </tr>
                            
                        </table>
                    </td>

                    <td>
                        <table id="summative-marks">
                            <tr>
                                <th>Subject</th>
                                <th>Term 1</th>
                                <th>Term 2</th>
                                <th>Term 3</th>
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>60</td>
                                <td>160</td>
                                <td>80</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>80</td>
                                <td>20</td>
                                <td>65</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            
                                
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <div class="summary">
            <p>Percentage of Obtained Marks: 84.89%</p>
            <p>Results: Pass</p>
        </div> --}}
        <div class="summary">
            <table class="top-page-info" id="top-page-info">
                <tr>
                    <td>Obtained Marks: 802 <br/>[In Word: Eight Hundred Two]</td>
                    <td>Full Marks: </td>
                    <td>Percentage: </td>
                    <td>Results: </td>
                </tr>
            </table>
        </div>
        <table class="bottom-page-info" id="bottom-page-info">
            <tr>
                <th>Attendance</th>
                <th>Gurdian Sign</th>
                <th>Class Teacher Sign</th>
                <th>Headmaster Sign</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

</body>

</html>