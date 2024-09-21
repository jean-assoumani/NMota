document.addEventListener("DOMContentLoaded", function () {
  const customDropdowns = document.querySelectorAll(".custom-dropdown");

  // Vérification de la présence des dropdowns personnalisés
  if (customDropdowns.length > 0) {
    console.log("Dropdowns détectés:", customDropdowns.length);

    // Configuration des événements de clic pour les éléments de sélection
    customDropdowns.forEach((dropdown) => {
      const selected = dropdown.querySelector(".selected");
      const options = dropdown.querySelector(".dropdown-options");

      if (selected && options) {
        console.log("Dropdown détecté:", dropdown);

        // Ouverture et fermeture des dropdowns
        selected.addEventListener("click", function () {
          console.log("Dropdown cliqué:", dropdown);
          dropdown.classList.toggle("active");
          selected.classList.toggle("active");
        });

        // Gestion des événements de sélection d'option
        options.querySelectorAll(".option").forEach((option) => {
          option.addEventListener("click", function () {
            console.log("Option sélectionnée:", option.textContent);

            selected.textContent = option.textContent;
            selected.dataset.value = option.dataset.value;

            options.querySelectorAll(".option").forEach((opt) => {
              opt.classList.remove("selected");
              opt.style.display = "block";
            });

            option.classList.add("selected");
            option.style.display = "none";

            selected.classList.add("option-selected");

            // Fermeture automatique du dropdown après sélection
            setTimeout(() => {
              dropdown.classList.remove("active");
              selected.classList.remove("active");
            }, 150);

            // Mise à jour des filtres après la sélection
            updateFilters();
          });

          // Gestion du survol des options pour améliorer l'interaction
          option.addEventListener("mouseover", function () {
            if (!option.classList.contains("selected")) {
              option.style.backgroundColor = "#ffd6d6";
            }
          });

          option.addEventListener("mouseout", function () {
            if (!option.classList.contains("selected")) {
              option.style.backgroundColor = "";
            }
          });
        });
      }
    });
  } else {
    console.log("Aucun dropdown trouvé.");
  }

  // Fermeture des dropdowns lors d'un clic en dehors
  document.addEventListener("click", function (e) {
    customDropdowns.forEach((dropdown) => {
      if (
        !dropdown.contains(e.target) &&
        dropdown.classList.contains("active")
      ) {
        dropdown.classList.remove("active");
        const selected = dropdown.querySelector(".selected");
        selected.classList.remove("active");
      }
    });
  });

  // Fonction de mise à jour des filtres et requête AJAX pour rafraîchir le contenu
  function updateFilters() {
    const category =
      document.querySelector("#filter-category-dropdown .selected")?.dataset
        .value || "";
    const format =
      document.querySelector("#filter-format-dropdown .selected")?.dataset
        .value || "";
    const order =
      document.querySelector("#filter-sort-dropdown .selected")?.dataset
        .value || "";

    console.log("Filtrage avec:", { category, format, order });

    // Requête AJAX pour filtrer et actualiser la grille de la galerie
    jQuery.ajax({
      url: nmota.ajaxurl,
      method: "POST",
      data: {
        action: "nmota_filter",
        category: category,
        format: format,
        order: order,
      },
      success: function (response) {
        const galleryGrid = document.querySelector(".gallery-grid");
        if (galleryGrid) {
          galleryGrid.innerHTML = response;
        }
      },
      error: function (error) {
        console.log("Erreur lors du filtrage:", error);
      },
    });
  }
});
