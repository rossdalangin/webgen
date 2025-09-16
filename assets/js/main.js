// Main JavaScript file for FitPro Theme
(function($) {
    'use strict';

    $(document).ready(function() {
        console.log('FitPro theme JS loaded');

        // --- Exit Intent Popup Logic ---
        const popup = document.getElementById('exit-intent-popup');
        const closeButton = document.querySelector('.close-popup-button');

        const showExitIntentPopup = () => {
            if (sessionStorage.getItem('fitproPopupShown')) {
                return;
            }
            popup.style.display = 'flex';
            sessionStorage.setItem('fitproPopupShown', 'true');
        };

        const hideExitIntentPopup = () => {
            popup.style.display = 'none';
        };

        // Show popup on mouseout
        document.addEventListener('mouseout', (e) => {
            // If the mouse is leaving the viewport at the top
            if (e.clientY <= 0) {
                showExitIntentPopup();
            }
        });

        // Close popup when the close button is clicked
        if (closeButton) {
            closeButton.addEventListener('click', hideExitIntentPopup);
        }

        // Close popup when clicking on the overlay
        if (popup) {
            popup.addEventListener('click', (e) => {
                if (e.target.classList.contains('exit-intent-popup-wrapper')) {
                    hideExitIntentPopup();
                }
            });
        }

        // --- Mobile Menu Toggle ---
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-navigation');

        if (menuToggle && mainNav) {
            menuToggle.addEventListener('click', function() {
                mainNav.classList.toggle('toggled');
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                menuToggle.setAttribute('aria-expanded', !isExpanded);
            });
        }

        // --- Scroll Fade-In Animation ---
        const fadeInSections = document.querySelectorAll('.fade-in-section');
        if (fadeInSections.length > 0) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            fadeInSections.forEach(section => {
                observer.observe(section);
            });
        }

        // --- Header Search Toggle ---
        const searchToggle = document.querySelector('.search-toggle');
        const searchOverlay = document.querySelector('.search-overlay');
        const searchClose = document.querySelector('.search-overlay-close');

        if (searchToggle && searchOverlay && searchClose) {
            searchToggle.addEventListener('click', function() {
                searchOverlay.classList.add('is-active');
                searchOverlay.querySelector('.search-field').focus();
            });

            searchClose.addEventListener('click', function() {
                searchOverlay.classList.remove('is-active');
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && searchOverlay.classList.contains('is-active')) {
                    searchOverlay.classList.remove('is-active');
                }
            });
        }
    });

})(jQuery);
