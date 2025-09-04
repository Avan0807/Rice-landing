<section id="san-pham" class="product-showcase section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Sản phẩm chính hãng</h2>
            <p class="section-subtitle">
                Bột Gạo Lứt Tùng Beo - Sản phẩm dinh dưỡng cao cấp với công thức độc quyền
            </p>
        </div>

        <!-- Main Product Display -->
        <div class="product-main">

            <!-- Product Image Section -->
            <div class="product-image-section">
                <div class="product-image-container">
                    <img src="{{ asset('images/bot-gao-lut6.jpg') }}" alt="Bột Gạo Lứt Tùng Beo" class="product-image">
                    <div class="image-overlay"></div>
                </div>

                <!-- Feature tags quanh ảnh -->
                <div class="feature-highlights">
                    <div class="feature-item feature-top-left" data-tooltip="9 loại hạt dinh dưỡng tự nhiên">
                        <div class="feature-icon">🌰</div>
                        <span class="feature-text">9 loại hạt dinh dưỡng</span>
                    </div>
                    <div class="feature-item feature-top-right" data-tooltip="Không chứa gluten, an toàn cho người dị ứng">
                        <div class="feature-icon">🚫</div>
                        <span class="feature-text">Không gluten</span>
                    </div>
                    <div class="feature-item feature-bottom-left" data-tooltip="Giàu protein thực vật tự nhiên">
                        <div class="feature-icon">💪</div>
                        <span class="feature-text">Giàu protein</span>
                    </div>
                    <div class="feature-item feature-bottom-right" data-tooltip="Bổ sung vitamin B thiết yếu">
                        <div class="feature-icon">🅱️</div>
                        <span class="feature-text">Chứa vitamin B</span>
                    </div>
                </div>
            </div>

            <!-- Product Information (bố cục ngang) -->
            <div class="product-info product-info--wide">

                <!-- header: logo + tên + giá (xếp ngang) -->
                <div class="info-head">
                    <div class="brand-tag">TB</div>
                    <div class="head-text">
                        <h3 class="product-name">{{ $product['name'] ?? 'Bột Gạo Lứt Tùng Beo' }}</h3>
                        <div class="price-section price-section--compact">
                            <div class="current-price">{{ number_format($product['price'] ?? 150000) }}đ</div>
                            <div class="price-note">/ hộp 500g</div>
                        </div>
                    </div>
                </div>

                <!-- grid 2 cột: trái (spec + features), phải (mô tả + CTA + cam kết) -->
                <div class="info-grid">
                    <div class="info-col">
                        <div class="product-specs">
                            <div class="spec-item">
                                <span class="spec-icon">📦</span>
                                <div class="spec-content">
                                    <strong>Khối lượng</strong>
                                    <span>{{ $product['weight'] ?? '500g (20 gói x 25g)' }}</span>
                                </div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon">🏪</span>
                                <div class="spec-content">
                                    <strong>Thương hiệu</strong>
                                    <span>{{ $product['brand'] ?? 'Tùng Beo' }} – Gian hàng chính hãng</span>
                                </div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon">🇻🇳</span>
                                <div class="spec-content">
                                    <strong>Xuất xứ</strong>
                                    <span>{{ $product['origin'] ?? 'Việt Nam' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="features-list">
                            <h4>Đặc điểm nổi bật:</h4>
                            <div class="features-grid features-grid--2col">
                                <div class="feature-card"><span class="feature-check">✓</span> Hương vị tự nhiên</div>
                                <div class="feature-card"><span class="feature-check">✓</span> Không chất bảo quản</div>
                                <div class="feature-card"><span class="feature-check">✓</span> Nguồn gốc thiên nhiên</div>
                                <div class="feature-card"><span class="feature-check">✓</span> Dễ pha, tiện mang theo</div>
                            </div>
                        </div>
                    </div>

                    <div class="info-col">
                        <div class="product-description">
                            <p>{{ $product['description'] ?? 'Sản phẩm từ 100% gạo lứt & hạt tự nhiên như đậu gà, đậu hà lan, diêm mạch, yến mạch, hạt sen, óc chó, hạnh nhân, maca… hương vị dễ uống, giàu dinh dưỡng.' }}</p>
                        </div>

                        <div class="product-actions product-actions--row">
                            <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                            class="btn-primary" target="_blank">
                                <span class="btn-icon">🛒</span> Đặt hàng ngay
                            </a>
                            <a href="tel:{{ $contact['hotline'] ?? '0123456789' }}" class="btn-secondary">
                                <span class="btn-icon">📞</span> Gọi tư vấn
                            </a>
                        </div>

                        <div class="guarantee-section guarantee--row">
                            <div class="guarantee-item">
                                <div class="guarantee-icon">🛡️</div>
                                <div class="guarantee-content">
                                    <strong>Cam kết chất lượng</strong>
                                    <span>Hoàn tiền 100% nếu không hài lòng</span>
                                </div>
                            </div>
                            <div class="guarantee-item">
                                <div class="guarantee-icon">🚚</div>
                                <div class="guarantee-content">
                                    <strong>Giao hàng tận nơi</strong>
                                    <span>COD toàn quốc, kiểm tra trước khi thanh toán</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Product Combos -->
        <div class="product-combos">
            <h3 class="combos-title">Ưu đãi đặc biệt</h3>
            <div class="combos-grid">
                <!-- Combo 1: Mua 1 Tặng 1 -->
                <div class="combo-card" data-combo="1">
                    <div class="combo-badge">
                        <span class="badge-text">Mua 1 Tặng 1</span>
                    </div>
                    <div class="combo-image-section">
                        <div class="combo-products-display">
                            <img src="{{ asset('images/bot-gao-lut3.jpg') }}" alt="Bột Gạo Lứt Tùng Beo" class="combo-product-img">
                            <div class="product-count-badge">x1</div>
                        </div>
                        <div class="combo-gifts-display">
                            <div class="plus-icon">+</div>
                            <div class="gift-items">
                                <div class="gift-item">
                                    <span class="gift-icon">🥤</span>
                                    <span class="gift-label">Bình lắc protein</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="combo-info">
                        <h4 class="combo-name">Mua 1 Tặng 1</h4>
                        <p class="combo-description">Bình lắc protein</p>
                        <div class="combo-price">
                            <span class="price-value">{{ number_format($product['price'] ?? 150000) }}đ</span>
                        </div>
                    </div>
                    <button class="combo-select" onclick="orderCombo(1)">
                        <span>Chọn combo này</span>
                    </button>
                </div>

                <!-- Combo 2: Mua 2 Tặng 2 -->
                <div class="combo-card" data-combo="2">
                    <div class="combo-badge">
                        <span class="badge-text">Mua 2 Tặng 2</span>
                    </div>
                    <div class="combo-image-section">
                        <div class="combo-products-display">
                            <img src="{{ asset('images/bot-gao-lut4.jpg') }}" alt="Bột Gạo Lứt Tùng Beo Combo 2" class="combo-product-img">
                            <div class="product-count-badge">x2</div>
                        </div>
                        <div class="combo-gifts-display">
                            <div class="plus-icon">+</div>
                            <div class="gift-items">
                                <div class="gift-item">
                                    <span class="gift-icon">🥤</span>
                                    <span class="gift-label">Bình lắc</span>
                                </div>
                                <div class="gift-item">
                                    <span class="gift-icon">📏</span>
                                    <span class="gift-label">Thước dây</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="combo-info">
                        <h4 class="combo-name">Mua 2 Tặng 2</h4>
                        <p class="combo-description">Bình lắc + Thước dây</p>
                        <div class="combo-price">
                            <span class="price-value">{{ number_format(($product['price'] ?? 150000) * 2) }}đ</span>
                            <span class="price-save">Tiết kiệm 100,000đ</span>
                        </div>
                    </div>
                    <button class="combo-select" onclick="orderCombo(2)">
                        <span>Chọn combo này</span>
                    </button>
                </div>

                <!-- Combo 3: Mua 3 Tặng 3 -->
                <div class="combo-card combo-popular" data-combo="3">
                    <div class="combo-badge">
                        <span class="badge-text">Mua 3 Tặng 3</span>
                    </div>
                    <div class="popular-tag">Phổ biến nhất</div>
                    <div class="combo-image-section">
                        <div class="combo-products-display">
                            <img src="{{ asset('images/bot-gao-lut1.jpg') }}" alt="Bột Gạo Lứt Tùng Beo Combo 3" class="combo-product-img" onerror="this.style.display='none'; this.parentNode.querySelector('.fallback-product').style.display='flex';">
                            <div class="fallback-product" style="display:none;">
                                <div class="mini-product-box">TB</div>
                                <div class="mini-product-box">TB</div>
                                <div class="mini-product-box">TB</div>
                            </div>
                            <div class="product-count-badge">x3</div>
                        </div>
                        <div class="combo-gifts-display">
                            <div class="plus-icon">+</div>
                            <div class="gift-items">
                                <div class="gift-item">
                                    <span class="gift-icon">🥤</span>
                                    <span class="gift-label">Bình lắc</span>
                                </div>
                                <div class="gift-item">
                                    <span class="gift-icon">📏</span>
                                    <span class="gift-label">Thước dây</span>
                                </div>
                                <div class="gift-item">
                                    <span class="gift-icon">🎁</span>
                                    <span class="gift-label">Quà tặng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="combo-info">
                        <h4 class="combo-name">Mua 3 Tặng 3</h4>
                        <p class="combo-description">Bình lắc + Thước dây + Quà tặng đặc biệt</p>
                        <div class="combo-price">
                            <span class="price-value">{{ number_format(($product['price'] ?? 150000) * 3) }}đ</span>
                            <span class="price-save">Tiết kiệm 150,000đ</span>
                        </div>
                    </div>
                    <button class="combo-select" onclick="orderCombo(3)">
                        <span>Chọn combo này</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product Certifications -->
        <div class="certifications">
            <h3 class="cert-title">Chứng nhận & Cam kết</h3>
            <div class="cert-grid-2x2">
                <div class="cert-item">
                    <div class="cert-icon">🏆</div>
                    <div class="cert-info">
                        <strong>Đạt tiêu chuẩn VSATTP</strong>
                        <span>Vệ sinh an toàn thực phẩm</span>
                    </div>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">🌿</div>
                    <div class="cert-info">
                        <strong>Nguyên liệu hữu cơ</strong>
                        <span>Không hóa chất, không GMO</span>
                    </div>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">🔬</div>
                    <div class="cert-info">
                        <strong>Kiểm định chất lượng</strong>
                        <span>Phòng thí nghiệm uy tín</span>
                    </div>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">📋</div>
                    <div class="cert-info">
                        <strong>Giấy phép kinh doanh</strong>
                        <span>Đầy đủ pháp lý</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
/* ===== Đặt global để nút "Chọn combo" vẫn gọi được ===== */
function orderCombo(comboNumber) {
  const zaloUrl = `https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}`;
  const message = `Xin chào! Tôi muốn đặt combo ${comboNumber} (Mua ${comboNumber} Tặng ${comboNumber}) sản phẩm Bột Gạo Lứt Tùng Beo. Vui lòng tư vấn cho tôi.`;

  window.open(`${zaloUrl}?text=${encodeURIComponent(message)}`, '_blank');

  // Track combo selection
  if (typeof gtag !== 'undefined') {
    gtag('event', 'combo_select', {
      'event_category': 'ecommerce',
      'event_label': `combo_${comboNumber}`,
      'value': comboNumber
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* =======================================================
     1) Preview ảnh to khi hover (chỉ bật trên thiết bị có hover)
     ======================================================= */
  const canHover = window.matchMedia('(hover:hover) and (pointer:fine)').matches;
  if (canHover) {
    const imgs = document.querySelectorAll('.combo-product-img');

    imgs.forEach(img => {
      let preview = null;

      // Dùng ảnh HD nếu có data-zoom, fallback về src
      const getSrc = () => img.getAttribute('data-zoom') || img.src;

      const position = (e) => {
        if (!preview) return;
        const x = e.pageX + 18;  // lệch để không che con trỏ
        const y = e.pageY + 18;
        preview.style.left = x + 'px';
        preview.style.top  = y + 'px';
      };

      img.addEventListener('mouseenter', (e) => {
        if (preview) return;
        preview = document.createElement('div');
        preview.className = 'img-preview';
        preview.innerHTML = `<img src="${getSrc()}" alt="">`;
        document.body.appendChild(preview);
        position(e);
        requestAnimationFrame(() => preview.classList.add('show'));
      });

      img.addEventListener('mousemove', position);

      img.addEventListener('mouseleave', () => {
        if (!preview) return;
        preview.classList.remove('show');
        const p = preview; preview = null;
        setTimeout(() => p && p.remove(), 120); // đợi fade-out
      });
    });
  }

  /* ==========================================
     2) Animate khi vào viewport (IntersectionObserver)
     ========================================== */
  const observerOptions = { threshold: 0.2, rootMargin: '0px 0px -50px 0px' };
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('animate-in');
    });
  }, observerOptions);

  document.querySelectorAll('.product-main, .combo-card, .cert-item').forEach(el => io.observe(el));

  /* ==========================================
     3) Hiệu ứng hover cho .feature-point (nếu có)
     ========================================== */
  document.querySelectorAll('.feature-point').forEach(point => {
    point.addEventListener('mouseenter', () => point.classList.add('active'));
    point.addEventListener('mouseleave', () => point.classList.remove('active'));
  });

  /* ==========================================
     4) Hiệu ứng 3D nhẹ cho .product-box-display (nếu có)
     ========================================== */
  const productBox = document.querySelector('.product-box-display');
  if (productBox) {
    productBox.addEventListener('mousemove', function(e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      const rotateX = (y / rect.height) * -10;
      const rotateY = (x / rect.width) * 10;
      this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });

    productBox.addEventListener('mouseleave', function() {
      this.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
    });
  }
});
</script>
