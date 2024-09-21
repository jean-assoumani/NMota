<div class="gallery-item lb-container">

    <!-- Bouton de fermeture de la lightbox.
         Permet de fermer la lightbox lorsqu'elle est ouverte. -->
    <div class="lb-closeContainer">
        <a href="#" class="lb-close"></a>
    </div>

    <!-- Lien d'ouverture de l'image dans la Lightbox.
         Lorsqu'on clique sur l'image, celle-ci s'ouvre dans une lightbox avec le titre et la catégorie. -->
    <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery"
        data-title="<span class='lightbox-title'><?php the_title(); ?></span><span class='lightbox-category'><?php echo (!empty($categories)) ? esc_html($categories[0]->name) : 'Non catégorisé'; ?></span>">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" width="564" height="495">
    </a>

    <!-- Icône pour ouverture en plein écran (Lightbox).
         Ajout d'une icône permettant de passer en plein écran dans la lightbox. -->
    <a href="<?php echo esc_url($image_url); ?>" data-lightbox="gallery"
        data-title="<span class='lightbox-title'><?php the_title(); ?></span><span class='lightbox-category'><?php echo (!empty($categories)) ? esc_html($categories[0]->name) : 'Non catégorisé'; ?></span>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox/fullscreen.svg"
            alt="Icône Plein écran" class="fullscreen-icon">
    </a>

    <!-- Lien vers la page dédiée pour les détails de l'image.
         Permet à l'utilisateur d'accéder à une page détaillée de l'image. -->
    <a href="<?php echo esc_url($permalink); ?>" class="view-details-link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lightbox/eye.svg"
            alt="Icône Voir les détails" class="view-details-icon">
    </a>

    <!-- Affichage du titre de l'image.
         Montre le titre de l'image juste en dessous de celle-ci. -->
    <div class="photo-title"><?php the_title(); ?></div>

    <!-- Affichage de la catégorie de l'image ou message "Non catégorisé" en fallback.
         Montre la catégorie associée à l'image, ou "Non catégorisé" si aucune catégorie n'est attribuée. -->
    <div class="photo-category">
        <?php if (!empty($categories)): ?>
            <?php echo esc_html($categories[0]->name); ?>
        <?php else: ?>
            Non catégorisé
        <?php endif; ?>
    </div>

</div>