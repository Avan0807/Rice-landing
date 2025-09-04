<!-- Floating Zalo Button -->
<div class="floating-buttons">
    <!-- Main Zalo Button -->
    <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
       class="zalo-float main-button"
       target="_blank"
       aria-label="Chat Zalo"
       data-tooltip="Chat với chúng tôi qua Zalo">
        <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm4.5 14.5h-9v-1.5h9v1.5zm0-3h-9v-1.5h9v1.5zm0-3h-9V9h9v1.5z"/>
        </svg>
        <span class="button-text">Zalo</span>
    </a>

    <!-- Phone Button -->
    <a href="tel:{{ $contact['hotline'] ?? '0123456789' }}"
       class="phone-float secondary-button"
       aria-label="Gọi điện"
       data-tooltip="Gọi điện tư vấn">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </svg>
        <span class="button-text">Gọi</span>
    </a>

    <!-- Back to Top Button -->
    <button class="back-to-top secondary-button"
            id="backToTop"
            aria-label="Lên đầu trang"
            data-tooltip="Lên đầu trang">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/>
        </svg>
    </button>
</div>

<!-- Quick Contact Popup (Optional) -->
<div class="quick-contact-popup" id="quickContactPopup">
    <div class="popup-content">
        <div class="popup-header">
            <h3>Liên hệ nhanh</h3>
            <button class="close-popup" id="closePopup">&times;</button>
        </div>
        <div class="popup-body">
            <p>Chọn cách liên hệ phù hợp với bạn:</p>
            <div class="contact-options">
                <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                   class="contact-option zalo-option" target="_blank">
                    <div class="option-icon">💬</div>
                    <div class="option-info">
                        <strong>Chat Zalo</strong>
                        <span>Phản hồi ngay lập tức</span>
                    </div>
                </a>
                <a href="tel:{{ $contact['hotline'] ?? '0123456789' }}"
                   class="contact-option phone-option">
                    <div class="option-icon">📞</div>
                    <div class="option-info">
                        <strong>Gọi điện</strong>
                        <span>{{ $contact['hotline'] ?? '0123.456.789' }}</span>
                    </div>
                </a>
                <a href="mailto:{{ $contact['email'] ?? 'tungbeo@gmail.com' }}"
                   class="contact-option email-option">
                    <div class="option-icon">📧</div>
                    <div class="option-info">
                        <strong>Email</strong>
                        <span>{{ $contact['email'] ?? 'tungbeo@gmail.com' }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="popup-backdrop"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Back to top functionality
    const backToTopBtn = document.getElementById('backToTop');

    // Show/hide back to top button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    // Smooth scroll to top
    backToTopBtn?.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Tooltip functionality
    document.querySelectorAll('[data-tooltip]').forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = this.dataset.tooltip;
            document.body.appendChild(tooltip);

            const rect = this.getBoundingClientRect();
            tooltip.style.left = rect.left - tooltip.offsetWidth - 10 + 'px';
            tooltip.style.top = rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2) + 'px';

            this._tooltip = tooltip;
        });

        element.addEventListener('mouseleave', function() {
            if (this._tooltip) {
                document.body.removeChild(this._tooltip);
                this._tooltip = null;
            }
        });
    });

    // Quick contact popup functionality (optional)
    const quickContactPopup = document.getElementById('quickContactPopup');
    const closePopup = document.getElementById('closePopup');

    // Show popup after 30 seconds (optional feature)
    /*
    setTimeout(() => {
        if (!localStorage.getItem('popup-shown')) {
            quickContactPopup?.classList.add('show');
            localStorage.setItem('popup-shown', 'true');
        }
    }, 30000);
    */

    // Close popup
    closePopup?.addEventListener('click', function() {
        quickContactPopup.classList.remove('show');
    });

    // Close popup when clicking backdrop
    document.querySelector('.popup-backdrop')?.addEventListener('click', function() {
        quickContactPopup.classList.remove('show');
    });

    // Analytics tracking (optional)
    document.querySelectorAll('.zalo-float, .phone-float').forEach(button => {
        button.addEventListener('click', function() {
            // Track click event
            if (typeof gtag !== 'undefined') {
                gtag('event', 'contact_click', {
                    'event_category': 'engagement',
                    'event_label': this.classList.contains('zalo-float') ? 'zalo' : 'phone'
                });
            }
        });
    });
});
</script>
