<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="header-container">

            <!-- 
            Logo avec un lien vers la page d'accueil
            -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/website/logo_du_site.png"
                        alt="<?php bloginfo('name'); ?>">
                </a>
            </div>

            <!-- 
            Menu de navigation principal et gestion du menu mobile
            -->
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                ));
                ?>

                <div class="hamburger-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                <div class="mobile-menu">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a></li>
                        <li><a href="<?php echo esc_url(home_url('/a-propos')); ?>">À propos</a></li>
                        <li class="contact-link"><a href="<?php echo esc_url(home_url('/#contact')); ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>