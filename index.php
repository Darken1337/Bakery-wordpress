<?php 

/** 
 * Template name: Главная и единственная 
*/

get_header();?>
    <section id="s-banner" style="background-image: url(<?php echo the_field('banner_bg_image') ?  the_field('banner_bg_image') : get_template_directory_uri() . '/assets/images/bg-header.png'; ?>) ">
      <div class="l-banner-wrapper">
        <div class="l-container">
          <div class="banner">
            <h1 class="banner__title"><?php the_field('banner_title'); ?></h1>
            <div class="banner__icon">
              <svg>
                <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#dashed_line"></use>
              </svg>
            </div>
            <p class="banner__text"><?php the_field('banner_subtitle'); ?></p>
            <a class="banner__button"><?php the_field('banner_button_text'); ?></a>
          </div>
        </div>
        <button class="banner__cake"><span class="banner__circle"></span>
          <svg>
            <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg#move-down'; ?>"></use>
          </svg>
        </button>
      </div>
    </section>
    <section id="s-art">
      <div class="l-art-wrapper">
        <div class="l-container">
          <div class="art">
            <article class="memories">
              <h2 class="memories__heading"><?php the_field('art_title'); ?></h2><small class="memories__subscribtion"><?php the_field('art_subtitle'); ?></small>
              <p class="memories__text"><?php the_field('art_text'); ?></p>
              <div class="memories-slider-wrapper">
                <div class="memories-slider">
                  <?php 
                  global $post;
                  $art_slider_args = array( 
                    'posts_per_page' => -1, 
                    'post_type' =>  'art_slider'
                  );
                  $art_slider = get_posts($art_slider_args);
                  if($art_slider): 
                    foreach($art_slider as $post): setup_postdata($post);
                  ?>
                    <div class="memories-slider__item">
                      <h3 class="memories-slider__title"><?php echo get_post_meta(get_the_ID(), 'cook_rank', true); ?></h3>
                      <div class="memories-slider__photo"><img src="<?php echo get_post_meta(get_the_ID(), 'cook_photo', true); ?>" alt="<?php echo get_post_meta(get_the_ID(), 'cook_rank', true); ?>"></div>
                      <q class="memories-slider__quote"><?php echo get_post_meta(get_the_ID(), 'cook_quote', true); ?></q>
                    </div>
                  <?php
                    endforeach;
                  wp_reset_postdata();
                  else: 
                  ?>
                    <div class="memories-slider__item">
                      <h3 class="memories-slider__title">Chief Cook</h3>
                      <div class="memories-slider__photo"><img src="<?php echo get_template_directory_uri() . '/assets/images/chief.png'; ?>" alt="Chief photo"></div>
                      <q class="memories-slider__quote">Uniqu</q>
                    </div>
                    <div class="memories-slider__item">
                      <h3 class="memories-slider__title">Chief Cook</h3>
                      <div class="memories-slider__photo"><img src="<?php echo get_template_directory_uri() . '/assets/images/chief.png'; ?>" alt="Chief photo"></div>
                      <q class="memories-slider__quote">Unique creations for unique occasions.</q>
                    </div>
                    <div class="memories-slider__item">
                      <h3 class="memories-slider__title">Chief Cook</h3>
                      <div class="memories-slider__photo"><img src="<?php echo get_template_directory_uri() . '/assets/images/chief.png'; ?>" alt="Chief photo"></div>
                      <q class="memories-slider__quote">Unique creations for unique occasions.</q>
                    </div>
                  <?php 
                    endif; 
                  ?>
                </div>
              </div>
            </article>
            <div class="art-gallery">
              <div class="art-gallery__item">
                  
                  <?php
                    $img_atts = get_field('art_gallery_one');
                    if( ! empty($img_atts) ): ?>
                      <img src="<?php echo $img_atts['url']; ?>" alt="<?php echo $img_atts['alt'];?>" width="<?php echo $img_atts['sizes']['art_gallery_img-width']; ?>" height="<?php echo $img_atts['sizes']['art_gallery_img-height']; ?>"/>

                  <?php 
                    else: ?>
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/gallery-1.png'; ?>" alt="Flour" />
                  <?php  
                    endif; 
                    unset($img_atts);
                  ?>

                </div>
                <div class="art-gallery__item">

                  <?php
                    $img_atts = get_field('art_gallery_two');
                    if( ! empty($img_atts) ): ?>

                      <img src="<?php echo $img_atts['url']; ?>" alt="<?php echo $img_atts['alt']; ?>" width="<?php echo $img_atts['sizes']['art_gallery_img-width']; ?>" height="<?php echo $img_atts['sizes']['art_gallery_img-height']; ?>" />

                  <?php 
                    else: ?>
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/gallery-2.png'; ?>" alt="egg" />
                  <?php  
                    endif; 
                    unset($img_atts);
                  ?>

                </div>
                <div class="art-gallery__item">

                  <?php
                    $img_atts = get_field('art_gallery_three');
                   
                    if( ! empty($img_atts) ): ?>

                      <img src="<?php echo $img_atts['url']; ?>" alt="<?php echo $img_atts['alt']; ?>" width="<?php echo $img_atts['sizes']['art_gallery_img-width']; ?>" height="<?php echo $img_atts['sizes']['art_gallery_img-height']; ?>" />

                  <?php 
                    else: ?>
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/gallery-3.png'; ?>" alt="cake" />
                  <?php  
                    endif; 
                    unset($img_atts);
                  ?>
                  
                </div>
                <div class="art-gallery__item">

                  <?php
                    $img_atts = get_field('art_gallery_four');
                    if( ! empty($img_atts) ): ?>

                      <img src="<?php echo $img_atts['url']; ?>" alt="<?php echo $img_atts['alt']; ?>" width="<?php echo $img_atts['sizes']['art_gallery_img-width']; ?>" height="<?php echo $img_atts['sizes']['art_gallery_img-height']; ?>" />

                  <?php 
                    else: ?>
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/gallery-4.png'; ?>" alt="strawberry" />
                  <?php  
                    endif; 
                    unset($img_atts);
                  ?>
                  
                </div>
                <div class="art-gallery__subscribtion" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/art-gallery.png'; ?>)"> 
                  <span><?php the_field('art_gallery_title'); ?></span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="s-pancakes">
      <div class="l-pancakes-wrapper" style="background-image: url(<?php echo get_field('pancake_bg') ? the_field('pancake_bg') : get_template_directory_uri() . '/assets/images/pancakes-bg.png'; ?>);">
        <div class="l-container">
          <div class="pancakes">
            <div class="pancakes-slider">
              <?php 
                $pancakes_slider_big_args = array( 
                      'posts_per_page' => -1, 
                      'post_type' =>  'pancakes_slider_big'
                );
                $pancakes_slider_big = get_posts($pancakes_slider_big_args);
                if($pancakes_slider_big): 
                  foreach($pancakes_slider_big as $post): setup_postdata($post);
                  $img_atts = get_field('pancake_photo');
                ?>
                  <div class="pancakes-slider__item">
                    <div class="pancakes-slider__img">
                      <img src="<?php echo $img_atts['url']?>" alt="<?php echo $img_atts['alt']; ?>" width="<?php echo $img_atts['sizes']['pancakes_slider_big-width']; ?>" height="<?php echo $img_atts['sizes']['pancakes_slider_big-height']; ?>">
                    </div>
                    <a class="pancakes-slider__angle" href="#">
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/angle.png'; ?>" alt="">
                    </a>
                    <div class="pancakes-slider__opinion">
                      <?php 
                        $pancake_grade = get_post_meta(get_the_ID(), 'pancake_grade', true);
                        for ($i=0; $i < 5; $i++): 
                          if($i < $pancake_grade ):
                        ?>
                            <a class="pancakes-slider__star">
                              <svg>
                                <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                              </svg>
                            </a>
                        <?php 
                          else: ?>
                            <a class="pancakes-slider__star">
                              <svg>
                                <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-empty"></use>
                              </svg>
                            </a>
                      <?php 
                          endif;
                        endfor; ?>  
                    </div>
                  </div>
                <?php 
                  endforeach;
                wp_reset_postdata();
                else: ?>
                  <div class="pancakes-slider__item">
                    <div class="pancakes-slider__img"><img src="<?php echo get_template_directory_uri() .' /assets/images/pancake.png'; ?>" alt="pancake"></div><a class="pancakes-slider__angle" href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/angle.png'; ?>" alt=""></a>
                    <div class="pancakes-slider__opinion"><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-empty"></use>
                        </svg></a></div>
                  </div>
                  <div class="pancakes-slider__item">
                    <div class="pancakes-slider__img"><img src="<?php echo get_template_directory_uri() . '/assets/images/pancake-2.jpg'; ?>" alt="pancake"></div>
                    <div class="pancakes-slider__opinion"><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-empty"></use>
                        </svg></a></div><a class="pancakes-slider__angle" href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/angle.png'; ?>" alt=""></a>
                  </div>
                  <div class="pancakes-slider__item">
                    <div class="pancakes-slider__img"><img src="<?php echo get_template_directory_uri() . '/assets/images/pancake-3.jpeg'; ?>" alt="pancake"></div>
                    <div class="pancakes-slider__opinion"><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() .' /assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-empty"></use>
                        </svg></a></div><a class="pancakes-slider__angle" href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/angle.png'; ?>" alt=""></a>
                  </div>
                  <div class="pancakes-slider__item">
                    <div class="pancakes-slider__img"><img src="<?php echo get_template_directory_uri() . '/assets/images/pancake-4.jpg'; ?>" alt="pancake"></div>
                    <div class="pancakes-slider__opinion"><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-full"></use>
                        </svg></a><a class="pancakes-slider__star">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#star-empty"></use>
                        </svg></a></div><a class="pancakes-slider__angle" href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/angle.png'; ?>" alt=""></a>
                  </div>
                <?php
                endif; ?>
            </div>
            <article class="tasty" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/tasty-bg.png'; ?>)">
              <h2 class="tasty__heading"><?php the_field('pancake_title'); ?></h2><small class="tasty__subscribtion"><?php the_field('pancake_subtitle'); ?></small>
              <p class="tasty__text"><?php the_field('pancake_text'); ?></p>
              <button class="tasty__resize-button">
                <svg>
                  <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#tasty-resize"></use>
                </svg>
              </button>
              <div class="tasty-slider">
                <?php 
                $tasty_slider_args = array( 
                    'posts_per_page' => -1, 
                    'post_type' =>  'tasty_slider'
                );
                $tasty_slider = get_posts($tasty_slider_args);
                if( $tasty_slider): 
                  foreach( $tasty_slider as $post): setup_postdata($post); 
                    $tasty_img_atts = get_post_meta(get_the_ID(), 'tasty_photo', true);?>
                    <div class="tasty-slider__item">
                      <img src="<?php echo $tasty_img_atts['url']; ?>" alt="<?php $tasty_img_atts['alt'];?>" width="<?php $tasty_img_atts['sizes']['tasty_slider_img-width'];?>" height="tasty_slider_img-height">
                    </div>
                <?php
                  endforeach;
                else: ?>
                  <div class="tasty-slider__item"><img src="<?php echo get_template_directory_uri() . '/assets/images/slider-1.png'; ?>" alt="dish"></div>
                  <div class="tasty-slider__item"><img src="<?php echo get_template_directory_uri() . '/assets/images/slider-2.png'; ?>" alt="dish"></div>
                  <div class="tasty-slider__item"><img src="<?php echo get_template_directory_uri() . '/assets/images/slider-3.png'; ?>" alt="dish"></div>
                  <div class="tasty-slider__item"><img src="<?php echo get_template_directory_uri() . '/assets/images/slider-3.png'; ?>" alt="dish"></div>
                <?php endif; ?>
              </div>
            </article>
            <div class="warranty" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/warranty-bg.png'; ?>)">
              <div class="warranty__ready"><?php the_field('warranty_up_text'); ?></div>
              <div class="warranty__num"><?php the_field('warranty_minutes'); ?></div>
              <div class="warranty__min"><?php the_field('warranty_measure'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="s-breakfast">
      <div class="l-breakfast-wrapper" style="background-image: url('<?php echo the_field('breafkast_bg') ? the_field('breafkast_bg') : get_template_directory_uri() . '/assets/images/breakfast-bg.png'; ?>')">
        <div class="l-container">
          <div class="breakfast">
            <div class="breakfast-menu">
              <h3 class="breakfast-menu__heading"><?php the_field('breakfast_title'); ?></h3><small class="breakfast-menu__subtitle"><?php the_field('breakfast_subtitle'); ?></small>
              <div class="schedule">
                <?php 
                  $meals = array(
                    get_field('meal_one'),
                    get_field('meal_two'),
                    get_field('meal_three')
                  );
                  foreach ($meals as $meal):
                    
                ?>
                  <ul class="schedule__item">
                    <li class="schedule__meal"><?php echo $meal['meal_title']; ?></li>
                    <li class="schedule__desc"><?php echo $meal['meal_desc'] ?></li>
                    <li class="schedule__price"><?php echo $meal['meal_price']; ?></li>
                  </ul>
                  <?php endforeach; ?>
              </div>
            </div>
            <div class="breakfast-mornings">
              <?php
              $breafast_args = array( 
                    'posts_per_page' => -1, 
                    'post_type' =>  'breakfast_morning'
                );
                $breafast = get_posts($breafast_args);
                if( $breafast ): 
                  foreach( $breafast as $post ): setup_postdata($post); ?>
                    <div class="breakfast-morning" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/breakfast-morning-bg.png'; ?>)" data-z>
                      <div class="breakfast-morning__year"><span>EST.</span><span><?php echo get_post_meta(get_the_ID(), 'breakfast_menu_year', true); ?></span></div>
                      <div class="breakfast-morning__pic">
                        <svg>
                          <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#menu_prev"></use>
                        </svg>
                      </div>
                      <h3 class="breakfast-morning__heading"><?php echo get_post_meta(get_the_ID(), 'breakfast_menu_title', true); ?></h3>
                      <p class="breakfast-morning__text"><?php echo get_post_meta(get_the_ID(), 'breakfast_menu_desc', true); ?></p>
                      <button class="breakfast-morning__read"><?php echo get_post_meta(get_the_ID(), 'breakfast_menu_button', true); ?></button>
                    </div>
              <?php 
                  endforeach;
                  wp_reset_postdata();
                else: ?>
                  <div class="breakfast-morning" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/breakfast-morning-bg.png'; ?>)" data-z>
                    <div class="breakfast-morning__year"><span>EST.</span><span>1893</span></div>
                    <div class="breakfast-morning__pic">
                      <svg>
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#menu_prev"></use>
                      </svg>
                    </div>
                    <h3 class="breakfast-morning__heading">Your morning Escape with flair</h3>
                    <p class="breakfast-morning__text">Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.</p>
                    <button class="breakfast-morning__read">read</button>
                  </div>
                  <div class="breakfast-morning" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/breakfast-morning-bg.png'; ?>)" data-z>
                    <div class="breakfast-morning__year"><span>EST.</span><span>2093</span></div>
                    <div class="breakfast-morning__pic">
                      <svg>
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#menu_prev"></use>
                      </svg>
                    </div>
                    <h3 class="breakfast-morning__heading">Your morning Escape with flair</h3>
                    <p class="breakfast-morning__text">Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.</p>
                    <button class="breakfast-morning__read">read</button>
                  </div>
                  <div class="breakfast-morning" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/breakfast-morning-bg.png'; ?>)" data-z>
                    <div class="breakfast-morning__year"><span>EST.</span><span>1993</span></div>
                    <div class="breakfast-morning__pic">
                      <svg>
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/images/svg/symbol/sprites.svg'; ?>#menu_prev"></use>
                      </svg>
                    </div>
                    <h3 class="breakfast-morning__heading">Your morning Escape with flair</h3>
                    <p class="breakfast-morning__text">Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.</p>
                    <button class="breakfast-morning__read">read</button>
                  </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="s-mainmeal">
      <div class="l-mainmeal-wrapper">
        <div class="l-container">
          <div class="mainmeal-intro">
            <h3 class="mainmeal-intro__title"><?php the_field('mainmeal_title'); ?></h3><small class="mainmeal-intro__subtitle"><?php the_field('mainmeal_subtitle'); ?></small>
          </div>
          <div class="mainmeal">
            <div class="features">
              <?php 
                $ingridients = array(
                  get_field('ingridient_one'),
                  get_field('ingridient_two'),
                  get_field('ingridient_three')
                );
                foreach($ingridients as $ingridient): ?>

                  <div class="ingridient">

                <?php  
                  $ingridient_img_atts = $ingridient['pic']; 
                  if($ingridient_img_atts): ?>

                    <div class="ingridient__img">
                      <img src="<?php echo $ingridient_img_atts['url'] ?>" alt="<?php echo $ingridient_img_atts['alt']; ?>" width="<?php echo $ingridient_img_atts['sizes']['thumbnail-width']; ?>" height="<?php echo $ingridient_img_atts['sizes']['thumbnail-height']; ?>">
                    </div>

                  <?php else: ?>

                    <div class="ingridient_img">
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/sandwitch-1.png'; ?>">
                    </div>
                    
                  <?php endif; 
                  unset($ingridient_img_atts);
                  ?>
                    <h4 class="ingridient__name"><?php echo $ingridient['name'] ?></h4>
                    <p class="ingridient__text"><?php echo $ingridient['desc']; ?></p>
                  </div>
                <?php 
                endforeach; ?>
            </div>
            <div class="sandwitch" style="background-image: url(<?php echo the_field('mainmeal_pic') ? the_field('mainmeal_pic') : get_template_directory_uri() . '/assets/images/sandwitch-big.png'; ?>)">
              <div class="sandwitch-warranties">
                <?php 
                $process_times = array(
                  get_field('mainmeal_prev'),
                  get_field('mainmeal_cook'),
                  get_field('mainmeal_total')
                );

                if($process_times): 
                  foreach ($process_times as $process_time):?>

                    <div class="sandwitch-warranty<?php echo $process_time['bg'] === 'with_image' ? ' sandwitch-warranty--white' : null;?>" <?php echo $process_time['bg'] === 'with_image' ? 'style="background-image: url(' . get_template_directory_uri() . '/assets/images/warranty-bg.png)"' : null; ?>
                    >
                      <div class="sandwitch-warranty__brown"><?php echo $process_time['text_upper']; ?></div>
                      <div class="sandwitch-warranty__num"><?php echo $process_time['time']; ?></div>
                      <div class="sandwitch-warranty__minute"><?php echo $process_time['text_footer']; ?></div>
                    </div>

                <?php
                  endforeach; 
                endif; ?>
              </div>
              <button class="sandwitch__btn">full recipe</button>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer();