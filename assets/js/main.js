/**
 * Wandering Gorilla Theme JavaScript
 * Handles mobile menu, smooth scrolling, and interactive elements
 *
 * @package Wandering_Gorilla
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.main-navigation');

        if (menuToggle && navigation) {
            menuToggle.addEventListener('click', function() {
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

                menuToggle.setAttribute('aria-expanded', !isExpanded);
                navigation.classList.toggle('active');

                // Update button text
                const buttonText = menuToggle.querySelector('span');
                if (buttonText) {
                    buttonText.textContent = !isExpanded ? 'Close' : 'Menu';
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!menuToggle.contains(event.target) && !navigation.contains(event.target)) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                    navigation.classList.remove('active');
                    const buttonText = menuToggle.querySelector('span');
                    if (buttonText) {
                        buttonText.textContent = 'Menu';
                    }
                }
            });

            // Close menu on ESC key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && navigation.classList.contains('active')) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                    navigation.classList.remove('active');
                    const buttonText = menuToggle.querySelector('span');
                    if (buttonText) {
                        buttonText.textContent = 'Menu';
                    }
                    menuToggle.focus();
                }
            });
        }
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Skip if it's just "#"
                if (href === '#') return;

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();
                    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Update focus for accessibility
                    target.focus({ preventScroll: true });
                }
            });
        });
    }

    /**
     * Lazy Loading Images with Fade-In Effect
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;

                        // If image has data-src, load it
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }

                        // Add fade-in class
                        img.classList.add('fade-in');

                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            // Observe all images
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => imageObserver.observe(img));
        }
    }

    /**
     * Add Parallax Effect to Hero Sections
     */
    function initParallax() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return; // Skip parallax for users who prefer reduced motion
        }

        const heroSections = document.querySelectorAll('.hero-section');

        if (heroSections.length > 0) {
            window.addEventListener('scroll', () => {
                heroSections.forEach(section => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * 0.3;

                    const heroImage = section.querySelector('.hero-image');
                    if (heroImage) {
                        heroImage.style.transform = `translateY(${rate}px)`;
                    }
                });
            });
        }
    }

    /**
     * Add Animation on Scroll for Cards
     */
    function initScrollAnimations() {
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all post cards and gear cards
            const cards = document.querySelectorAll('.post-card, .gear-card');
            cards.forEach(card => {
                observer.observe(card);
            });
        }
    }

    /**
     * Gallery Lightbox (Simple Implementation)
     */
    function initGalleryLightbox() {
        const galleryImages = document.querySelectorAll('.kodachrome-gallery img, .polaroid-photo img');

        if (galleryImages.length > 0) {
            galleryImages.forEach(img => {
                img.style.cursor = 'pointer';

                img.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Create lightbox
                    const lightbox = document.createElement('div');
                    lightbox.className = 'lightbox';
                    lightbox.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(60, 60, 60, 0.95);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        z-index: 9999;
                        cursor: pointer;
                        padding: 24px;
                    `;

                    const lightboxImg = document.createElement('img');
                    lightboxImg.src = this.src;
                    lightboxImg.style.cssText = `
                        max-width: 90%;
                        max-height: 90%;
                        border: 12px solid #F5F5DC;
                        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
                    `;

                    lightbox.appendChild(lightboxImg);
                    document.body.appendChild(lightbox);
                    document.body.style.overflow = 'hidden';

                    // Close lightbox on click
                    lightbox.addEventListener('click', function() {
                        document.body.removeChild(lightbox);
                        document.body.style.overflow = '';
                    });

                    // Close on ESC key
                    const closeOnEsc = function(e) {
                        if (e.key === 'Escape') {
                            if (document.body.contains(lightbox)) {
                                document.body.removeChild(lightbox);
                                document.body.style.overflow = '';
                            }
                            document.removeEventListener('keydown', closeOnEsc);
                        }
                    };
                    document.addEventListener('keydown', closeOnEsc);
                });
            });
        }
    }

    /**
     * Form Validation Enhancement
     */
    function initFormValidation() {
        const forms = document.querySelectorAll('.contact-form, .government-form form');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const inputs = form.querySelectorAll('[required]');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = '#DC143C';
                    } else {
                        input.style.borderColor = '';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields marked with *');
                }
            });

            // Remove error styling on input
            const inputs = form.querySelectorAll('[required]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                });
            });
        });
    }

    /**
     * Add Sticky Header Class on Scroll
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');

        if (header) {
            let lastScroll = 0;

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;

                if (currentScroll > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }

                lastScroll = currentScroll;
            });
        }
    }

    /**
     * Add Copy to Clipboard for Code Blocks
     */
    function initCodeCopy() {
        const codeBlocks = document.querySelectorAll('pre code');

        codeBlocks.forEach(block => {
            const pre = block.parentElement;
            const button = document.createElement('button');
            button.textContent = 'Copy';
            button.className = 'btn btn-badge';
            button.style.cssText = 'position: absolute; top: 8px; right: 8px; font-size: 0.75rem;';

            pre.style.position = 'relative';
            pre.appendChild(button);

            button.addEventListener('click', () => {
                navigator.clipboard.writeText(block.textContent).then(() => {
                    button.textContent = 'Copied!';
                    setTimeout(() => {
                        button.textContent = 'Copy';
                    }, 2000);
                });
            });
        });
    }

    /**
     * Initialize all functions when DOM is ready
     */
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initLazyLoad();
        initParallax();
        initScrollAnimations();
        initGalleryLightbox();
        initFormValidation();
        initStickyHeader();
        initCodeCopy();

        console.log('Wandering Gorilla theme loaded successfully');
    }

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
