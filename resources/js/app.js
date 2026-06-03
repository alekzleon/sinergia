import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

// Alpine.js
window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.start();

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', () => {
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg', 'bg-white/95', 'backdrop-blur-sm');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('shadow-lg', 'bg-white/95', 'backdrop-blur-sm');
            }
        });
    }

    // Gallery lightbox (simple)
    const galleryImages = document.querySelectorAll('[data-lightbox]');
    galleryImages.forEach(img => {
        img.addEventListener('click', () => {
            const src = img.dataset.lightbox;
            const overlay = document.createElement('div');
            overlay.className = 'fixed inset-0 z-[9999] bg-black/90 flex items-center justify-center p-4 cursor-pointer';
            overlay.innerHTML = `<img src="${src}" class="max-h-[90vh] max-w-full rounded-lg shadow-2xl object-contain" />
                <button class="absolute top-4 right-4 text-white text-3xl font-bold hover:text-gray-300">&times;</button>`;
            overlay.addEventListener('click', () => overlay.remove());
            document.body.appendChild(overlay);
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Counter animation
    const counters = document.querySelectorAll('[data-counter]');
    const animateCounter = (el) => {
        const target = el.textContent;
        const num = parseInt(target.replace(/\D/g, ''));
        const suffix = target.replace(/[\d]/g, '');
        let current = 0;
        const step = Math.ceil(num / 60);
        const timer = setInterval(() => {
            current = Math.min(current + step, num);
            el.textContent = current + suffix;
            if (current >= num) clearInterval(timer);
        }, 30);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
});
