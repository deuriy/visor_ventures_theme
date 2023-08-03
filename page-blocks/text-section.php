<?php
  $title = $field['title'];
  $text = $field['text'];
  $button = $field['button_button'];
  $image_id = $field['image'];
  $image = wp_get_attachment_image( $image_id, 'full', false, [
    'class' => 'text-section__img'
  ] );

  // print_arr($button);

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

<section class="text-section main__section">
  <div class="container text-section__container">
    <div class="text-section__text-wrapper">
      <?php if ($title): ?>
        <h1 class="text-section__title">
          <?php echo $title ?>
        </h1>
      <?php endif ?>

      <?php if ($text): ?>
        <div class="text-section__text">
          <?php echo $text ?>
        </div>
      <?php endif ?>

      <?php if ($url && $button['text']): ?>
        <a class="btn-danger text-section__btn" href="<?php echo $url ?>"<?php echo $link_attributes ?>>
          <?php echo $button['text'] ?>
        </a>
      <?php endif ?>
    </div>

    <?php if ($image): ?>
      <?php echo $image ?>
    <?php endif ?>
  </div>
</section>