<header class="header">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Tùng Beo Logo">
                </div>
                <div class="logo-text">
                    <div class="brand-name">TÙNG BEO</div>
                    <div class="brand-tagline">GIAN HÀNG CHÍNH HÃNG</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="navigation">
                <ul class="nav-list">
                    <li><a href="#san-pham" class="nav-link">Sản phẩm</a></li>
                    <li><a href="#cau-chuyen" class="nav-link">Câu chuyện</a></li>
                    <li><a href="#thanh-phan" class="nav-link">Thành phần</a></li>
                    <li><a href="#loi-ich" class="nav-link">Lợi ích</a></li>
                    <li><a href="#huong-dan" class="nav-link">Hướng dẫn</a></li>
                    <li><a href="#lien-he" class="nav-link">Liên hệ</a></li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="mobile-nav" id="mobileNav">
            <ul class="mobile-nav-list">
                <li><a href="#san-pham" class="mobile-nav-link">Sản phẩm</a></li>
                <li><a href="#cau-chuyen" class="mobile-nav-link">Câu chuyện</a></li>
                <li><a href="#thanh-phan" class="mobile-nav-link">Thành phần</a></li>
                <li><a href="#loi-ich" class="mobile-nav-link">Lợi ích</a></li>
                <li><a href="#huong-dan" class="mobile-nav-link">Hướng dẫn</a></li>
                <li><a href="#lien-he" class="mobile-nav-link">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</header>

<script>
// Mobile menu toggle
document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
    const mobileNav = document.getElementById('mobileNav');
    const btn = this;

    if (mobileNav.classList.contains('active')) {
        mobileNav.classList.remove('active');
        btn.classList.remove('active');
    } else {
        mobileNav.classList.add('active');
        btn.classList.add('active');
    }
});

// Close mobile menu when clicking on links
document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', function() {
        document.getElementById('mobileNav').classList.remove('active');
        document.getElementById('mobileMenuBtn').classList.remove('active');
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const mobileNav = document.getElementById('mobileNav');
    const mobileBtn = document.getElementById('mobileMenuBtn');

    if (!mobileNav.contains(e.target) && !mobileBtn.contains(e.target)) {
        mobileNav.classList.remove('active');
        mobileBtn.classList.remove('active');
    }
});
</script>
