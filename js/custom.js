document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const mobileOverlay = document.createElement('div');
    mobileOverlay.className = 'mobile-overlay';
    document.body.appendChild(mobileOverlay);

    // ===== MENÚ MÓVIL =====
    navToggle.addEventListener('click', function () {
        this.classList.toggle('active');
        navMenu.classList.toggle('active');
        mobileOverlay.classList.toggle('active');
        document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
    });

    mobileOverlay.addEventListener('click', function () {
        navToggle.classList.remove('active');
        navMenu.classList.remove('active');
        this.classList.remove('active');
        document.body.style.overflow = '';
    });

    // ===== SUBMENÚS EN MÓVIL =====
    const subMenuParents = document.querySelectorAll('.menu-item-has-children > a');

    subMenuParents.forEach(link => {
        link.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const subMenu = this.nextElementSibling;
                if (subMenu && subMenu.classList.contains('sub-menu')) {
                    subMenu.classList.toggle('active');
                }
            }
        });
    });

    // ===== CERRAR MENÚ AL HACER CLIC EN UN ENLACE =====
    document.querySelectorAll('.nav-menu a').forEach(link => {
        if (!link.parentElement.classList.contains('menu-item-has-children')) {
            link.addEventListener('click', function () {
                if (window.innerWidth <= 768) {
                    navToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                    mobileOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
    });

    // ===== CERRAR MENÚ AL REDIMENSIONAR =====
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            navToggle.classList.remove('active');
            navMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
            document.querySelectorAll('.sub-menu').forEach(menu => {
                menu.classList.remove('active');
            });
        }
    });

    // ===== OCULTAR BARRA DE CONTACTO =====
    const contactosDiv = document.querySelector('.contactos');
    let lastScrollTop = 0;

    if (contactosDiv) {
        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > 50) {
                contactosDiv.classList.add('hidden');
            } else {
                contactosDiv.classList.remove('hidden');
            }
            lastScrollTop = scrollTop;
        });
    }

    // ===== EFECTO DE SCROLL EN NAVBAR =====
    const navbar = document.querySelector('.navbar');
    let lastKnownScrollY = 0;
    let ticking = false;

    function onScroll() {
        lastKnownScrollY = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    }

    function updateNavbar() {
        if (lastKnownScrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        ticking = false;
    }

    window.addEventListener('scroll', onScroll);

    // ===== SLIDESHOW =====
    const slideshowContainer = document.querySelector('.slideshow-container');
    if (slideshowContainer) {
        const slides = slideshowContainer.querySelectorAll('.slide');
        const prevBtn = slideshowContainer.querySelector('.prev');
        const nextBtn = slideshowContainer.querySelector('.next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));

            if (index >= slides.length) currentSlide = 0;
            if (index < 0) currentSlide = slides.length - 1;

            slides[currentSlide].classList.add('active');
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide--;
            showSlide(currentSlide);
        }

        function startSlideshow() {
            slideInterval = setInterval(nextSlide, 5000); // Cambia cada 5 segundos
        }

        function stopSlideshow() {
            clearInterval(slideInterval);
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                stopSlideshow();
                nextSlide();
                startSlideshow();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                stopSlideshow();
                prevSlide();
                startSlideshow();
            });
        }

        // Pausar slideshow al hacer hover
        slideshowContainer.addEventListener('mouseenter', stopSlideshow);
        slideshowContainer.addEventListener('mouseleave', startSlideshow);

        // Iniciar slideshow
        if (slides.length > 1) {
            startSlideshow();
        }
    }

    // ===== EFECTO DE SCROLL PARA SECCIONES DESTACADO =====
    function initScrollAnimations() {
        const destacadoSections = document.querySelectorAll('.destacado');

        // Opciones para el Intersection Observer
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3 // Se activa cuando el 30% del elemento es visible
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Opcional: Dejar de observar después de que se anima
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observar cada sección destacado
        destacadoSections.forEach(section => {
            observer.observe(section);
        });
    }

    // Inicializar las animaciones de scroll
    initScrollAnimations();

    // También inicializar cuando se cargue completamente la página (por si hay imágenes pesadas)
    window.addEventListener('load', function () {
        // Re-inicializar por si hay cambios en el layout después de cargar imágenes
        initScrollAnimations();
    });
});

// ===== LIVE PREVIEW PARA EL CUSTOMIZER (WordPress) =====
(function ($) {
    // Verificar si wp.customize existe (solo en el customizer de WordPress)
    if (typeof wp !== 'undefined' && wp.customize) {
        wp.customize('serin_cta_title', function (value) {
            value.bind(function (to) {
                $('.wrapper.style4 h2').text(to);
            });
        });

        wp.customize('serin_cta_description', function (value) {
            value.bind(function (to) {
                $('.wrapper.style4 p').text(to);
            });
        });

        wp.customize('serin_cta_primary_text', function (value) {
            value.bind(function (to) {
                $('.wrapper.style4 .button.primary').text(to);
            });
        });

        wp.customize('serin_cta_secondary_text', function (value) {
            value.bind(function (to) {
                $('.wrapper.style4 .button:not(.primary)').text(to);
            });
        });
    }
})(jQuery);