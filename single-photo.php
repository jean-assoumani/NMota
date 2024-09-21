<?php get_header(); ?>

<!-- 
Affichage d'une page individuelle pour une photo avec ses informations, interactions et suggestions
-->

<main class="site-main single-photo">
    <div class="content-wrapper">
        <!-- 
        Informations détaillées sur la photo : titre, référence, catégorie, format, type et date
        -->
        <div class="photo-info">
            <h1 class="photo-title"><?php the_title(); ?></h1>
            <ul class="photo-details">
                <li><strong>Réf. Photo:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'reference', true)); ?>
                </li>
                <li><strong>Catégorie:</strong>
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'categorie');
                    echo esc_html($categories[0]->name);
                    ?>
                </li>
                <li><strong>Format:</strong>
                    <?php
                    $formats = get_the_terms(get_the_ID(), 'format');
                    echo esc_html($formats[0]->name);
                    ?>
                </li>
                <li><strong>Type de photo:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'type', true)); ?>
                </li>
                <li><strong>Date de prise de vue:</strong> <?php echo get_the_date('j F Y'); ?></li>
            </ul>
        </div>

        <!-- 
        Affichage en taille réelle de la photo
        -->
        <div class="photo-display">
            <?php if (has_post_thumbnail()): ?>
                <div class="photo-container">
                    <a href="#" class="modal-trigger" data-post-id="<?php echo get_the_ID(); ?>">
                        <?php the_post_thumbnail('full', array('class' => 'photo-fullsize')); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- 
    Interactions utilisateur : contact et navigation entre les photos
    -->
    <div class="interaction-wrapper">
        <div class="contact-link">
            <span class="interest-text">Cette photo vous intéresse ?</span>
            <a href="#contactModal" class="btn open-contact-modal show-photo-ref"
                data-reference-id="<?php echo esc_attr(strtoupper(get_post_meta(get_the_ID(), 'reference', true))); ?>">
                Contact
            </a>
        </div>

        <div class="navigation-links">
            <div class="prev-photo">
                <div class="photo-thumbnail" id="prev-photo-thumbnail" style="display: none;"></div>
                <?php previous_post_link('%link', '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/website/photo_precedente.png" alt="Photo précédente">'); ?>
            </div>
            <div class="next-photo">
                <div class="photo-thumbnail" id="next-photo-thumbnail" style="display: none;"></div>
                <?php next_post_link('%link', '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/website/photo_suivante.png" alt="Photo suivante">'); ?>
            </div>
        </div>
    </div>

    <!-- 
    Suggestions de photos liées
    -->
    <section class="gallery-section">
        <div class="related-photo-section">
            <h3>Vous aimerez aussi</h3>
        </div>
        <?php get_template_part('template-parts/related-photo'); ?>
    </section>

</main>

<?php get_footer(); ?>