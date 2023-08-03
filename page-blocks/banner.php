<?php
  $style = $field['style'];
  $banner_classes = ' banner--' . $style . '-bg';
  $title = $field['title'];
  $text = $field['text'];
  $button = $field['button_button'];
  $button_classes = $style === 'red' ? ' btn-outline' : ' btn-danger btn-danger--text-section';

  $image_id = $field['image'];
  $image = wp_get_attachment_image( $image_id, 'full', false, [
    'class' => 'banner__img'
  ] );
?>

<section class="banner main__section<?php echo $banner_classes ?>">
  <div class="container">
    <div class="banner__inner">
      <?php if ($title): ?>
        <h2 class="banner__title">
          <?php echo $title ?>
        </h2>
      <?php endif ?>

      <div class="banner__wrapper">
        <div class="banner__text-and-btn">

          <?php if ($text): ?>
            <div class="banner__text">
              <?php echo $text ?>
            </div>
          <?php endif ?>

          <?php
            $url = '';
            $link_attributes = '';

            if ($button['link_type'] === 'simple') {
              $url = $button['url'];
              $link_attributes = ' target="_blank"';
            } else {
              $url = '#' . $button['popup_id'];
              $link_attributes = ' data-toggle-side-popup';
            }
          ?>

          <?php if ($url && $button['text']): ?>
            <a class="banner__btn<?php echo $button_classes ?>" href="<?php echo $url ?>"<?php echo $link_attributes ?>>
              <?php echo $button['text'] ?>
            </a>
          <?php endif ?>
        </div>

        <?php if ($image): ?>
          <?php echo $image ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>