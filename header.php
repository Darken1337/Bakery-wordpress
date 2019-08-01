<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta <?php bloginfo('charset'); ?>>
	  <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="header" id="header">
      <div class="menu-responsive-wrapper" id="menu-responsive">
        <?php wp_nav_menu( [
            'theme_location'  => 'header_mobile',
            'menu_class'      => 'menu-responsive', 
            'container'       => false,
            'echo'            => true,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
          ] ); ?>
        <button class="btn-close-menu" id="close-menu"><span></span><span></span></button>
      </div>
      <nav class="navigation">
        <div class="l-container l-container-nav">
          <div class="logo">gustoso</div>
		  <button class="menu-responsive-toggle" id="menu-responsive-toggle">Menu</button>
		  <?php wp_nav_menu( [
					'theme_location'  => 'header_menu',
          'menu_class'      => 'menu', 
          'container'       => false,
					'echo'            => true,
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				] ); ?>
          <div class="social-media"><i class="fab fa-twitter social-media__icon"></i><i class="fab fa-facebook-f social-media__icon"></i><i class="social-media__icon fab fa-instagram"></i></div>
        </div>
      </nav>
    </header>