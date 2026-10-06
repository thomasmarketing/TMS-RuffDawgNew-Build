<!--Site Footer -->
<footer class="site-footer" role="contentinfo">
	<div class="sf-top">
      	<div class="inner-wrap">
		<div class="sf-left">
			 <?php if( have_rows('footer_left_links','option') ): while ( have_rows('footer_left_links','option') ) : the_row(); ?>
			 <?php $link = get_sub_field('sfl_link','option');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="sfl-link"><?php echo get_sub_field('sfl_link_text','option'); ?></a><?php endif; ?>	
			<?php endwhile; ?>
			<?php endif; ?>	
		</div>
		<div class="sf-right">
           <?php if( get_field('sf_footer_text','option')): ?><div class="sfr-text"><?php echo get_field('sf_footer_text','option'); ?></div><?php endif; ?>
            <?php if( have_rows('footer_right_links','option') ): while ( have_rows('footer_right_links','option') ) : the_row(); ?>   
		   <?php $link = get_sub_field('sfr_link','option');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="sfl-link"><?php echo get_sub_field('sfr_link_text','option'); ?></a><?php endif; ?>
             <?php endwhile; ?>
			<?php endif; ?>	

			<div class="sf-social-links">
            <ul class="sf-social-link">
					<?php if( have_rows('social_profiles','option') ): while ( have_rows('social_profiles','option') ) : the_row(); ?>
						<li>
							<?php if( get_sub_field('sp_social_link','option')): ?>
							<a href="<?php echo get_sub_field('sp_social_link','option'); ?>" target="_blank" class="<?php echo get_sub_field('sp_social_profile','option'); ?>" title="<?php echo get_sub_field('sp_social_profile','option'); ?>" aria-label="<?php echo get_sub_field('sp_social_profile','option'); ?>">	
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
	</div>
	<div class="sf-small-footer">
		<div class="inner-wrap">
			<?php if( get_field('footer_bottom_text','option')): ?><p><?php echo get_field('footer_bottom_text','option'); ?></p><?php endif; ?>
			<p class="sf-copy">© <?php echo date("Y"); ?> <a class="sf-comp-copy" href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>, All Rights Reserved <span>|</span> Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>
		</div>
	</div>
</footer>

