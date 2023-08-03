<?php
  $title = $field['title'];
  $clients = $field['clients'];
?>

<?php if ($title || $clients): ?>
  <section class="portfolio-slider-section main__section">
    <div class="container">
      <div class="portfolio-slider-section__header">
        <?php if ($title): ?>
          <h2 class="portfolio-slider-section__title">
            <?php echo $title ?>
          </h2>
        <?php endif ?>

        <div class="portfolio-slider-section__swiper-buttons">
          <button class="arrow-button arrow-button--prev portfolio-slider-section__prev-btn" type="button"></button>
          <button class="arrow-button arrow-button--next portfolio-slider-section__next-btn" type="button"></button>
        </div>
      </div>

      <?php if ($clients): ?>
        <div class="portfolio-slider swiper-container">
          <div class="swiper-wrapper portfolio-slider__slides">
            <?php foreach ($clients as $key => $client_id): ?>
              <?php
                $title = get_the_title($client_id);
                $logo_id = get_field('logo', $client_id);
                $logo = wp_get_attachment_image( $logo_id, 'full', false, [
                  'class' => 'client-logo__img'
                ] );
                $additional_classes = get_field('show_exited_tag', $client_id) ? ' client-logo--exited' : '';
                $note = get_field('note', $client_id);
                $text = get_field('text', $client_id);
              ?>

              <div class="swiper-slide portfolio-slider__slide">
                <div class="client-accordion-panel client-accordion-panel--opened portfolio-slider__accordion-panel" data-slide-index="0">
                  <a class="client-accordion-panel__short" href="#">
                    <h3 class="client-accordion-panel__short-title">
                      <?php echo $title ?>
                    </h3>
                  </a>

                  <div class="client-accordion-panel__full">
                    <div class="client-accordion-panel__text-wrapper">
                      <h3 class="client-accordion-panel__title">
                        <?php echo $title ?>
                      </h3>

                      <?php if ($note): ?>
                        <div class="client-accordion-panel__note">
                          <?php echo $note ?>
                        </div>
                      <?php endif ?>

                      <?php if ($text): ?>
                        <div class="client-accordion-panel__text">
                          <?php echo $text ?>
                        </div>
                      <?php endif ?>

                      <?php
                        $button = get_field('link', $client_id)['button'];

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
                        <a class="client-accordion-panel__more-link" href="<?php echo $url ?>"<?php echo $link_attributes ?>>
                          <?php echo $button['text'] ?>
                        </a>
                      <?php endif ?>
                    </div>

                    <?php if ($logo): ?>
                      <div class="client-logo client-accordion-panel__logo<?php echo $additional_classes ?>">
                        <?php echo $logo ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </section>
<?php endif ?>