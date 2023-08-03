<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$logo_id = get_field('logo');
$logo = wp_get_attachment_image( $logo_id, 'full', false, [
	'class' => 'client-logo__img'
] );

$additional_classes = get_field('show_exited_tag') ? ' client-logo--exited' : '';
$note = get_field('note');
$text = get_field('text');
$button = get_field('button');

?>

<section class="client-section">
  <div class="container client-section__container">
    <div class="client-section__text-wrapper">
      <h1 class="client-section__title"><?php the_title() ?></h1>

      <?php if ($note): ?>
	      <div class="client-section__note">
	      	<?php echo $note ?>
	      </div>
      <?php endif ?>

      <?php if ($text): ?>
	      <div class="client-section__text">
	      	<?php echo $text ?>
	      </div>
      <?php endif ?>

      <?php if ($button['url'] && $button['text']): ?>
      	<a class="btn-danger btn-danger--client-section client-section__btn" href="<?php echo $button['url'] ?>">
      		<?php echo $button['text'] ?>
      	</a>
      <?php endif ?>
    </div>

    <?php if ($logo): ?>
    	<div class="client-logo client-section__logo<?php echo $additional_classes ?>">
    		<?php echo $logo ?>
    	</div>
    <?php endif ?>
  </div>
</section>

<?php render_page_layouts(get_field('page_blocks')); ?>

<?php
get_footer();
