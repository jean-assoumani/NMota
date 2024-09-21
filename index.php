<!-- 
Affichage du contenu principal de la page d'accueil avec gestion des articles
-->

<main class="site-main">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php
        endwhile;
    endif;

    ?>

    <!-- 
    Inclusion des sections spécifiques pour la page d'accueil : Hero, filtres et galerie
    -->
    <?php
    if (is_front_page()) {
        get_template_part('template-parts/hero');
        get_template_part('template-parts/filter-section');
        get_template_part('template-parts/gallery-grid');
    }
    ?>
</main>

<!-- 
Inclusion du pied de page
-->
<?php get_footer(); ?>