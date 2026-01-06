<!-- Scroll to Top Button -->
<button id="scrollToTop" class="btn btn-success rounded-circle shadow position-fixed d-none" 
        style="bottom: 25px; right: 25px; width: 45px; height: 45px; z-index: 1000;">
    <i class="bi bi-arrow-up-short fs-4"></i>
</button>

<!-- Add Bootstrap Icons CDN in your head tag if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<script>
// Show/hide scroll-to-top button based on scroll position
window.addEventListener('scroll', function() {
    const scrollToTop = document.getElementById('scrollToTop');
    
    if (window.scrollY > 300) {
        scrollToTop.classList.replace('d-none', 'd-flex');
        scrollToTop.classList.add('justify-content-center', 'align-items-center');
    } else {
        scrollToTop.classList.replace('d-flex', 'd-none');
    }
});

// Smooth scroll to top when button is clicked
document.getElementById('scrollToTop').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>

<style>
/* Optional custom styles to enhance the Bootstrap button */
#scrollToTop {
    transition: all 0.3s ease;
}

#scrollToTop:hover {
    transform: translateY(-3px);
    background-color: #005923 !important;
}

#scrollToTop i {
    transition: transform 0.3s ease;
}

#scrollToTop:hover i {
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    #scrollToTop {
        width: 40px !important;
        height: 40px !important;
        bottom: 20px !important;
        right: 20px !important;
    }
}
</style>