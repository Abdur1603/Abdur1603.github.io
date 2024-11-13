<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
    <link rel="stylesheet" href="styles/landingPage.css">
<body>
    <?php include('partials/navbar.php') ?>
    <section class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <h1>Selamat Datang<br>di Pusat<br>Kebugaran Kami!</h1>
                <p>Temukan berbagai kelas yang dirancang untuk memenuhi kebutuhan kebugaran Anda. 
                   Bergabunglah dengan kami dan raih tujuan kesehatan Anda dengan cara yang menyenangkan.</p>
                <button class="btn btn-primary">Mulai Kelas</button>
            </div>
            <div class="hero-image">
                <img src="assets/fit.png" alt="Fitness couple">
            </div>
        </div>
    </section>
    <section class="classes">
        <div class="container">
            <h2 style="text-align: center;">Kelas</h2>
            <div class="carousel">
                <div class="carousel-container">
                    <div class="carousel-item">
                        <img src="assets/c1.jpg" alt="Kelas 1">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/c2.jpg" alt="Kelas 2">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/c3.jpg" alt="Kelas 3">
                    </div>
                </div>
                <button class="carousel-button prev">←</button>
                <button class="carousel-button next">→</button>
            </div>
            <div style="text-align: center; margin-top: var(--spacing-lg);">
                <button class="btn btn-primary">Selengkapnya</button>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <h2>Fitur Unggulan</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Kelas Beragam untuk Semua Tingkat Kemampuan dan Minat</h3>
                    <p class="feature-desc">Nikmati berbagai kelas yang dirancang untuk meningkatkan kebugaran Anda.</p>
                    <a href="#" class="nav-link">Selengkapnya ></a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Pelatih Berpengalaman Siap Membantu Anda Mencapai Tujuan Kebugaran</h3>
                    <p class="feature-desc">Dapatkan bimbingan dari pelatih profesional yang berpengalaman di bidangnya.</p>
                    <a href="#" class="nav-link">Selengkapnya ></a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Fasilitas Modern untuk Pengalaman Kebugaran yang Lebih Baik</h3>
                    <p class="feature-desc">Kami menyediakan fasilitas terkini untuk mendukung setiap sesi latihan Anda.</p>
                    <a href="#" class="nav-link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials">
        <div class="container">
            <h2>Apa Kata Mereka Tentang Kami?</h2>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>                
                <p class="testimonial-text">
                    " Bergabunglah dengan anggota kebugaran ini, pilihan terbaik yang saya miliki. Mereka sangat profesional dan memberi Anda saran tentang makanan dan nutrisi apa yang dapat Anda makan "
                </p>
                <div class="testimonial-author">
                    <img src="assets/auImage.png"class="author-image">
                    <div class="author-info">
                        <div class="author-name">Abdurrahman</div>
                        <div class="author-title">Pekerja Kantor</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('partials/footer.php') ?>
    <script>
        document.querySelector('.hamburger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nav-menu').classList.toggle('active');
        });

        const carousel = document.querySelector('.carousel-container');
        const prevBtn = document.querySelector('.carousel-button.prev');
        const nextBtn = document.querySelector('.carousel-button.next');
        const itemWidth = document.querySelector('.carousel-item').offsetWidth;

        prevBtn.addEventListener('click', () => {
            carousel.scrollLeft -= itemWidth + 24; 
        });

        nextBtn.addEventListener('click', () => {
            carousel.scrollLeft += itemWidth + 24; 
        });
    </script>
</body>
</html>