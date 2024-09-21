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

</main>

<?php get_footer(); ?>