<?php
  $title = $field['title'];
  $advantages = $field['advantage_box'];
?>

<section class="advantages-section main__section">
  <div class="container advantages-section__container">
    <?php if ($title): ?>
      <h2 class="advantages-section__title">
        <?php echo $title ?>
      </h2>
    <?php endif ?>

    <?php if ($advantages): ?>
      <div class="advantages-section__items">
        <?php foreach ($advantages as $key => $advantage): ?>
          <?php
            $additional_classes = $key === 0 || $key === 3 ? ' advantage-box--large' : '';
            $number = $advantage['number'];
            $title = $advantage['title'];
            $text = $advantage['text'];
          ?>

          <div class="advantage-box advantages-section__item<?php echo $additional_classes ?>">
            <?php if ($number): ?>
              <div class="advantage-box__number">
                <?php echo $number ?>
              </div>
            <?php endif ?>

            <?php if ($title): ?>
              <h3 class="advantage-box__title">
                <?php echo $title ?>
              </h3>
            <?php endif ?>

            <?php if ($text): ?>
              <div class="advantage-box__text">
                <?php echo $text ?>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
        
        <!-- <div class="advantage-box advantages-section__item">
          <div class="advantage-box__number">/02</div>
          <h3 class="advantage-box__title">We think in decades</h3>
          <div class="advantage-box__text">
            <p>We invest for the long term. We believe building iconic businesses takes the best part of a decade or longer.</p>
          </div>
        </div>
        <div class="advantage-box advantages-section__item">
          <div class="advantage-box__number">/03</div>
          <h3 class="advantage-box__title">We are partners</h3>
          <div class="advantage-box__text">
            <p>We don't just write cheques but are partners to our portfolio companies. We ride the highs and lows with our portfolio companies.</p>
          </div>
        </div>
        <div class="advantage-box advantage-box--large advantages-section__item">
          <div class="advantage-box__number">/04</div>
          <h3 class="advantage-box__title">We are transparent and fair</h3>
          <div class="advantage-box__text">
            <p>We believe that our reputation, as a firm and as individuals, is paramount. We honor our commitments and always act in the best interest of every stakeholder creating outcomes that are fair, just and honest.</p>
          </div>
        </div> -->
      </div>
    <?php endif ?>
  </div>
</section>