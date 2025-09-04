<section id="loi-ich" class="benefits section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Lợi ích sức khỏe</h2>
            <p class="section-subtitle">
                6 lợi ích vượt trội được khoa học chứng minh, mang lại sức khỏe toàn diện cho cả gia đình
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="benefits-grid">
            @if(isset($benefits) && is_array($benefits))
                @foreach($benefits as $index => $benefit)
                <div class="benefit-card" data-index="{{ $index }}">
                    <div class="card-inner">
                        <!-- Front of card -->
                        <div class="card-front">
                            <div class="benefit-icon">
                                @switch($benefit['title'])
                                    @case('Đẹp da - Đẹp tóc')
                                        <span class="icon">✨</span>
                                        @break
                                    @case('Hỗ trợ hệ tiêu hóa')
                                        <span class="icon">🫄</span>
                                        @break
                                    @case('Cải thiện cảm giác đói')
                                        <span class="icon">⚖️</span>
                                        @break
                                    @case('Giúp lợi sữa sau sinh')
                                        <span class="icon">🤱</span>
                                        @break
                                    @case('Cải thiện đường trong máu')
                                        <span class="icon">📊</span>
                                        @break
                                    @case('Bổ sung năng lượng')
                                        <span class="icon">⚡</span>
                                        @break
                                    @default
                                        <span class="icon">💪</span>
                                @endswitch
                                <div class="icon-bg"></div>
                            </div>

                            <h3 class="benefit-title">{{ $benefit['title'] ?? 'Lợi ích sức khỏe' }}</h3>
                            <p class="benefit-description">{{ $benefit['description'] ?? 'Mô tả lợi ích...' }}</p>

                            <div class="benefit-stats">
                                @switch($benefit['title'])
                                    @case('Đẹp da - Đẹp tóc')
                                        <div class="stat-item">
                                            <strong>90%</strong>
                                            <span>cải thiện da</span>
                                        </div>
                                        @break
                                    @case('Hỗ trợ hệ tiêu hóa')
                                        <div class="stat-item">
                                            <strong>8.5g</strong>
                                            <span>chất xơ/100g</span>
                                        </div>
                                        @break
                                    @case('Cải thiện cảm giác đói')
                                        <div class="stat-item">
                                            <strong>4-6h</strong>
                                            <span>cảm giác no</span>
                                        </div>
                                        @break
                                    @case('Giúp lợi sữa sau sinh')
                                        <div class="stat-item">
                                            <strong>85%</strong>
                                            <span>mẹ có nhiều sữa hơn</span>
                                        </div>
                                        @break
                                    @case('Cải thiện đường trong máu')
                                        <div class="stat-item">
                                            <strong>GI thấp</strong>
                                            <span>ổn định đường huyết</span>
                                        </div>
                                        @break
                                    @case('Bổ sung năng lượng')
                                        <div class="stat-item">
                                            <strong>380</strong>
                                            <span>kcal/100g</span>
                                        </div>
                                        @break
                                @endswitch
                            </div>

                            <div class="flip-indicator">
                                <span class="flip-text">Xem chi tiết</span>
                                <span class="flip-icon">↻</span>
                            </div>
                        </div>

                        <!-- Back of card -->
                        <div class="card-back">
                            <div class="back-content">
                                <h4 class="back-title">{{ $benefit['title'] ?? 'Chi tiết lợi ích' }}</h4>

                                <div class="detailed-info">
                                    @switch($benefit['title'])
                                        @case('Đẹp da - Đẹp tóc')
                                            <ul class="benefit-details">
                                                <li><strong>Vitamin E:</strong> Chống oxi hóa, làm chậm lão hóa</li>
                                                <li><strong>Protein:</strong> Tăng cường keratin cho tóc</li>
                                                <li><strong>Kẽm:</strong> Hỗ trợ tái tạo tế bào da</li>
                                                <li><strong>Omega-3:</strong> Giữ ẩm tự nhiên cho da</li>
                                            </ul>
                                            @break
                                        @case('Hỗ trợ hệ tiêu hóa')
                                            <ul class="benefit-details">
                                                <li><strong>Chất xơ:</strong> 8.5g/100g hỗ trợ tiêu hóa</li>
                                                <li><strong>Prebiotics:</strong> Nuôi dưỡng vi khuẩn có lợi</li>
                                                <li><strong>Enzyme tự nhiên:</strong> Hỗ trợ phân giải thức ăn</li>
                                                <li><strong>Dễ tiêu hóa:</strong> Không gây khó chịu dạ dày</li>
                                            </ul>
                                            @break
                                        @case('Cải thiện cảm giác đói')
                                            <ul class="benefit-details">
                                                <li><strong>Protein:</strong> 12.5g tạo cảm giác no lâu</li>
                                                <li><strong>Chất xơ:</strong> Làm chậm quá trình tiêu hóa</li>
                                                <li><strong>GI thấp:</strong> Ổn định đường huyết</li>
                                                <li><strong>Thay thế bữa ăn:</strong> An toàn và hiệu quả</li>
                                            </ul>
                                            @break
                                        @case('Giúp lợi sữa sau sinh')
                                            <ul class="benefit-details">
                                                <li><strong>Galactagogue:</strong> Thành phần kích thích tiết sữa</li>
                                                <li><strong>Protein cao:</strong> Hỗ trợ sản xuất sữa mẹ</li>
                                                <li><strong>Vitamin B:</strong> Tăng cường năng lượng</li>
                                                <li><strong>An toàn:</strong> Không ảnh hưởng đến em bé</li>
                                            </ul>
                                            @break
                                        @case('Cải thiện đường trong máu')
                                            <ul class="benefit-details">
                                                <li><strong>GI thấp:</strong> Không tăng đột biến đường huyết</li>
                                                <li><strong>Chất xơ:</strong> Làm chậm hấp thu glucose</li>
                                                <li><strong>Chromium:</strong> Hỗ trợ chuyển hóa đường</li>
                                                <li><strong>Phù hợp:</strong> Người tiểu đường type 2</li>
                                            </ul>
                                            @break
                                        @case('Bổ sung năng lượng')
                                            <ul class="benefit-details">
                                                <li><strong>Carb phức:</strong> Năng lượng bền vững</li>
                                                <li><strong>B-Vitamins:</strong> Hỗ trợ chuyển hóa năng lượng</li>
                                                <li><strong>Sắt:</strong> Vận chuyển oxy hiệu quả</li>
                                                <li><strong>Magie:</strong> Hỗ trợ chức năng cơ bắp</li>
                                            </ul>
                                            @break
                                        @default
                                            <p>Chi tiết về lợi ích sức khỏe của sản phẩm...</p>
                                    @endswitch
                                </div>

                                <div class="scientific-note">
                                    <span class="note-icon">🔬</span>
                                    <span class="note-text">Được nghiên cứu khoa học chứng minh</span>
                                </div>
                            </div>

                            <div class="flip-back-indicator">
                                <span class="flip-text">Quay lại</span>
                                <span class="flip-icon">↺</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <!-- Three "KHÔNG" Commitment -->
        <div class="three-no-section">
            <div class="three-no-header">
                <h3 class="three-no-title">CAM KẾT "3 KHÔNG"</h3>
                <p class="three-no-subtitle">Đảm bảo an toàn tuyệt đối cho sức khỏe người tiêu dùng</p>
            </div>

            <div class="three-no-grid">
                @if(isset($commitments) && is_array($commitments))
                    @foreach($commitments as $index => $commitment)
                    <div class="no-item" data-index="{{ $index }}">
                        <div class="no-badge">
                            <div class="badge-icon">
                                @switch($commitment['title'])
                                    @case('KHÔNG HƯƠNG LIỆU')
                                        <span class="icon">🚫🌸</span>
                                        @break
                                    @case('KHÔNG ĐẬU NÀNH')
                                        <span class="icon">🚫🫘</span>
                                        @break
                                    @case('KHÔNG CHẤT BẢO QUẢN')
                                        <span class="icon">🚫🧪</span>
                                        @break
                                    @default
                                        <span class="icon">🚫</span>
                                @endswitch
                            </div>
                            <div class="badge-content">
                                <h4 class="no-title">{{ $commitment['title'] ?? 'Cam kết' }}</h4>
                                <p class="no-description">{{ $commitment['description'] ?? 'Mô tả cam kết' }}</p>
                            </div>
                        </div>

                        <div class="no-details">
                            @switch($commitment['title'])
                                @case('KHÔNG HƯƠNG LIỆU')
                                    <p><strong>Hương vị hoàn toàn tự nhiên</strong> từ quá trình rang và các nguyên liệu thực tế. Không sử dụng bất kỳ hương liệu nhân tạo nào.</p>
                                    @break
                                @case('KHÔNG ĐẬU NÀNH')
                                    <p><strong>An toàn cho người dị ứng đậu nành.</strong> Sản phẩm không chứa đậu nành và các sản phẩm từ đậu nành.</p>
                                    @break
                                @case('KHÔNG CHẤT BẢO QUẢN')
                                    <p><strong>Tươi ngon tự nhiên.</strong> Không sử dụng chất bảo quản, chất tạo màu hay chất phụ gia có hại.</p>
                                    @break
                                @default
                                    <p>Cam kết chất lượng an toàn cho người tiêu dùng.</p>
                            @endswitch
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <!-- Quality Promise -->
            <div class="quality-promise">
                <div class="promise-content">
                    <div class="promise-icon">🏆</div>
                    <div class="promise-text">
                        <h4>Cam kết chất lượng 100%</h4>
                        <p>Nếu không hài lòng với sản phẩm, chúng tôi sẽ hoàn tiền 100% trong vòng 30 ngày</p>
                    </div>
                </div>
                <div class="promise-actions">
                    <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                       class="promise-btn" target="_blank">
                        Đặt hàng ngay
                    </a>
                </div>
            </div>
        </div>

        <!-- Health Benefits Comparison -->
        <div class="benefits-comparison">
            <h3 class="comparison-title">So sánh với sản phẩm thông thường</h3>

            <div class="comparison-table">
                <div class="comparison-header">
                    <div class="header-item feature">Đặc điểm</div>
                    <div class="header-item tungbeo">Bột Gạo Lứt Tùng Beo</div>
                    <div class="header-item regular">Sản phẩm thông thường</div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">🌾</span>
                        <span class="feature-name">Nguyên liệu</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>100% tự nhiên, 9 loại hạt</span>
                    </div>
                    <div class="regular-cell bad">
                        <span class="cross-icon">❌</span>
                        <span>Có thể chứa phụ gia</span>
                    </div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">🧪</span>
                        <span class="feature-name">Chất bảo quản</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>Không chất bảo quản</span>
                    </div>
                    <div class="regular-cell bad">
                        <span class="cross-icon">❌</span>
                        <span>Có thể có chất bảo quản</span>
                    </div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">💪</span>
                        <span class="feature-name">Protein</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>12.5g/100g (Cao)</span>
                    </div>
                    <div class="regular-cell neutral">
                        <span class="neutral-icon">➖</span>
                        <span>6-8g/100g (Thấp)</span>
                    </div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">🌿</span>
                        <span class="feature-name">Chất xơ</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>8.5g/100g (Rất cao)</span>
                    </div>
                    <div class="regular-cell neutral">
                        <span class="neutral-icon">➖</span>
                        <span>2-4g/100g (Thấp)</span>
                    </div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">🏷️</span>
                        <span class="feature-name">Giá cả</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>{{ number_format($product['price'] ?? 150000) }}đ - Hợp lý</span>
                    </div>
                    <div class="regular-cell neutral">
                        <span class="neutral-icon">➖</span>
                        <span>80-120k - Thấp hơn</span>
                    </div>
                </div>

                <div class="comparison-row">
                    <div class="feature-cell">
                        <span class="feature-icon">🛡️</span>
                        <span class="feature-name">Bảo hành chất lượng</span>
                    </div>
                    <div class="tungbeo-cell good">
                        <span class="check-icon">✅</span>
                        <span>Hoàn tiền 100%</span>
                    </div>
                    <div class="regular-cell bad">
                        <span class="cross-icon">❌</span>
                        <span>Không cam kết</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Success Stories -->
        <div class="success-stories">
            <h3 class="stories-title">Câu chuyện thành công từ khách hàng</h3>

            <div class="stories-grid">
                <div class="story-item">
                    <div class="story-before-after">
                        <div class="before">
                            <span class="label">Trước</span>
                            <p>"Da xỉn màu, tiêu hóa kém, hay mệt mỏi"</p>
                        </div>
                        <div class="arrow">→</div>
                        <div class="after">
                            <span class="label">Sau 1 tháng</span>
                            <p>"Da sáng khỏe, tiêu hóa tốt, đầy năng lượng"</p>
                        </div>
                    </div>
                    <div class="story-author">
                        <div class="author-avatar">👩</div>
                        <div class="author-info">
                            <strong>Chị Mai Anh</strong>
                            <span>30 tuổi, Hà Nội</span>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                </div>

                <div class="story-item">
                    <div class="story-before-after">
                        <div class="before">
                            <span class="label">Trước</span>
                            <p>"Sau sinh ít sữa, mệt mỏi, stress"</p>
                        </div>
                        <div class="arrow">→</div>
                        <div class="after">
                            <span class="label">Sau 2 tuần</span>
                            <p>"Sữa về nhiều, tinh thần thoải mái"</p>
                        </div>
                    </div>
                    <div class="story-author">
                        <div class="author-avatar">🤱</div>
                        <div class="author-info">
                            <strong>Chị Thanh Hoa</strong>
                            <span>28 tuổi, TP.HCM</span>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                </div>

                <div class="story-item">
                    <div class="story-before-after">
                        <div class="before">
                            <span class="label">Trước</span>
                            <p>"Đường huyết cao, cân nặng tăng"</p>
                        </div>
                        <div class="arrow">→</div>
                        <div class="after">
                            <span class="label">Sau 6 tuần</span>
                            <p>"Đường huyết ổn định, giảm 4kg"</p>
                        </div>
                    </div>
                    <div class="story-author">
                        <div class="author-avatar">👨</div>
                        <div class="author-info">
                            <strong>Anh Văn Minh</strong>
                            <span>45 tuổi, Đà Nẵng</span>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="benefits-cta">
            <div class="cta-content">
                <h3 class="cta-title">Sẵn sàng cải thiện sức khỏe của bạn?</h3>
                <p class="cta-description">
                    Hàng nghìn khách hàng đã tin tưởng và đạt được kết quả tích cực.
                    Bạn sẽ là người tiếp theo?
                </p>

                <div class="cta-actions">
                    <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                       class="cta-btn primary" target="_blank">
                        <span class="btn-icon">💬</span>
                        <span class="btn-text">Đặt hàng ngay - Nhận ưu đãi</span>
                    </a>

                    <a href="tel:{{ $contact['hotline'] ?? '0123456789' }}"
                       class="cta-btn secondary">
                        <span class="btn-icon">📞</span>
                        <span class="btn-text">Tư vấn miễn phí</span>
                    </a>
                </div>

                <div class="cta-guarantee">
                    <span class="guarantee-icon">🛡️</span>
                    <span class="guarantee-text">Cam kết hoàn tiền 100% nếu không hài lòng</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ========== Helpers ========== */
  const stagger = (nodes, step = 120, start = 0, addClass = 'animate-in') => {
    nodes.forEach((el, i) => {
      if (prefersReducedMotion) { el.classList.add(addClass); return; }
      setTimeout(() => el.classList.add(addClass), start + i * step);
    });
  };

  /* ========== BENEFIT CARDS (flip & animate) ========== */
  const cards = [...document.querySelectorAll('.benefit-card')];

  // a11y + base
  cards.forEach((card) => {
    card.setAttribute('tabindex', '0');
    card.setAttribute('role', 'button');
    card.setAttribute('aria-expanded', 'false');
  });

  const closeAllCards = () => {
    cards.forEach(c => {
      c.classList.remove('flipped');
      c.style.zIndex = '';
      c.setAttribute('aria-expanded', 'false');
    });
  };

  const toggleCard = (card) => {
    const willOpen = !card.classList.contains('flipped');
    closeAllCards();
    if (willOpen) {
      card.classList.add('flipped');
      card.style.zIndex = '10';
      card.setAttribute('aria-expanded', 'true');

      // analytics (once per open)
      if (typeof gtag !== 'undefined' && !card.dataset.tracked) {
        const idx = cards.indexOf(card) + 1;
        gtag('event', 'benefit_view', {
          event_category: 'engagement',
          event_label: `benefit_${idx}`,
          value: 1
        });
        card.dataset.tracked = '1';
      }
    }
  };

  // Click flip
  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      // ignore clicks on interactive elements inside
      if (e.target.closest('a,button,[role="button"]')) return;
      toggleCard(card);
    });

    // Keyboard
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleCard(card); }
      if (e.key === 'Escape') closeAllCards();
    });
  });

  // Click outside closes
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.benefit-card')) closeAllCards();
  });

  // Animate-in each card when it enters viewport
  if (cards.length) {
    const cardInObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
          cardInObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    cards.forEach(c => cardInObserver.observe(c));
  }

  /* ========== THREE-NO section ========== */
  const threeNoSection = document.querySelector('.three-no-grid');
  if (threeNoSection) {
    const threeNoObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const items = [...entry.target.querySelectorAll('.no-item')];
          stagger(items, 200);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    threeNoObserver.observe(threeNoSection);
  }

  /* ========== COMPARISON table rows ========== */
  const comparisonTable = document.querySelector('.comparison-table');
  if (comparisonTable) {
    const comparisonObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const rows = [...entry.target.querySelectorAll('.comparison-row')];
          stagger(rows, 150);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    comparisonObserver.observe(comparisonTable);
  }

  /* ========== SUCCESS STORIES grid ========== */
  const storiesGrid = document.querySelector('.stories-grid');
  if (storiesGrid) {
    const storiesObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const stories = [...entry.target.querySelectorAll('.story-item')];
          stagger(stories, 300);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    storiesObserver.observe(storiesGrid);
  }

  /* ========== CTA tracking ========== */
  document.querySelectorAll('.cta-btn, .promise-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      if (typeof gtag === 'undefined') return;
      const href = (this.getAttribute('href') || '').toLowerCase();
      const isZalo = href.includes('zalo.me');
      gtag('event', 'cta_click', {
        event_category: 'conversion',
        event_label: isZalo ? 'benefits_zalo' : 'benefits_phone',
        value: 1
      });
    });
  });
});
</script>

