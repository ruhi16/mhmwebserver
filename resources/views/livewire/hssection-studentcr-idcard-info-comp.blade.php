<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(145deg, #1e293b 0%, #334155 100%);
            color: white;
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .sidebar-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            opacity: 1;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .logo {
            opacity: 0;
        }

        .user-profile {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .user-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 16px;
            transition: all 0.3s;
        }

        .sidebar.collapsed .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .user-name {
            font-weight: 600;
            margin-bottom: 4px;
            opacity: 1;
            transition: opacity 0.3s;
        }

        .user-role {
            font-size: 14px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .user-name,
        .sidebar.collapsed .user-role {
            opacity: 0;
        }

        .nav-menu {
            padding: 16px 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            gap: 16px;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-item.active {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border-right: 3px solid #3b82f6;
        }

        .nav-item i {
            width: 20px;
            font-size: 18px;
        }

        .nav-text {
            opacity: 1;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.collapsed + .main-content {
            margin-left: 80px;
        }

        .header {
            background: white;
            padding: 24px 32px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
        }

        .content {
            padding: 32px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
        }

        .stat-card {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin: 16px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .assignment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 12px;
            transition: all 0.2s;
        }

        .assignment-item:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }

        .assignment-title {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .assignment-course {
            color: #64748b;
            font-size: 14px;
        }

        .assignment-due {
            text-align: right;
            font-size: 14px;
        }

        .due-date {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-submitted {
            background: #d1fae5;
            color: #065f46;
        }

        .status-overdue {
            background: #fee2e2;
            color: #991b1b;
        }

        .attendance-calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            margin-top: 16px;
        }

        .calendar-day {
            aspect-ratio: 1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid #e2e8f0;
        }

        .day-present {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }

        .day-absent {
            background: #fee2e2;
            color: #991b1b;
            border-color: #fecaca;
        }

        .day-holiday {
            background: #e0e7ff;
            color: #3730a3;
            border-color: #c7d2fe;
        }

        .recent-activity {
            max-height: 300px;
            overflow-y: auto;
        }

        .activity-item {
            display: flex;
            align-items: start;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .activity-time {
            color: #64748b;
            font-size: 12px;
        }

        .hidden {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar .logo,
            .sidebar .nav-text,
            .sidebar .user-name,
            .sidebar .user-role {
                opacity: 0;
            }
            
            .main-content {
                margin-left: 80px;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .content {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
                <div class="logo">EduPortal</div>
            </div>
            
            <div class="user-profile">
                <div class="user-avatar">👨‍🎓</div>
                <div class="user-name">{{ $hsSturentcr->hsStudentdb->name ?? 'NA'}}</div>
                <div class="user-role">Computer Science Student</div>
            </div>
            
            <div class="nav-menu">
                <a class="nav-item active" onclick="showSection('dashboard')">
                    <i>📊</i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a class="nav-item" onclick="showSection('assignments')">
                    <i>📝</i>
                    <span class="nav-text">Assignments</span>
                </a>
                <a class="nav-item" onclick="showSection('attendance')">
                    <i>📅</i>
                    <span class="nav-text">Attendance</span>
                </a>
                <a class="nav-item" onclick="showSection('grades')">
                    <i>📊</i>
                    <span class="nav-text">Grades</span>
                </a>
                <a class="nav-item" onclick="showSection('schedule')">
                    <i>🕒</i>
                    <span class="nav-text">Schedule</span>
                </a>
                <a class="nav-item" onclick="showSection('profile')">
                    <i>👤</i>
                    <span class="nav-text">Profile</span>
                </a>
                <a class="nav-item" onclick="showSection('activities')">
                    <i>🎯</i>
                    <span class="nav-text">Activities</span>
                </a>
            </div>
        </nav>
        
        <main class="main-content">
            <header class="header">
                <h1 class="page-title" id="pageTitle">Dashboard</h1>
            </header>
            
            <div class="content">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section">
                    <div class="dashboard-grid">
                        <div class="card stat-card">
                            <div class="card-header">
                                <div class="card-title">Current GPA</div>
                                <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">📈</div>
                            </div>
                            <div class="stat-number" style="color: #3b82f6;">3.75</div>
                            <div class="stat-label">Out of 4.0</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 93.75%;"></div>
                            </div>
                        </div>
                        
                        <div class="card stat-card">
                            <div class="card-header">
                                <div class="card-title">Attendance Rate</div>
                                <div class="card-icon" style="background: linear-gradient(135deg, #10b981, #059669);">📊</div>
                            </div>
                            <div class="stat-number" style="color: #10b981;">92%</div>
                            <div class="stat-label">This Semester</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 92%; background: linear-gradient(90deg, #10b981, #059669);"></div>
                            </div>
                        </div>
                        
                        <div class="card stat-card">
                            <div class="card-header">
                                <div class="card-title">Credits Completed</div>
                                <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">🎓</div>
                            </div>
                            <div class="stat-number" style="color: #f59e0b;">78</div>
                            <div class="stat-label">Out of 120</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%; background: linear-gradient(90deg, #f59e0b, #d97706);"></div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Upcoming Assignments</div>
                                <div class="card-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626);">📋</div>
                            </div>
                            <div class="assignment-item">
                                <div>
                                    <div class="assignment-title">Database Design Project</div>
                                    <div class="assignment-course">CS 301 - Database Systems</div>
                                </div>
                                <div class="assignment-due">
                                    <div class="due-date">Due: Dec 20</div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                            </div>
                            <div class="assignment-item">
                                <div>
                                    <div class="assignment-title">Algorithm Analysis</div>
                                    <div class="assignment-course">CS 205 - Data Structures</div>
                                </div>
                                <div class="assignment-due">
                                    <div class="due-date">Due: Dec 22</div>
                                    <span class="status-badge status-submitted">Submitted</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Recent Activities</div>
                                <div class="card-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">🎯</div>
                            </div>
                            <div class="recent-activity">
                                <div class="activity-item">
                                    <div class="activity-icon" style="background: #3b82f6;">📝</div>
                                    <div class="activity-content">
                                        <div class="activity-title">Submitted Machine Learning Assignment</div>
                                        <div class="activity-time">2 hours ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon" style="background: #10b981;">✅</div>
                                    <div class="activity-content">
                                        <div class="activity-title">Attended Computer Networks Lecture</div>
                                        <div class="activity-time">4 hours ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon" style="background: #f59e0b;">📊</div>
                                    <div class="activity-content">
                                        <div class="activity-title">Received grade for Data Structures Quiz</div>
                                        <div class="activity-time">1 day ago</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Other sections (hidden by default) -->
                <div id="assignments-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">All Assignments</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">📝</div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Final Project - Web Application</div>
                                <div class="assignment-course">CS 350 - Web Development</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">Due: Dec 18</div>
                                <span class="status-badge status-pending">In Progress</span>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Research Paper - AI Ethics</div>
                                <div class="assignment-course">CS 401 - Computer Ethics</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">Due: Dec 25</div>
                                <span class="status-badge status-overdue">Overdue</span>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Unit Testing Assignment</div>
                                <div class="assignment-course">CS 302 - Software Engineering</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">Due: Dec 15</div>
                                <span class="status-badge status-submitted">Submitted</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="attendance-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Attendance Overview</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #10b981, #059669);">📅</div>
                        </div>
                        <div class="attendance-calendar">
                            <div class="calendar-day day-present">1</div>
                            <div class="calendar-day day-present">2</div>
                            <div class="calendar-day day-absent">3</div>
                            <div class="calendar-day day-present">4</div>
                            <div class="calendar-day day-present">5</div>
                            <div class="calendar-day day-holiday">6</div>
                            <div class="calendar-day day-holiday">7</div>
                            <div class="calendar-day day-present">8</div>
                            <div class="calendar-day day-present">9</div>
                            <div class="calendar-day day-present">10</div>
                            <div class="calendar-day day-present">11</div>
                            <div class="calendar-day day-absent">12</div>
                            <div class="calendar-day day-holiday">13</div>
                            <div class="calendar-day day-holiday">14</div>
                        </div>
                        <div style="margin-top: 20px; display: flex; gap: 20px; font-size: 14px;">
                            <div>🟢 Present: 85%</div>
                            <div>🔴 Absent: 10%</div>
                            <div>🔵 Holiday: 5%</div>
                        </div>
                    </div>
                </div>
                
                <div id="grades-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Current Semester Grades</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">📊</div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Computer Networks</div>
                                <div class="assignment-course">CS 401</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date" style="color: #059669; font-weight: 600;">A-</div>
                                <div style="font-size: 12px; color: #64748b;">3.7 GPA</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Database Systems</div>
                                <div class="assignment-course">CS 301</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date" style="color: #059669; font-weight: 600;">A</div>
                                <div style="font-size: 12px; color: #64748b;">4.0 GPA</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Software Engineering</div>
                                <div class="assignment-course">CS 302</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date" style="color: #d97706; font-weight: 600;">B+</div>
                                <div style="font-size: 12px; color: #64748b;">3.3 GPA</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="schedule-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Today's Schedule</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">🕒</div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Computer Networks</div>
                                <div class="assignment-course">Room: CS-201</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">9:00 - 10:30 AM</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Database Systems Lab</div>
                                <div class="assignment-course">Room: CS-Lab-A</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">11:00 AM - 12:30 PM</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Software Engineering</div>
                                <div class="assignment-course">Room: CS-102</div>
                            </div>
                            <div class="assignment-due">
                                <div class="due-date">2:00 - 3:30 PM</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="profile-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Student Profile</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626);">👤</div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Student ID</div>
                                <div class="assignment-course">STU2024001</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Email</div>
                                <div class="assignment-course">alex.johnson@university.edu</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Major</div>
                                <div class="assignment-course">Computer Science</div>
                            </div>
                        </div>
                        <div class="assignment-item">
                            <div>
                                <div class="assignment-title">Year</div>
                                <div class="assignment-course">3rd Year</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="activities-section" class="section hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Recent Activities</div>
                            <div class="card-icon" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">🎯</div>
                        </div>
                        <div class="recent-activity">
                            <div class="activity-item">
                                <div class="activity-icon" style="background: #3b82f6;">📝</div>
                                <div class="activity-content">
                                    <div class="activity-title">Submitted Machine Learning Assignment</div>
                                    <div class="activity-time">2 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon" style="background: #10b981;">✅</div>
                                <div class="activity-content">
                                    <div class="activity-title">Attended Computer Networks Lecture</div>
                                    <div class="activity-time">4 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon" style="background: #f59e0b;">📊</div>
                                <div class="activity-content">
                                    <div class="activity-title">Received grade for Data Structures Quiz - A</div>
                                    <div class="activity-time">1 day ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon" style="background: #8b5cf6;">🎓</div>
                                <div class="activity-content">
                                    <div class="activity-title">Joined Study Group for Final Exams</div>
                                    <div class="activity-time">2 days ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon" style="background: #ef4444;">📋</div>
                                <div class="activity-content">
                                    <div class="activity-title">Registered for Spring 2025 Courses</div>
                                    <div class="activity-time">3 days ago</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }

        function showSection(sectionName) {
            // Hide all sections
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.add('hidden'));
            
            // Show selected section
            document.getElementById(sectionName + '-section').classList.remove('hidden');
            
            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'assignments': '
</div>