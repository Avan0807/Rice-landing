@extends('layouts.app')

@section('title', 'Bột Gạo Lứt Tùng Beo - Gian Hàng Chính Hãng')
@section('description', 'Bột Gạo Lứt Tùng Beo - Sản phẩm dinh dưỡng tự nhiên từ 100% gạo lứt và các nguyên liệu hữu cơ. Hỗ trợ đẹp da, tiêu hóa và sức khỏe toàn diện.')

@section('content')
    <!-- Hero Section -->
    @include('pages.sections.hero')

    <!-- Product Showcase Section -->
    @include('pages.sections.product-showcase')

    <!-- Story Section -->
    @include('pages.sections.story')

    <!-- Ingredients Section -->
    @include('pages.sections.ingredients')

    <!-- Benefits Section -->
    @include('pages.sections.benefits')

    <!-- Usage Guide Section -->
    @include('pages.sections.usage-guide')
@endsection

@push('styles')
<style>
    /* Page specific styles can go here */
    .page-home {
        /* Custom styles for home page */
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Page specific JavaScript

        // Smooth scrolling for anchor links
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe sections for animation
        document.querySelectorAll('.section').forEach(section => {
            observer.observe(section);
        });

        // Header scroll effect
        let lastScrollY = window.scrollY;
        const header = document.querySelector('.header');

        window.addEventListener('scroll', function() {
            const currentScrollY = window.scrollY;

            if (currentScrollY > 100) {
                header.classList.add('scrolled');

                // Hide/show header based on scroll direction
                if (currentScrollY > lastScrollY && currentScrollY > 200) {
                    header.classList.add('hidden');
                } else {
                    header.classList.remove('hidden');
                }
            } else {
                header.classList.remove('scrolled');
                header.classList.remove('hidden');
            }

            lastScrollY = currentScrollY;
        });

        // Product image lazy loading
        const productImages = document.querySelectorAll('.product-img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        productImages.forEach(img => imageObserver.observe(img));

        // Analytics tracking
        if (typeof gtag !== 'undefined') {
            // Track section views
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        gtag('event', 'page_view', {
                            'page_title': 'Section: ' + entry.target.id,
                            'page_location': window.location.href + '#' + entry.target.id
                        });
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('section[id]').forEach(section => {
                sectionObserver.observe(section);
            });
        }
    });
</script>
@endpush
