<!--Site Footer -->
<footer class="site-footer" role="contentinfo">
   <div class="sf-top">
	<div class="inner-wrap">
		<div class="sf-one">
            <a href="<?php bloginfo('url'); ?>" class="sf-logo">
		      <?php $logo = get_field('global_company_logo','option');
		      if( !empty($logo) ): ?>
		        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
		      <?php endif;?>
		    </a>
		<div class="sf-social-wrap">
			<?php if( have_rows('social_profiles','option') ): while ( have_rows('social_profiles','option') ) : the_row(); ?>

                <?php if(get_sub_field('sp_social_link')):?>
   					<a href="<?php echo get_sub_field('sp_social_link');?>" target="_blank" title="<?php echo get_sub_field('sp_social_profile','option'); ?>">
               			<?php if(get_sub_field('sp_social_icon','option')) : ?>
       					<?php $sp_social_icon = get_sub_field('sp_social_icon','option'); ?>

       					<img src="<?php echo $sp_social_icon['url']; ?>" alt="<?php echo get_sub_field('sp_social_profile','option'); ?>" title="<?php echo get_sub_field('sp_social_profile','option'); ?>">

       					<?php endif; ?>
       				</a>
       			<?php endif; ?>		

			<?php endwhile; ?>	
		    <?php endif; ?>	
		</div>
		<?php if( get_field('global_address','option')): ?>
			<span class="sf-address"><?php echo get_field('global_address','option'); ?></span>
			<?php endif; ?>
		<?php if(get_field('global_email','option')):?>
			<span class="sf-mail">	
              <a href="mailto:<?php echo get_field('global_email','option');?>"><span><?php echo get_field('global_email','option');?></span></a>
		    </span>
        <?php endif; ?>


		</div>
		<div class="sf-two">
			<?php wp_nav_menu(array(
		      'menu'            => 'Footer Menu One',
		      'container'       => 'ul',
		      'menu_class'      => 'sf-link-list',
		    )); ?>

		</div>
		<div class="sf-three">
			<?php wp_nav_menu(array(
		      'menu'            => 'Footer Menu Two',
		      'container'       => 'ul',
		      'menu_class'      => 'sf-link-list',
		    )); ?>

		</div>
		<div class="sf-four">
			<?php wp_nav_menu(array(
		      'menu'            => 'Footer Menu Three',
		      'container'       => 'ul',
		      'menu_class'      => 'sf-link-list',
		    )); ?>
		</div>
	</div>
   </div>
   <div class="sf-bottom">
	<div class="inner-wrap">
	<p class="sf-copy"><?php bloginfo( 'name' ); ?>© <?php echo date("Y"); ?>, All Rights Reserved | <?php bloginfo( 'name' ); ?>© is a division of <a href="https://jeffersonrubber.com/" target="_blank">Jefferson Rubber Works, Inc.</a> | Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>
	</div>
   </div>
</footer>

