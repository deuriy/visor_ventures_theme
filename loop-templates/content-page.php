<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$thumbnail = get_the_post_thumbnail( $post->ID, 'large', [
	'class' => 'text-section__img'
] );
$additional_classes = !$thumbnail ? ' text-section--one-col' : '';
?>


<article class="text-section main__section<?php echo $additional_classes ?>">
	<div class="container text-section__container">
		<div class="text-section__text-wrapper">
      <?php if ( ! is_front_page() ) {
				the_title(
					'<h1 class="text-section__title">', '</h1>'
				);
			} ?>

      <div class="text-section__text">
        <?php the_content(); ?>
      </div>

      <!-- <a class="btn-danger text-section__btn" href="#">Find Out More</a> -->
    </div>

    <?php echo $thumbnail; ?>
	</div>
</article>
