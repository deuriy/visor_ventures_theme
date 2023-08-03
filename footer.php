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
$privacy_link = get_field('privacy_link', 'option');

$popups = get_field('popups', 'option');

// print_arr($popups);

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
    	<?php if (get_field('show_privacy_link', 'option') && $privacy_link['url'] && $privacy_link['text']): ?>
    		<a class="footer__link" href="<?php echo $privacy_link['url'] ?>">
    			<?php echo $privacy_link['text'] ?>
    		</a>
    	<?php endif ?>

    	<?php if ($copyright): ?>
	      <div class="footer__copyright">
	      	<?php echo $copyright ?>
	      </div>
    	<?php endif ?>
    </div>
  </div>
</footer>

</div>

<div class="side-popup side-popup--no-header" id="mobile-navigation-popup">
  <div class="side-popup__overlay"></div>
  <div class="side-popup__inner">
  	<a class="side-popup__close-btn" href="#"></a>
    <div class="side-popup__body">
      <div class="side-popup__menu-wrapper">
        <?php
	        wp_nav_menu(
	          array(
	            'theme_location'  => 'primary',
	            'container_class' => 'main-menu',
	            'menu_class'      => 'main-menu__list',
	            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
	          )
	        );
        ?>
        <a class="btn-default" href="#get-investment-popup" data-toggle-side-popup>Get investment</a>
      </div>
    </div>
  </div>
</div>

<?php foreach ($popups as $popup): ?>
	<?php
		$popup_id = $popup['popup_id'];
		$show_header = $popup['show_header'];
		$title = $popup['title'];
		$cf_shortcode = $popup['cf_shortcode'];
		$additional_classes = !$show_header ? ' side-popup--no-header' : '';
	?>

	<div class="side-popup<?php echo $additional_classes ?>" id="<?php echo $popup_id ?>">
	  <div class="side-popup__overlay"></div>
	  <div class="side-popup__inner">
	  	<a class="side-popup__close-btn" href="#"></a>

	  	<?php if ($show_header): ?>
		    <div class="side-popup__header">

		    	<?php if ($title): ?>
		      	<h2 class="side-popup__title">
		      		<?php echo $title ?>
		      	</h2>
		    	<?php endif ?>
		    </div>
	  	<?php endif ?>

	    <div class="side-popup__body">
	    	<?php echo do_shortcode( $cf_shortcode ) ?>
	    </div>
	  </div>
	</div>
<?php endforeach ?>

<?php wp_footer(); ?>

</body>

</html>

