<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Events - Manikchak High Madrasah (H.S)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Enhanced Navbar */
        .top-navbar {
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #1a237e;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .school-name {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .nav-menu {
            display: flex;
            gap: 5px;
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: rgba(255,255,255,0.2);
            border-bottom: 3px solid white;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            margin-top: 10px;
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-link {
            color: #333;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }

        .dropdown-link:hover {
            background: #f0f0f0;
            padding-left: 25px;
        }

        .mobile-toggle {
            display: none;
            background: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        /* Improved Hero Section with Image Slider */
        .hero-section {
            position: relative;
            height: 80vh;
            min-height: 600px;
            overflow: hidden;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            width: 100%;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #1a237e;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #0d47a1;
            font-weight: 500;
        }

        .hero-location {
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 30px;
            color: #546e7a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-location i {
            color: #1a237e;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #1a237e;
            color: white;
            box-shadow: 0 4px 15px rgba(26, 35, 126, 0.3);
        }

        .btn-primary:hover {
            background: #0d47a1;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(26, 35, 126, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #1a237e;
            border: 2px solid #1a237e;
        }

        .btn-secondary:hover {
            background: #f5f5f5;
            transform: translateY(-3px);
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        /* Image Slider Styles */
        .image-slider {
            position: relative;
            width: 100%;
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .slider-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-dot.active {
            background: white;
            transform: scale(1.2);
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.8);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 10;
        }

        .slider-arrow:hover {
            background: white;
        }

        .slider-prev {
            left: 15px;
        }

        .slider-next {
            right: 15px;
        }

        .floating-card {
            position: absolute;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 15px;
            animation: float 6s ease-in-out infinite;
        }

        .floating-card.students {
            top: 20%;
            left: -50px;
            animation-delay: 0s;
        }

        .floating-card.teachers {
            bottom: 20%;
            right: -30px;
            animation-delay: 2s;
        }

        .floating-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e3f2fd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a237e;
            font-size: 1.5rem;
        }

        .floating-card .text h3 {
            font-size: 1.5rem;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .floating-card .text p {
            color: #546e7a;
            font-size: 0.9rem;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            color: white;
            padding: 80px 0 50px;
            text-align: center;
        }

        .page-title {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .page-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #1a237e;
            margin: 60px 0 40px;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #1a237e, #0d47a1);
        }

        /* Events Filter */
        .events-filter {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 25px;
            background: white;
            border: 2px solid #1a237e;
            border-radius: 50px;
            color: #1a237e;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .filter-btn.active, .filter-btn:hover {
            background: #1a237e;
            color: white;
        }

        /* Events Grid */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .event-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .event-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .event-card:hover .event-image img {
            transform: scale(1.1);
        }

        .event-content {
            padding: 25px;
        }

        .event-date {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #666;
        }

        .event-date i {
            color: #1a237e;
        }

        .event-title {
            font-size: 1.4rem;
            color: #1a237e;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .event-desc {
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .event-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .event-category {
            background: #e3f2fd;
            color: #1a237e;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .event-status {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .status-upcoming {
            color: #4caf50;
        }

        .status-ongoing {
            color: #ff9800;
        }

        .status-completed {
            color: #f44336;
        }

        /* Calendar Section */
        .calendar-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 60px 0;
        }

        .calendar-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            margin: 0 auto;
        }

        .calendar-header {
            background: #1a237e;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-nav {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .calendar-nav:hover {
            background: rgba(255,255,255,0.2);
        }

        .calendar-month {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding: 20px;
            gap: 10px;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: 700;
            color: #1a237e;
            padding: 10px 0;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .calendar-day:hover {
            background: #f0f0f0;
        }

        .calendar-day.has-event {
            background: #e3f2fd;
            font-weight: 600;
        }

        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 5px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #1a237e;
        }

        .calendar-day.today {
            background: #1a237e;
            color: white;
        }

        .calendar-day.today.has-event::after {
            background: white;
        }

        .calendar-day.other-month {
            color: #ccc;
        }

        /* Event Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.95);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            position: relative;
            width: 90%;
            max-width: 800px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: white;
            color: black;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .modal-image {
            width: 100%;
            height: 300px;
            overflow: hidden;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-title {
            font-size: 2rem;
            color: #1a237e;
            margin-bottom: 15px;
        }

        .modal-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .modal-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .modal-meta-item i {
            color: #1a237e;
        }

        .modal-desc {
            line-height: 1.7;
            margin-bottom: 25px;
            color: #555;
        }

        .modal-highlights {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .modal-highlights h4 {
            color: #1a237e;
            margin-bottom: 10px;
        }

        .modal-highlights ul {
            padding-left: 20px;
        }

        .modal-highlights li {
            margin-bottom: 8px;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        /* Footer */
        .footer {
            background: #1a237e;
            color: white;
            padding: 60px 0 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #0d47a1;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #e3f2fd;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #e3f2fd;
        }

        .footer-contact i {
            margin-right: 10px;
            width: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: #0d47a1;
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
                flex-direction: column;
                padding: 20px;
                border-radius: 0 0 15px 15px;
            }

            .nav-menu.active {
                display: flex;
            }

            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                margin-top: 10px;
                background: rgba(255,255,255,0.1);
            }

            .dropdown-link {
                color: white;
            }

            .hero-section {
                height: auto;
                padding: 60px 0;
            }

            .hero-container {
                flex-direction: column;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.3rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .floating-card {
                position: relative;
                margin: 15px 0;
            }

            .floating-card.students,
            .floating-card.teachers {
                position: relative;
                left: auto;
                right: auto;
                top: auto;
                bottom: auto;
            }

            .image-slider {
                height: 300px;
            }

            .page-title {
                font-size: 2.5rem;
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            .modal-meta {
                flex-direction: column;
                gap: 10px;
            }

            .modal-actions {
                flex-direction: column;
            }

            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .footer-container {
                grid-template-columns: 1fr;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .calendar-grid {
                gap: 5px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="top-navbar">
        <div class="navbar-container">
            <div class="logo-section">
                <div class="logo">MHM</div>
                <div class="school-name">Manikchak High Madrasah (H.S)</div>
            </div>
            <button class="mobile-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-link">History</a>
                        <a href="#" class="dropdown-link">Mission & Vision</a>
                        <a href="#" class="dropdown-link">Infrastructure</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Academics</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-link">Curriculum</a>
                        <a href="#" class="dropdown-link">Faculty</a>
                        <a href="#" class="dropdown-link">Results</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Admissions</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('schoolevents') }}" class="nav-link active">Events</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Improved Hero Section with Image Slider -->
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Manikchak High Madrasah (H.S)</h1>
                <p class="hero-subtitle">Excellence in Education Since 1921</p>
                <p class="hero-location">
                    <i class="fas fa-map-marker-alt"></i>
                    Manikchak • Lalgola • Murshidabad
                </p>
                <p>We are committed to providing quality education that nurtures young minds and prepares them for a bright future. Our institution combines traditional values with modern teaching methodologies.</p>
                <div class="hero-buttons">
                    <a href="{{ route('schoolacademics') }}" class="btn btn-primary">
                        <i class="fas fa-book-open"></i> Explore Academics
                    </a>
                    <a href="{{ route('schoolevents') }}" class="btn btn-secondary">
                        <i class="fas fa-calendar-alt"></i> School Events
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="image-slider">
                    <div class="slider-container">
                        <div class="slide active">
                            <img src="https://images.pexels.com/photos/207684/pexels-photo-207684.jpeg?w=600&h=600&fit=crop" alt="School Building">
                        </div>
                        <div class="slide">
                            <img src="https://images.pexels.com/photos/8458953/pexels-photo-8458953.jpeg?w=600&h=600&fit=crop" alt="School Campus">
                        </div>
                        <div class="slide">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&h=600&fit=crop" alt="Students">
                        </div>
                        <div class="slide">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=600&fit=crop" alt="Cultural Event">
                        </div>
                    </div>
                    <button class="slider-arrow slider-prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-arrow slider-next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <div class="slider-nav">
                        <div class="slider-dot active"></div>
                        <div class="slider-dot"></div>
                        <div class="slider-dot"></div>
                        <div class="slider-dot"></div>
                    </div>
                </div>
                <div class="floating-card students">
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="text">
                        <h3>850+</h3>
                        <p>Students</p>
                    </div>
                </div>
                <div class="floating-card teachers">
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="text">
                        <h3>45+</h3>
                        <p>Teachers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">School Events</h1>
            <p class="page-subtitle">Stay updated with all the exciting events, activities, and celebrations happening at our school throughout the academic year.</p>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="upcoming-events">
        <div class="container">
            <h2 class="section-title">Upcoming Events</h2>
            
            <div class="events-filter">
                <button class="filter-btn active" data-filter="all">All Events</button>
                <button class="filter-btn" data-filter="academic">Academic</button>
                <button class="filter-btn" data-filter="cultural">Cultural</button>
                <button class="filter-btn" data-filter="sports">Sports</button>
                <button class="filter-btn" data-filter="community">Community</button>
            </div>
            
            <div class="events-grid" id="eventsGrid">
                <!-- Event cards will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Events Calendar Section -->
    <section class="calendar-section">
        <div class="container">
            <h2 class="section-title">Events Calendar</h2>
            <div class="calendar-container">
                <div class="calendar-header">
                    <button class="calendar-nav" id="prevMonth">‹</button>
                    <div class="calendar-month" id="currentMonth">April 2024</div>
                    <button class="calendar-nav" id="nextMonth">›</button>
                </div>
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Event Modal -->
    <div class="modal" id="eventModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeEventModal()">×</button>
            <div class="modal-image">
                <img id="modalEventImage" src="" alt="Event Image">
            </div>
            <div class="modal-body">
                <h2 class="modal-title" id="modalEventTitle"></h2>
                <div class="modal-meta">
                    <div class="modal-meta-item">
                        <i class="far fa-calendar"></i>
                        <span id="modalEventDate"></span>
                    </div>
                    <div class="modal-meta-item">
                        <i class="far fa-clock"></i>
                        <span id="modalEventTime"></span>
                    </div>
                    <div class="modal-meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="modalEventLocation"></span>
                    </div>
                    <div class="modal-meta-item">
                        <i class="fas fa-users"></i>
                        <span id="modalEventAudience"></span>
                    </div>
                </div>
                <div class="modal-desc" id="modalEventDesc"></div>
                <div class="modal-highlights">
                    <h4>Event Highlights</h4>
                    <ul id="modalEventHighlights">
                        <!-- Highlights will be populated by JavaScript -->
                    </ul>
                </div>
                <div class="modal-actions">
                    <button class="btn btn-primary">
                        <i class="fas fa-calendar-plus"></i> Add to Calendar
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-share-alt"></i> Share Event
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Manikchak High Madrasah (H.S) has been providing quality education since 1950. We are committed to nurturing young minds and building responsible citizens.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admissions</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="{{ route('schoolevents') }}">Events</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Academics</h3>
                <ul class="footer-links">
                    <li><a href="#">Curriculum</a></li>
                    <li><a href="#">Faculty</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="#">Laboratories</a></li>
                    <li><a href="#">Examination</a></li>
                    <li><a href="#">Results</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> Manikchak, Lalgola, Murshidabad, West Bengal 742148</p>
                    <p><i class="fas fa-phone"></i> +91 98765 43210</p>
                    <p><i class="fas fa-envelope"></i> info@manikchakhs.edu.in</p>
                    <p><i class="fas fa-clock"></i> Mon - Fri: 9:00 AM - 4:00 PM</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Manikchak High Madrasah (H.S). All Rights Reserved.</p>
            <p>Empowering Minds • Building Futures • Serving Community</p>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        function toggleMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        // Image Slider Functionality
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevBtn = document.querySelector('.slider-prev');
        const nextBtn = document.querySelector('.slider-next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(n) {
            // Reset all slides and dots
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            // Set current slide
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function startSlider() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopSlider() {
            clearInterval(slideInterval);
        }

        // Event listeners for slider
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopSlider();
            startSlider();
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopSlider();
            startSlider();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                stopSlider();
                startSlider();
            });
        });

        // Pause slider on hover
        const sliderContainer = document.querySelector('.slider-container');
        sliderContainer.addEventListener('mouseenter', stopSlider);
        sliderContainer.addEventListener('mouseleave', startSlider);

        // Start the slider
        startSlider();

        // Events Data
        const events = [
            {
                id: 1,
                title: "Annual Sports Day",
                date: "2024-04-25",
                time: "9:00 AM - 4:00 PM",
                location: "School Ground",
                audience: "All Students & Parents",
                category: "sports",
                status: "upcoming",
                image: "https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=600&h=400&fit=crop",
                description: "Join us for our Annual Sports Day featuring various track and field events, team sports competitions, and exciting performances. This year's theme is 'Fitness for All' with special emphasis on participation and sportsmanship.",
                highlights: [
                    "Track events: 100m, 200m, 400m races",
                    "Field events: Long jump, High jump, Shot put",
                    "Team sports: Football, Cricket, Kabaddi",
                    "March past and opening ceremony",
                    "Prize distribution ceremony"
                ]
            },
            {
                id: 2,
                title: "Science Exhibition",
                date: "2024-04-18",
                time: "10:00 AM - 3:00 PM",
                location: "Science Lab & Auditorium",
                audience: "Students of Classes 6-12",
                category: "academic",
                status: "upcoming",
                image: "https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&h=400&fit=crop",
                description: "Our annual Science Exhibition showcases innovative projects by students focusing on sustainable solutions. This year's theme is 'Innovations for a Sustainable Future' with projects in renewable energy, waste management, and environmental conservation.",
                highlights: [
                    "Working models and demonstrations",
                    "Renewable energy projects",
                    "Environmental conservation initiatives",
                    "Judging by external experts",
                    "Special prizes for innovative projects"
                ]
            },
            {
                id: 3,
                title: "Cultural Fest - Spring Melody",
                date: "2024-05-05",
                time: "6:00 PM - 9:00 PM",
                location: "School Auditorium",
                audience: "All Students, Parents & Community",
                category: "cultural",
                status: "upcoming",
                image: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&h=400&fit=crop",
                description: "Experience the vibrant cultural diversity of our school through music, dance, and drama performances. The event will feature traditional and contemporary performances by students from all classes.",
                highlights: [
                    "Classical and folk dance performances",
                    "Musical performances and choir",
                    "Drama and skits on social themes",
                    "Art and craft exhibition",
                    "Food stalls with local delicacies"
                ]
            },
            {
                id: 4,
                title: "Parent-Teacher Meeting",
                date: "2024-04-15",
                time: "10:00 AM - 2:00 PM",
                location: "Respective Classrooms",
                audience: "Parents of All Students",
                category: "academic",
                status: "ongoing",
                image: "https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&h=400&fit=crop",
                description: "The quarterly Parent-Teacher Meeting provides an opportunity for parents to discuss their child's academic progress, strengths, and areas for improvement with subject teachers and class teachers.",
                highlights: [
                    "One-on-one meetings with teachers",
                    "Review of academic performance",
                    "Discussion on student behavior and participation",
                    "Guidance for improvement areas",
                    "Feedback collection from parents"
                ]
            },
            {
                id: 5,
                title: "Community Cleanliness Drive",
                date: "2024-05-12",
                time: "8:00 AM - 12:00 PM",
                location: "School Campus & Surrounding Areas",
                audience: "Students, Teachers & Community Members",
                category: "community",
                status: "upcoming",
                image: "https://images.unsplash.com/photo-1577720643267-ba6ab17d4ff3?w=600&h=400&fit=crop",
                description: "Join our initiative to keep our community clean and green. Students, teachers, and community members will work together to clean the school campus and surrounding areas, followed by a tree plantation drive.",
                highlights: [
                    "Cleanliness drive in school campus",
                    "Awareness campaign on waste management",
                    "Tree plantation activity",
                    "Poster making competition on environmental themes",
                    "Distribution of saplings to participants"
                ]
            },
            {
                id: 6,
                title: "Book Fair",
                date: "2024-04-22",
                time: "9:00 AM - 5:00 PM",
                location: "School Library & Reading Room",
                audience: "All Students, Parents & Staff",
                category: "academic",
                status: "upcoming",
                image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=400&fit=crop",
                description: "Explore a wide collection of educational and recreational books at discounted prices. Various publishers will showcase their latest publications covering academic subjects, fiction, non-fiction, and children's literature.",
                highlights: [
                    "Wide range of books for all age groups",
                    "Special discounts for students",
                    "Author interaction session",
                    "Book reading corner",
                    "Lucky draw for book lovers"
                ]
            }
        ];

        // Filter Events
        const filterButtons = document.querySelectorAll('.filter-btn');
        const eventsGrid = document.getElementById('eventsGrid');

        function filterEvents(category) {
            const filteredEvents = category === 'all' 
                ? events 
                : events.filter(event => event.category === category);
            
            displayEvents(filteredEvents);
        }

        function displayEvents(eventsToDisplay) {
            eventsGrid.innerHTML = '';
            
            eventsToDisplay.forEach(event => {
                const eventCard = document.createElement('div');
                eventCard.className = 'event-card';
                eventCard.setAttribute('data-category', event.category);
                eventCard.setAttribute('data-id', event.id);
                
                eventCard.innerHTML = `
                    <div class="event-image">
                        <img src="${event.image}" alt="${event.title}">
                    </div>
                    <div class="event-content">
                        <div class="event-date">
                            <i class="far fa-calendar"></i>
                            <span>${formatDate(event.date)}</span>
                        </div>
                        <h3 class="event-title">${event.title}</h3>
                        <p class="event-desc">${event.description.substring(0, 100)}...</p>
                        <div class="event-meta">
                            <div class="event-category">${event.category.charAt(0).toUpperCase() + event.category.slice(1)}</div>
                            <div class="event-status ${event.status === 'upcoming' ? 'status-upcoming' : event.status === 'ongoing' ? 'status-ongoing' : 'status-completed'}">
                                <i class="fas fa-circle"></i>
                                ${event.status.charAt(0).toUpperCase() + event.status.slice(1)}
                            </div>
                        </div>
                    </div>
                `;
                
                eventsGrid.appendChild(eventCard);
                
                // Add click event to open modal
                eventCard.addEventListener('click', () => openEventModal(event.id));
            });
        }

        // Format date for display
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        // Initialize event filtering
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                filterEvents(button.getAttribute('data-filter'));
            });
        });

        // Initialize with all events
        displayEvents(events);

        // Event Modal Functions
        const eventModal = document.getElementById('eventModal');
        const modalEventImage = document.getElementById('modalEventImage');
        const modalEventTitle = document.getElementById('modalEventTitle');
        const modalEventDate = document.getElementById('modalEventDate');
        const modalEventTime = document.getElementById('modalEventTime');
        const modalEventLocation = document.getElementById('modalEventLocation');
        const modalEventAudience = document.getElementById('modalEventAudience');
        const modalEventDesc = document.getElementById('modalEventDesc');
        const modalEventHighlights = document.getElementById('modalEventHighlights');

        function openEventModal(eventId) {
            const event = events.find(e => e.id === eventId);
            if (!event) return;
            
            modalEventImage.src = event.image;
            modalEventTitle.textContent = event.title;
            modalEventDate.textContent = formatDate(event.date);
            modalEventTime.textContent = event.time;
            modalEventLocation.textContent = event.location;
            modalEventAudience.textContent = event.audience;
            modalEventDesc.textContent = event.description;
            
            // Populate highlights
            modalEventHighlights.innerHTML = '';
            event.highlights.forEach(highlight => {
                const li = document.createElement('li');
                li.textContent = highlight;
                modalEventHighlights.appendChild(li);
            });
            
            eventModal.classList.add('active');
        }

        function closeEventModal() {
            eventModal.classList.remove('active');
        }

        // Close modal when clicking outside
        eventModal.addEventListener('click', (e) => {
            if (e.target === eventModal) {
                closeEventModal();
            }
        });

        // Calendar Functionality
        const currentMonthElement = document.getElementById('currentMonth');
        const calendarGrid = document.getElementById('calendarGrid');
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');

        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();

        function renderCalendar(month, year) {
            // Update month and year display
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
            currentMonthElement.textContent = `${monthNames[month]} ${year}`;
            
            // Clear previous calendar
            calendarGrid.innerHTML = '';
            
            // Add day headers
            const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            dayHeaders.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day-header';
                dayElement.textContent = day;
                calendarGrid.appendChild(dayElement);
            });
            
            // Get first day of month and number of days
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            // Add empty cells for days before the first day of the month
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day other-month';
                calendarGrid.appendChild(emptyDay);
            }
            
            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;
                
                // Check if today
                const today = new Date();
                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayElement.classList.add('today');
                }
                
                // Check if has event
                const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const hasEvent = events.some(event => event.date === dateString);
                
                if (hasEvent) {
                    dayElement.classList.add('has-event');
                    dayElement.addEventListener('click', () => {
                        const event = events.find(e => e.date === dateString);
                        if (event) openEventModal(event.id);
                    });
                }
                
                calendarGrid.appendChild(dayElement);
            }
            
            // Fill remaining cells to complete the grid (6 rows)
            const totalCells = 42; // 6 rows * 7 days
            const existingCells = calendarGrid.children.length;
            for (let i = existingCells; i < totalCells; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day other-month';
                calendarGrid.appendChild(emptyDay);
            }
        }

        // Initialize calendar
        renderCalendar(currentMonth, currentYear);

        // Month navigation
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });

        // Close modals with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeEventModal();
            }
        });
    </script>
</body>
</html>