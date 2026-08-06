<!--Site Header-->
<!-- Site header wrap start-->
<div class="site-header-wrap"> 
  <header class="site-header" role="banner">
    <!--Top Nav Header-->
      <div class="sh-top-nav">
        <div class="inner-wrap">
          <a href="<?php bloginfo('url'); ?>" class="site-logo site-logmobile">
            <?php $logo = get_field('global_company_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a>
          <div class="sh-utility-nav">
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

          <div class="sh-right">

              <div class="sh-nav-search-wrap">
                <!--Site Nav-->
                <div class="site-nav-container">
                  <div class="snc-header">
                    <a href="<?php bloginfo('url'); ?>" class="site-logo site-logmobile">
                    <?php $logo = get_field('global_company_logo','option');
                    if( !empty($logo) ): ?>
                      <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
                    <?php endif;?>
                  </a>
                    <a href="" class="close-menu menu-link"></a>
                  </div>

                  <?php wp_nav_menu(array(
                    'menu'            => 'Primary Nav',
                    'container'       => 'nav',
                    'container_class' => 'site-nav',
                    'menu_class'      => 'sn-level-1',
                    'walker'          => new themeslug_walker_nav_menu
                  )); ?>


               <form role="search" method="get" class="sh-search-form search-form sh-search-form-mobile" action="<?php bloginfo('url'); ?>/">
                <input type="text" class="sh-search-input" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>" />
                <button type="submit" class="sh-search-submit" aria-label="Submit Search">
                  <span class="sh-search-submit-icon"></span>
                </button>
              </form>

                </div>
                <!--Site Nav END-->

                <a class="sh-ico-search search-link" href="#" aria-label="Search Icon"></a>

                <!--Inline Search Form (overlays nav + icon)-->
                <form role="search" method="get" class="sh-search-form search-form sh-search-form-desk" action="<?php bloginfo('url'); ?>/">
                <input type="text" class="sh-search-input" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>" />
                <button type="submit" class="sh-search-submit" aria-label="Submit Search">
                  <span class="sh-search-submit-icon"></span>
                </button>
              </form>
                <!--Inline Search Form END-->
              </div>
              <?php 
            $link = get_field('cta_one','option');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn-alt d-none-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
            <?php endif; ?>
             <?php 
            $link = get_field('cta_two','option');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn d-none-link btn-arrow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
            <?php endif; ?>
              <?php /* cta_one / cta_two buttons unchanged, still siblings of .sh-nav-search-wrap */ ?>
            </div>          
             

          </div>

        <a href="" class="site-nav-container-screen menu-link">&nbsp;</a>
    </div>
    <!--Sticky Nav-->
  </header>

  <?php if ( is_front_page() ) : ?>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/site-intro' ) ); ?>

    <?php elseif ( is_author() ) : ?>

        <?php // No intro on author pages ?>

    <?php else : ?>

        <?php Starkers_Utilities::get_template_parts( array( 'parts/page-intro' ) ); ?>

    <?php endif; ?>
</div>
<!-- Site header wrap end-->