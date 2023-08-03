<?php
  $title = $field['title'];
  $text = $field['text'];
  $button = $field['button'];

  $image_id = $field['image'];
  $image = wp_get_attachment_image( $image_id, 'full', false, [
    'class' => 'banner__img'
  ] );
?>

<section class="banner main__section">
  <div class="container">
    <div class="banner__inner">
      <h2 class="banner__title">Get Investment</h2>
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
            } else {
              $url = '#' . $button['popup_id'];
              $link_attributes = ' data-toggle-side-popup';
            }
          ?>

          <?php if ($url && $button['text']): ?>
            <a class="btn-outline banner__btn" href="<?php echo $url ?>"<?php echo $link_attributes ?>>
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