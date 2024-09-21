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

// Support des fonctionnalités du thème et des éléments HTML5.
function nmota_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Support du logo personnalisé avec flexibilité de hauteur et largeur
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Activation du support des éléments HTML5
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'nmota_supports');

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

    // Scripts et styles spécifiques pour la page d'accueil ou pour les articles de type "photo"
    if (is_front_page() || is_singular('photo')) {
        wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
        wp_enqueue_style('lightbox-custom-css', get_template_directory_uri() . '/assets/css/lightbox/lightbox-custom.css');
        wp_enqueue_script('lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), null, true);
        wp_enqueue_script('lightbox-custom-js', get_template_directory_uri() . '/assets/js/lightbox-custom.js', array('jquery', 'lightbox-js'), null, true);

        // Script de filtrage avec localisation pour AJAX
        wp_enqueue_script('filter-section', get_template_directory_uri() . '/assets/js/filter-section.js', array('jquery'), '1.0.0', true);
        wp_localize_script('nmota-filter', 'nmota', array('ajaxurl' => admin_url('admin-ajax.php')));

        // Script pour le chargement des photos "Load More" avec localisation pour AJAX
        wp_enqueue_script('nmota-load-more', get_template_directory_uri() . '/assets/js/load-more.js', array('jquery'), '1.0.0', true);
        wp_localize_script('nmota-load-more', 'nmota', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
}
add_action('wp_enqueue_scripts', 'nmota_enqueue_scripts');

// Inclusion de fichiers PHP supplémentaires.
require get_template_directory() . '/inc/load_lightbox_content.php';
require get_template_directory() . '/inc/ajax_filter_section.php';
require get_template_directory() . '/inc/load_more.php';
