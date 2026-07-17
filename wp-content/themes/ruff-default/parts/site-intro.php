<div class="site-intro">

	<div class="inner-wrap">
	<div class="si-slider">
		<?php if( have_rows('si_slider') ): while ( have_rows('si_slider') ) : the_row(); ?>	
		<div class="si-item">
			<?php
					$si_slider_link1 = get_sub_field('link');
					if($si_slider_link1):
					$link_url = $si_slider_link1['url'];
					$link_title = $si_slider_link1['title'];
					$link_target = $si_slider_link1['target'] ? $si_slider_link1['target'] : '_self';
					?>
			<a href="<?php echo esc_url($link_url); ?>" class="si-item-link">
				<?php if(get_sub_field('image')) : ?>
					<?php $si_bg_image = get_sub_field('image'); ?>
				<img src="<?php echo $si_bg_image['url']; ?>" alt="<?php echo $si_bg_image['title']; ?>" title="<?php echo $si_bg_image['title']; ?>" class="si-item-img"><?php endif; ?>
			</a><?php endif; ?>

		</div>  
		<?php endwhile; endif;?>
	</div>

</div>