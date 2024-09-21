// Script de gestion du bouton "Charger plus"

document.addEventListener("DOMContentLoaded", function () {
  const loadMoreBtn = document.querySelector(".load-more");

  // Vérifie la présence du bouton "Charger plus" avant d'attacher un événement.
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      let page = parseInt(loadMoreBtn.getAttribute("data-page")) + 1;
      let ajaxUrl = loadMoreBtn.dataset.ajaxurl;

      // Désactive le bouton et modifie le texte pendant le chargement.
      loadMoreBtn.disabled = true;
      loadMoreBtn.textContent = "Chargement en cours...";

      // Envoie une requête pour charger des photos supplémentaires via l'API.
      fetch(`${ajaxUrl}?action=mota_photo_load_more_photos&page=${page}`)
        .then((response) => response.text())
        .then((data) => {
          
          // Vérifie s'il reste des photos à charger ou si c'est la fin.
          if (data.trim() === "end") {
            loadMoreBtn.textContent = "La suite prochainement";
            loadMoreBtn.disabled = true;
          } else {
            // Insère les nouvelles photos dans la galerie.
            const galleryGrid = document.querySelector(".gallery-grid");
            galleryGrid.insertAdjacentHTML("beforeend", data);

            // Réactive le bouton et met à jour l'attribut data-page.
            loadMoreBtn.setAttribute("data-page", page);
            loadMoreBtn.disabled = false;
            loadMoreBtn.textContent = "Charger plus";
          }
        })
        .catch((error) => {
          // Gère les erreurs en cas de problème lors du chargement.
          console.error(
            "Erreur lors du chargement des photos supplémentaires:",
            error
          );
          loadMoreBtn.disabled = false;
          loadMoreBtn.textContent = "Charger plus";
        });
    });
  }
});
