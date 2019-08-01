	<footer class="footer" id="footer">
      <div class="l-container">
        <div class="footer-nav__wrapper">
          <?php wp_nav_menu( [
            'theme_location'  => 'footer_menu_part_one',
            'menu_class'      => 'footer-nav', 
            'echo'            => true,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				  ] ); ?>
          <!-- <ul class="footer-nav">
            <li><a class="footer-nav__item">Our menu</a></li>
            <li><a class="footer-nav__item">gallery</a></li>
            <li><a class="footer-nav__item">culture</a></li>
          </ul> -->
          <div class="logo footer__logo">Gustoso</div>
          <?php wp_nav_menu( [
            'theme_location'  => 'footer_menu_part_two',
            'menu_class'      => 'footer-nav', 
            'echo'            => true,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				  ] ); ?>
          <!-- <ul class="footer-nav">
            <li><a class="footer-nav__item">events</a></li>
            <li><a class="footer-nav__item">catering</a></li>
            <li><a class="footer-nav__item">visit us</a></li>
          </ul> -->
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>

