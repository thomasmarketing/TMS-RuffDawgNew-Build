<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="site-content" role="main">
    <div class="inner-wrap">
<div class="single-product-new">

    <div class="product-gallery">
           <?php $images = get_field('imgwt_gallery');
              if( $images ): ?>
            <div class="innerpage-carousel">
              <div id="slider"  class="slides slider-for popup-gallery">
                <?php foreach( $images as $image ): ?>
                <div class="item">
                    <div class="goOnZoom"
                        style="background-image:url('<?php echo $image['sizes']['large']; ?>');">

                        <img src="<?php echo $image['sizes']['large']; ?>"
                            alt="<?php echo $image['alt']; ?>"
                            title="<?php echo $image['title']; ?>">

                        <a class="gallery-trigger zoom-popup"
           href="<?php echo $image['sizes']['large']; ?>"
           aria-label="View full size image"></a>

                    </div>
                </div>
                 <?php endforeach; ?>
              </div>
              <div id="carousel" class="slides slider-nav">
                 <?php foreach( $images as $image ): ?>
                <div class="item">
                  <a href="javascript:void(0)" class="slider-nav-item">
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"/>
                  </a>
                </div>
                <?php endforeach; ?>        
              </div>           
            </div> 
              <?php  else: ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

    </div>

    <div class="product-info">
  
        <span class="product-title-top"><?php the_title(); ?></span>
         
        <?php if (get_field('imgwt_top_content')): ?><div class="pi-top-content"><?php echo get_field('imgwt_top_content') ?></div><?php endif ?>
        <?php 
			$link = get_field('imgwt_cta_link');
			if( $link ): 
		 $link_url = $link['url'];
			$link_title = $link['title'] ? $link['title'] : 'Learn More';
			$link_target = $link['target'] ? $link['target'] : '_self';  ?>   
          <a href="<?php echo esc_url($link_url); ?>" class="pi-btn" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/themes/ruff-default/img/buy-now-button.png" alt="Buy Now" title="Buy Now" class="pi-btn-img"></a><?php endif; ?>
         <?php if (get_field('imgwt_bottom_content')): ?><div class="pi-bottom-content"><?php echo get_field('imgwt_bottom_content') ?></div><?php endif ?>

        <?php the_content(); ?>

    </div>

</div>

</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
