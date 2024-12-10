const lightbox = document.getElementById('lightbox');
const lightboxImage = document.querySelector('.lightbox-image');
const closeLightbox = document.querySelector('.close');
const triggers = document.querySelectorAll('.lightbox-trigger');

// Mostrar la imagen en el Lightbox al hacer clic
triggers.forEach(trigger => {
    trigger.addEventListener('click', function () {
        lightbox.style.display = 'flex';
        lightboxImage.src = this.src; // Usar la misma fuente que la miniatura
    });
});

// Cerrar el Lightbox
closeLightbox.addEventListener('click', function () {
    lightbox.style.display = 'none';
});