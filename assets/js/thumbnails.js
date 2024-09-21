// Script pour la gestion des liens "photo précédente" et "photo suivante"

document.addEventListener("DOMContentLoaded", function () {
  const prevPhotoLink = document.querySelector(".prev-photo a");
  const nextPhotoLink = document.querySelector(".next-photo a");
  const prevThumbnail = document.getElementById("prev-photo-thumbnail");
  const nextThumbnail = document.getElementById("next-photo-thumbnail");

  // Fonction pour afficher la miniature de la photo au survol
  function displayThumbnail(link, thumbnailDiv) {
    const photoUrl = link.getAttribute("href");

    fetch(photoUrl)
      .then((response) => response.text())
      .then((data) => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(data, "text/html");
        const thumbnailUrl = doc
          .querySelector(".photo-fullsize")
          .getAttribute("src");

        thumbnailDiv.style.backgroundImage = `url(${thumbnailUrl})`;
        thumbnailDiv.style.display = "block";
      })
      .catch((error) =>
        console.error("Erreur lors du chargement de la miniature :", error)
      );
  }

  // Fonction pour masquer la miniature de la photo
  function hideThumbnail(thumbnailDiv) {
    thumbnailDiv.style.display = "none";
  }

  // Gestion des événements de survol et de sortie pour la "photo précédente"
  if (prevPhotoLink) {
    prevPhotoLink.addEventListener("mouseover", function () {
      displayThumbnail(this, prevThumbnail);
    });

    prevPhotoLink.addEventListener("mouseout", function () {
      hideThumbnail(prevThumbnail);
    });
  }

  // Gestion des événements de survol et de sortie pour la "photo suivante"
  if (nextPhotoLink) {
    nextPhotoLink.addEventListener("mouseover", function () {
      displayThumbnail(this, nextThumbnail);
    });

    nextPhotoLink.addEventListener("mouseout", function () {
      hideThumbnail(nextThumbnail);
    });
  }
});
