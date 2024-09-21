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

<?php wp_footer(); ?>

</body>

</html>