<?php
/*
Affichage des pages individuelles avec gestion des types de contenu (photos et autres)
*/

get_header(); ?>

<?php
// 
// Gestion du type de contenu pour afficher un template spécifique si c'est une photo
//
if (get_post_type() === 'photo') {
	require_once('single-photo.php');
} else {
	// 
	// Affichage alternatif pour les autres types de posts
	//
	while (have_posts()):
		the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php
	endwhile;
}
?>

<?php get_footer(); ?>