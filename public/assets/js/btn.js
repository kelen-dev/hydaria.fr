const buttons = document.querySelectorAll('.btn');

buttons.forEach((btn) => {
    const bg = btn.querySelector('.bg-slide');

    btn.addEventListener('mouseenter', () => {
        gsap.to(bg, {
            left: "0%",
            duration: 0.4,
            ease: "power2.out"
        });
    });

    btn.addEventListener('mouseleave', () => {
        gsap.to(bg, {
            left: "-100%",
            duration: 0.4,
            ease: "power2.in"
        });
    });
});
