<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// $container = get_theme_mod( 'understrap_container_type' );

$logo_id = get_field('footer_logo', 'option');
$logo = wp_get_attachment_image( $logo_id, 'full', false, [
	'class' => 'logo__img'
] );

$contacts = get_field('contacts', 'option');
$copyright = get_field('copyright', 'option');

// print_arr($contacts);
?>

<footer class="footer">
  <div class="footer__top">
    <div class="container footer__container">
    	<?php if ($logo): ?>
	    	<a class="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
	    		<?php echo $logo ?>
	    	</a>
    	<?php endif ?>

    	<?php if ($contacts): ?>
	      <div class="contacts footer__contacts">
	        <ul class="contacts__list">
	        	<?php foreach ($contacts as $contact): ?>
	        		<?php
	        			$prefix = $contact['contact_type'] === 'phone' ? 'tel:+' : 'mailto:';
	        		?>

		          <li class="contacts__item">
		          	<a class="contacts__link" href="<?php echo $prefix . $contact['value'] ?>">
		          		<span class="ico ico--circle ico--<?php echo $contact['contact_type'] ?>"></span>
		          		<span class="contacts__text"><?php echo $contact['value'] ?></span>
		          	</a>
		          </li>
	        	<?php endforeach ?>
	        </ul>
	      </div>
    	<?php endif ?>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container footer__container">
    	<a class="footer__link" href="/privacy_policy.html">Privacy Policy</a>

    	<?php if ($copyright): ?>
	      <div class="footer__copyright">
	      	<?php echo $copyright ?>
	      </div>
    	<?php endif ?>
    </div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>

