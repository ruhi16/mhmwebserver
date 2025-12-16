<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manikchak High Madrasah (H.S) - Exam Papers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* =========================================
           INHERITED STYLES (From welcome.blade.php)
           ========================================= */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; overflow-x: hidden; background-color: #f8f9fa; }
        
        /* Navbar Styles */
        .top-navbar { background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%); box-shadow: 0 4px 20px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .navbar-container { max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 15px 30px; }
        .logo-section { display: flex; align-items: center; gap: 15px; }
        .logo { width: 50px; height: 50px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #1a237e; box-shadow: 0 2px 10px rgba(0,0,0,0.2); }
        .school-name { color: white; font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.2); }
        .nav-menu { display: flex; gap: 5px; list-style: none; }
        .nav-link { color: white; text-decoration: none; padding: 10px 20px; display: block; border-radius: 8px; transition: all 0.3s; font-weight: 500; }
        .nav-link:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
        .mobile-toggle { display: none; background: white; border: none; padding: 10px; border-radius: 8px; cursor: pointer; }

        /* Footer Styles */
        .footer { background: #1a237e; color: white; padding: 60px 0 30px; margin-top: auto; }
        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 40px; }
        .footer-column h3 { font-size: 1.3rem; margin-bottom: 20px; position: relative; padding-bottom: 10px; border-bottom: 3px solid #0d47a1; display: inline-block; }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: #e3f2fd; text-decoration: none; transition: all 0.3s; }
        .footer-bottom { text-align: center; padding-top: 30px; margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* =========================================
           NEW SPECIFIC STYLES FOR DOWNLOAD PAGE
           ========================================= */
        
        /* Page Banner */
        .page-header {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 60px 0;
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 4px solid #1a237e;
        }

        .page-title {
            font-size: 2.5rem;
            color: #1a237e;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: #546e7a;
        }

        /* Table Styling */
        .download-wrapper {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 60px;
            overflow: hidden;
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .academic-year-badge {
            background: #1a237e;
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* Responsive Table */
        .table-responsive {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .exam-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px; /* Ensures table doesn't squish too much */
        }

        .exam-table th, .exam-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            border-right: 1px solid #eee;
        }

        .exam-table th {
            background: #1a237e;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .exam-table th:first-child {
            border-top-left-radius: 10px;
        }

        .exam-table th:last-child {
            border-top-right-radius: 10px;
            border-right: none;
        }

        .exam-table tr:last-child td {
            border-bottom: none;
        }

        .exam-table tr:hover {
            background-color: #f8f9fa;
        }

        /* Class Column Styling */
        .class-col {
            background-color: #e8eaf6;
            color: #1a237e;
            font-weight: 800;
            font-size: 1.2rem;
            vertical-align: middle;
        }

        /* Term Column Styling */
        .term-col {
            font-weight: 600;
            color: #455a64;
            text-align: left !important;
            background-color: #fafafa;
        }

        /* Download Button Styling */
        .dl-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #ffebee;
            color: #c62828; /* PDF Red */
            transition: all 0.2s;
            text-decoration: none;
        }

        .dl-btn:hover {
            background-color: #c62828;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(198, 40, 40, 0.3);
        }

        .dl-btn.disabled {
            background-color: #f5f5f5;
            color: #bdbdbd;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Responsive Fixes */
        @media (max-width: 768px) {
            .navbar-container { padding: 15px; }
            .school-name { font-size: 1.1rem; }
            .mobile-toggle { display: block; }
            .nav-menu { display: none; } /* Add JS toggle logic similar to welcome page */
            .page-title { font-size: 1.8rem; }
            
            .footer-container { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav class="top-navbar">
        <div class="navbar-container">
            <div class="logo-section">
                <div class="logo">MHM</div>
                <div class="school-name">Manikchak High Madrasah (H.S)</div>
            </div>
            <button class="mobile-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li><a href="welcome.blade.php" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">Academics</a></li>
                <li><a href="#" class="nav-link">Admissions</a></li>
                <li><a href="#" class="nav-link">Downloads</a></li>
            </ul>
        </div>
    </nav>

    <header class="page-header">
        <div class="container">
            <h1 class="page-title">Exam Papers Download</h1>
            <p class="page-subtitle">Download previous year question papers for academic reference</p>
        </div>
    </header>

    <section class="container">
        <div class="download-wrapper">
            <div class="table-controls">
                <div class="academic-year-badge">
                    <i class="far fa-calendar-alt"></i> Academic Session: 2023-2024
                </div>
                </div>

            <div class="table-responsive">
                <table class="exam-table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Class</th>
                            <th style="width: 150px;">Term</th>
                            <th>Bengali</th>
                            <th>English</th>
                            <th>Math</th>
                            <th>Science</th>
                            <th>History</th>
                            <th>Geography</th>
                            <th>Islam Parichay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" class="class-col">V</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn" title="Download Bengali"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download English"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download Math"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download Science"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download History"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download Geography"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Download Islam Parichay"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Annual Exam</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="class-col">VI</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Annual Exam</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="class-col">VII</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Annual Exam</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="class-col">VIII</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Annual Exam</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="class-col">IX</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn" title="Phy/Life Science"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Annual Exam</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="class-col">X</td>
                            <td class="term-col">1st Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">2nd Summative</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td class="term-col">Selection Test</td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                            <td><a href="#" class="dl-btn"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div style="margin-top: 20px; text-align: right; color: #666; font-size: 0.9rem;">
                <i class="fas fa-info-circle"></i> Files are in PDF format. Adobe Reader required.
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Manikchak High Madrasah (H.S) has been providing quality education since 1950. We are committed to nurturing young minds and building responsible citizens.</p>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admissions</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <ul class="footer-links" style="color: #e3f2fd;">
                    <li><i class="fas fa-phone"></i> +91 98765 43210</li>
                    <li><i class="fas fa-envelope"></i> info@manikchakhs.edu.in</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Location</h3>
                <p style="color: #e3f2fd;">Manikchak, Lalgola, Murshidabad, West Bengal 742148</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Manikchak High Madrasah (H.S). All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>