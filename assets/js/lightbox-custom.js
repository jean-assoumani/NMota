// Gestion de l'ouverture de la lightbox avec chargement dynamique du contenu via AJAX 

(function ($) {
  $(document).ready(function () {
    // Ouverture de la lightbox au clic sur un élément déclencheur avec récupération du contenu dynamique 
    $("body").on("click", ".lightbox-trigger", function (event) {
      event.preventDefault();

      var postId = $(this).data("post-id");

      // Vérification de la présence de l'ID du post pour charger le contenu
      if (postId) {
        $.ajax({
          url: ajaxurl,
          method: "POST",
          data: {
            action: "load_lightbox_content",
            post_id: postId,
          },
          success: function (response) {
            $("#lightbox-content").html(response);
            $("#lightboxOverlay").fadeIn();
            $("#lightbox-content").fadeIn();
          },
          error: function () {
            console.error("Erreur lors du chargement de la lightbox.");
          },
        });
      } else {
        console.error("ID de post manquant.");
      }
    });

    // Fermeture de la lightbox via bouton de fermeture ou clic sur l'overlay
    $("body").on("click", ".lb-close", function (event) {
      event.preventDefault();
      $("#lightboxOverlay").fadeOut();
      $("#lightbox-content").fadeOut();
    });

    $("#lightboxOverlay").on("click", function (event) {
      event.preventDefault();
      $(this).fadeOut();
      $("#lightbox-content").fadeOut();
    });
  });
})(jQuery);
