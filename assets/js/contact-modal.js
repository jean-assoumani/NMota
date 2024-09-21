// Initialisation du DOM et gestion des éléments du modal de contact
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("contactModal");
  const contactLinks = document.querySelectorAll(".contact-link");

  if (!modal || contactLinks.length === 0) return;

  // Gestion de l'ouverture du modal sur clic sur un lien de contact
  contactLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault(); 
      modal.classList.add("show");
    });
  });

  // Gestion de la fermeture du modal sur clic en dehors de celui-ci
  document.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.classList.remove("show");
    }
  });

  // Fermeture du modal via le bouton de fermeture dédié
  const closeButton = modal.querySelector(".close");
  if (closeButton) {
    closeButton.addEventListener("click", () => {
      modal.classList.remove("show");
    });
  }

  // Fermeture du modal via la touche Échap pour une accessibilité optimale
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal.classList.contains("show")) {
      modal.classList.remove("show");
    }
  });
});
