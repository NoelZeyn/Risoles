document.addEventListener('DOMContentLoaded', function() {
    // Validasi form sebelum submit
    const orderForm = document.querySelector('form');
    const menuSlider = document.querySelector('.menu');
    const navMenu = document.querySelector('header nav ul');
    prevBtn.addEventListener('click', () => {
        menuSlider.scrollBy({
            left: -menuSlider.offsetWidth,
            behavior: 'smooth'
        });
    });
    nextBtn.addEventListener('click', () => {
        menuSlider.scrollBy({
            left: menuSlider.offsetWidth,
            behavior: 'smooth'
        });
    });
    
    orderForm.addEventListener('submit', function(event) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const order = document.getElementById('order').value.trim();

        if (!name || !email || !order) {
            event.preventDefault();
            alert("Semua kolom harus diisi.");
        }
    });

    // Scroll smooth untuk semua link dalam halaman
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // Sesuaikan dengan offset yang diinginkan
                    behavior: 'smooth'
                });
            }
        });
    });
});
