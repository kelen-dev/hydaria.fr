// NAVBAR //
gsap.fromTo(".navbar-brand-img",
    { opacity: 0 },
    {
        opacity: 1,
        duration: .6,
        delay: .2
    });
gsap.fromTo(".nav-item",
    {
        opacity: 0,
        y: -100
    },
    {
        opacity: 1,
        y: 0,
        duration: .2
    });

// ANNIMATION ON SCROLL //
document.addEventListener("DOMContentLoaded", (event) => {
    gsap.registerPlugin(ScrollTrigger)

    // gsap code here!
    gsap.utils.toArray('.fade-delay').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0
            }, // Départ : invisible et déplacé vers le haut
            {
                opacity: 1,
                duration: .6,
                delay: .2,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: false, // Animation liée au défilement (fluidité)
                    toggleActions: "play pause resume reset"
                }
            }
        );
    });
    gsap.utils.toArray('.fade-down').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                y: -50
            }, // Départ : invisible et déplacé vers le bas
            {
                opacity: 1,
                y: 0,
                duration: .6,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: true // Animation liée au défilement (fluidité)
                }
            }
        );
    });

    gsap.utils.toArray('.fade-left').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                x: 50
            }, // Départ : invisible et déplacé vers la gauche
            {
                opacity: 1,
                x: 0,
                duration: .6,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: true // Animation liée au défilement (fluidité)
                }
            }
        );
    });

    gsap.utils.toArray('.fade-right').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                x: -50
            }, // Départ : invisible et déplacé vers la droite
            {
                opacity: 1,
                x: 0,
                duration: .6,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: true // Animation liée au défilement (fluidité)
                }
            }
        );
    });

    gsap.utils.toArray('.fade-right-delay').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                x: -50
            }, // Départ : invisible et déplacé vers la droite
            {
                opacity: 1,
                x: 0,
                duration: .6,
                delay: .2,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: false, // Animation liée au défilement (fluidité)
                    toggleActions: "play pause resume reset"
                }
            }
        );
    });

    gsap.utils.toArray('.fade-up').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                y: 50
            }, // Départ : invisible et déplacé vers le haut
            {
                opacity: 1,
                y: 0,
                duration: .6,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: true // Animation liée au défilement (fluidité)
                }
            }
        );
    });

    gsap.utils.toArray('.fade-up-delay').forEach((text) => {
        gsap.fromTo(text,
            {
                opacity: 0,
                y: 50
            }, // Départ : invisible et déplacé vers le haut
            {
                opacity: 1,
                y: 0,
                duration: .6,
                delay: .2,
                scrollTrigger: {
                    trigger: text, // Le texte déclenche l'animation
                    start: "top 80%", // L'animation commence quand le texte entre dans la zone
                    end: "top 10%", // L'animation se termine quand le texte est au centre
                    scrub: false, // Animation liée au défilement (fluidité)
                    toggleActions: "play pause resume reset"
                }
            }
        );
    });
});