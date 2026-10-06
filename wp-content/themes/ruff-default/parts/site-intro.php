<?php if( have_rows('si_slider') ) : ?>
<div class="site-intro">

	<div class="inner-wrap">
	<div class="si-slider">
		<?php while ( have_rows('si_slider') ) : the_row(); ?>	
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
				<img width="1920" height="800" fetchpriority="high" src="<?php echo $si_bg_image['url']; ?>" alt="<?php echo $si_bg_image['title']; ?>" title="<?php echo $si_bg_image['title']; ?>" class="si-item-img"><?php endif; ?>
			</a><?php endif; ?>

		</div>  
		<?php endwhile; ?>
	</div>

</div>
<?php endif;?>
	
<?php
	$bg_desktop = get_field('si_background_image');
	$bg_mobile  = get_field('si_background_image_mobile');
?>
<?php if ($bg_desktop || $bg_mobile): ?>
<div class="site-intro"
	<?php if ($bg_desktop || $bg_mobile): ?>
	style="<?php if ($bg_desktop): ?>--si-bg-desktop: url(<?php echo esc_url($bg_desktop); ?>);<?php endif; ?><?php if ($bg_mobile): ?>--si-bg-mobile: url(<?php echo esc_url($bg_mobile); ?>);<?php endif; ?>"
	<?php endif; ?>
>	<div class="inner-wrap">
		<div class="si-content">
        <?php if(get_field('si_heading')):?><h1 class="si-heading"><?php echo get_field('si_heading');?></h1><?php endif;?>
	   <?php if(get_field('si_text')):?><div class="si-text"><?php echo get_field('si_text');?></div><?php endif;?>
	    <?php
			$si_link = get_field('si_link');
			if($si_link):
			$link_url = $si_link['url'];
			$link_title = $si_link['title'];
			$link_target = $si_link['target'] ? $si_link['target'] : '_self';
			?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-alt si-btn"><span><?php echo esc_html($link_title); ?></span></a><?php endif; ?>
	     <?php
			$si_cta_2 = get_field('si_cta_2');
			if($si_cta_2):
			$link_url = $si_cta_2['url'];
			$link_title = $si_cta_2['title'];
			$link_target = $si_cta_2['target'] ? $si_cta_2['target'] : '_self';
			?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn si-btn2 btn-arrow"><span><?php echo esc_html($link_title); ?></span></a><?php endif; ?>
		</div>
		<div class="si-img">
			<?php $image = get_field('si_image');  if( !empty( $image ) ): ?>
			  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="sbpm-img" /><?php endif; ?>
		</div>
	</div>
</div>
<?php endif;?>