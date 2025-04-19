document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.carousel');
    const ul = carousel.querySelector('ul');
    let scrollAmount = 0;
    let itemWidth = ul.children[0].offsetWidth + 10; // Largeur d'un élément + marge
    let isPaused = false;

    // Dupliquer les éléments pour assurer une transition infinie
    ul.innerHTML += ul.innerHTML; // Double les éléments

    function scrollCarousel() {
        if (!isPaused) {
            scrollAmount += 1; // Ajustez pour modifier la vitesse
            ul.style.transform = `translateX(-${scrollAmount}px)`;

            // Réinitialise lorsque le premier élément disparaît totalement
            if (scrollAmount >= itemWidth * (ul.children.length / 2)) {
                scrollAmount = 0;
                ul.style.transform = `translateX(0)`;
            }
        }
        requestAnimationFrame(scrollCarousel);
    }

    ul.addEventListener('mouseover', () => isPaused = true);
    ul.addEventListener('mouseout', () => isPaused = false);

    scrollCarousel();
});