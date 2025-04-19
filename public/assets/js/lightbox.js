// Ouvre la lightbox avec l'image cliquée
document.querySelectorAll('.gallery-item img').forEach(image => {
    image.addEventListener('click', () => {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        lightboxImage.src = image.src;
        lightbox.style.display = 'flex';
    });
});

// Ferme la lightbox
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}