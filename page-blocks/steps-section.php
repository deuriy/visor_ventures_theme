<?php
  $title = $field['title'];
  $text = $field['text'];
  $steps = $field['steps'];
?>

<section class="steps-section main__section">
  <div class="container steps-section__container">
    <div class="steps-section__text-wrapper">
      <?php if ($title): ?>
        <h2 class="steps-section__title">
          <?php echo $title ?>
        </h2>
      <?php endif ?>

      <?php if ($text): ?>
        <div class="steps-section__text">
          <?php echo $text ?>
        </div>
      <?php endif ?>
    </div>

    <?php if ($steps): ?>
      <div class="steps">
        <?php foreach ($steps as $step): ?>
          <?php
            $subtitle = $step['subtitle'];
            $title = $step['title'];
            $text = $step['text'];
          ?>

          <div class="steps__item">
            <?php if ($subtitle): ?>
              <h4 class="steps__item-subtitle">
                <?php echo $subtitle ?>
              </h4>
            <?php endif ?>

            <?php if ($title || $text): ?>
              <div class="steps__item-wrapper">
                <?php if ($title): ?>
                  <h3 class="steps__item-title">
                    <?php echo $title ?>
                  </h3>
                <?php endif ?>

                <?php if ($text): ?>
                  <div class="steps__item-text">
                    <?php echo $text ?>
                  </div>
                <?php endif ?>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
</section>