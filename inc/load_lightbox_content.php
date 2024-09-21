<?php

// Fonction pour charger dynamiquement le contenu d'un post dans une lightbox via AJAX.
function load_lightbox_content()
{
    $post_id = intval($_POST['post_id']);

    if ($post_id) {
        $post = get_post($post_id);

        if ($post) {
            // Construction du contenu de la lightbox avec le titre et le contenu du post
            $content = '<h2>' . get_the_title($post) . '</h2>';
            $content .= '<div>' . apply_filters('the_content', $post->post_content) . '</div>';

            // Ajout des champs personnalisés "type" et "référence" si ACF est utilisé
            if (function_exists('get_field')) {
                $type = get_field('type', $post_id);
                $reference = get_field('reference', $post_id);

                $content .= '<p>Type : ' . esc_html($type) . '</p>';
                $content .= '<p>Référence : ' . esc_html($reference) . '</p>';
            }

            // Affichage du contenu généré pour la lightbox
            echo $content;
        } else {
            echo 'Contenu non trouvé.';
        }
    } else {
        echo 'ID de post invalide.';
    }

    // Fin propre de l'exécution AJAX
    wp_die();
}

/* Enregistrement des actions AJAX pour les utilisateurs connectés et non connectés.
   Ces actions permettent de gérer les requêtes AJAX pour charger le contenu de la lightbox. */
add_action('wp_ajax_load_lightbox_content', 'load_lightbox_content');
add_action('wp_ajax_nopriv_load_lightbox_content', 'load_lightbox_content');
