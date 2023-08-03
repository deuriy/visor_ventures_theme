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
?>

<footer class="footer">
  <div class="footer__top">
    <div class="container footer__container"><a class="logo" href="/" title="На главную"><img class="logo__img" src="/img/logo_white.svg" alt="Logo"></a>
      <div class="contacts footer__contacts">
        <ul class="contacts__list">
          <li class="contacts__item"><a class="contacts__link" href="tel:+971045715000"><span class="ico ico--circle ico--phone"></span><span class="contacts__text">+971 (0) 4 571 5000</span></a></li>
          <li class="contacts__item"><a class="contacts__link" href="mailto:info@visorventures.com"><span class="ico ico--circle ico--email"></span><span class="contacts__text">info@visorventures.com</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container footer__container"><a class="footer__link" href="/privacy_policy.html">Privacy Policy</a>
      <div class="footer__copyright">
        <p>© 2023. Visor Ventures AFS License No: 46389. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

