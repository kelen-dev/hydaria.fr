document.addEventListener("DOMContentLoaded", () => {
    // Animation d'arrivée de la liste des utilisateurs
    gsap.from("table", { duration: 1, y: -50, opacity: 0 });
    gsap.from(".alert-success", { duration: 1, opacity: 0, y: -20 });
});