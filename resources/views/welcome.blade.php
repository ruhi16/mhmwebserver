<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manikchak High Madrasah (H.S) - Welcome</title>
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
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .school-name {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
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
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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

        /* Updated Hero Section with Scrolling Images */
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

        /* Image Carousel Section */
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .image-carousel {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .carousel-slide {
            min-width: 100%;
            height: 100%;
            position: relative;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        /* Carousel Controls */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #1a237e;
            z-index: 50;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .carousel-btn:hover {
            background: white;
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-btn.prev {
            left: 20px;
        }

        .carousel-btn.next {
            right: 20px;
        }

        /* Carousel Indicators */
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 50;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s;
        }

        .indicator.active {
            background: white;
            width: 30px;
            border-radius: 6px;
        }

        /* Floating Cards - In front of carousel */
        .floating-card {
            position: absolute;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
            animation: float 6s ease-in-out infinite;
            z-index: 100;
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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
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

        /* Enhanced Notice Board with Table of Contents */
        .notice-board {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 50px 0;
            margin: 40px 0;
        }

        .notice-container {
            display: flex;
            gap: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .notice-toc {
            flex: 0 0 300px;
            background: #f8f9fa;
            padding: 25px;
            border-right: 1px solid #e9ecef;
        }

        .notice-toc h3 {
            color: #1a237e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #1a237e;
        }

        .toc-list {
            list-style: none;
            max-height: 500px;
            overflow-y: auto;
        }

        .toc-item {
            margin-bottom: 15px;
            padding: 12px 15px;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .toc-item:hover {
            background: #e3f2fd;
            transform: translateX(5px);
        }

        .toc-item.active {
            background: #e3f2fd;
            border-left: 3px solid #1a237e;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .toc-title {
            font-weight: 600;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .toc-date {
            font-size: 0.85rem;
            color: #666;
        }

        .notice-content {
            flex: 1;
            padding: 30px;
            max-height: 600px;
            overflow-y: auto;
        }

        .notice-item {
            background: #fff;
            border-left: 4px solid #1a237e;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .notice-item.active {
            transform: translateX(10px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .notice-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 10px;
        }

        .notice-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
            display: flex;
            gap: 15px;
        }

        .notice-date span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .notice-desc {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .notice-download {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #1a237e;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .notice-download:hover {
            color: #0d47a1;
            transform: translateX(5px);
        }

        /* Photo Gallery - Collage */
        .gallery-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .gallery-collage {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(4, 150px);
            gap: 8px;
            margin-top: 40px;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.08);
            z-index: 10;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.15);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.85) 100%);
            display: flex;
            align-items: flex-end;
            padding: 12px;
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* Different sizes for collage effect */
        .gallery-item:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item:nth-child(2) {
            grid-column: span 2;
            grid-row: span 1;
        }

        .gallery-item:nth-child(3) {
            grid-column: span 2;
            grid-row: span 1;
        }

        .gallery-item:nth-child(4) {
            grid-column: span 1;
            grid-row: span 2;
        }

        .gallery-item:nth-child(5) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item:nth-child(6) {
            grid-column: span 1;
            grid-row: span 1;
        }

        .gallery-item:nth-child(7) {
            grid-column: span 2;
            grid-row: span 1;
        }

        .gallery-item:nth-child(8) {
            grid-column: span 1;
            grid-row: span 1;
        }

        /* Teachers Section */
        .teachers-section {
            background: white;
            padding: 60px 0;
        }

        .teachers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .teacher-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .teacher-image {
            width: 100%;
            height: 280px;
            overflow: hidden;
        }

        .teacher-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .teacher-card:hover .teacher-image img {
            transform: scale(1.1);
        }

        .teacher-info {
            padding: 20px;
            text-align: center;
        }

        .teacher-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .teacher-subject {
            color: #666;
            font-style: italic;
            margin-bottom: 10px;
        }

        .teacher-qualification {
            font-size: 0.9rem;
            color: #888;
        }

        /* Modal for Gallery and Teachers */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
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
            max-width: 1000px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
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

        .modal-body {
            display: flex;
            flex-direction: row;
        }

        .modal-image {
            flex: 0 0 50%;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-details {
            flex: 1;
            padding: 30px;
        }

        .modal-name {
            font-size: 2rem;
            color: #1a237e;
            margin-bottom: 10px;
        }

        .modal-subject {
            font-size: 1.3rem;
            color: #666;
            margin-bottom: 15px;
            font-style: italic;
        }

        .modal-qualification {
            font-size: 1.1rem;
            color: #888;
            margin-bottom: 20px;
        }

        .modal-bio {
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        .modal-contact {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #1a237e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .contact-icon:hover {
            background: #0d47a1;
            transform: scale(1.1);
        }

        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .modal-prev {
            left: 20px;
        }

        .modal-next {
            right: 20px;
        }

        /* Gallery Modal */
        .gallery-modal .modal-content {
            max-width: 90%;
            max-height: 90%;
        }

        .gallery-modal .modal-body {
            flex-direction: column;
        }

        .gallery-modal .modal-image {
            flex: 0 0 auto;
        }

        .gallery-modal .modal-image img {
            max-width: 100%;
            max-height: 70vh;
            object-fit: contain;
        }

        .gallery-modal .modal-details {
            text-align: center;
            padding: 20px;
        }

        /* Headmaster Message */
        .headmaster-section {
            background: white;
            padding: 60px 0;
        }

        .headmaster-content {
            display: flex;
            gap: 40px;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .headmaster-image {
            flex-shrink: 0;
        }

        .headmaster-image img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            border: 8px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .headmaster-text h3 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .headmaster-text h4 {
            font-size: 1.2rem;
            font-weight: normal;
            font-style: italic;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .headmaster-text p {
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: justify;
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            color: white;
            padding: 60px 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s, background 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .feature-desc {
            line-height: 1.6;
            opacity: 0.9;
        }

        /* Contact Section */
        .contact-section {
            background: #f8f9fa;
            padding: 60px 0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .contact-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .contact-icon {
            font-size: 2.5rem;
            color: #1a237e;
        }

        .contact-info h4 {
            font-size: 1.2rem;
            color: #1a237e;
            margin-bottom: 8px;
        }

        .contact-info p {
            color: #666;
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
            background: rgba(255, 255, 255, 0.1);
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
            border-top: 1px solid rgba(255, 255, 255, 0.1);
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
                background: rgba(255, 255, 255, 0.1);
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

            .image-carousel {
                height: 400px;
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

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .carousel-btn.prev {
                left: 10px;
            }

            .carousel-btn.next {
                right: 10px;
            }

            .section-title {
                font-size: 2rem;
            }

            .notice-container {
                flex-direction: column;
            }

            .notice-toc {
                flex: 1;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
            }

            .gallery-collage {
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: repeat(6, 120px);
                gap: 6px;
            }

            .headmaster-content {
                flex-direction: column;
                text-align: center;
            }

            .headmaster-image img {
                width: 200px;
                height: 200px;
            }

            .modal-body {
                flex-direction: column;
            }

            .modal-image {
                flex: 0 0 300px;
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
                    <a href="#" class="nav-link">Home</a>
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
                        <a href="{{ asset('upload/booklist/'.'2026_booklist.pdf') }}" class="dropdown-link" download>Booklist</a>
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
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    
    <!-- Hero Section with Scrolling Images -->
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Manikchak High Madrasah (H.S)</h1>
                <p class="hero-subtitle">Excellence in Education Since 1921</p>
                <p class="hero-location">
                    <i class="fas fa-map-marker-alt"></i>
                    Manikchak • Lalgola • Murshidabad
                </p>
                <p>We are committed to providing quality education that nurtures young minds and prepares them for a
                    bright future. Our institution combines traditional values with modern teaching methodologies.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-book-open"></i> Explore Academics
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-calendar-alt"></i> School Events
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="image-carousel">
                    <div class="carousel-track" id="carouselTrack">
                        @foreach($notices->where('image_type', 'building') as $notice)
                        <div class="carousel-slide">
                            <img src="{{ asset( $notice->fileaddr) }}"
                                alt="{{ asset('storage/' . $notice->fileaddr) }}">
                        </div>
                        @endforeach
                        {{-- <div class="carousel-slide">
                            <img src="https://images.pexels.com/photos/33382114/pexels-photo-33382114.jpeg?w=600&h=600&fit=crop"
                                alt="School Building">
                        </div>
                        <div class="carousel-slide">
                            <img src="https://images.pexels.com/photos/8458953/pexels-photo-8458953.jpeg?w=600&h=600&fit=crop"
                                alt="School Campus">
                        </div>
                        <div class="carousel-slide">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&h=600&fit=crop"
                                alt="Students Learning">
                        </div>
                        <div class="carousel-slide">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=600&fit=crop"
                                alt="School Activities">
                        </div> --}}
                    </div>

                    <!-- Navigation Buttons -->
                    <button class="carousel-btn prev" onclick="moveSlide(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-btn next" onclick="moveSlide(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <!-- Indicators -->
                    <div class="carousel-indicators" id="indicators"></div>
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

    <!-- Enhanced Notice Board with Table of Contents -->
    <section class="notice-board">
        <div class="container">
            <h2 class="section-title">Notice Board</h2>
            <div class="notice-container">
                <div class="notice-toc">
                    <h3>Recent Notices</h3>
                    <ul class="toc-list" id="tocList">
                        <!-- Table of Contents will be populated by JavaScript -->
                    </ul>
                </div>
                <div class="notice-content" id="noticeContent">
                    <!-- Notice items will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Headmaster's Message -->
    <section class="headmaster-section">
        <div class="container">
            <h2 class="section-title">Headmaster's Message</h2>
            <div class="headmaster-content">
                <div class="headmaster-image">
                    <img src="
                    https://images.pexels.com/photos/1486064/pexels-photo-1486064.jpeg?w=300&h=300&fit=crop"
                        alt="Headmaster">
                </div>
                <div class="headmaster-text">
                    <h3>Md. Abdur Rouf</h3>
                    <h4>Headmaster</h4>
                    <p>
                        Dear Students, Parents, and Well-wishers, it is with great pride and pleasure that I welcome you
                        to Manikchak High Madrasah.
                        Our institution has been a beacon of knowledge and excellence for over seven decades, nurturing
                        young minds and preparing them for a bright future.
                        We believe in holistic education that combines academic excellence with moral values, ensuring
                        that our students grow not just as scholars, but as responsible citizens.
                        Together, let us continue this journey of enlightenment and growth. Education is the most
                        powerful weapon which you can use to change the world.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Photo Gallery</h2>
            <div class="gallery-collage">
                <div class="gallery-item" data-index="0">
                    <img src="https://images.pexels.com/photos/8458953/pexels-photo-8458953.jpeg?w=600&h=600&fit=crop"
                        alt="School Building">
                    <div class="gallery-overlay">School Building</div>
                </div>
                <div class="gallery-item" data-index="1">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&h=300&fit=crop"
                        alt="Students">
                    <div class="gallery-overlay">Students</div>
                </div>
                <div class="gallery-item" data-index="2">
                    <img src="https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?w=600&h=300&fit=crop"
                        alt="Library">
                    <div class="gallery-overlay">Library</div>
                </div>
                <div class="gallery-item" data-index="3">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=300&h=600&fit=crop"
                        alt="Lab">
                    <div class="gallery-overlay">Science Lab</div>
                </div>
                <div class="gallery-item" data-index="4">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=600&fit=crop"
                        alt="Cultural Event">
                    <div class="gallery-overlay">Cultural Event</div>
                </div>
                <div class="gallery-item" data-index="5">
                    <img src="https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=300&h=300&fit=crop"
                        alt="Sports">
                    <div class="gallery-overlay">Sports Day</div>
                </div>
                <div class="gallery-item" data-index="6">
                    <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=600&h=300&fit=crop"
                        alt="Classroom">
                    <div class="gallery-overlay">Classroom</div>
                </div>
                <div class="gallery-item" data-index="7">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=300&h=300&fit=crop"
                        alt="Computer Lab">
                    <div class="gallery-overlay">Computer Lab</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="teachers-section">
        <div class="container">
            <h2 class="section-title">Our Dedicated Faculty</h2>
            <div class="teachers-grid">
                <!-- Teacher Cards -->
                <div class="teacher-card" data-teacher="1">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop"
                            alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <div class="teacher-name">Prof. Ayesha Rahman</div>
                        <div class="teacher-subject">Mathematics</div>
                        <div class="teacher-qualification">M.Sc, B.Ed</div>
                    </div>
                </div>
                <div class="teacher-card" data-teacher="2">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop"
                            alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <div class="teacher-name">Mr. Arif Hussain</div>
                        <div class="teacher-subject">Physics</div>
                        <div class="teacher-qualification">M.Sc, Ph.D</div>
                    </div>
                </div>
                <div class="teacher-card" data-teacher="3">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&h=300&fit=crop"
                            alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <div class="teacher-name">Ms. Fatima Begum</div>
                        <div class="teacher-subject">English Literature</div>
                        <div class="teacher-qualification">M.A, B.Ed</div>
                    </div>
                </div>
                <div class="teacher-card" data-teacher="4">
                    <div class="teacher-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop"
                            alt="Teacher">
                    </div>
                    <div class="teacher-info">
                        <div class="teacher-name">Mr. Kamal Das</div>
                        <div class="teacher-subject">Chemistry</div>
                        <div class="teacher-qualification">M.Sc, B.Ed</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Modal -->
    <div class="modal gallery-modal" id="galleryModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeGalleryModal()">×</button>
            <button class="modal-nav modal-prev" onclick="prevGalleryImage()">‹</button>
            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalGalleryImage" src="" alt="Gallery Image">
                </div>
                <div class="modal-details">
                    <h3 id="modalGalleryTitle"></h3>
                </div>
            </div>
            <button class="modal-nav modal-next" onclick="nextGalleryImage()">›</button>
        </div>
    </div>

    <!-- Teacher Modal -->
    <div class="modal" id="teacherModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeTeacherModal()">×</button>
            <button class="modal-nav modal-prev" onclick="prevTeacher()">‹</button>
            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalTeacherImage" src="" alt="Teacher">
                </div>
                <div class="modal-details">
                    <h2 class="modal-name" id="modalTeacherName"></h2>
                    <p class="modal-subject" id="modalTeacherSubject"></p>
                    <p class="modal-qualification" id="modalTeacherQualification"></p>
                    <p class="modal-bio" id="modalTeacherBio">
                        Dedicated educator with over 15 years of experience in teaching. Committed to fostering a
                        positive learning environment and helping students achieve their full potential. Specialized in
                        innovative teaching methodologies and student-centered approaches.
                    </p>
                    <div class="modal-contact">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-icon">
                            <i class="fas fa-comment"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-nav modal-next" onclick="nextTeacher()">›</button>
        </div>
    </div>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">Why Choose Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <div class="feature-title">Quality Education</div>
                    <div class="feature-desc">State-certified curriculum with experienced faculty members dedicated to
                        excellence</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <div class="feature-title">Outstanding Results</div>
                    <div class="feature-desc">Consistent 95%+ pass rate with numerous toppers and award winners</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💻</div>
                    <div class="feature-title">Modern Facilities</div>
                    <div class="feature-desc">Well-equipped labs, library, sports facilities, and digital classrooms
                    </div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌟</div>
                    <div class="feature-title">Holistic Development</div>
                    <div class="feature-desc">Focus on academics, sports, arts, and character building</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon">📍</div>
                    <div class="contact-info">
                        <h4>Address</h4>
                        <p>Manikchak, Lalgola<br>Murshidabad, West Bengal 742148</p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">📞</div>
                    <div class="contact-info">
                        <h4>Phone</h4>
                        <p>+91 98765 43210<br>+91 98765 43211</p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">✉️</div>
                    <div class="contact-info">
                        <h4>Email</h4>
                        <p>info@manikchakhs.edu.in<br>principal@manikchakhs.edu.in</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Manikchak High Madrasah (H.S) has been providing quality education since 1950. We are committed to
                    nurturing young minds and building responsible citizens.</p>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admissions</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
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

        // Notice Board with Table of Contents
        const notices = [
            {
                id: 1,
                title: "Annual Sports Day 2024",
                published: "15 March 2024",
                expires: "30 April 2024",
                description: "We are excited to announce our Annual Sports Day will be held on April 25, 2024. All students are requested to participate actively. The event will include various track and field events, team sports, and cultural performances. Parents are cordially invited to attend and cheer for our young athletes.",
                file: "#"
            },
            {
                id: 2,
                title: "Summer Vacation Schedule",
                published: "10 March 2024",
                expires: "15 May 2024",
                description: "Summer vacation will begin from May 15, 2024. School will reopen on June 15, 2024. Enjoy your holidays safely. Students are encouraged to read books, engage in creative activities, and spend quality time with family. Please ensure you complete your holiday homework before school reopens.",
                file: "#"
            },
            {
                id: 3,
                title: "Parent-Teacher Meeting",
                published: "5 March 2024",
                expires: "20 March 2024",
                description: "The next Parent-Teacher Meeting is scheduled for March 20, 2024. Please make sure to attend to discuss your child's progress. This is an important opportunity to understand your child's academic performance, strengths, and areas that need improvement. Teachers will be available from 10 AM to 2 PM.",
                file: "#"
            },
            {
                id: 4,
                title: "Science Exhibition",
                published: "1 March 2024",
                expires: "25 March 2024",
                description: "Our annual Science Exhibition will be held on March 22, 2024. Students are encouraged to showcase their innovative projects. This year's theme is 'Sustainable Solutions for a Better Tomorrow'. Projects should focus on environmental conservation, renewable energy, or waste management.",
                file: "#"
            },
            {
                id: 5,
                title: "Book Fair Announcement",
                published: "28 February 2024",
                expires: "15 March 2024",
                description: "The school is organizing a Book Fair from March 10-12, 2024. Various publishers will showcase educational and recreational books at discounted prices. This is a great opportunity for students to expand their personal libraries and develop reading habits.",
                file: "#"
            },
            {
                id: 6,
                title: "Scholarship Application Deadline",
                published: "25 February 2024",
                expires: "10 March 2024",
                description: "The last date for submitting scholarship applications for economically disadvantaged students is March 10, 2024. Eligible students should submit their applications along with required documents to the school office. Late applications will not be considered.",
                file: "#"
            }
        ];

        const tocList = document.getElementById('tocList');
        const noticeContent = document.getElementById('noticeContent');

        // Populate Table of Contents and Notice Content
        notices.forEach((notice, index) => {
            // Create TOC item
            const tocItem = document.createElement('li');
            tocItem.className = 'toc-item' + (index === 0 ? ' active' : '');
            tocItem.setAttribute('data-id', notice.id);
            tocItem.innerHTML = `
                <div class="toc-title">${notice.title}</div>
                <div class="toc-date">Published: ${notice.published}</div>
            `;
            tocList.appendChild(tocItem);

            // Create notice item
            const noticeItem = document.createElement('div');
            noticeItem.className = 'notice-item' + (index === 0 ? ' active' : '');
            noticeItem.id = `notice-${notice.id}`;
            noticeItem.innerHTML = `
                <div class="notice-title">${notice.title}</div>
                <div class="notice-date">
                    <span><i class="far fa-calendar-plus"></i> Published: ${notice.published}</span>
                    <span><i class="far fa-calendar-times"></i> Expires: ${notice.expires}</span>
                </div>
                <div class="notice-desc">${notice.description}</div>
                <a href="${notice.file}" class="notice-download">
                    <i class="fas fa-download"></i> Download Notice
                </a>
            `;
            noticeContent.appendChild(noticeItem);

            // Add click event to TOC item
            tocItem.addEventListener('click', () => {
                // Remove active class from all TOC items and notice items
                document.querySelectorAll('.toc-item').forEach(item => item.classList.remove('active'));
                document.querySelectorAll('.notice-item').forEach(item => item.classList.remove('active'));
                
                // Add active class to clicked TOC item and corresponding notice
                tocItem.classList.add('active');
                noticeItem.classList.add('active');
                
                // Scroll to the notice
                noticeItem.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        // Gallery Modal
        const galleryItems = document.querySelectorAll('.gallery-item');
        const galleryModal = document.getElementById('galleryModal');
        const modalGalleryImage = document.getElementById('modalGalleryImage');
        const modalGalleryTitle = document.getElementById('modalGalleryTitle');
        let currentGalleryIndex = 0;

        const galleryImages = [
            { src: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop', title: 'School Building' },
            { src: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&h=600&fit=crop', title: 'Students' },
            { src: 'https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?w=800&h=600&fit=crop', title: 'Library' },
            { src: 'https://images.unsplash.com/photo-1588072432836-e10032774350?w=800&h=600&fit=crop', title: 'Science Lab' },
            { src: 'https://images.unsplash.com/photo-1577896851231-70ef18881754?w=800&h=600&fit=crop', title: 'Cultural Event' },
            { src: 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=800&h=600&fit=crop', title: 'Sports Day' },
            { src: 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800&h=600&fit=crop', title: 'Classroom' },
            { src: 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&h=600&fit=crop', title: 'Computer Lab' }
        ];

        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentGalleryIndex = index;
                modalGalleryImage.src = galleryImages[currentGalleryIndex].src;
                modalGalleryTitle.textContent = galleryImages[currentGalleryIndex].title;
                galleryModal.classList.add('active');
            });
        });

        function closeGalleryModal() {
            galleryModal.classList.remove('active');
        }

        function nextGalleryImage() {
            currentGalleryIndex = (currentGalleryIndex + 1) % galleryImages.length;
            modalGalleryImage.src = galleryImages[currentGalleryIndex].src;
            modalGalleryTitle.textContent = galleryImages[currentGalleryIndex].title;
        }

        function prevGalleryImage() {
            currentGalleryIndex = (currentGalleryIndex - 1 + galleryImages.length) % galleryImages.length;
            modalGalleryImage.src = galleryImages[currentGalleryIndex].src;
            modalGalleryTitle.textContent = galleryImages[currentGalleryIndex].title;
        }

        // Teacher Modal
        const teacherCards = document.querySelectorAll('.teacher-card');
        const teacherModal = document.getElementById('teacherModal');
        const modalTeacherImage = document.getElementById('modalTeacherImage');
        const modalTeacherName = document.getElementById('modalTeacherName');
        const modalTeacherSubject = document.getElementById('modalTeacherSubject');
        const modalTeacherQualification = document.getElementById('modalTeacherQualification');
        const modalTeacherBio = document.getElementById('modalTeacherBio');
        let currentTeacherIndex = 0;

        const teachers = [
            {
                image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop',
                name: 'Prof. Ayesha Rahman',
                subject: 'Mathematics',
                qualification: 'M.Sc, B.Ed',
                bio: 'Dedicated mathematics educator with 12 years of experience. Specialized in making complex concepts simple and engaging for students. Awarded "Best Teacher" in 2022. Believes that every student has the potential to excel in mathematics with the right guidance.'
            },
            {
                image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop',
                name: 'Mr. Arif Hussain',
                subject: 'Physics',
                qualification: 'M.Sc, Ph.D',
                bio: 'PhD in Physics with 15 years of teaching experience. Passionate about experimental physics and innovative teaching methods. Published several research papers in international journals. Encourages students to question, explore, and discover the wonders of physics.'
            },
            {
                image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop',
                name: 'Ms. Fatima Begum',
                subject: 'English Literature',
                qualification: 'M.A, B.Ed',
                bio: 'MA in English Literature with 10 years of teaching experience. Specializes in British and American literature. Conducts creative writing workshops for students. Believes that literature opens windows to different cultures and perspectives, enriching students\' understanding of the world.'
            },
            {
                image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                name: 'Mr. Kamal Das',
                subject: 'Chemistry',
                qualification: 'M.Sc, B.Ed',
                bio: 'Chemistry expert with 8 years of experience. Focuses on practical applications of chemistry in daily life. Head of the Science Club and organizes annual science fairs. Believes that chemistry is not just a subject but a way to understand the world around us.'
            }
        ];

        teacherCards.forEach((card, index) => {
            card.addEventListener('click', () => {
                currentTeacherIndex = index;
                updateTeacherModal(currentTeacherIndex);
                teacherModal.classList.add('active');
            });
        });

        function updateTeacherModal(index) {
            const teacher = teachers[index];
            modalTeacherImage.src = teacher.image;
            modalTeacherName.textContent = teacher.name;
            modalTeacherSubject.textContent = teacher.subject;
            modalTeacherQualification.textContent = teacher.qualification;
            modalTeacherBio.textContent = teacher.bio;
        }

        function closeTeacherModal() {
            teacherModal.classList.remove('active');
        }

        function nextTeacher() {
            currentTeacherIndex = (currentTeacherIndex + 1) % teachers.length;
            updateTeacherModal(currentTeacherIndex);
        }

        function prevTeacher() {
            currentTeacherIndex = (currentTeacherIndex - 1 + teachers.length) % teachers.length;
            updateTeacherModal(currentTeacherIndex);
        }

        // Close modals on background click
        document.addEventListener('click', (e) => {
            if (e.target === galleryModal) closeGalleryModal();
            if (e.target === teacherModal) closeTeacherModal();
        });

        // Keyboard navigation for modals
        document.addEventListener('keydown', (e) => {
            if (galleryModal.classList.contains('active')) {
                if (e.key === 'Escape') closeGalleryModal();
                if (e.key === 'ArrowLeft') prevGalleryImage();
                if (e.key === 'ArrowRight') nextGalleryImage();
            }
            if (teacherModal.classList.contains('active')) {
                if (e.key === 'Escape') closeTeacherModal();
                if (e.key === 'ArrowLeft') prevTeacher();
                if (e.key === 'ArrowRight') nextTeacher();
            }
        });
    </script>
    <script>
        // Image Carousel
        let currentSlide = 0;
        const track = document.getElementById('carouselTrack');
        const slides = document.querySelectorAll('.carousel-slide');
        const indicatorsContainer = document.getElementById('indicators');
        const totalSlides = slides.length;

        // Create indicators
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('div');
            indicator.className = 'indicator' + (i === 0 ? ' active' : '');
            indicator.onclick = () => goToSlide(i);
            indicatorsContainer.appendChild(indicator);
        }

        const indicators = document.querySelectorAll('.indicator');

        function updateCarousel() {
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update indicators
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        }

        function moveSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        // Auto-play carousel
        let autoPlay = setInterval(() => {
            moveSlide(1);
        }, 5000);

        // Pause auto-play on hover
        const carousel = document.querySelector('.image-carousel');
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoPlay);
        });

        carousel.addEventListener('mouseleave', () => {
            autoPlay = setInterval(() => {
                moveSlide(1);
            }, 5000);
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') moveSlide(-1);
            if (e.key === 'ArrowRight') moveSlide(1);
        });
    </script>
</body>

</html>