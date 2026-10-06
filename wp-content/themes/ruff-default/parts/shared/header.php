<!--Site Header-->
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/search-module' ) ); ?>
<!-- Site header wrap start-->
<div class="site-header-wrap"> 
  <header class="site-header" role="banner">
    <!--Top Nav Header-->
    <div class="sh-top-banner">
      <div class="inner-wrap">
          <?php if( get_field('banner_text','option')): ?><div class="stp-text"><?php echo get_field('banner_text','option'); ?></div><?php endif; ?>	
         <div class="stb-social-links">
            <ul class="stb-social-link">
					<?php if( have_rows('social_profiles','option') ): while ( have_rows('social_profiles','option') ) : the_row(); ?>
						<li>
							<?php if( get_sub_field('sp_social_link','option')): ?>
							<a href="<?php echo get_sub_field('sp_social_link','option'); ?>" target="_blank" title="<?php echo get_sub_field('sp_social_profile','option'); ?>" aria-label="<?php echo get_sub_field('sp_social_profile','option'); ?>">	
							<?php 
							$image = get_sub_field('sp_social_icon','option');
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  title="<?php echo esc_attr($image['alt']); ?>" class="style-svg" />
							<?php endif; ?>

							<?php endif; ?>
							</a>
						</li>

					<?php endwhile; ?>
					<?php endif; ?>	
				</ul>

         </div>
      </div>
    </div>
      <div class="sh-top-nav">
        <div class="inner-wrap">
          <a href="<?php bloginfo('url'); ?>" class="site-logo site-logo-mobile">
            <?php $logo = get_field('global_company_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a>

          <div class="sh-utility-nav">
                <a class="sh-ico-search search-link" target="_blank" href="#" aria-label="Search Icon"></a>
                <a href="#menu" class="sh-ico-menu menu-link" aria-label="Menu Icon"></a> 
          </div>     
        </div>  
      </div>
    <!--Top Nav Header-->  

    <!--Sticky Nav-->
      <div class="sh-sticky-wrap">
        <div class="inner-wrap">
          <a href="<?php bloginfo('url'); ?>" class="site-logo site-logo-desk">
            <?php $logo = get_field('global_company_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a>

          <div class="sh-right-sec">
            <!--Site Nav-->
            <div class="site-nav-container">
              <div class="snc-header">
                <a href="" class="close-menu menu-link"  aria-label="Mobile Menu Close Button"></a>
              </div>
              <?php wp_nav_menu(array(
              'menu'            => 'Primary Nav',
              'container'       => 'nav',
              'container_class' => 'site-nav',
              'menu_class'      => 'sn-level-1',
              'walker'        => new themeslug_walker_nav_menu
              )); ?>
            </div>
            <!--Site Nav END-->

             <a class="sh-ico-search search-link sh-ico-search-desk" target="_blank" href="#" aria-label="Search Icon"></a>
          </div>


        </div>
        <a href="" class="site-nav-container-screen menu-link">&nbsp;</a>
    </div>
    <!--Sticky Nav-->
  </header>
  <?php if ( is_front_page() || is_page_template('front-page.php') ) : ?>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/site-intro' ) ); ?>

    <?php elseif ( is_author() ) : ?>

        <?php // No intro on author pages ?>

    <?php else : ?>

        <?php Starkers_Utilities::get_template_parts( array( 'parts/page-intro' ) ); ?>

    <?php endif; ?>
</div>
<!-- Site header wrap end-->