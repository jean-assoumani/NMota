<?php

// Déclaration des menus de navigation pour le thème.
function nmota_menus()
{
    register_nav_menus(array(
        'primary-menu' => __('Menu principal', 'nmota'),
        'footer-menu' => __('Menu footer', 'nmota'),
    ));
}
add_action('init', 'nmota_menus');

// Enregistrement des styles et scripts du thème.
// Inclut les fichiers CSS et JS nécessaires, ainsi que les dépendances spécifiques à certaines pages.
function nmota_enqueue_scripts()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme/style.min.css');
    wp_enqueue_script('jquery'); // Enregistrement de jQuery

    // Inclusion de scripts spécifiques du thème
    wp_enqueue_script('nmota-menu-toggle', get_template_directory_uri() . '/assets/js/menu-toggle.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'nmota_enqueue_scripts');