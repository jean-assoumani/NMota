<?php get_header(); ?>

<main class="site-main">

    <!--
  Affichage du visuel principal avec un titre (Hero Section)
  Appel du template-part dédié au Hero.
-->

    <section class="hero">
        <div class="hero-content">
            <h1>Photographe Event</h1>
        </div>
        <?php get_template_part('template-parts/hero'); ?>
    </section>

    <!--
  Interface pour filtrer le contenu (Filter Section)
  Appel du template-part dédié aux filtres.
-->

    <section class="filter-section">
        <?php get_template_part('template-parts/filter-section'); ?>
    </section>

    <!--
  Affichage de la galerie de photos (Gallery Section)
  Appel du template-part dédié à la galerie.
-->

    <section class="gallery-section">
        <?php get_template_part('template-parts/gallery-grid'); ?>
    </section>

</main>

<?php get_footer(); ?>