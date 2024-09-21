// Observation des modifications du DOM

const observer = new MutationObserver(function (mutationsList, observer) {
  mutationsList.forEach(function (mutation) {
    if (mutation.type === "childList") {
      const photoRefField = document.getElementById("ref-photo");
      if (photoRefField) {
        observer.disconnect();

        // Chaque bouton associé à une référence photo met à jour le champ de référence lors d'un clic.
        document.querySelectorAll(".show-photo-ref").forEach((button) => {
          button.addEventListener("click", function () {
            const photoRef = this.getAttribute("data-reference-id");
            photoRefField.value = photoRef;
          });
        });
      }
    }
  });
});

// Démarrage de l'observation du DOM
observer.observe(document.body, { childList: true, subtree: true });
