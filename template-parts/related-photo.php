<!-- Affichage des photos liées aux mêmes catégories -->

<div class="gallery-grid">
    <?php
    // Récupération de l'ID de la photo actuelle et des catégories associées
    $current_photo_id = get_the_ID();
    $current_categories = wp_get_post_terms($current_photo_id, 'categorie');

    // Vérification de la présence de catégories pour la photo actuelle
    if (!empty($current_categories)) {
        $category_ids = wp_list_pluck($current_categories, 'term_id'); // Extraction des IDs des catégories
    
        // Arguments pour récupérer 2 photos maximum dans les mêmes catégories, en excluant la photo actuelle
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 2,
            'post__not_in' => array($current_photo_id), 
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'term_id',
                    'terms' => $category_ids, // Filtrage par catégories communes
                ),
            ),
        );

        $photo_query = new WP_Query($args);

        // Affichage des photos correspondantes
        if ($photo_query->have_posts()):
            while ($photo_query->have_posts()):
                $photo_query->the_post();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $permalink = get_permalink();
                $categories = get_the_terms(get_the_ID(), 'categorie');
                ?>
                <!-- Inclusion du template-part pour chaque photo liée -->
                <?php require('gallery-item.php'); ?>
                <?php
            endwhile;

            // Réinitialisation de la requête WP pour éviter les conflits
            wp_reset_postdata();
        else:
            // Message affiché si aucune photo correspondante n'est trouvée
            echo '<p class="alerte">Aucune photo trouvée dans la même catégorie.</p>';
        endif;
    } else {
        // Message affiché si la photo actuelle n'a pas de catégories associées
        echo '<p class="alerte">Cette photo n\'appartient à aucune catégorie.</p>';
    }
    ?>
</div>

<!-- Clear flottants pour garantir un bon alignement des éléments de la grille -->
<div style="clear: both;"></div>