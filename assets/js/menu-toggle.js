// Activation des actions du bouton hamburger au chargement du DOM.

document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".hamburger-menu");
  const mobileMenu = document.querySelector(".mobile-menu");

  // Fonction de fermeture du menu mobile.
  function closeMobileMenu() {
    hamburger.classList.remove("active");
    mobileMenu.classList.remove("active");
  }

  // Gestion de l'ouverture/fermeture du menu mobile.
  hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("active");
    mobileMenu.classList.toggle("active");
  });

  // Fermeture automatique du menu mobile à l'adaptation de la taille d'écran.
  window.addEventListener("resize", function () {
    if (window.innerWidth > 768) {
      closeMobileMenu();
    }
  });
});
