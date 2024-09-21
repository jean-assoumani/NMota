<?php

// Fonction pour gérer la requête AJAX permettant de charger dynamiquement des photos.
function mota_photo_load_more_photos()
{
    $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Définition des arguments pour la requête WP_Query afin de récupérer les photos
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
    );

    // Exécution de la requête WP_Query pour récupérer les photos
    $photo_query = new WP_Query($args);

    // Vérification de l'existence des photos, génération du HTML pour chaque élément de la galerie
    if ($photo_query->have_posts()):
        while ($photo_query->have_posts()):
            $photo_query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $permalink = get_permalink();
            $categories = get_the_terms(get_the_ID(), 'categorie');

            // Transfert des variables à la partie du template qui génère les vignettes de la galerie
            set_query_var('image_url', $image_url);
            set_query_var('permalink', $permalink);
            set_query_var('categories', $categories);

            // Chargement du template pour l'affichage d'un élément de la galerie
            get_template_part('template-parts/gallery-item');

        endwhile;

        // Réinitialisation des données de la requête WP pour éviter les conflits
        wp_reset_postdata();
    else:
        // Renvoi de la chaîne "end" lorsqu'il n'y a plus de photos à charger
        echo "end";
    endif;

    // Terminaison propre de la requête AJAX
    die();
}

/* Enregistrement des actions AJAX pour les utilisateurs connectés et non connectés.
   Cela permet de charger plus de photos dynamiquement via AJAX. */
add_action('wp_ajax_nopriv_mota_photo_load_more_photos', 'mota_photo_load_more_photos');
add_action('wp_ajax_mota_photo_load_more_photos', 'mota_photo_load_more_photos');
