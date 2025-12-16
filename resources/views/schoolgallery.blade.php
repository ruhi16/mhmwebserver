<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manikchak High Madrasah (H.S) - Photo Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* =========================================
           INHERITED STYLES (Global)
           ========================================= */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; overflow-x: hidden; background-color: #f8f9fa; }

        /* Navbar */
        .top-navbar { background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%); box-shadow: 0 4px 20px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .navbar-container { max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 15px 30px; }
        .logo-section { display: flex; align-items: center; gap: 15px; }
        .logo { width: 50px; height: 50px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #1a237e; box-shadow: 0 2px 10px rgba(0,0,0,0.2); }
        .school-name { color: white; font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.2); }
        .nav-menu { display: flex; gap: 5px; list-style: none; }
        .nav-link { color: white; text-decoration: none; padding: 10px 20px; display: block; border-radius: 8px; transition: all 0.3s; font-weight: 500; }
        .nav-link:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
        .mobile-toggle { display: none; background: white; border: none; padding: 10px; border-radius: 8px; cursor: pointer; }

        /* Footer */
        .footer { background: #1a237e; color: white; padding: 60px 0 30px; margin-top: auto; }
        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 40px; }
        .footer-column h3 { font-size: 1.3rem; margin-bottom: 20px; border-bottom: 3px solid #0d47a1; display: inline-block; padding-bottom: 5px; }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: #e3f2fd; text-decoration: none; transition: 0.3s; }
        .footer-bottom { text-align: center; padding-top: 30px; margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); }

        /* =========================================
           GALLERY SPECIFIC STYLES
           ========================================= */
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 60px 0;
            text-align: center;
            margin-bottom: 50px;
            border-bottom: 4px solid #1a237e;
        }
        .page-title { font-size: 2.5rem; color: #1a237e; font-weight: 800; }
        .page-subtitle { font-size: 1.1rem; color: #546e7a; margin-top: 10px; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* Category Grid (Collage) */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            padding-bottom: 60px;
        }

        .gallery-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            height: 300px;
            group: 'card';
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26, 35, 126, 0.2);
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: white;
            transform: translateY(0);
            transition: all 0.3s;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-count {
            font-size: 0.9rem;
            opacity: 0.8;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* =========================================
           DOCK WINDOW (LIGHTBOX) STYLES
           ========================================= */
        
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 2000;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .lightbox-modal.active {
            display: flex;
            opacity: 1;
        }

        /* Main View Area */
        .lightbox-main {
            position: relative;
            width: 90%;
            height: 70%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 5px;
            box-shadow: 0 0 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .caption-container {
            position: absolute;
            bottom: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-align: center;
        }

        /* Navigation Buttons */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-btn:hover { background: rgba(255, 255, 255, 0.3); }
        .prev-btn { left: 20px; }
        .next-btn { right: 20px; }
        .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            background: transparent;
            color: white;
            border: none;
            font-size: 2.5rem;
            cursor: pointer;
            z-index: 2001;
        }

        /* Thumbnail Dock */
        .dock-container {
            width: 90%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            padding: 10px;
        }

        .thumbnail-strip {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scroll-behavior: smooth;
            width: 100%;
            height: 100%;
            padding: 5px;
            /* Hide scrollbar */
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .thumbnail-strip::-webkit-scrollbar { display: none; }

        .thumb {
            height: 100%;
            width: auto;
            aspect-ratio: 4/3;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            opacity: 0.5;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .thumb:hover { opacity: 0.8; }
        
        .thumb.active {
            opacity: 1;
            border-color: #e3f2fd;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .navbar-container { padding: 15px; }
            .mobile-toggle { display: block; }
            .nav-menu { display: none; }
            .gallery-grid { grid-template-columns: 1fr; }
            .lightbox-main { width: 100%; }
            .nav-btn { width: 40px; height: 40px; font-size: 1.2rem; }
            .prev-btn { left: 5px; }
            .next-btn { right: 5px; }
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
            <button class="mobile-toggle"><i class="fas fa-bars"></i></button>
            <ul class="nav-menu">
                <li><a href="welcome.blade.php" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">Academics</a></li>
                <li><a href="downloads.blade.php" class="nav-link">Downloads</a></li>
                <li><a href="#" class="nav-link">Gallery</a></li>
            </ul>
        </div>
    </nav>

    <header class="page-header">
        <div class="container">
            <h1 class="page-title">Photo Gallery</h1>
            <p class="page-subtitle">Capturing moments of learning, joy, and growth at our Madrasah</p>
        </div>
    </header>

    <section class="container">
        <div class="gallery-grid">
            
            <div class="gallery-card" onclick="openGallery('building')">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&h=400&fit=crop" class="card-image" alt="School Building">
                <div class="card-overlay">
                    <div class="card-title">School Infrastructure</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 8 Photos</div>
                </div>
            </div>

            <div class="gallery-card" onclick="openGallery('sports')">
                <img src="https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=600&h=400&fit=crop" class="card-image" alt="Sports">
                <div class="card-overlay">
                    <div class="card-title">Annual Sports</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 12 Photos</div>
                </div>
            </div>

            <div class="gallery-card" onclick="openGallery('cultural')">
                <img src="https://images.unsplash.com/photo-1514533450685-4493e01d1fdc?w=600&h=400&fit=crop" class="card-image" alt="Cultural">
                <div class="card-overlay">
                    <div class="card-title">Cultural Programs</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 15 Photos</div>
                </div>
            </div>

            <div class="gallery-card" onclick="openGallery('tree')">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=600&h=400&fit=crop" class="card-image" alt="Tree Plantation">
                <div class="card-overlay">
                    <div class="card-title">Tree Plantation Drive</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 10 Photos</div>
                </div>
            </div>

            <div class="gallery-card" onclick="openGallery('labs')">
                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&h=400&fit=crop" class="card-image" alt="Labs">
                <div class="card-overlay">
                    <div class="card-title">Science Labs</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 6 Photos</div>
                </div>
            </div>

            <div class="gallery-card" onclick="openGallery('teachers')">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=400&fit=crop" class="card-image" alt="Teachers">
                <div class="card-overlay">
                    <div class="card-title">Our Teachers</div>
                    <div class="card-count"><i class="fas fa-camera"></i> 20 Photos</div>
                </div>
            </div>

        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Manikchak High Madrasah (H.S) - Nurturing Excellence.</p>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <ul class="footer-links" style="color: #e3f2fd;">
                    <li><i class="fas fa-phone"></i> +91 98765 43210</li>
                    <li><i class="fas fa-envelope"></i> info@manikchakhs.edu.in</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Social</h3>
                <div class="footer-links">
                    <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Location</h3>
                <p style="color: #e3f2fd;">Manikchak, Lalgola, Murshidabad</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Manikchak High Madrasah (H.S). All Rights Reserved.</p>
        </div>
    </footer>

    <div class="lightbox-modal" id="lightbox">
        <button class="close-btn" onclick="closeGallery()">×</button>
        
        <div class="lightbox-main">
            <button class="nav-btn prev-btn" onclick="changeSlide(-1)">❮</button>
            <img src="" alt="Gallery Image" class="lightbox-image" id="mainImage">
            <div class="caption-container">
                <span id="imageCaption">Caption Text</span>
            </div>
            <button class="nav-btn next-btn" onclick="changeSlide(1)">❯</button>
        </div>

        <div class="dock-container">
            <div class="thumbnail-strip" id="thumbStrip">
                </div>
        </div>
    </div>

    <script>
        // Database of Images
        const galleryData = {
            'building': [
                { src: 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1200', title: 'Main Campus View' },
                { src: 'https://images.unsplash.com/photo-1562774053-701939374585?w=1200', title: 'Computer Block' },
                { src: 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?w=1200', title: 'School Entrance' },
                { src: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200', title: 'New Wing Construction' }
            ],
            'sports': [
                { src: 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=1200', title: '100m Sprint' },
                { src: 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1200', title: 'Football Match' },
                { src: 'https://images.unsplash.com/photo-1515523110800-9415d13b84a8?w=1200', title: 'Award Ceremony' },
                { src: 'https://images.unsplash.com/photo-1526304640152-d4619684e484?w=1200', title: 'High Jump Event' }
            ],
            'cultural': [
                { src: 'https://images.unsplash.com/photo-1514533450685-4493e01d1fdc?w=1200', title: 'Annual Function Dance' },
                { src: 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=1200', title: 'Music Performance' },
                { src: 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=1200', title: 'Drama Skit' }
            ],
            'tree': [
                { src: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=1200', title: 'Planting Saplings' },
                { src: 'https://images.unsplash.com/photo-1591857177580-dc82b9e4e10c?w=1200', title: 'Eco Club Members' },
                { src: 'https://images.unsplash.com/photo-1530906622323-9524e235a396?w=1200', title: 'Watering Plants' }
            ],
            'labs': [
                { src: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1200', title: 'Chemistry Lab' },
                { src: 'https://images.unsplash.com/photo-1581093450065-2a6a45a13789?w=1200', title: 'Physics Experiments' },
                { src: 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=1200', title: 'Biology Specimens' }
            ],
            'teachers': [
                { src: 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1200', title: 'Staff Meeting' },
                { src: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200', title: 'Principal Desk' },
                { src: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=1200', title: 'Teachers Day Celebration' }
            ]
        };

        let currentCategory = [];
        let currentIndex = 0;

        const modal = document.getElementById('lightbox');
        const mainImg = document.getElementById('mainImage');
        const caption = document.getElementById('imageCaption');
        const thumbStrip = document.getElementById('thumbStrip');

        // Open Gallery Function
        function openGallery(category) {
            currentCategory = galleryData[category];
            currentIndex = 0;
            
            // Generate Thumbnails
            thumbStrip.innerHTML = '';
            currentCategory.forEach((img, index) => {
                const thumb = document.createElement('img');
                thumb.src = img.src;
                thumb.className = `thumb ${index === 0 ? 'active' : ''}`;
                thumb.onclick = () => jumpToSlide(index);
                thumbStrip.appendChild(thumb);
            });

            updateSlide();
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        // Close Gallery
        function closeGallery() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Change Slide (Next/Prev)
        function changeSlide(direction) {
            currentIndex += direction;
            if (currentIndex >= currentCategory.length) currentIndex = 0;
            if (currentIndex < 0) currentIndex = currentCategory.length - 1;
            updateSlide();
        }

        // Jump to specific slide
        function jumpToSlide(index) {
            currentIndex = index;
            updateSlide();
        }

        // Update UI
        function updateSlide() {
            const data = currentCategory[currentIndex];
            
            // Fade out effect
            mainImg.style.opacity = 0;
            
            setTimeout(() => {
                mainImg.src = data.src;
                caption.textContent = data.title;
                mainImg.style.opacity = 1;
                
                // Update Thumbnails
                document.querySelectorAll('.thumb').forEach((t, i) => {
                    t.classList.toggle('active', i === currentIndex);
                    // Scroll thumbnail into view
                    if(i === currentIndex) {
                        t.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    }
                });
            }, 200);
        }

        // Keyboard Navigation
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('active')) return;
            if (e.key === 'Escape') closeGallery();
            if (e.key === 'ArrowLeft') changeSlide(-1);
            if (e.key === 'ArrowRight') changeSlide(1);
        });
    </script>
</body>
</html>