<div class="site-intro" <?php if(get_field('si_background_image')):?>style="background-image: url(<?php echo get_field('si_background_image');?>)"<?php endif;?>>
	<div class="inner-wrap">
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
