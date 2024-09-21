<!-- Affichage de la grille de photos pour la galerie avec chargement AJAX -->

<div class="gallery-grid">
    <?php
    // Arguments pour récupérer les premières photos (8 par page)
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
    );

    // Exécution de la requête pour récupérer les photos
    $photo_query = new WP_Query($args);

    // Vérification de l'existence des photos, puis affichage de chaque élément de la galerie
    if ($photo_query->have_posts()):
        while ($photo_query->have_posts()):
            $photo_query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $permalink = get_permalink();
            $categories = get_the_terms(get_the_ID(), 'categorie');

            // Chargement du template de chaque élément de la galerie
            require('gallery-item.php');
        endwhile;

        // Réinitialisation de la requête WP pour éviter les conflits
        wp_reset_postdata();
    else:
        // Message d'erreur si aucune photo n'est trouvée
        echo '<p>Aucune photo trouvée.</p>';
    endif;
    ?>
</div>

<div style="clear: both;"></div>

<!-- Bouton pour charger plus de photos via AJAX -->
<div class="load-more-container">
    <button class="btn load-more" data-page="1"
        data-ajaxurl="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">Charger plus</button>
</div>