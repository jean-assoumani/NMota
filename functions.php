<?php
function nmota_enqueue_scripts()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'nmota_enqueue_scripts');