<!-- Affichage du footer -->

<footer class="site-footer">
    <div class="footer-container">
        <!-- Navigation du menu footer -->
        <nav class="footer-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu',
            ));
            ?>
            <span class="footer-copyright"> Tous droits réservés</span>
        </nav>
    </div>
</footer>

<!-- Inclusion du modal de contact -->
<?php get_template_part('template-parts/contact-modal'); ?>

<?php wp_footer(); ?>
</body>

</html>