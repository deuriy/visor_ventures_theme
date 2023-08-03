<?php
  $infoblocks = $field['infoblock'];

  // print_arr($infoblocks);
?>

<?php if ($infoblocks): ?>
  <div class="infoblocks-section">
    <div class="container">
      <div class="infoblocks-section__items">
        <?php foreach ($infoblocks as $key => $infoblock): ?>
          <?php
            $block_type = $infoblock['block_type'];
            $title = $infoblock['title'];
            $text = $infoblock['text'];
            $image = wp_get_attachment_image( $infoblock['image'], 'full', false, [
              'class' => 'infoblock__img'
            ] );
            // print_arr($image);
          ?>

          <?php if ($block_type !== 'more_link_box'): ?>
            <?php
              $infoblock_classes = ' infoblock--' . str_replace('_', '-', $block_type);

              switch ($key) {
                case 0:
                  $infoblock_classes .= ' infoblocks-section__item--two-col infoblocks-section__item--two-rows';
                  break;
                case 1:
                  $infoblock_classes .= ' infoblocks-section__item--two-col';
                default:
                  // code...
                  break;
              }
            ?>

            <div class="infoblock infoblocks-section__item<?php echo $infoblock_classes ?>">
              <div class="infoblock__text-wrapper">
                <?php if ($title): ?>
                  <h3 class="infoblock__title">
                    <?php echo $title ?>
                  </h3>
                <?php endif ?>

                <?php if ($text): ?>
                  <div class="infoblock__text">
                    <?php echo $text ?>
                  </div>
                <?php endif ?>
              </div>

              <?php if ($image): ?>
                <?php echo $image ?>
              <?php endif ?>
            </div>
          <?php else: ?>
            <a class="more-link-box" href="<?php echo $infoblock['url'] ?>">
              <?php echo $title ?>
            </a>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <?php endif ?>