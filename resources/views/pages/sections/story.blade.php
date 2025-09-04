<section id="cau-chuyen" class="story section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Câu chuyện thương hiệu Tùng Beo</h2>
            <p class="section-subtitle">
                Hành trình tạo nên những sản phẩm dinh dưỡng chất lượng từ tâm huyết và sự tận tâm
            </p>
        </div>

        <!-- Story Timeline -->
        <div class="story-timeline">
            <div class="timeline-line"></div>

            @if(isset($stories) && is_array($stories))
                @foreach($stories as $index => $story)
                <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}" data-index="{{ $index }}">
                    <div class="timeline-dot">
                        <div class="dot-inner"></div>
                    </div>

                    <div class="story-card">
                        <div class="card-header">
                            <div class="story-icon">
                                @php
                                    $icons = ['🌾', '🏭', '❤️', '🌟'];
                                    echo $icons[$index] ?? '🌱';
                                @endphp
                            </div>
                            <h3 class="story-title">{{ $story['title'] ?? 'Câu chuyện' }}</h3>
                        </div>

                        <div class="card-content">
                            <p class="story-content">{{ $story['content'] ?? 'Nội dung câu chuyện...' }}</p>
                        </div>

                        <div class="card-footer">
                            <div class="story-step">Bước {{ $index + 1 }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <!-- Brand Values -->
        <div class="brand-values">
            <h3 class="values-title">Giá trị cốt lõi của Tùng Beo</h3>

            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">
                        <div class="icon-bg">
                            <span class="icon">🌱</span>
                        </div>
                    </div>
                    <div class="value-content">
                        <h4 class="value-name">Tự Nhiên</h4>
                        <p class="value-description">
                            Cam kết sử dụng 100% nguyên liệu tự nhiên, không chất bảo quản,
                            mang đến sự an toàn tuyệt đối cho sức khỏe người tiêu dùng.
                        </p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon">
                        <div class="icon-bg">
                            <span class="icon">🔬</span>
                        </div>
                    </div>
                    <div class="value-content">
                        <h4 class="value-name">Khoa Học</h4>
                        <p class="value-description">
                            Áp dụng công nghệ hiện đại trong sản xuất, kiểm soát chất lượng
                            nghiêm ngặt theo tiêu chuẩn quốc tế.
                        </p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon">
                        <div class="icon-bg">
                            <span class="icon">❤️</span>
                        </div>
                    </div>
                    <div class="value-content">
                        <h4 class="value-name">Tận Tâm</h4>
                        <p class="value-description">
                            Đặt sức khỏe khách hàng lên hàng đầu, luôn lắng nghe và cải thiện
                            sản phẩm để phục vụ tốt nhất.
                        </p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon">
                        <div class="icon-bg">
                            <span class="icon">🏆</span>
                        </div>
                    </div>
                    <div class="value-content">
                        <h4 class="value-name">Chất Lượng</h4>
                        <p class="value-description">
                            Không ngừng nâng cao chất lượng sản phẩm, từ nguyên liệu đến
                            quy trình sản xuất và dịch vụ khách hàng.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Founder Message -->
        <div class="founder-message">
            <div class="message-content">
                <div class="founder-info">
                    <div class="founder-avatar">
                        <div class="avatar-placeholder">
                            <span class="avatar-icon">👨‍💼</span>
                        </div>
                    </div>
                    <div class="founder-details">
                        <h4 class="founder-name">Ông Tùng</h4>
                        <p class="founder-title">Nhà sáng lập Tùng Beo</p>
                    </div>
                </div>

                <div class="message-text">
                    <div class="quote-icon">"</div>
                    <blockquote class="founder-quote">
                        Chúng tôi không chỉ tạo ra sản phẩm, mà tạo ra niềm tin.
                        Mỗi hộp bột gạo lứt Tùng Beo đều chứa đựng tâm huyết và cam kết
                        mang đến sức khỏe tốt nhất cho gia đình Việt.
                    </blockquote>
                    <div class="quote-author">
                        <strong>Tùng Beo Team</strong>
                        <span>Người sáng lập</span>
                    </div>
                </div>
            </div>

            <div class="message-stats">
                <div class="stat-item">
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Năm kinh nghiệm</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Khách hàng tin tưởng</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Tự nhiên</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Hỗ trợ khách hàng</div>
                </div>
            </div>
        </div>

        <!-- Customer Testimonials -->
        <div class="testimonials">
            <h3 class="testimonials-title">Khách hàng nói gì về chúng tôi</h3>

            <div class="testimonials-slider">
                <div class="testimonial-item active">
                    <div class="testimonial-content">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "Sản phẩm rất tốt, con tôi uống rất thích. Da con cũng khỏe hơn,
                            tiêu hóa tốt. Sẽ ủng hộ thương hiệu lâu dài!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">👩</div>
                            <div class="author-info">
                                <strong>Chị Ngọc Anh</strong>
                                <span>Hà Nội</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "Mình dùng để thay cơm tối, giảm được 3kg trong 1 tháng.
                            Sản phẩm ngon, dễ uống, không bị ngấy."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">👨</div>
                            <div class="author-info">
                                <strong>Anh Minh Tuấn</strong>
                                <span>TP.HCM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <p class="testimonial-text">
                            "Sau sinh uống bột gạo lứt này giúp mình có nhiều sữa hơn.
                            Chất lượng tốt, giao hàng nhanh. Recommend!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">👶</div>
                            <div class="author-info">
                                <strong>Chị Thu Hương</strong>
                                <span>Đà Nẵng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Controls -->
            <div class="slider-controls">
                <button class="slider-btn prev" id="prevTestimonial">‹</button>
                <div class="slider-dots">
                    <span class="dot active" data-slide="0"></span>
                    <span class="dot" data-slide="1"></span>
                    <span class="dot" data-slide="2"></span>
                </div>
                <button class="slider-btn next" id="nextTestimonial">›</button>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Timeline animation
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');

                // Animate timeline line
                const timelineLine = document.querySelector('.timeline-line');
                timelineLine?.classList.add('animate');
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.timeline-item').forEach(item => {
        timelineObserver.observe(item);
    });

    // Values animation
    const valuesObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, index * 200);
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.value-item').forEach(item => {
        valuesObserver.observe(item);
    });

    // Testimonials slider
    let currentSlide = 0;
    const testimonials = document.querySelectorAll('.testimonial-item');
    const dots = document.querySelectorAll('.dot');

    function showSlide(index) {
        testimonials.forEach(item => item.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        testimonials[index]?.classList.add('active');
        dots[index]?.classList.add('active');

        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % testimonials.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + testimonials.length) % testimonials.length;
        showSlide(currentSlide);
    }

    // Slider controls
    document.getElementById('nextTestimonial')?.addEventListener('click', nextSlide);
    document.getElementById('prevTestimonial')?.addEventListener('click', prevSlide);

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    // Auto-play testimonials
    setInterval(nextSlide, 5000);

    // Founder message animation
    const founderObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');

                // Animate stats
                const stats = entry.target.querySelectorAll('.stat-number');
                stats.forEach((stat, index) => {
                    setTimeout(() => {
                        stat.classList.add('count-up');
                    }, index * 200);
                });
            }
        });
    }, { threshold: 0.3 });

    const founderMessage = document.querySelector('.founder-message');
    if (founderMessage) {
        founderObserver.observe(founderMessage);
    }
});
</script>
