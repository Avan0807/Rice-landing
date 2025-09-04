<section id="huong-dan" class="usage-guide section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Hướng dẫn sử dụng</h2>
            <p class="section-subtitle">
                Cách pha chế và sử dụng đơn giản để đạt hiệu quả tối ưu nhất
            </p>
        </div>

        <!-- Main Usage Guide -->
        <div class="usage-main">
            <div class="usage-visual">
                <div class="preparation-demo">
                    <!-- Animated preparation steps -->
                    <div class="demo-container">
                        <div class="demo-step active" data-step="1">
                            <div class="demo-item powder">
                                <div class="powder-packet">
                                    <span class="packet-label">TB</span>
                                    <div class="powder-content"></div>
                                </div>
                                <div class="demo-label">1 gói bột (25g)</div>
                            </div>
                        </div>

                        <div class="demo-step" data-step="2">
                            <div class="demo-item liquid">
                                <div class="liquid-container">
                                    <div class="liquid-content"></div>
                                    <div class="liquid-waves"></div>
                                </div>
                                <div class="demo-label">200ml nước ấm</div>
                            </div>
                        </div>

                        <div class="demo-step" data-step="3">
                            <div class="demo-item mixing">
                                <div class="mixing-container">
                                    <div class="mixer-spoon"></div>
                                    <div class="mixing-liquid"></div>
                                </div>
                                <div class="demo-label">Khuấy đều</div>
                            </div>
                        </div>

                        <div class="demo-step" data-step="4">
                            <div class="demo-item ready">
                                <div class="final-drink">
                                    <div class="drink-content"></div>
                                    <div class="drink-foam"></div>
                                </div>
                                <div class="demo-label">Sẵn sàng thưởng thức</div>
                            </div>
                        </div>
                    </div>

                    <!-- Demo controls -->
                    <div class="demo-controls">
                        <button class="demo-btn prev" id="prevStep">‹</button>
                        <div class="step-indicators">
                            <span class="indicator active" data-target="1"></span>
                            <span class="indicator" data-target="2"></span>
                            <span class="indicator" data-target="3"></span>
                            <span class="indicator" data-target="4"></span>
                        </div>
                        <button class="demo-btn next" id="nextStep">›</button>
                    </div>
                </div>
            </div>

            <div class="usage-steps">
                @if(isset($usageSteps) && is_array($usageSteps))
                    @foreach($usageSteps as $index => $step)
                    <div class="step-card" data-step="{{ $step['step'] }}">
                        <div class="step-header">
                            <div class="step-number">{{ $step['step'] }}</div>
                            <h3 class="step-title">{{ $step['title'] ?? 'Bước ' . $step['step'] }}</h3>
                        </div>
                        <div class="step-content">
                            <p class="step-description">{{ $step['content'] ?? 'Nội dung hướng dẫn...' }}</p>

                            <!-- Additional details for each step -->
                            @switch($step['step'])
                                @case(1)
                                    <div class="step-details">
                                        <h5>Lựa chọn chất lỏng:</h5>
                                        <ul class="liquid-options">
                                            <li><span class="option-icon">💧</span> Nước lọc (dễ uống nhất)</li>
                                            <li><span class="option-icon">🔥</span> Nước ấm (hòa tan tốt)</li>
                                            <li><span class="option-icon">🥛</span> Sữa tươi không đường (bổ dưỡng hơn)</li>
                                            <li><span class="option-icon">🧊</span> Nước lạnh (mùa hè)</li>
                                        </ul>
                                    </div>
                                    @break
                                @case(2)
                                    <div class="step-details">
                                        <h5>Mẹo khuấy hiệu quả:</h5>
                                        <ul class="mixing-tips">
                                            <li><span class="tip-icon">🥄</span> Dùng thìa hoặc đũa khuấy đều</li>
                                            <li><span class="tip-icon">🥤</span> Dùng bình lắc protein (khuyên dùng)</li>
                                            <li><span class="tip-icon">⏱️</span> Khuấy trong 1-2 phút</li>
                                            <li><span class="tip-icon">✨</span> Để yên 2-3 phút cho tan hoàn toàn</li>
                                        </ul>
                                    </div>
                                    @break
                                @case(3)
                                    <div class="step-details">
                                        <h5>Thời điểm sử dụng tốt nhất:</h5>
                                        <ul class="timing-guide">
                                            <li><span class="time-icon">🌅</span> <strong>Sáng:</strong> Thay thế bữa sáng hoặc bữa phụ</li>
                                            <li><span class="time-icon">🌆</span> <strong>Tối:</strong> Thay thế bữa tối (giảm cân)</li>
                                            <li><span class="time-icon">🏃</span> <strong>Trước tập:</strong> 30-60 phút trước vận động</li>
                                            <li><span class="time-icon">😴</span> <strong>Trước ngủ:</strong> 2-3 tiếng trước khi đi ngủ</li>
                                        </ul>
                                    </div>
                                    @break
                                @case(4)
                                    <div class="step-details">
                                        <h5>Lưu ý quan trọng:</h5>
                                        <ul class="important-notes">
                                            <li><span class="warning-icon">⚠️</span> Không ăn gì sau 20h (nếu dùng để giảm cân)</li>
                                            <li><span class="warning-icon">🚫</span> Tránh ăn vặt khi đang dùng sản phẩm</li>
                                            <li><span class="warning-icon">📅</span> Không dùng quá hạn sử dụng</li>
                                            <li><span class="warning-icon">💊</span> Tham khảo bác sĩ nếu có bệnh lý đặc biệt</li>
                                        </ul>
                                    </div>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Usage Recommendations -->
        <div class="usage-recommendations">
            <h3 class="recommendations-title">Khuyến nghị sử dụng theo mục đích</h3>

            <div class="recommendations-grid">
                <div class="recommendation-card">
                    <div class="rec-header">
                        <div class="rec-icon">⚖️</div>
                        <h4 class="rec-title">Giảm cân</h4>
                    </div>
                    <div class="rec-content">
                        <div class="dosage">
                            <strong>Liều lượng:</strong> 2 gói/ngày
                        </div>
                        <div class="timing">
                            <strong>Thời điểm:</strong> Thay bữa sáng + bữa tối
                        </div>
                        <div class="duration">
                            <strong>Thời gian:</strong> 1-3 tháng
                        </div>
                        <div class="notes">
                            <strong>Lưu ý:</strong> Kết hợp vận động nhẹ, uống nhiều nước
                        </div>
                    </div>
                </div>

                <div class="recommendation-card">
                    <div class="rec-header">
                        <div class="rec-icon">💪</div>
                        <h4 class="rec-title">Tăng cường sức khỏe</h4>
                    </div>
                    <div class="rec-content">
                        <div class="dosage">
                            <strong>Liều lượng:</strong> 1-2 gói/ngày
                        </div>
                        <div class="timing">
                            <strong>Thời điểm:</strong> Bữa sáng hoặc bữa phụ
                        </div>
                        <div class="duration">
                            <strong>Thời gian:</strong> Lâu dài
                        </div>
                        <div class="notes">
                            <strong>Lưu ý:</strong> Dùng thường xuyên để duy trì sức khỏe
                        </div>
                    </div>
                </div>

                <div class="recommendation-card">
                    <div class="rec-header">
                        <div class="rec-icon">🤱</div>
                        <h4 class="rec-title">Mẹ sau sinh</h4>
                    </div>
                    <div class="rec-content">
                        <div class="dosage">
                            <strong>Liều lượng:</strong> 2-3 gói/ngày
                        </div>
                        <div class="timing">
                            <strong>Thời điểm:</strong> Sáng, trưa, tối
                        </div>
                        <div class="duration">
                            <strong>Thời gian:</strong> 3-6 tháng
                        </div>
                        <div class="notes">
                            <strong>Lưu ý:</strong> An toàn cho cả mẹ và bé, hỗ trợ lợi sữa
                        </div>
                    </div>
                </div>

                <div class="recommendation-card">
                    <div class="rec-header">
                        <div class="rec-icon">📊</div>
                        <h4 class="rec-title">Kiểm soát đường huyết</h4>
                    </div>
                    <div class="rec-content">
                        <div class="dosage">
                            <strong>Liều lượng:</strong> 1-2 gói/ngày
                        </div>
                        <div class="timing">
                            <strong>Thời điểm:</strong> Trước bữa ăn chính 30 phút
                        </div>
                        <div class="duration">
                            <strong>Thời gian:</strong> Lâu dài
                        </div>
                        <div class="notes">
                            <strong>Lưu ý:</strong> Theo dõi đường huyết, tham khảo bác sĩ
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recipe Variations -->
        <div class="recipe-variations">
            <h3 class="variations-title">Biến tấu thú vị</h3>
            <p class="variations-subtitle">Khám phá những cách pha chế mới để không bao giờ cảm thấy nhàm chán</p>

            <div class="recipes-grid">
            <!-- 1. Smoothie trái cây -->
            <div class="recipe-card">
                <div class="recipe-image">
                <div class="recipe-visual smoothie">
                    <div class="smoothie-glass">
                    <div class="smoothie-content"></div>
                    <div class="smoothie-foam"></div>
                    <div class="garnish">🍓</div>
                    </div>
                </div>
                </div>
                <div class="recipe-info">
                <h4 class="recipe-name">Smoothie trái cây</h4>
                <div class="recipe-ingredients">
                    <span class="ingredient">1 gói bột</span>
                    <span class="ingredient">200ml sữa tươi</span>
                    <span class="ingredient">1/2 quả chuối</span>
                    <span class="ingredient">Vài quả dâu</span>
                </div>
                <p class="recipe-description">Xay sinh tố với trái cây tươi, vừa ngon vừa bổ dưỡng</p>
                </div>
            </div>

            <!-- 2. Cháo bột dinh dưỡng -->
            <div class="recipe-card">
                <div class="recipe-image">
                <div class="recipe-visual porridge">
                    <div class="porridge-bowl">
                    <div class="porridge-content"></div>
                    <div class="toppings">
                        <span class="topping">🥜</span>
                        <span class="topping">🍯</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="recipe-info">
                <h4 class="recipe-name">Cháo bột dinh dưỡng</h4>
                <div class="recipe-ingredients">
                    <span class="ingredient">1 gói bột</span>
                    <span class="ingredient">250ml nước nóng</span>
                    <span class="ingredient">1 tsp mật ong</span>
                    <span class="ingredient">Hạt điều rang</span>
                </div>
                <p class="recipe-description">Pha đậm đà như cháo, thêm mật ong và hạt để tăng hương vị</p>
                </div>
            </div>

            <!-- 3. Kem bột lạnh -->
            <div class="recipe-card">
                <div class="recipe-image">
                <div class="recipe-visual ice-cream">
                    <div class="ice-cream-glass">
                    <div class="ice-cream-content"></div>
                    <div class="whipped-cream"></div>
                    <div class="garnish">🍒</div>
                    </div>
                </div>
                </div>
                <div class="recipe-info">
                <h4 class="recipe-name">Kem bột lạnh</h4>
                <div class="recipe-ingredients">
                    <span class="ingredient">1 gói bột</span>
                    <span class="ingredient">150ml sữa tươi lạnh</span>
                    <span class="ingredient">1 tbsp sữa chua</span>
                    <span class="ingredient">Đá viên</span>
                </div>
                <p class="recipe-description">Phiên bản mát lạnh cho mùa hè, thêm sữa chua để có vị chua nhẹ</p>
                </div>
            </div>

            <!-- 4. Bánh pancake -->
            <div class="recipe-card">
                <div class="recipe-image">
                <div class="recipe-visual pancake">
                    <div class="pancake-stack">
                    <div class="pancake"></div>
                    <div class="pancake"></div>
                    <div class="syrup"></div>
                    <div class="berry">🫐</div>
                    </div>
                </div>
                </div>
                <div class="recipe-info">
                <h4 class="recipe-name">Bánh pancake</h4>
                <div class="recipe-ingredients">
                    <span class="ingredient">2 gói bột</span>
                    <span class="ingredient">1 quả trứng</span>
                    <span class="ingredient">100ml sữa</span>
                    <span class="ingredient">1 tsp baking powder</span>
                </div>
                <p class="recipe-description">Làm bánh pancake dinh dưỡng cho bữa sáng đặc biệt</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Storage Instructions -->
        <div class="storage-instructions">
                <div class="storage-content">
                    <div class="storage-icon">
                        <span class="icon">📦</span>
                    </div>
                    <div class="storage-info">
                        <h4 class="storage-title">Hướng dẫn bảo quản</h4>
                        <div class="storage-tips">
                            <div class="tip-item">
                                <span class="tip-icon">🏠</span>
                                <span class="tip-text">Bảo quản nơi khô ráo, thoáng mát</span>
                            </div>
                            <div class="tip-item">
                                <span class="tip-icon">🌡️</span>
                                <span class="tip-text">Tránh ánh nắng trực tiếp và nhiệt độ cao</span>
                            </div>
                            <div class="tip-item">
                                <span class="tip-icon">📅</span>
                                <span class="tip-text">Sử dụng trong vòng 12 tháng kể từ NSX</span>
                            </div>
                            <div class="tip-item">
                                <span class="tip-icon">✋</span>
                                <span class="tip-text">Đậy kín sau khi mở, tránh ẩm mốc</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- FAQ Section -->
        <div class="usage-faq">
                <h3 class="faq-title">Câu hỏi thường gặp</h3>

                <div class="faq-list">
                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Có thể uống khi đang cho con bú không?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Hoàn toàn có thể. Sản phẩm từ 100% nguyên liệu tự nhiên, an toàn cho cả mẹ và bé. Thậm chí còn hỗ trợ tăng tiết sữa mẹ nhờ các thành phần dinh dưỡng có trong gạo lứt và các loại hạt.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Người tiểu đường có dùng được không?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Có thể sử dụng được vì sản phẩm có chỉ số GI thấp, giúp ổn định đường huyết. Tuy nhiên, nên tham khảo ý kiến bác sĩ trước khi sử dụng và theo dõi đường huyết thường xuyên.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Trẻ em bao nhiêu tuổi có thể dùng?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Trẻ từ 6 tháng tuổi trở lên có thể sử dụng. Với trẻ nhỏ, nên pha loãng hơn (1/2 gói với 200ml nước) và cho dùng dần để quen vị. Tham khảo bác sĩ nhi khoa nếu cần thiết.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Bao lâu thì thấy hiệu quả?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Thông thường sau 1-2 tuần sử dụng đều đặn bạn sẽ cảm thấy cải thiện về tiêu hóa và năng lượng. Đối với giảm cân, kết quả rõ rệt thường thấy sau 4-6 tuần khi kết hợp với chế độ ăn uống và vận động hợp lý.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Có tác dụng phụ nào không?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Sản phẩm từ nguyên liệu tự nhiên nên rất ít tác dụng phụ. Một số người có thể cảm thấy no nhiều hơn bình thường trong những ngày đầu. Nếu có dị ứng với bất kỳ thành phần nào, nên ngừng sử dụng.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="question-text">Có thể thay thế hoàn toàn bữa ăn không?</span>
                            <span class="toggle-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Có thể thay thế 1-2 bữa ăn/ngày một cách an toàn. Tuy nhiên, không nên thay thế hoàn toàn tất cả các bữa ăn vì cơ thể cần đa dạng dinh dưỡng từ nhiều nguồn khác nhau.</p>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Expert Tips -->
        <div class="expert-tips">
                <div class="tips-header">
                    <div class="expert-avatar">👨‍⚕️</div>
                    <div class="expert-info">
                        <h4 class="expert-name">Lời khuyên từ chuyên gia dinh dưỡng</h4>
                        <p class="expert-title">PGS.TS Nguyễn Văn A - Viện Dinh dưỡng Quốc gia</p>
                    </div>
                </div>

                <div class="tips-content">
                    <div class="tip-card">
                        <div class="tip-icon">💡</div>
                        <div class="tip-text">
                            <h5>Tăng hiệu quả hấp thu</h5>
                            <p>Nên dùng cùng với vitamin C (chanh, cam) để tăng khả năng hấp thu sắt từ thực phẩm.</p>
                        </div>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">⏰</div>
                        <div class="tip-text">
                            <h5>Thời điểm tối ưu</h5>
                            <p>Sử dụng vào buổi sáng giúp cung cấp năng lượng cho cả ngày. Buổi tối giúp kiểm soát cân nặng hiệu quả.</p>
                        </div>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">🏃</div>
                        <div class="tip-text">
                            <h5>Kết hợp vận động</h5>
                            <p>Kết hợp với tập thể dục nhẹ 30 phút/ngày sẽ tăng gấp đôi hiệu quả giảm cân và cải thiện sức khỏe.</p>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Final CTA -->
        <div class="usage-cta">
                <div class="cta-content">
                    <h3 class="cta-title">Bắt đầu hành trình sức khỏe ngay hôm nay!</h3>
                    <p class="cta-description">
                        Với hướng dẫn chi tiết này, bạn đã sẵn sàng tận dụng tối đa lợi ích từ Bột Gạo Lứt Tùng Beo
                    </p>

                    <div class="cta-actions">
                        <a href="https://zalo.me/{{ str_replace('.', '', $contact['zalo'] ?? '0123456789') }}"
                        class="cta-btn primary" target="_blank">
                            <span class="btn-icon">🛒</span>
                            <span class="btn-text">Đặt hàng ngay</span>
                        </a>

                        <a href="tel:{{ $contact['hotline'] ?? '0123456789' }}"
                        class="cta-btn secondary">
                            <span class="btn-icon">📞</span>
                            <span class="btn-text">Tư vấn thêm</span>
                        </a>
                    </div>

                    <div class="cta-benefits">
                        <div class="benefit-point">
                            <span class="point-icon">✅</span>
                            <span class="point-text">Giao hàng miễn phí toàn quốc</span>
                        </div>
                        <div class="benefit-point">
                            <span class="point-icon">✅</span>
                            <span class="point-text">Thanh toán khi nhận hàng (COD)</span>
                        </div>
                        <div class="benefit-point">
                            <span class="point-icon">✅</span>
                            <span class="point-text">Tư vấn miễn phí 24/7</span>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</section>
