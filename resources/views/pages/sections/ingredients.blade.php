<section id="thanh-phan" class="ingredients section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Thành phần dinh dưỡng</h2>
            <p class="section-subtitle">
                9 loại nguyên liệu tự nhiên được tuyển chọn kỹ lưỡng, mang lại giá trị dinh dưỡng tối ưu
            </p>
        </div>

        <!-- Main Ingredients Display -->
        <div class="ingredients-showcase">
            <!-- Central Product -->
            <div class="central-product" aria-label="Sản phẩm trung tâm">
                <div class="product-circle">
                    <div class="product-inner">
                        <div class="product-logo">TB</div>
                        <div class="product-text">BỘT GẠO LỨT</div>
                    </div>
                    <div class="rotating-ring" aria-hidden="true"></div>
                </div>

                <!-- Ingredient Lines connecting to center (tính theo góc) -->
                @php
                    $hasIngredients = isset($ingredients) && is_array($ingredients) && count($ingredients) > 0;
                    $total = $hasIngredients ? count($ingredients) : 0;
                @endphp
                @if($hasIngredients)
                <div class="ingredient-lines" aria-hidden="true">
                    @for($i = 0; $i < $total; $i++)
                        @php
                            $deg = round(($i / max($total,1)) * 360);
                        @endphp
                        <div class="connect-line"
                            style="transform: translate(-50%, -100px) rotate({{ $deg }}deg)"></div>
                    @endfor
                </div>
                @endif
            </div>

            <!-- Ingredients Orbit -->
            <div class="ingredients-orbit" role="list">
                @if($hasIngredients)
                    @foreach($ingredients as $index => $ingredient)
                        @php
                            // Tính toạ độ quỹ đạo theo bán kính R (khớp CSS mặc định)
                            $R = 250; // đổi cho desktop lớn bằng @media trong CSS
                            $angle = 2 * M_PI * $index / max($total,1);
                            $x = round($R * cos($angle));
                            $y = round($R * sin($angle));
                            $deg = round(rad2deg($angle));
                            $name = $ingredient['name'] ?? 'Thành phần';
                            $icon = $ingredient['icon'] ?? '🌾';
                            $desc = $ingredient['description'] ?? 'Mô tả thành phần';
                        @endphp

                        <div id="ing-{{ $index + 1 }}"
                            class="ingredient-item"
                            role="listitem"
                            data-ingredient="{{ $index }}"
                            tabindex="0"
                            aria-label="Thành phần {{ $name }}"
                            style="--x: {{ $x }}px; --y: {{ $y }}px; --angle: {{ $deg }}deg;">
                            <div class="ingredient-card">
                                <div class="ingredient-visual">
                                    <div class="ingredient-icon">{{ $icon }}</div>
                                    <div class="ingredient-image">
                                        <!-- Placeholder cho ảnh nguyên liệu -->
                                        <div class="image-placeholder" aria-hidden="true">
                                            <span class="placeholder-icon">{{ $icon }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="ingredient-info">
                                    <h4 class="ingredient-name">{{ $name }}</h4>
                                    <p class="ingredient-description">{{ $desc }}</p>

                                    <!-- Nutritional highlights -->
                                    <div class="nutrition-highlights">
                                        @switch($name)
                                            @case('Gạo lứt')
                                                <span class="highlight-tag">Chất xơ cao</span>
                                                <span class="highlight-tag">Vitamin B</span>
                                                @break
                                            @case('Đậu gà')
                                                <span class="highlight-tag">Protein</span>
                                                <span class="highlight-tag">Folate</span>
                                                @break
                                            @case('Đậu hà lan')
                                                <span class="highlight-tag">Vitamin A</span>
                                                <span class="highlight-tag">Vitamin C</span>
                                                @break
                                            @case('Điểm mạch')
                                                <span class="highlight-tag">Protein hoàn chỉnh</span>
                                                @break
                                            @case('Yến mạch')
                                                <span class="highlight-tag">Beta-glucan</span>
                                                @break
                                            @case('Hạt sen')
                                                <span class="highlight-tag">Vitamin E</span>
                                                @break
                                            @case('Ó chó')
                                                <span class="highlight-tag">Omega-3</span>
                                                @break
                                            @case('Hạnh nhân')
                                                <span class="highlight-tag">Vitamin E</span>
                                                <span class="highlight-tag">Magie</span>
                                                @break
                                            @case('Macca')
                                                <span class="highlight-tag">Chất béo tốt</span>
                                                @break
                                            @default
                                                <span class="highlight-tag">Dinh dưỡng</span>
                                        @endswitch
                                    </div>
                                </div>

                                <!-- Hover/Click Details -->
                                <div class="ingredient-details" aria-live="polite">
                                    <div class="details-content">
                                        <h5>Chi tiết dinh dưỡng</h5>
                                        @switch($name)
                                            @case('Gạo lứt')
                                                <ul>
                                                    <li>Chất xơ: 3.5g/100g</li>
                                                    <li>Protein: 7.9g/100g</li>
                                                    <li>Vitamin B1, B3, B6</li>
                                                    <li>Mangan, Selenium</li>
                                                </ul>
                                                @break
                                            @case('Đậu gà')
                                                <ul>
                                                    <li>Protein: 19.3g/100g</li>
                                                    <li>Chất xơ: 17.4g/100g</li>
                                                    <li>Folate: 557mcg/100g</li>
                                                    <li>Sắt: 6.2mg/100g</li>
                                                </ul>
                                                @break
                                            @default
                                                <ul>
                                                    <li>Giàu vitamin và khoáng chất</li>
                                                    <li>Hỗ trợ sức khỏe tổng thể</li>
                                                    <li>Tự nhiên, không hóa chất</li>
                                                </ul>
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback khi chưa có dữ liệu --}}
                    <div class="text-center text-gray-500">Đang cập nhật thành phần…</div>
                @endif
            </div>
        </div>

        <!-- Nutritional Summary -->
        <div class="nutritional-summary">
            <h3 class="summary-title">Bảng thành phần dinh dưỡng</h3>
            <div class="summary-subtitle">Trong 100g sản phẩm</div>

            <div class="nutrition-table">
                <div class="nutrition-row header">
                    <div class="nutrition-label">Thành phần</div>
                    <div class="nutrition-value">Giá trị</div>
                    <div class="nutrition-benefit">Lợi ích</div>
                </div>

                <div class="nutrition-row">
                    <div class="nutrition-label">
                        <span class="label-icon">⚡</span>
                        <span class="label-text">Năng lượng</span>
                    </div>
                    <div class="nutrition-value">380 kcal</div>
                    <div class="nutrition-benefit">Cung cấp năng lượng bền vững</div>
                </div>

                <div class="nutrition-row">
                    <div class="nutrition-label">
                        <span class="label-icon">🥩</span>
                        <span class="label-text">Protein</span>
                    </div>
                    <div class="nutrition-value">12.5g</div>
                    <div class="nutrition-benefit">Xây dựng và phục hồi cơ bắp</div>
                </div>

                <div class="nutrition-row">
                    <div class="nutrition-label">
                        <span class="label-icon">🌾</span>
                        <span class="label-text">Carbohydrate</span>
                    </div>
                    <div class="nutrition-value">68g</div>
                    <div class="nutrition-benefit">Nguồn năng lượng chính</div>
                </div>

                <div class="nutrition-row">
                    <div class="nutrition-label">
                        <span class="label-icon">🥜</span>
                        <span class="label-text">Chất béo</span>
                    </div>
                    <div class="nutrition-value">6.2g</div>
                    <div class="nutrition-benefit">Chất béo tốt, Omega-3</div>
                </div>

                <div class="nutrition-row">
                    <div class="nutrition-label">
                        <span class="label-icon">🌿</span>
                        <span class="label-text">Chất xơ</span>
                    </div>
                    <div class="nutrition-value">8.5g</div>
                    <div class="nutrition-benefit">Hỗ trợ tiêu hóa, no lâu</div>
                </div>

                <div class="nutrition-row highlight">
                    <div class="nutrition-label">
                        <span class="label-icon">💊</span>
                        <span class="label-text">Vitamin & Khoáng chất</span>
                    </div>
                    <div class="nutrition-value">Đầy đủ</div>
                    <div class="nutrition-benefit">Tăng cường miễn dịch</div>
                </div>
            </div>
        </div>

        {{-- Processing Method --}}
        <section id="quy-trinh" class="processing-info">
            <h3 class="processing-title">Quy trình chế biến</h3>

            @php
                // Chọn layout: '2x2' hoặc '1x4'
                $layout = $processLayout ?? '2x2';
                $layoutClass = $layout === '1x4' ? 'is-1x4' : 'is-2x2';

                // Dữ liệu bước (fallback nếu không truyền từ controller)
                $steps = $processSteps ?? [
                    [
                        'no' => 1,
                        'icon' => '🌾',
                        'title' => 'Tuyển chọn nguyên liệu',
                        'desc' => 'Chọn lọc gạo lứt và các loại hạt chất lượng cao, đạt tiêu chuẩn hữu cơ.',
                    ],
                    [
                        'no' => 2,
                        'icon' => '🔥',
                        'title' => 'Rang và sấy khô',
                        'desc' => 'Rang ở nhiệt độ thích hợp để giữ nguyên dinh dưỡng và tạo hương vị tự nhiên.',
                    ],
                    [
                        'no' => 3,
                        'icon' => '⚙️',
                        'title' => 'Nghiền mịn',
                        'desc' => 'Sử dụng công nghệ nghiền hiện đại, tạo độ mịn đồng đều, dễ hòa tan.',
                    ],
                    [
                        'no' => 4,
                        'icon' => '📦',
                        'title' => 'Đóng gói',
                        'desc' => 'Đóng gói trong môi trường vô trùng, đảm bảo vệ sinh và chất lượng.',
                    ],
                ];
            @endphp

            <div class="process-steps {{ $layoutClass }}">
                @foreach ($steps as $i => $step)
                    <div class="process-step">
                        <div class="step-number">{{ $step['no'] ?? ($i + 1) }}</div>
                        <div class="step-content">
                            <div class="step-icon">{{ $step['icon'] ?? '🔧' }}</div>
                            <h4 class="step-title">{{ $step['title'] ?? 'Bước' }}</h4>
                            <p class="step-description">
                                {{ $step['desc'] ?? 'Mô tả bước...' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- Quality Assurance -->
        <div class="quality-assurance">
            <div class="qa-content">
                <div class="qa-icon">🔬</div>
                <h4 class="qa-title">Kiểm soát chất lượng nghiêm ngặt</h4>
                <p class="qa-description">
                    Mỗi lô sản phẩm đều được kiểm tra tại phòng thí nghiệm uy tín,
                    đảm bảo đạt tiêu chuẩn an toàn thực phẩm VSATTP.
                </p>

                <div class="qa-certifications">
                    <div class="cert-badge">
                        <span class="cert-icon">✅</span>
                        <span class="cert-text">VSATTP</span>
                    </div>
                    <div class="cert-badge">
                        <span class="cert-icon">🌿</span>
                        <span class="cert-text">Hữu cơ</span>
                    </div>
                    <div class="cert-badge">
                        <span class="cert-icon">🔬</span>
                        <span class="cert-text">Kiểm định</span>
                    </div>
                    <div class="cert-badge">
                        <span class="cert-icon">📋</span>
                        <span class="cert-text">Pháp lý</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(() => {
  'use strict';

  const $  = (s, r=document) => r.querySelector(s);
  const $$ = (s, r=document) => Array.from(r.querySelectorAll(s));
  const prefersReduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ========= INGREDIENTS ========= */
  (function setupIngredients(){
    const section = $('.ingredients');
    if (!section) return;

    const items = $$('.ingredient-item', section);
    const center = $('.central-product', section);
    const ring   = $('.rotating-ring', section);

    const reveal = () => {
      center?.classList.add('animate-in');
      items.forEach((it, i) => {
        const run = () => it.classList.add('animate-in');
        prefersReduced ? run() : setTimeout(run, i * 100 + 200);
      });
      if (ring && !prefersReduced) ring.classList.add('rotating');
    };

    try {
      const io = new IntersectionObserver((es, obs) => {
        if (es.some(e => e.isIntersecting)) { reveal(); obs.disconnect(); }
      }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });
      io.observe(section);
    } catch { reveal(); }

    // Hover/Click + line khớp theo thứ tự
    let paused = false;

    items.forEach((it, i) => {
      const line = $('.ingredient-lines .connect-line:nth-child(' + (i+1) + ')', section);

      it.addEventListener('mouseenter', () => {
        it.classList.add('highlighted');
        line?.classList.add('active');
        paused = true;
        if (ring) ring.style.animationPlayState = 'paused';
      });

      it.addEventListener('mouseleave', () => {
        it.classList.remove('highlighted');
        line?.classList.remove('active');
        paused = false;
        if (ring) ring.style.animationPlayState = 'running';
      });

      it.addEventListener('click', (e) => {
        const isOpen = it.classList.contains('details-active');
        items.forEach(x => x.classList.remove('details-active'));
        if (!isOpen) it.classList.add('details-active');
        e.stopPropagation();
      });

      it.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); it.click(); }
        if (e.key === 'Escape') it.classList.remove('details-active');
      });
    });

    document.addEventListener('click', (e) => {
      if (!e.target.closest('.ingredient-item')) {
        items.forEach(x => x.classList.remove('details-active'));
      }
    });

    // Spotlight quay vòng
    let idx = 0, timer = null;
    const tick = () => {
      const r = section.getBoundingClientRect();
      const visible = r.top < innerHeight - 40 && r.bottom > 40;
      if (!visible || paused) return;
      items.forEach(x => x.classList.remove('spotlight'));
      items[idx]?.classList.add('spotlight');
      idx = (idx + 1) % items.length;
    };
    const start = () => { if (!prefersReduced && !timer) timer = setInterval(tick, 3000); };
    const stop  = () => { if (timer) { clearInterval(timer); timer = null; } };

    start();
    document.addEventListener('visibilitychange', () => document.hidden ? stop() : start());
  })();

  /* ========= NUTRITION TABLE ========= */
  (function setupNutrition(){
    const table = $('.nutrition-table');
    if (!table) return;

    const rows = $$('.nutrition-row:not(.header)', table);

    const reveal = () => {
      rows.forEach((row, i) => {
        const run = () => row.classList.add('animate-in');
        prefersReduced ? run() : setTimeout(run, i * 120);
      });
    };

    try {
      const io = new IntersectionObserver((es, obs) => {
        if (es.some(e => e.isIntersecting)) { reveal(); obs.disconnect(); }
      }, { threshold: 0.12, rootMargin: '0px 0px -20% 0px' });
      io.observe(table);
    } catch { reveal(); }
  })();

  /* ========= PROCESS STEPS ========= */
  (function setupProcess(){
    const wrap = $('.process-steps');
    if (!wrap) return;

    const steps = $$('.process-step', wrap);

    const reveal = () => {
      steps.forEach((st, i) => {
        const run = () => st.classList.add('animate-in');
        prefersReduced ? run() : setTimeout(run, i * 200);
      });
    };

    try {
      const io = new IntersectionObserver((es, obs) => {
        if (es.some(e => e.isIntersecting)) { reveal(); obs.disconnect(); }
      }, { threshold: 0.2, rootMargin: '0px 0px -10% 0px' });
      io.observe(wrap);
    } catch { reveal(); }
  })();

})();
</script>
