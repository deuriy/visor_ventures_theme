<?php
  $title = $field['title'];
  $cf_shortcode = $field['cf_shortcode'];
  $contacts = $field['contacts'];
?>

<section class="contacts-section">
  <div class="container contacts-section__container">
    <div class="contacts-section__text-wrapper">
      <?php if ($title): ?>
        <h1 class="page-title contacts-section__title">
          <?php echo $title ?>
        </h1>
      <?php endif ?>

      <?php if ($contacts): ?>
        <div class="contacts-list">
          <ul class="contacts-list__items">
            <?php foreach ($contacts as $contact): ?>
              <?php
                $contact_type = $contact['contact_type'];
                $label = $contact['label'];
                $value = $contact['value'];
                $url = $contact_type === 'email' ? 'mailto:' . $value : 'tel:+' . $value;
              ?>

              <li class="contacts-list__item">
                <?php if ($label): ?>
                  <h3 class="contacts-list__title">
                    <?php echo $label ?>
                  </h3>
                <?php endif ?>

                <?php if ($value): ?>
                  <a class="contacts-list__link" href="<?php echo $url ?>">
                    <?php echo $value ?>
                  </a>
                <?php endif ?>
              </li>
            <?php endforeach ?>
            </li>
          </ul>
        </div>
      <?php endif ?>
    </div>

    <?php if ($cf_shortcode): ?>
      <div class="contacts-section__form-wrapper">
        <?php echo do_shortcode( $cf_shortcode ) ?>
      </div>
    <?php endif ?>
  </div>
</section>