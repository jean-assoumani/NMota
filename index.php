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
</main>

<!-- 
Inclusion du pied de page
-->
<?php get_footer(); ?>