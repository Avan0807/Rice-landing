<footer id="lien-he" class="footer">
    <div class="container">
        <h2 class="footer-title">Liên hệ đặt hàng</h2>

        <div class="contact-info">
            <div class="contact-item">
                <h3 class="contact-title">🚚 Giao hàng</h3>
                <p class="contact-value">Toàn quốc</p>
                <p class="contact-description">COD - Thanh toán khi nhận hàng</p>
            </div>
        </div>

        <!-- Quick Contact Form -->
        <div class="quick-contact-form">
            <h3>Để lại thông tin - Nhận tư vấn miễn phí</h3>
            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Họ và tên *" required class="form-input">
                    <input type="tel" name="phone" placeholder="Số điện thoại *" required class="form-input">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Tin nhắn (tùy chọn)" rows="3" class="form-textarea"></textarea>
                </div>
                <button type="submit" class="submit-btn">
                    <span>Gửi thông tin</span>
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-info">
                <p class="copyright">&copy; {{ date('Y') }} Bột Gạo Lứt Tùng Beo - Gian Hàng Chính Hãng. Made with ❤️ for your health.</p>
                <p class="disclaimer">Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh</p>
            </div>

            <div class="footer-links">
                <a href="#" class="footer-link">Chính sách bảo mật</a>
                <a href="#" class="footer-link">Điều khoản sử dụng</a>
                <a href="#" class="footer-link">Hướng dẫn đặt hàng</a>
            </div>

            <div class="social-links">
                <a href="#" class="social-link facebook" aria-label="Facebook">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}" class="social-link zalo" aria-label="Zalo" target="_blank">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </a>
                <a href="mailto:{{ $contact['email'] ?? 'tungbeo@gmail.com' }}" class="social-link email" aria-label="Email">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
// Contact form submission
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.innerHTML = '<span>Đang gửi...</span>';
    submitBtn.disabled = true;

    // Reset after form submission (whether success or error)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 3000);
});

// Phone number formatting
document.querySelector('input[name="phone"]')?.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');

    if (value.length > 0) {
        if (value.length <= 4) {
            value = value;
        } else if (value.length <= 7) {
            value = value.slice(0, 4) + '.' + value.slice(4);
        } else {
            value = value.slice(0, 4) + '.' + value.slice(4, 7) + '.' + value.slice(7, 10);
        }
    }

    e.target.value = value;
});
</script>
