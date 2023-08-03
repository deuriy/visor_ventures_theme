<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="main">

	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'loop-templates/content', 'page' );
	}
	?>

</main>

<?php
get_footer();
