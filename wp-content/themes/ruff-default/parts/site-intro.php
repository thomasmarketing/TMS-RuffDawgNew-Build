<div class="site-intro">
	<div class="inner-wrap">
	   <?php if(get_field('si_heading')):?><h1 class="si-heading"><?php echo get_field('si_heading');?></h1><?php endif;?>
	   <?php if(get_field('si_text')):?><div class="si-text"><?php echo get_field('si_text');?></div><?php endif;?>
	    <?php
			$si_link = get_field('si_link');
			if($si_link):
			$link_url = $si_link['url'];
			$link_title = $si_link['title'];
			$link_target = $si_link['target'] ? $si_link['target'] : '_self';
			?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-alt si-btn"><?php echo esc_html($link_title); ?></a><?php endif; ?>
	     <?php
			$si_cta_2 = get_field('si_cta_2');
			if($si_cta_2):
			$link_url = $si_cta_2['url'];
			$link_title = $si_cta_2['title'];
			$link_target = $si_cta_2['target'] ? $si_cta_2['target'] : '_self';
			?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn si-btn2"><?php echo esc_html($link_title); ?></a><?php endif; ?>
	</div>
</div>
