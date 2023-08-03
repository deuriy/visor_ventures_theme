<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
	$show_button = get_field('show_button', 'option');
	$button = get_field('button', 'option');
?>

<div class="wrapper">
	<header class="header">
    <div class="container header__container">
      <div class="header__left">
      	<a class="menu-hamburger header__menu-hamburger hidden-md" href="#mobile-navigation-popup" data-toggle-side-popup>
      		<span class="menu-hamburger__line"></span>
      		<span class="menu-hamburger__line"></span>
      		<span class="menu-hamburger__line"></span>
      	</a>

      	<?php
        $logo_img = '';
        if ($custom_logo_id = get_theme_mod('custom_logo')) :
          $logo_img = wp_get_attachment_image($custom_logo_id, 'full', false, array(
            'class'    => 'logo__img'
          ));
          ?>
          <a class="logo header__logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
            <?php echo $logo_img; ?>
          </a>
        <?php endif; ?>
      </div>

      <div class="header__right hidden-xxs">
      	<?php
        wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'container_class' => 'main-menu hidden-smMinus',
            'menu_class'      => 'main-menu__list',
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
          )
        );
        ?>

        <?php if ($show_button): ?>
        	<?php
        		$url = '';
        		$link_attributes = '';

        		if ($button['link_type'] === 'simple') {
        			$url = $button['url'];
        		} else {
        			$url = '#' . $button['popup_id'];
        			$link_attributes = ' data-toggle-side-popup';
        		}
        	?>

        	<?php if ($url && $button['text']): ?>
        		<a class="btn-default" href="<?php echo $url ?>"<?php echo $link_attributes ?>>
        			<?php echo $button['text'] ?>
        		</a>
        	<?php endif ?>
        <?php endif ?>
      </div>
    </div>
  </header>
