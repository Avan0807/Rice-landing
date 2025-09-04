import './bootstrap';

// Hero Slider functionality
document.addEventListener('DOMContentLoaded', function() {
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = slides.length;

    function showSlide(index) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide and dot
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }

        currentSlideIndex = index;
    }

    function changeSlide(direction) {
        let newIndex = currentSlideIndex + direction;

        if (newIndex >= totalSlides) {
            newIndex = 0;
        } else if (newIndex < 0) {
            newIndex = totalSlides - 1;
        }

        showSlide(newIndex);
    }

    function currentSlide(index) {
        showSlide(index - 1);
    }

    // Auto slide every 5 seconds
    setInterval(() => {
        changeSlide(1);
    }, 5000);

    // Make functions global for onclick events
    window.changeSlide = changeSlide;
    window.currentSlide = currentSlide;

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
