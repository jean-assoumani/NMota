<?php
// Initialisation de la requête personnalisée

$custom_args = array(
    'post_type' => 'photo',
    'orderby' => 'rand',
    'posts_per_page' => 10,
);

$query_hero = new WP_Query($custom_args);
$image_found = false;
?>

<?php while ($query_hero->have_posts() && !$image_found): ?>
    <?php $query_hero->the_post(); ?>

    <?php if (has_post_thumbnail()): ?>
        <?php
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'full');
        $thumbnail_height = $thumbnail_src[2];

        // Affichage de l'image en background si sa hauteur ne dépasse pas 950px
        if ($thumbnail_height <= 950): ?>
            <div class="hero" style="background-image: url('<?php echo esc_url($thumbnail_src[0]); ?>');"></div>
            <?php $image_found = true; ?>
        <?php endif; ?>
    <?php endif; ?>

<?php endwhile; ?>

<?php

// Affichage d'une image par défaut si aucune image valide n'a été trouvée dans la requête
if (!$image_found): ?>
    <div class="hero" style="background-image: url('wp-content/themes/nmota/assets/images/galerie/let_s_party.jpg');"></div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>