<script>
(() => {
  'use strict';

  // Chạy an toàn dù script đặt ở đâu
  const ready = (fn) =>
    document.readyState === 'loading'
      ? document.addEventListener('DOMContentLoaded', fn, { once: true })
      : fn();

  ready(() => {
    /* ================================
       1) Demo bước pha chế
       ================================ */
    let currentStep = 1;
    const totalSteps = 4;

    const showStep = (n) => {
      document.querySelectorAll('.demo-step').forEach(s => s.classList.remove('active'));
      document.querySelectorAll('.indicator').forEach(i => i.classList.remove('active'));

      const step = document.querySelector(`.demo-step[data-step="${n}"]`);
      const ind  = document.querySelector(`.indicator[data-target="${n}"]`);
      if (step) step.classList.add('active');
      if (ind)  ind.classList.add('active');
      currentStep = n;
    };

    document.getElementById('nextStep')?.addEventListener('click', () => {
      showStep(currentStep >= totalSteps ? 1 : currentStep + 1);
    });
    document.getElementById('prevStep')?.addEventListener('click', () => {
      showStep(currentStep <= 1 ? totalSteps : currentStep - 1);
    });
    document.querySelectorAll('.indicator').forEach(i => {
      i.addEventListener('click', () => showStep(parseInt(i.getAttribute('data-target'))));
    });
    setInterval(() => showStep(currentStep >= totalSteps ? 1 : currentStep + 1), 4000);

    document.querySelectorAll('.step-card').forEach(card => {
      card.addEventListener('click', () =>
        showStep(parseInt(card.getAttribute('data-step'))));
    });

    /* ================================
       2) FAQ toggle – FIX mở không hết
       ================================ */
    const faqItems = document.querySelectorAll('.faq-item');
    if (faqItems.length) {
      const closeItem = (item) => {
        const ans  = item.querySelector('.faq-answer');
        const icon = item.querySelector('.toggle-icon');
        item.classList.remove('active');
        if (ans) {
          // đặt về 0 để thu gọn (transition chạy mượt)
          ans.style.maxHeight = '0px';
          ans.style.paddingTop = '';
          ans.style.paddingBottom = '';
        }
        if (icon) icon.textContent = '+';
      };

      const openItem = (item) => {
        const ans  = item.querySelector('.faq-answer');
        const icon = item.querySelector('.toggle-icon');
        item.classList.add('active');
        if (ans) {
          // set padding TRƯỚC, rồi đo chiều cao thật
          ans.style.paddingTop = '0';
          ans.style.paddingBottom = '1.5rem';
          // reset để transition phát hiện thay đổi
          ans.style.maxHeight = '0px';
          // bật ở frame kế tiếp để animate
          requestAnimationFrame(() => {
            ans.style.maxHeight = ans.scrollHeight + 'px';
          });
        }
        if (icon) icon.textContent = '−';
      };

      // Trạng thái ban đầu
      faqItems.forEach((item) => {
        const ans = item.querySelector('.faq-answer');
        if (ans) ans.style.maxHeight = '0px';

        const q = item.querySelector('.faq-question');
        if (!q) return;

        q.addEventListener('click', () => {
          const isOpen = item.classList.contains('active');
          // đóng tất cả trước
          faqItems.forEach(closeItem);
          // nếu đang mở thì chỉ đóng (toggle off)
          if (isOpen) return;
          // mở item hiện tại (toggle on)
          openItem(item);
        });
      });

      // Recalc khi resize để không cắt chữ
      window.addEventListener('resize', () => {
        document.querySelectorAll('.faq-item.active .faq-answer').forEach((ans) => {
          ans.style.maxHeight = 'none';
          const h = ans.scrollHeight;
          ans.style.maxHeight = h + 'px';
        });
      });
    }

    /* ================================
       3) Hover recipe cards
       ================================ */
    document.querySelectorAll('.recipe-card').forEach(card => {
      card.addEventListener('mouseenter', () => card.classList.add('hovered'));
      card.addEventListener('mouseleave', () => card.classList.remove('hovered'));
    });

    /* ================================
       4) Chọn khuyến nghị -> nhảy bước demo
       ================================ */
    document.querySelectorAll('.recommendation-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.recommendation-card')
          .forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');

        const title = card.querySelector('.rec-title')?.textContent || '';
        if (title.includes('Giảm cân')) showStep(3);
        else if (title.includes('Mẹ sau sinh')) showStep(1);
      });
    });

    /* ================================
       5) Scroll-in animations
       ================================ */
    const usageObserver = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('animate-in'); });
    }, { threshold: 0.2 });

    document.querySelectorAll('.step-card, .recommendation-card, .recipe-card, .expert-tips, .storage-instructions')
      .forEach(el => usageObserver.observe(el));

    /* ================================
       6) CTA tracking (gtag)
       ================================ */
    document.querySelectorAll('.cta-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        if (typeof gtag !== 'undefined') {
          const isZalo = this.href?.includes('zalo.me');
          gtag('event', 'cta_click', {
            event_category: 'conversion',
            event_label: isZalo ? 'usage_zalo' : 'usage_phone',
            value: 1
          });
        }
      });
    });
  });
})();
</script>
