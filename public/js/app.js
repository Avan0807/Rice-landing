/**
 * ========================================
 * Bột Gạo Lứt Tùng Beo - Main JavaScript
 * ========================================
 *
 * Author: Laravel Team
 * Version: 1.0.0
 * Description: Interactive functionality for Tùng Beo website
 */

(function() {
    'use strict';

    // ========================================
    // Global Variables & Configuration
    // ========================================

    const CONFIG = {
        // Animation settings
        ANIMATION_DURATION: 300,
        SCROLL_THRESHOLD: 100,
        DEBOUNCE_DELAY: 150,

        // Intersection Observer settings
        OBSERVER_OPTIONS: {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        },

        // Testimonials settings
        TESTIMONIAL_AUTO_PLAY: 5000,

        // Usage demo settings
        DEMO_AUTO_PLAY: 4000,

        // Analytics tracking
        ANALYTICS_ENABLED: typeof gtag !== 'undefined'
    };

    // Global state
    const STATE = {
        isScrolling: false,
        currentTestimonial: 0,
        currentDemoStep: 1,
        testimonialTimer: null,
        demoTimer: null,
        observers: new Map(),
        loadedImages: new Set(),
        activeModals: new Set()
    };

    // ========================================
    // Utility Functions
    // ========================================

    const Utils = {
        // Debounce function
        debounce(func, wait, immediate) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    timeout = null;
                    if (!immediate) func(...args);
                };
                const callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func(...args);
            };
        },

        // Throttle function
        throttle(func, limit) {
            let inThrottle;
            return function(...args) {
                if (!inThrottle) {
                    func.apply(this, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        // Get element safely
        $(selector) {
            return document.querySelector(selector);
        },

        // Get all elements safely
        $$(selector) {
            return document.querySelectorAll(selector);
        },

        // Add event listener with error handling
        on(element, event, handler, options = {}) {
            if (!element) return;

            try {
                if (typeof element === 'string') {
                    element = this.$(element);
                }
                if (element) {
                    element.addEventListener(event, handler, options);
                }
            } catch (error) {
                console.warn('Event listener error:', error);
            }
        },

        // Remove event listener safely
        off(element, event, handler) {
            if (!element) return;

            try {
                if (typeof element === 'string') {
                    element = this.$(element);
                }
                if (element) {
                    element.removeEventListener(event, handler);
                }
            } catch (error) {
                console.warn('Remove event listener error:', error);
            }
        },

        // Animate element with CSS classes
        animate(element, animationClass, callback) {
            if (!element) return;

            element.classList.add(animationClass);

            const handleAnimationEnd = (e) => {
                if (e.target === element) {
                    element.classList.remove(animationClass);
                    element.removeEventListener('animationend', handleAnimationEnd);
                    if (callback) callback();
                }
            };

            element.addEventListener('animationend', handleAnimationEnd);
        },

        // Smooth scroll to element
        scrollTo(target, offset = 0) {
            let element;

            if (typeof target === 'string') {
                element = target.startsWith('#') ? this.$(target) : this.$(`#${target}`);
            } else {
                element = target;
            }

            if (!element) return;

            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        },

        // Format number with Vietnamese locale
        formatNumber(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
        },

        // Format currency
        formatCurrency(amount) {
            return this.formatNumber(amount) + 'đ';
        },

        // Get viewport dimensions
        getViewport() {
            return {
                width: Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0),
                height: Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)
            };
        },

        // Check if element is in viewport
        isInViewport(element, threshold = 0.1) {
            if (!element) return false;

            const rect = element.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;
            const windowWidth = window.innerWidth || document.documentElement.clientWidth;

            const vertInView = (rect.top <= windowHeight * (1 - threshold)) &&
                              ((rect.top + rect.height) >= windowHeight * threshold);
            const horInView = (rect.left <= windowWidth) && (rect.left + rect.width >= 0);

            return vertInView && horInView;
        },

        // Generate unique ID
        generateId() {
            return 'id-' + Math.random().toString(36).substr(2, 9);
        },

        // Track analytics event
        trackEvent(eventName, category, label, value) {
            if (!CONFIG.ANALYTICS_ENABLED) return;

            try {
                gtag('event', eventName, {
                    event_category: category || 'engagement',
                    event_label: label || '',
                    value: value || 1
                });
            } catch (error) {
                console.warn('Analytics tracking error:', error);
            }
        },

        // Local storage helpers
        storage: {
            set(key, value) {
                try {
                    localStorage.setItem(key, JSON.stringify(value));
                    return true;
                } catch (error) {
                    console.warn('LocalStorage set error:', error);
                    return false;
                }
            },

            get(key, defaultValue = null) {
                try {
                    const item = localStorage.getItem(key);
                    return item ? JSON.parse(item) : defaultValue;
                } catch (error) {
                    console.warn('LocalStorage get error:', error);
                    return defaultValue;
                }
            },

            remove(key) {
                try {
                    localStorage.removeItem(key);
                    return true;
                } catch (error) {
                    console.warn('LocalStorage remove error:', error);
                    return false;
                }
            }
        }
    };

    // ========================================
    // Core Modules
    // ========================================

    const SmoothScroll = {
        init() {
            this.bindEvents();
        },

        bindEvents() {
            // Handle all anchor links
            Utils.on(document, 'click', (e) => {
                const link = e.target.closest('a[href^="#"]');
                if (!link) return;

                const href = link.getAttribute('href');
                if (href === '#' || href.length <= 1) return;

                e.preventDefault();

                const target = Utils.$(href);
                if (target) {
                    const headerHeight = Utils.$('.header')?.offsetHeight || 0;
                    Utils.scrollTo(target, headerHeight + 20);

                    // Track scroll click
                    Utils.trackEvent('scroll_click', 'navigation', href);
                }
            });
        }
    };

    const HeaderController = {
        init() {
            this.header = Utils.$('.header');
            this.mobileMenuBtn = Utils.$('#mobileMenuBtn');
            this.mobileNav = Utils.$('#mobileNav');
            this.lastScrollY = window.scrollY;

            if (!this.header) return;

            this.bindEvents();
        },

        bindEvents() {
            // Scroll handler with throttling
            const scrollHandler = Utils.throttle(() => {
                this.handleScroll();
            }, 16); // ~60fps

            Utils.on(window, 'scroll', scrollHandler);

            // Mobile menu toggle
            Utils.on(this.mobileMenuBtn, 'click', (e) => {
                e.stopPropagation();
                this.toggleMobileMenu();
            });

            // Close mobile menu when clicking on links
            Utils.on(this.mobileNav, 'click', (e) => {
                if (e.target.classList.contains('mobile-nav-link')) {
                    this.closeMobileMenu();
                }
            });

            // Close mobile menu when clicking outside
            Utils.on(document, 'click', (e) => {
                if (!this.mobileNav?.contains(e.target) &&
                    !this.mobileMenuBtn?.contains(e.target)) {
                    this.closeMobileMenu();
                }
            });

            // Handle resize
            Utils.on(window, 'resize', Utils.debounce(() => {
                if (window.innerWidth > 768) {
                    this.closeMobileMenu();
                }
            }, CONFIG.DEBOUNCE_DELAY));
        },

        handleScroll() {
            if (!this.header) return;

            const currentScrollY = window.scrollY;

            // Add/remove scrolled class
            if (currentScrollY > CONFIG.SCROLL_THRESHOLD) {
                this.header.classList.add('scrolled');

                // Hide/show header based on scroll direction
                if (currentScrollY > this.lastScrollY && currentScrollY > 200) {
                    this.header.classList.add('hidden');
                } else {
                    this.header.classList.remove('hidden');
                }
            } else {
                this.header.classList.remove('scrolled', 'hidden');
            }

            this.lastScrollY = currentScrollY;
        },

        toggleMobileMenu() {
            if (!this.mobileNav || !this.mobileMenuBtn) return;

            const isActive = this.mobileNav.classList.contains('active');

            if (isActive) {
                this.closeMobileMenu();
            } else {
                this.openMobileMenu();
            }
        },

        openMobileMenu() {
            this.mobileNav?.classList.add('active');
            this.mobileMenuBtn?.classList.add('active');
            document.body.style.overflow = 'hidden';

            Utils.trackEvent('mobile_menu_open', 'navigation');
        },

        closeMobileMenu() {
            this.mobileNav?.classList.remove('active');
            this.mobileMenuBtn?.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    const ScrollAnimations = {
        init() {
            this.createObservers();
            this.initBackToTop();
        },

        createObservers() {
            // Main intersection observer for animations
            this.mainObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateElement(entry.target);
                    }
                });
            }, CONFIG.OBSERVER_OPTIONS);

            // Observe elements for animation
            const animateElements = Utils.$$(`
                .section,
                .story-card,
                .benefit-card,
                .ingredient-item,
                .process-step,
                .combo-card,
                .value-item,
                .cert-item,
                .recommendation-card,
                .recipe-card,
                .step-card,
                .faq-item,
                .story-item
            `);

            animateElements.forEach(el => {
                if (el) {
                    this.mainObserver.observe(el);
                }
            });

            // Section tracking observer
            this.sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const sectionId = entry.target.id;
                        if (sectionId) {
                            Utils.trackEvent('section_view', 'engagement', sectionId);
                        }
                    }
                });
            }, { threshold: 0.5 });

            // Observe sections for tracking
            Utils.$$('section[id]').forEach(section => {
                this.sectionObserver.observe(section);
            });
        },

        animateElement(element) {
            // Add staggered animation for child elements
            const children = element.querySelectorAll('.story-card, .benefit-card, .ingredient-item, .combo-card');

            if (children.length > 0) {
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('animate-in');
                    }, index * 100);
                });
            } else {
                element.classList.add('animate-in');
            }

            // Special handling for specific sections
            if (element.classList.contains('ingredients')) {
                this.animateIngredients(element);
            } else if (element.classList.contains('story')) {
                this.animateTimeline(element);
            } else if (element.classList.contains('benefits')) {
                this.animateBenefits(element);
            }
        },

        animateIngredients(section) {
            const centralProduct = section.querySelector('.central-product');
            const ingredientItems = section.querySelectorAll('.ingredient-item');
            const rotatingRing = section.querySelector('.rotating-ring');

            if (centralProduct) {
                centralProduct.classList.add('animate-in');
            }

            if (ingredientItems.length > 0) {
                ingredientItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('animate-in');
                    }, index * 100 + 500);
                });
            }

            if (rotatingRing) {
                setTimeout(() => {
                    rotatingRing.classList.add('rotating');
                }, 800);
            }
        },

        animateTimeline(section) {
            const timelineLine = section.querySelector('.timeline-line');
            const timelineItems = section.querySelectorAll('.timeline-item');

            if (timelineLine) {
                timelineLine.classList.add('animate');
            }

            if (timelineItems.length > 0) {
                timelineItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('animate-in');
                    }, index * 200 + 300);
                });
            }
        },

        animateBenefits(section) {
            const benefitCards = section.querySelectorAll('.benefit-card');
            const comparisonRows = section.querySelectorAll('.comparison-row');
            const noItems = section.querySelectorAll('.no-item');

            if (benefitCards.length > 0) {
                benefitCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('animate-in');
                    }, index * 100);
                });
            }

            if (comparisonRows.length > 0) {
                comparisonRows.forEach((row, index) => {
                    setTimeout(() => {
                        row.classList.add('animate-in');
                    }, index * 150);
                });
            }

            if (noItems.length > 0) {
                noItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('animate-in');
                    }, index * 200);
                });
            }
        },

        initBackToTop() {
            this.backToTopBtn = Utils.$('#backToTop') || Utils.$('.back-to-top');

            if (!this.backToTopBtn) return;

            // Show/hide based on scroll position
            const scrollHandler = Utils.throttle(() => {
                if (window.scrollY > 300) {
                    this.backToTopBtn.classList.add('show');
                } else {
                    this.backToTopBtn.classList.remove('show');
                }
            }, 100);

            Utils.on(window, 'scroll', scrollHandler);

            // Click handler
            Utils.on(this.backToTopBtn, 'click', (e) => {
                e.preventDefault();

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                Utils.trackEvent('back_to_top_click', 'navigation');
            });
        },

        cleanup() {
            if (this.mainObserver) {
                this.mainObserver.disconnect();
            }
            if (this.sectionObserver) {
                this.sectionObserver.disconnect();
            }
        }
    };

    const ProductInteractions = {
        init() {
            this.initProductHover();
            this.initComboSelection();
            this.initIngredientDetails();
        },

        initProductHover() {
            const productBox = Utils.$('.product-box-display');

            if (!productBox) return;

            Utils.on(productBox, 'mousemove', (e) => {
                const rect = productBox.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                const rotateX = (y / rect.height) * -10;
                const rotateY = (x / rect.width) * 10;

                productBox.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            Utils.on(productBox, 'mouseleave', () => {
                productBox.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
            });
        },

        initComboSelection() {
            Utils.on(document, 'click', (e) => {
                const comboSelect = e.target.closest('.combo-select');
                if (!comboSelect) return;

                const comboCard = comboSelect.closest('.combo-card');
                const comboIndex = comboCard?.dataset.combo || '1';

                this.orderCombo(parseInt(comboIndex));
            });
        },

        orderCombo(comboNumber) {
            const zaloNumber = '0123456789'; // This would come from config
            const message = encodeURIComponent(
                `Xin chào! Tôi muốn đặt combo ${comboNumber} (Mua ${comboNumber} Tặng ${comboNumber}) sản phẩm Bột Gạo Lứt Tùng Beo. Vui lòng tư vấn cho tôi.`
            );

            const zaloUrl = `https://zalo.me/${zaloNumber}?text=${message}`;
            window.open(zaloUrl, '_blank');

            Utils.trackEvent('combo_select', 'ecommerce', `combo_${comboNumber}`, comboNumber);
        },

        initIngredientDetails() {
            const ingredientItems = Utils.$$('.ingredient-item');

            ingredientItems.forEach((item, index) => {
                // Hover effects
                Utils.on(item, 'mouseenter', () => {
                    item.classList.add('highlighted');

                    const line = Utils.$(`.line-${index + 1}`);
                    if (line) {
                        line.classList.add('active');
                    }

                    const rotatingRing = Utils.$('.rotating-ring');
                    if (rotatingRing) {
                        rotatingRing.style.animationPlayState = 'paused';
                    }
                });

                Utils.on(item, 'mouseleave', () => {
                    item.classList.remove('highlighted');

                    const line = Utils.$(`.line-${index + 1}`);
                    if (line) {
                        line.classList.remove('active');
                    }

                    const rotatingRing = Utils.$('.rotating-ring');
                    if (rotatingRing) {
                        rotatingRing.style.animationPlayState = 'running';
                    }
                });

                // Click to show details
                Utils.on(item, 'click', () => {
                    const isActive = item.classList.contains('details-active');

                    // Close all other details
                    Utils.$$('.ingredient-item').forEach(otherItem => {
                        otherItem.classList.remove('details-active');
                    });

                    // Toggle current details
                    if (!isActive) {
                        item.classList.add('details-active');
                        Utils.trackEvent('ingredient_detail_view', 'engagement', `ingredient_${index + 1}`);
                    }
                });
            });

            // Close details when clicking outside
            Utils.on(document, 'click', (e) => {
                if (!e.target.closest('.ingredient-item')) {
                    Utils.$$('.ingredient-item').forEach(item => {
                        item.classList.remove('details-active');
                    });
                }
            });
        }
    };

    const BenefitsInteractions = {
        init() {
            this.initFlipCards();
            this.initRecommendations();
            this.initSuccessStories();
        },

        initFlipCards() {
            const benefitCards = Utils.$$('.benefit-card');

            benefitCards.forEach((card, index) => {
                Utils.on(card, 'click', () => {
                    card.classList.toggle('flipped');

                    Utils.trackEvent('benefit_card_flip', 'engagement', `benefit_${index + 1}`);
                });
            });

            // Close cards when clicking outside
            Utils.on(document, 'click', (e) => {
                if (!e.target.closest('.benefit-card')) {
                    benefitCards.forEach(card => {
                        card.classList.remove('flipped');
                    });
                }
            });
        },

        initRecommendations() {
            const recommendationCards = Utils.$$('.recommendation-card');

            recommendationCards.forEach(card => {
                Utils.on(card, 'click', () => {
                    // Remove selected class from all cards
                    recommendationCards.forEach(otherCard => {
                        otherCard.classList.remove('selected');
                    });

                    // Add selected class to clicked card
                    card.classList.add('selected');

                    const cardTitle = card.querySelector('.rec-title')?.textContent || '';
                    Utils.trackEvent('recommendation_select', 'engagement', cardTitle);
                });
            });
        },

        initSuccessStories() {
            const storyItems = Utils.$$('.story-item');

            storyItems.forEach((item, index) => {
                Utils.on(item, 'mouseenter', () => {
                    item.style.transform = 'translateY(-5px)';
                });

                Utils.on(item, 'mouseleave', () => {
                    item.style.transform = 'translateY(0)';
                });
            });
        }
    };

    const TestimonialsCarousel = {
        init() {
            this.container = Utils.$('.testimonials-slider');
            this.items = Utils.$$('.testimonial-item');
            this.dots = Utils.$$('.dot');
            this.prevBtn = Utils.$('#prevTestimonial');
            this.nextBtn = Utils.$('#nextTestimonial');

            if (!this.container || this.items.length === 0) return;

            this.currentIndex = 0;
            this.bindEvents();
            this.startAutoPlay();
        },

        bindEvents() {
            // Previous button
            Utils.on(this.prevBtn, 'click', () => {
                this.prevSlide();
            });

            // Next button
            Utils.on(this.nextBtn, 'click', () => {
                this.nextSlide();
            });

            // Dot navigation
            this.dots.forEach((dot, index) => {
                Utils.on(dot, 'click', () => {
                    this.goToSlide(index);
                });
            });

            // Pause auto-play on hover
            Utils.on(this.container, 'mouseenter', () => {
                this.stopAutoPlay();
            });

            Utils.on(this.container, 'mouseleave', () => {
                this.startAutoPlay();
            });
        },

        goToSlide(index) {
            if (index < 0 || index >= this.items.length) return;

            // Remove active classes
            this.items.forEach(item => item.classList.remove('active'));
            this.dots.forEach(dot => dot.classList.remove('active'));

            // Add active classes
            this.items[index]?.classList.add('active');
            this.dots[index]?.classList.add('active');

            this.currentIndex = index;

            Utils.trackEvent('testimonial_view', 'engagement', `testimonial_${index + 1}`);
        },

        nextSlide() {
            const nextIndex = (this.currentIndex + 1) % this.items.length;
            this.goToSlide(nextIndex);
        },

        prevSlide() {
            const prevIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
            this.goToSlide(prevIndex);
        },

        startAutoPlay() {
            this.stopAutoPlay();
            STATE.testimonialTimer = setInterval(() => {
                this.nextSlide();
            }, CONFIG.TESTIMONIAL_AUTO_PLAY);
        },

        stopAutoPlay() {
            if (STATE.testimonialTimer) {
                clearInterval(STATE.testimonialTimer);
                STATE.testimonialTimer = null;
            }
        },

        cleanup() {
            this.stopAutoPlay();
        }
    };

    const UsageDemo = {
        init() {
            this.container = Utils.$('.demo-container');
            this.steps = Utils.$$('.demo-step');
            this.indicators = Utils.$$('.indicator');
            this.prevBtn = Utils.$('#prevStep');
            this.nextBtn = Utils.$('#nextStep');

            if (!this.container || this.steps.length === 0) return;

            this.currentStep = 1;
            this.totalSteps = this.steps.length;

            this.bindEvents();
            this.startAutoPlay();
        },

        bindEvents() {
            // Previous button
            Utils.on(this.prevBtn, 'click', () => {
                this.prevStep();
            });

            // Next button
            Utils.on(this.nextBtn, 'click', () => {
                this.nextStep();
            });

            // Indicator clicks
            this.indicators.forEach(indicator => {
                Utils.on(indicator, 'click', () => {
                    const targetStep = parseInt(indicator.getAttribute('data-target'));
                    this.showStep(targetStep);
                });
            });

            // Step card interactions
            const stepCards = Utils.$$('.step-card');
            stepCards.forEach(card => {
                Utils.on(card, 'click', () => {
                    const stepNumber = parseInt(card.getAttribute('data-step'));
                    if (stepNumber) {
                        this.showStep(stepNumber);
                    }
                });
            });

            // Pause auto-play on hover
            Utils.on(this.container, 'mouseenter', () => {
                this.stopAutoPlay();
            });

            Utils.on(this.container, 'mouseleave', () => {
                this.startAutoPlay();
            });
        },

        showStep(stepNumber) {
            if (stepNumber < 1 || stepNumber > this.totalSteps) return;

            // Hide all steps
            this.steps.forEach(step => {
                step.classList.remove('active');
            });

            this.indicators.forEach(indicator => {
                indicator.classList.remove('active');
            });

            // Show target step
            const targetStep = Utils.$(`.demo-step[data-step="${stepNumber}"]`);
            const targetIndicator = Utils.$(`.indicator[data-target="${stepNumber}"]`);

            if (targetStep) targetStep.classList.add('active');
            if (targetIndicator) targetIndicator.classList.add('active');

            this.currentStep = stepNumber;

            Utils.trackEvent('usage_demo_step', 'engagement', `step_${stepNumber}`);
        },

        nextStep() {
            const nextStep = this.currentStep >= this.totalSteps ? 1 : this.currentStep + 1;
            this.showStep(nextStep);
        },

        prevStep() {
            const prevStep = this.currentStep <= 1 ? this.totalSteps : this.currentStep - 1;
            this.showStep(prevStep);
        },

        startAutoPlay() {
            this.stopAutoPlay();
            STATE.demoTimer = setInterval(() => {
                this.nextStep();
            }, CONFIG.DEMO_AUTO_PLAY);
        },

        stopAutoPlay() {
            if (STATE.demoTimer) {
                clearInterval(STATE.demoTimer);
                STATE.demoTimer = null;
            }
        },

        cleanup() {
            this.stopAutoPlay();
        }
    };

    const FAQController = {
        init() {
            this.bindEvents();
        },

        bindEvents() {
            Utils.on(document, 'click', (e) => {
                const faqQuestion = e.target.closest('.faq-question');
                if (!faqQuestion) return;

                const faqItem = faqQuestion.closest('.faq-item');
                const toggleIcon = faqQuestion.querySelector('.toggle-icon');

                if (!faqItem || !toggleIcon) return;

                const isActive = faqItem.classList.contains('active');

                // Close all other FAQ items
                Utils.$$('.faq-item').forEach(item => {
                    item.classList.remove('active');
                    const icon = item.querySelector('.toggle-icon');
                    if (icon) icon.textContent = '+';
                });

                // Toggle current item
                if (!isActive) {
                    faqItem.classList.add('active');
                    toggleIcon.textContent = '−';

                    const questionText = faqQuestion.querySelector('.question-text')?.textContent || '';
                    Utils.trackEvent('faq_open', 'engagement', questionText);
                }
            });
        }
    };

    const ContactForm = {
        init() {
            this.forms = Utils.$('.contact-form');

            if (this.forms.length === 0) return;

            this.bindEvents();
        },

        bindEvents() {
            this.forms.forEach(form => {
                Utils.on(form, 'submit', (e) => {
                    this.handleSubmit(e, form);
                });

                // Phone number formatting
                const phoneInput = form.querySelector('input[name="phone"]');
                if (phoneInput) {
                    Utils.on(phoneInput, 'input', (e) => {
                        this.formatPhoneNumber(e.target);
                    });
                }
            });
        },

        handleSubmit(e, form) {
            e.preventDefault();

            const submitBtn = form.querySelector('.submit-btn');
            const originalText = submitBtn?.innerHTML || 'Gửi thông tin';

            // Validate form
            if (!this.validateForm(form)) {
                return;
            }

            // Show loading state
            if (submitBtn) {
                submitBtn.innerHTML = '<span>Đang gửi...</span>';
                submitBtn.disabled = true;
            }

            // Get form data
            const formData = new FormData(form);

            // Send to server (Laravel endpoint)
            this.submitForm(formData)
                .then(response => {
                    this.showSuccess('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.');
                    form.reset();
                    Utils.trackEvent('contact_form_submit', 'conversion', 'success');
                })
                .catch(error => {
                    this.showError('Có lỗi xảy ra. Vui lòng thử lại sau hoặc liên hệ qua Zalo.');
                    Utils.trackEvent('contact_form_submit', 'conversion', 'error');
                })
                .finally(() => {
                    // Reset button
                    if (submitBtn) {
                        setTimeout(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        }, 2000);
                    }
                });
        },

        async submitForm(formData) {
            const response = await fetch('/contact', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            });

            if (!response.ok) {
                throw new Error('Network error');
            }

            return response.json();
        },

        validateForm(form) {
            const name = form.querySelector('input[name="name"]')?.value.trim();
            const phone = form.querySelector('input[name="phone"]')?.value.trim();

            if (!name || name.length < 2) {
                this.showError('Vui lòng nhập họ tên hợp lệ');
                return false;
            }

            if (!phone || !this.isValidPhoneNumber(phone)) {
                this.showError('Vui lòng nhập số điện thoại hợp lệ');
                return false;
            }

            return true;
        },

        isValidPhoneNumber(phone) {
            // Vietnamese phone number pattern
            const phonePattern = /^(0|\+84)[3|5|7|8|9][0-9]{8}$|^(0|\+84)[1-9][0-9]{8}$/;
            const cleanPhone = phone.replace(/[.\s-]/g, '');
            return phonePattern.test(cleanPhone);
        },

        formatPhoneNumber(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length > 0) {
                if (value.length <= 4) {
                    value = value;
                } else if (value.length <= 7) {
                    value = value.slice(0, 4) + '.' + value.slice(4);
                } else {
                    value = value.slice(0, 4) + '.' + value.slice(4, 7) + '.' + value.slice(7, 10);
                }
            }

            input.value = value;
        },

        showSuccess(message) {
            this.showNotification(message, 'success');
        },

        showError(message) {
            this.showNotification(message, 'error');
        },

        showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <div class="notification-content">
                    <span class="notification-icon">${type === 'success' ? '✅' : '❌'}</span>
                    <span class="notification-message">${message}</span>
                    <button class="notification-close">&times;</button>
                </div>
            `;

            // Add styles
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#28a745' : '#dc3545'};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                max-width: 400px;
                animation: slideInRight 0.3s ease-out;
            `;

            document.body.appendChild(notification);

            // Auto remove
            setTimeout(() => {
                this.removeNotification(notification);
            }, 5000);

            // Manual close
            const closeBtn = notification.querySelector('.notification-close');
            Utils.on(closeBtn, 'click', () => {
                this.removeNotification(notification);
            });
        },

        removeNotification(notification) {
            if (notification && notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.3s ease-out';
                setTimeout(() => {
                    notification.parentNode.removeChild(notification);
                }, 300);
            }
        }
    };

    const FloatingButtons = {
        init() {
            this.initTooltips();
            this.bindCTATracking();
            this.initPopup();
        },

        initTooltips() {
            const tooltipElements = Utils.$('[data-tooltip]');

            tooltipElements.forEach(element => {
                let tooltip;

                Utils.on(element, 'mouseenter', () => {
                    tooltip = document.createElement('div');
                    tooltip.className = 'tooltip';
                    tooltip.textContent = element.dataset.tooltip;
                    document.body.appendChild(tooltip);

                    const rect = element.getBoundingClientRect();
                    tooltip.style.left = rect.left - tooltip.offsetWidth - 10 + 'px';
                    tooltip.style.top = rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2) + 'px';
                });

                Utils.on(element, 'mouseleave', () => {
                    if (tooltip && tooltip.parentNode) {
                        tooltip.parentNode.removeChild(tooltip);
                        tooltip = null;
                    }
                });
            });
        },

        bindCTATracking() {
            // Track all CTA button clicks
            const ctaButtons = Utils.$(`
                .cta-button,
                .action-btn,
                .cta-btn,
                .promise-btn,
                .zalo-float,
                .phone-float
            `);

            ctaButtons.forEach(button => {
                Utils.on(button, 'click', () => {
                    const isZalo = button.href?.includes('zalo.me') ||
                                  button.classList.contains('zalo-float');
                    const isPhone = button.href?.startsWith('tel:') ||
                                   button.classList.contains('phone-float');

                    let eventLabel = 'unknown';
                    if (isZalo) eventLabel = 'zalo';
                    else if (isPhone) eventLabel = 'phone';

                    const section = button.closest('.section')?.id || 'unknown';

                    Utils.trackEvent('cta_click', 'conversion', `${section}_${eventLabel}`);
                });
            });
        },

        initPopup() {
            const popup = Utils.$('#quickContactPopup');
            const closeBtn = Utils.$('#closePopup');
            const backdrop = Utils.$('.popup-backdrop');

            if (!popup) return;

            // Show popup after delay (optional)
            if (!Utils.storage.get('popup-shown')) {
                setTimeout(() => {
                    this.showPopup(popup);
                    Utils.storage.set('popup-shown', true);
                }, 30000);
            }

            // Close popup handlers
            Utils.on(closeBtn, 'click', () => {
                this.hidePopup(popup);
            });

            Utils.on(backdrop, 'click', () => {
                this.hidePopup(popup);
            });

            // Escape key to close
            Utils.on(document, 'keydown', (e) => {
                if (e.key === 'Escape' && popup.classList.contains('show')) {
                    this.hidePopup(popup);
                }
            });
        },

        showPopup(popup) {
            popup.classList.add('show');
            STATE.activeModals.add(popup);
            document.body.style.overflow = 'hidden';

            Utils.trackEvent('popup_show', 'engagement', 'quick_contact');
        },

        hidePopup(popup) {
            popup.classList.remove('show');
            STATE.activeModals.delete(popup);

            if (STATE.activeModals.size === 0) {
                document.body.style.overflow = '';
            }
        }
    };

    const ImageLazyLoader = {
        init() {
            this.createObserver();
            this.loadCriticalImages();
        },

        createObserver() {
            if (!('IntersectionObserver' in window)) {
                // Fallback for older browsers
                this.loadAllImages();
                return;
            }

            this.imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.loadImage(entry.target);
                        this.imageObserver.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '50px 0px'
            });

            // Observe all images with data-src
            Utils.$('img[data-src], [data-background-image]').forEach(element => {
                this.imageObserver.observe(element);
            });
        },

        loadImage(element) {
            if (element.tagName === 'IMG' && element.dataset.src) {
                element.src = element.dataset.src;
                element.classList.remove('lazy');
                element.classList.add('loaded');
            } else if (element.dataset.backgroundImage) {
                element.style.backgroundImage = `url(${element.dataset.backgroundImage})`;
                element.classList.remove('lazy');
                element.classList.add('loaded');
            }

            STATE.loadedImages.add(element);
        },

        loadCriticalImages() {
            // Load hero and above-the-fold images immediately
            const criticalImages = Utils.$('.hero img, .product-showcase img');
            criticalImages.forEach(img => {
                if (img.dataset.src && !STATE.loadedImages.has(img)) {
                    this.loadImage(img);
                }
            });
        },

        loadAllImages() {
            Utils.$('img[data-src], [data-background-image]').forEach(element => {
                this.loadImage(element);
            });
        },

        cleanup() {
            if (this.imageObserver) {
                this.imageObserver.disconnect();
            }
        }
    };

    const PerformanceMonitor = {
        init() {
            this.measurePerformance();
            this.monitorErrors();
        },

        measurePerformance() {
            if (!('performance' in window)) return;

            // Wait for page load
            Utils.on(window, 'load', () => {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];

                    if (perfData) {
                        const metrics = {
                            loadTime: Math.round(perfData.loadEventEnd - perfData.loadEventStart),
                            domContentLoaded: Math.round(perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart),
                            firstPaint: this.getFirstPaint(),
                            firstContentfulPaint: this.getFirstContentfulPaint()
                        };

                        // Track performance metrics
                        Utils.trackEvent('page_performance', 'performance', 'load_time', metrics.loadTime);

                        if (metrics.loadTime > 3000) {
                            console.warn('Slow page load detected:', metrics);
                        }
                    }
                }, 1000);
            });
        },

        getFirstPaint() {
            const paintEntries = performance.getEntriesByType('paint');
            const firstPaint = paintEntries.find(entry => entry.name === 'first-paint');
            return firstPaint ? Math.round(firstPaint.startTime) : 0;
        },

        getFirstContentfulPaint() {
            const paintEntries = performance.getEntriesByType('paint');
            const fcp = paintEntries.find(entry => entry.name === 'first-contentful-paint');
            return fcp ? Math.round(fcp.startTime) : 0;
        },

        monitorErrors() {
            Utils.on(window, 'error', (e) => {
                const errorInfo = {
                    message: e.message,
                    filename: e.filename,
                    lineno: e.lineno,
                    colno: e.colno
                };

                console.error('JavaScript error:', errorInfo);
                Utils.trackEvent('javascript_error', 'error', e.message);
            });

            Utils.on(window, 'unhandledrejection', (e) => {
                console.error('Unhandled promise rejection:', e.reason);
                Utils.trackEvent('promise_rejection', 'error', String(e.reason));
            });
        }
    };

    const AccessibilityEnhancer = {
        init() {
            this.enhanceKeyboardNavigation();
            this.addARIALabels();
            this.improveFocusManagement();
        },

        enhanceKeyboardNavigation() {
            // Add keyboard navigation to carousels
            Utils.on(document, 'keydown', (e) => {
                if (e.target.closest('.testimonials-slider')) {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        TestimonialsCarousel.prevSlide();
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        TestimonialsCarousel.nextSlide();
                    }
                }

                if (e.target.closest('.demo-container')) {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        UsageDemo.prevStep();
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        UsageDemo.nextStep();
                    }
                }
            });

            // Add Enter/Space key support for interactive elements
            Utils.on(document, 'keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    const target = e.target;

                    if (target.classList.contains('benefit-card') ||
                        target.classList.contains('ingredient-item') ||
                        target.classList.contains('faq-question')) {
                        e.preventDefault();
                        target.click();
                    }
                }
            });
        },

        addARIALabels() {
            // Add ARIA labels to interactive elements
            Utils.$('.benefit-card').forEach((card, index) => {
                card.setAttribute('role', 'button');
                card.setAttribute('tabindex', '0');
                card.setAttribute('aria-label', `Xem chi tiết lợi ích ${index + 1}`);
            });

            Utils.$('.ingredient-item').forEach((item, index) => {
                item.setAttribute('role', 'button');
                item.setAttribute('tabindex', '0');
                item.setAttribute('aria-label', `Xem chi tiết thành phần ${index + 1}`);
            });

            Utils.$('.faq-question').forEach(question => {
                question.setAttribute('role', 'button');
                question.setAttribute('tabindex', '0');
                question.setAttribute('aria-expanded', 'false');
            });
        },

        improveFocusManagement() {
            // Trap focus in modals
            Utils.on(document, 'keydown', (e) => {
                if (e.key === 'Tab' && STATE.activeModals.size > 0) {
                    const activeModal = Array.from(STATE.activeModals)[0];
                    const focusableElements = activeModal.querySelectorAll(
                        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    );

                    if (focusableElements.length === 0) return;

                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];

                    if (e.shiftKey) {
                        if (document.activeElement === firstElement) {
                            e.preventDefault();
                            lastElement.focus();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            e.preventDefault();
                            firstElement.focus();
                        }
                    }
                }
            });

            // Restore focus after modal close
            let lastFocusedElement;

            Utils.on(document, 'click', (e) => {
                if (e.target.matches('[data-modal-trigger]')) {
                    lastFocusedElement = e.target;
                }
            });

            // Focus management for FAQ
            Utils.on(document, 'click', (e) => {
                const faqQuestion = e.target.closest('.faq-question');
                if (faqQuestion) {
                    const faqItem = faqQuestion.closest('.faq-item');
                    const isExpanded = faqItem.classList.contains('active');
                    faqQuestion.setAttribute('aria-expanded', isExpanded.toString());
                }
            });
        }
    };

    // ========================================
    // Main Application Controller
    // ========================================

    const App = {
        init() {
            // Wait for DOM to be ready
            if (document.readyState === 'loading') {
                Utils.on(document, 'DOMContentLoaded', () => {
                    this.start();
                });
            } else {
                this.start();
            }
        },

        start() {
            console.log('🌾 Tùng Beo Website - Initializing...');

            try {
                // Initialize core modules
                this.initCore();

                // Initialize feature modules
                this.initFeatures();

                // Initialize enhancements
                this.initEnhancements();

                console.log('✅ Tùng Beo Website - Ready!');

                // Track initialization
                Utils.trackEvent('app_initialized', 'performance', 'success');

            } catch (error) {
                console.error('❌ Initialization error:', error);
                Utils.trackEvent('app_initialization_error', 'error', error.message);
            }
        },

        initCore() {
            // Core functionality that must work
            SmoothScroll.init();
            HeaderController.init();
            ScrollAnimations.init();
        },

        initFeatures() {
            // Main features
            ProductInteractions.init();
            BenefitsInteractions.init();
            TestimonialsCarousel.init();
            UsageDemo.init();
            FAQController.init();
            ContactForm.init();
            FloatingButtons.init();
        },

        initEnhancements() {
            // Progressive enhancements
            ImageLazyLoader.init();
            PerformanceMonitor.init();
            AccessibilityEnhancer.init();
        },

        cleanup() {
            // Cleanup function for SPA navigation or page unload
            ScrollAnimations.cleanup();
            TestimonialsCarousel.cleanup();
            UsageDemo.cleanup();
            ImageLazyLoader.cleanup();

            // Clear all timers
            if (STATE.testimonialTimer) {
                clearInterval(STATE.testimonialTimer);
            }
            if (STATE.demoTimer) {
                clearInterval(STATE.demoTimer);
            }

            console.log('🧹 Cleanup completed');
        }
    };

    // ========================================
    // CSS Animations Support
    // ========================================

    // Add CSS for JavaScript-dependent animations
    const dynamicStyles = `
        <style id="js-dynamic-styles">
            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(100%);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideOutRight {
                from {
                    opacity: 1;
                    transform: translateX(0);
                }
                to {
                    opacity: 0;
                    transform: translateX(100%);
                }
            }

            .notification {
                animation: slideInRight 0.3s ease-out;
            }

            .notification-content {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .notification-close {
                background: none;
                border: none;
                color: white;
                font-size: 18px;
                cursor: pointer;
                padding: 0;
                margin-left: 10px;
            }

            .lazy {
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .loaded {
                opacity: 1;
            }

            /* Focus styles for accessibility */
            .benefit-card:focus,
            .ingredient-item:focus,
            .faq-question:focus {
                outline: 2px solid #0068FF;
                outline-offset: 2px;
            }

            /* High contrast mode adjustments */
            @media (prefers-contrast: high) {
                .shadow-lg,
                .shadow-xl,
                .shadow-2xl {
                    box-shadow: none !important;
                    border: 2px solid currentColor;
                }
            }

            /* Reduced motion preferences */
            @media (prefers-reduced-motion: reduce) {
                .animate-in,
                .floating-element,
                .rotating-ring,
                .testimonial-item,
                .demo-step {
                    animation: none !important;
                    transition: none !important;
                }
            }
        </style>
    `;

    // Inject dynamic styles
    document.head.insertAdjacentHTML('beforeend', dynamicStyles);

    // ========================================
    // Polyfills for older browsers
    // ========================================

    // IntersectionObserver polyfill check
    if (!('IntersectionObserver' in window)) {
        console.warn('IntersectionObserver not supported. Consider adding polyfill.');

        // Fallback behavior
        Utils.$('.section, .animate-in').forEach(el => {
            el.classList.add('animate-in');
        });
    }

    // ========================================
    // Export and Initialize
    // ========================================

    // Make Utils available globally for debugging
    if (typeof window !== 'undefined') {
        window.TungBeoApp = {
            App,
            Utils,
            STATE,
            CONFIG
        };
    }

    // Auto-initialize when script loads
    App.init();

    // Cleanup on page unload
    Utils.on(window, 'beforeunload', () => {
        App.cleanup();
    });

    // Handle page visibility changes
    Utils.on(document, 'visibilitychange', () => {
        if (document.hidden) {
            // Page hidden - pause auto-playing elements
            TestimonialsCarousel.stopAutoPlay();
            UsageDemo.stopAutoPlay();
        } else {
            // Page visible - resume auto-playing elements
            TestimonialsCarousel.startAutoPlay();
            UsageDemo.startAutoPlay();
        }
    });

})();
