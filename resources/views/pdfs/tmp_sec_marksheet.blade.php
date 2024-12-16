<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Sheet</title>
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
            background-color: #c2c2c2;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* flex-shrink: 0.6; */
        }

        #top-page-info tr td {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;

            padding: 0px;
            text-align: center;
            background-color: #8eb6c1c3
            /* border-bottom: 1px solid #ddd; */
        }

        h1, h2 {
            text-align: center;
            color: #339;
            padding: 0;
            margin: 0;
        }
        
        .school-description {
            margin-bottom: 5px;
            text-align: center;
            /* display: flex; */
        }
        .school-description p {
            margin: 5px;
            padding: 0;         
        }
        .school-description #p-report {
            margin: 5px;
            padding: 0;
            font-size: 20px;
            font-weight: bold;
        }

        
        .student-details {
            margin: 0;
            padding: 0;
            text-align: left;
            /* display: flex; */
        }

        #student-info {
            width:100%;
            height: auto;
            background-color: aqua;
        }

        #student-info .student-details {
            float:left; 
            width: 50%;
            background-color: #8eb6c1c3
        }

        #student-info .student-details p{
            margin: 5px;
            padding: 0;  
            font-size: 15px;
            font-weight: bold;
        }

        #student-info .student-qrcode {
            float: right;
            width: 50%;
            background-color: #d3a5a5
        }

        

        #student-marks{
            width: 100%;
            height: auto;
            align: center;
            border-collapse: collapse;
            margin-top: 5px;
            /* border: 1px solid black; */
            background-color: #c18ebec3 
        }

        #student-marks th, #student-marks td {
            border: 1px solid black;
            
            padding: 4px;
            text-align: center;
            font-size: 12.5px;
        }

        #student-marks table, th, td{
            /* width: 90%; */
            /* height: 80; */
            display: table-row-group;
            vertical-align: top;
            align: center;
            
            border-color: inherit;
            border-collapse: collapse;
        }

        .summary p{
            margin: 5px;
            padding: 0;
        }


        .bottom-page-info tbody tr{
            /* width: 100%; */
            /* height: 300px; */
            /* text-align:center; */
            /* background-color: #8eb6c1c3; */
        }

        .bottom-page-info th, .bottom-page-info td{
            /* width: 100%; */
            /* height: 25; */
            text-align:center;
            /* background-color: #8eb6b123; */
        }

        #bottom-page-info td{
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }


        #student-marks-details{
            width: 100%;
        }

        /* .bottom-page-info th, .bottom-page-info td { */
            /* border: 1px solid black;
            border-collapse: collapse;

            padding: 5px;
            text-align: center;
            font-size: 12px; */            
        /* } */

        /* th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            font-weight: bold;
        } */
        
    </style>
</head>

<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $content }}</p> --}}
    

    <div class="container">
        <table class="top-page-info" id="top-page-info">
            <tr>
                <td>Dise:</td>
                <td>Institution:</td>
                <td>Index:</td>
                <td>Mobile:</td>
            </tr>
        </table>



        <h1>Manikchak High Madrasah(H.S)</h1>
        <div class="school-description">            
            <p>Manikchak * Lalgola * Murshidabad</p>
            <p id="p-report">Progress Report for Session: 2024</p>            
        </div>

        <div id="student-info">
            <div class="student-details">
                <p>Student Name: John Doe</p>
                <p>Student Id: 031245829</p>
                <p>Class: VIII, Section: A, Roll No: 1</p>
                
            </div>
            <div class="student-qrcode">
                <p>QR Code</p>
            </div>
        </div>


        {{-- <h2>Result Sheet</h2> --}}
        <table id="student-marks">
            <thead>
                <tr id="heading">
                    
                    <th>Summative</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table id="student-marks-details">
                            <tr>
                                <th rowspan="3">Subject</th>
                                <th colspan="3">Term 1</th>
                                <th colspan="3">Term 2</th>
                                <th colspan="3">Term 3</th>
                                <th rowspan="3">Total</th>
                                <th rowspan="3">Average</th>
                                <th rowspan="3">Grade</th>
                            </tr>
                            <tr>
                                <th>Sum</th>
                                <th>For</th>
                                <th>Total</th>
                                <th>Sum</th>
                                <th>For</th>
                                <th>Total</th>
                                <th>Sum</th>
                                <th>For</th>
                                <th>Total</th>                                
                            </tr>
                            <tr>
                                <th>40</th>
                                <th>10</th>
                                <th>50</th>
                                <th>40</th>
                                <th>10</th>
                                <th>50</th>
                                <th>90</th>
                                <th>10</th>
                                <th>90</th>                                
                            </tr>
                            <tr>                                
                                <td>Bengali</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            
                            <tr>
                                <td>History</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>                                
                                <td>Bengali</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            
                            <tr>
                                <td>History</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Mathmatics<br/>(Additional)</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                                <td>20</td>                                
                                <td>60</td>
                                <td>100</td>
                                <td>165</td>
                                <td>84.89</td>
                                <td>B+</td>
                            </tr>
                            
                            
                                
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="summary">
            <p>Percentage of Obtained Marks: 84.89%</p>
            <p>Results: Pass</p>
        </div>
        <table class="bottom-page-info" id="bottom-page-info">
            <tr>
                <th>Attendance</th>
                <th>Gurdian Sign</th>
                <th>Class Teacher Sign</th>
                <th>Headmaster Sign</th>
            </tr>
            <tr>
                <td>xx</td>
                <td>ww</td>
                <td>yy</td>
                <td>zz</td>
            </tr>
        </table>
    </div>

</body>

</html>