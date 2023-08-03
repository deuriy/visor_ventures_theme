<?php
  $title = $field['title'];
  $clients = $field['clients'];
?>

<?php if ($title || $clients): ?>
  <section class="portfolio-section main__section">
    <div class="container">
      <?php if ($title): ?>
        <h2 class="portfolio-section__title">
          <?php echo $title ?>
        </h2>
      <?php endif ?>

      <?php if ($clients): ?>
        <div class="portfolio-section__items">
          <?php foreach ($clients as $client_id): ?>
            <?php
              $permalink = get_the_permalink( $client_id );
              $client_title = get_the_title( $client_id );
              $additional_classes = get_field('show_exited_tag', $client_id) ? ' client-logo--exited' : '';
              $logo_id = get_field('logo', $client_id);
              $logo = wp_get_attachment_image( $logo_id, 'full', false, [
                'class' => 'client-logo__img'
              ] );
              $note = get_field('note', $client_id);
            ?>

            <a class="client-box portfolio-section__item" href="<?php echo $permalink ?>">
              <?php if ($logo): ?>
                <div class="client-logo client-logo--small<?php echo $additional_classes ?>">
                  <?php echo $logo ?>
                </div>
              <?php endif ?>

              <?php if ($client_title || $note): ?>
                <div class="client-box__text-wrapper">
                  <?php if ($client_title): ?>
                    <h3 class="client-box__title">
                      <?php echo $client_title ?>
                    </h3>
                  <?php endif ?>

                  <?php if ($note): ?>
                    <div class="client-box__text">
                      <?php echo $note ?>
                    </div>
                  <?php endif ?>
                </div>
              <?php endif ?>
            </a>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  </section>
<?php endif ?>