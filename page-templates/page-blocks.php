<?php
/**
 * Template Name: Page Blocks
 *
 * Template for displaying a page with custom ACF Blocks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="main">
	<?php render_page_layouts(get_field('page_blocks')); ?>
</main>

<?php
get_footer();
