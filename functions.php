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
function nmota_enqueue_scripts()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme/style.min.css');
    wp_enqueue_script('jquery'); // Enregistrement de jQuery

    // Inclusion de scripts spécifiques du thème
    wp_enqueue_script('nmota-menu-toggle', get_template_directory_uri() . '/assets/js/menu-toggle.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('contact-modal-script', get_template_directory_uri() . '/assets/js/contact-modal.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('thumbnails', get_template_directory_uri() . '/assets/js/thumbnails.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ref-photo', get_template_directory_uri() . '/assets/js/ref-photo.js', array('jquery'), '1.0.0', true);

    // Script pour le chargement des photos "Load More" avec localisation pour AJAX
    wp_enqueue_script('nmota-load-more', get_template_directory_uri() . '/assets/js/load-more.js', array('jquery'), '1.0.0', true);
    wp_localize_script('nmota-load-more', 'nmota', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'nmota_enqueue_scripts');

// Inclusion de fichiers PHP supplémentaires.
require get_template_directory() . '/inc/load_more.php';
