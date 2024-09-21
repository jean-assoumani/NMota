<?php get_header(); ?>

<!-- 
Affichage du contenu d'une page standard avec la boucle WordPress
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

<?php get_footer(); ?>