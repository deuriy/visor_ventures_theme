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
	    	
	      <!-- <form class="investment-form side-popup__investment-form" action="#"> -->
	        <!-- <div class="investment-form__items">
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="first_name">First name<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="text" name="first_name" id="first_name" required>
	          </div>
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="last_name">Last name<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="text" name="last_name" id="last_name" required>
	          </div>
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="company_name">Your company’s name<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="text" name="company_name" id="company_name" required>
	          </div>
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="website_link">A website link</label>
	            <input class="form-text investment-form__form-text" type="text" name="website_link" id="website_link">
	          </div>
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="email_address">Email address<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="email" name="email_address" id="email_address" required>
	          </div>
	          <div class="investment-form__item">
	            <label class="form-label investment-form__label" for="company_location">Location of your company<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="text" name="company_location" id="company_location" required>
	          </div>
	          <div class="investment-form__item investment-form__item--2col">
	            <label class="form-label investment-form__label" for="problem_solving">Let’s talk about your idea. What problem is your company solving?<sup class="red">*</sup></label>
	            <textarea class="form-textarea form-textarea--large investment-form__form-textarea" name="problem_solving" id="problem_solving" required></textarea>
	          </div>
	          <div class="investment-form__item investment-form__item--2col">
	            <label class="form-label investment-form__label" for="your_vision">What’s the vision you have for this company?<sup class="red">*</sup></label>
	            <textarea class="form-textarea form-textarea--large investment-form__form-textarea" name="your_vision" id="your_vision" required></textarea>
	          </div>
	          <div class="investment-form__item investment-form__item--2col">
	            <label class="form-label investment-form__label" for="your_progress">What traction / progress have you made so far towards this vision?<sup class="red">*</sup></label>
	            <textarea class="form-textarea form-textarea--large investment-form__form-textarea" name="your_progress" id="your_progress" required></textarea>
	          </div>
	          <div class="investment-form__item investment-form__item--2col">
	            <label class="form-label investment-form__label" for="about_you">What should we know about you and your team?<sup class="red">*</sup></label>
	            <textarea class="form-textarea form-textarea--large investment-form__form-textarea" name="about_you" id="about_you" required></textarea>
	          </div>
	          <div class="investment-form__item investment-form__item--2col">
	            <label class="form-label investment-form__label" for="linkedin_profile_url">Your LinkedIn Profile URL<sup class="red">*</sup></label>
	            <input class="form-text investment-form__form-text" type="text" name="linkedin_profile_url" id="linkedin_profile_url" required>
	          </div>
	        </div>
	        <div class="investment-form__actions">
	          <button class="btn-danger investment-form__submit-btn" type="submit">Submit</button>
	        </div> -->
	      <!-- </form> -->
	    </div>
	  </div>
	</div>
<?php endforeach ?>

<?php wp_footer(); ?>

</body>

</html>

