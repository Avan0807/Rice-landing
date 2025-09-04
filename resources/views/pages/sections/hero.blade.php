<section class="hero" aria-labelledby="hero-title">
    <!-- Background (decorative) -->
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-bg-image" aria-hidden="true"></div>
        <div class="hero-overlay" aria-hidden="true"></div>
    </div>

    <!-- Content -->
    <div class="hero-container">
        <!-- Left Content -->
        <div class="hero-content" role="region" aria-label="Thông tin sản phẩm nổi bật">
            <div class="hero-badge" aria-label="Chứng nhận tự nhiên">
                <span class="badge-icon" aria-hidden="true">🌾</span>
                <span>100% Tự Nhiên • Không Hóa Chất</span>
            </div>

            <h1 id="hero-title" class="hero-title">
                Bột Gạo Lứt<br>
                <span class="title-highlight">Tùng Beo</span>
            </h1>

            <p class="hero-subtitle">
                Tinh túy dinh dưỡng từ thiên nhiên cùng 8 loại hạt quý
            </p>

            <div class="hero-features" role="list" aria-label="Các điểm nổi bật">
                <div class="feature" role="listitem">
                    <div class="feature-icon" aria-hidden="true">✨</div>
                    <span>Không hương liệu</span>
                </div>
                <div class="feature" role="listitem">
                    <div class="feature-icon" aria-hidden="true">🚫</div>
                    <span>Không đậu nành</span>
                </div>
                <div class="feature" role="listitem">
                    <div class="feature-icon" aria-hidden="true">🌿</div>
                    <span>Không chất bảo quản</span>
                </div>
            </div>

            <div class="hero-cta">
                <a
                    href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                    class="cta-primary"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Đặt hàng ngay qua Zalo"
                >
                    <span class="cta-icon" aria-hidden="true">💬</span>
                    <span>Đặt hàng ngay</span>
                    <span class="cta-arrow" aria-hidden="true">→</span>
                </a>

                <a
                    href="tel:{{ $contact['hotline'] ?? '0123456789' }}"
                    class="cta-secondary"
                    aria-label="Gọi tư vấn miễn phí"
                >
                    <span class="cta-icon" aria-hidden="true">📞</span>
                    <span>Tư vấn miễn phí</span>
                </a>
            </div>

            <!-- Stats dùng dl cho semantic -->
            <dl class="hero-stats">
                <div class="stat">
                    <dt>Khách hàng</dt>
                    <dd><strong>1000+</strong></dd>
                </div>
                <div class="stat">
                    <dt>Đánh giá</dt>
                    <dd><strong>5⭐</strong></dd>
                </div>
                <div class="stat">
                    <dt>Hỗ trợ</dt>
                    <dd><strong>24/7</strong></dd>
                </div>
            </dl>
        </div>

        <!-- Right Product Showcase -->
        <div class="hero-product" role="region" aria-label="Thẻ sản phẩm, giá, vận chuyển">
            <!-- Main Product Card -->
            <div class="product-card main-card image-only">
            <img
                src="/images/bot-gao-lut6.jpg"
                alt="Bột gạo lứt Tùng Beo"
                decoding="async"
                fetchpriority="high"
            />
            </div>

            <!-- Price Tag -->
            <div class="product-card price-card" aria-label="Giá sản phẩm">
                <div class="price-label">Chỉ từ</div>
                <div class="price-value">
                    {{ number_format((int)($product['price'] ?? 150000)) }}&nbsp;đ
                </div>
            </div>

            <!-- Certified Badge -->
            <div class="product-card quality-card" aria-label="Chứng nhận VSATTP">
                <div class="card-icon" aria-hidden="true">🏆</div>
                <div class="card-content">
                    <h4>Chứng nhận VSATTP</h4>
                    <p>An toàn thực phẩm</p>
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="product-card guarantee-card" aria-label="Chính sách giao hàng">
                <div class="card-icon" aria-hidden="true">🚚</div>
                <div class="card-content">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Toàn quốc</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <button type="button" class="scroll-indicator" aria-label="Cuộn xuống để khám phá thêm">
        <div class="scroll-text">Khám phá thêm</div>
        <div class="scroll-arrow" aria-hidden="true">↓</div>
    </button>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  // ======== Animate In ========
  const heroContent = document.querySelector('.hero-content');
  const heroProduct = document.querySelector('.hero-product');

  if (heroContent) setTimeout(() => heroContent.classList.add('animate-in'), 100);
  if (heroProduct) setTimeout(() => heroProduct.classList.add('animate-in'), 300);

  // ======== Scroll indicator click ========
  const indicatorBtn = document.querySelector('.scroll-indicator');
  if (indicatorBtn) {
    indicatorBtn.addEventListener('click', () => {
      const nextSection =
        document.querySelector('#san-pham') ||
        document.querySelector('.section:nth-of-type(2)');
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      } else {
        window.scrollTo({ top: window.innerHeight, behavior: 'smooth' });
      }
    });
  }

  // ======== Gộp xử lý scroll: indicator + parallax ========
  const indicatorEl = document.querySelector('.scroll-indicator');
  const parallaxEl  = document.querySelector('.hero-bg-image');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const onScroll = () => {
    const y = window.scrollY || window.pageYOffset;

    // Ẩn/hiện indicator
    if (indicatorEl) indicatorEl.classList.toggle('hidden', y > 100);

    // Parallax nền
    if (!reduceMotion && parallaxEl && y < window.innerHeight) {
      parallaxEl.style.transform = `translateY(${y * 0.3}px)`;
    }
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll(); // chạy 1 lần khi load

  // ======== CTA tracking (nếu có gtag) ========
  document.querySelectorAll('.cta-primary, .cta-secondary').forEach(btn => {
    btn.addEventListener('click', function () {
      if (typeof gtag !== 'undefined') {
        const isZalo = this.classList.contains('cta-primary');
        gtag('event', 'cta_click', {
          event_category: 'engagement',
          event_label: isZalo ? 'hero_zalo' : 'hero_phone',
          value: 1
        });
      }
    });
  });
});
</script>
@endpush
