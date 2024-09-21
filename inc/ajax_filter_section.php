<?php

// Fonction pour gérer le filtrage des photos via une requête AJAX.
function nmota_filter_photos()
{
    // Récupération et sécurisation des paramètres envoyés par l'utilisateur via AJAX
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';

    // Construction des arguments pour la requête WP_Query afin de récupérer les photos
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => $order,
    );

    // Initialisation de la requête taxonomique avec une relation "AND" pour filtrer par catégories et formats
    $tax_query = array('relation' => 'AND');

    // Ajout d'un filtre par catégorie si l'utilisateur en a sélectionné une
    if ($category) {
        $tax_query[] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    // Ajout d'un filtre par format si l'utilisateur en a sélectionné un
    if ($format) {
        $tax_query[] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    // Intégration de la tax_query dans les arguments WP_Query si des filtres sont appliqués
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    // Exécution de la requête WP_Query pour récupérer les photos en fonction des filtres
    $photo_query = new WP_Query($args);

    // Génération dynamique du HTML des vignettes si des photos sont trouvées
    if ($photo_query->have_posts()) {
        while ($photo_query->have_posts()):
            $photo_query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $permalink = get_permalink();
            $categories = get_the_terms(get_the_ID(), 'categorie');
            ?>
            <div class="gallery-item">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" width="564" height="495">
                <a href="<?php echo esc_url($image_url); ?>" class="lightbox-link" data-lightbox="gallery">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox/fullscreen.svg"
                        alt="Icône Plein écran" class="fullscreen-icon">
                </a>
                <a href="<?php echo esc_url($permalink); ?>" class="view-details-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox/eye.svg"
                        alt="Icône Voir les détails" class="view-details-icon">
                </a>
                <div class="photo-title"><?php the_title(); ?></div>
                <div class="photo-category">
                    <?php if (!empty($categories)): ?>
                        <?php echo esc_html($categories[0]->name); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endwhile;
    } else {
        echo '<p>Aucune photo trouvée.</p>';
    }

    // Réinitialisation de la requête WP pour éviter les conflits avec d'autres requêtes
    wp_reset_postdata();

    // Terminaison propre de la requête AJAX
    die();
}

// Enregistrement des actions AJAX pour gérer les utilisateurs connectés et non connectés
add_action('wp_ajax_nmota_filter', 'nmota_filter_photos');
add_action('wp_ajax_nopriv_nmota_filter', 'nmota_filter_photos');
