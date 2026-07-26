
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
    while ( have_rows('flexible_content') ) : the_row(); ?>

	<?php if( get_row_layout() == 'tab_content' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="accordian-tabs-module">
			 	<div class="inner-wrap">		 	
			 		<?php if( get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<?php if( get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>

					<ul class="accordion-tabs">
						<?php if( have_rows('tab_content_row') ): while ( have_rows('tab_content_row') ) : the_row(); ?>
							<li class="tab-header-and-content">
								<a href="javascript:void(0)" class="tab-link"><?php echo get_sub_field('tab_header'); ?></a>
								<div class="tab-content"><p><?php echo get_sub_field('tab_body'); ?></p></div>							
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<?php if( get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>			
				</div>
			</section>
		<?php endif; ?>

	<?php elseif( get_row_layout() == 'full_width_cta' ): ?>

		<section class="full-width-cta-test">
			<div class="inner-wrap"><h2 class="cta-banner-header"><?php echo get_sub_field('section_header'); ?></h2></div>
			<section class="fwc-module">
				<div class="inner-wrap">		
					<div class="row cta-banner bottom-baseline">
			            <p class="h2 cta-banner-body"><?php echo get_sub_field('section_body'); ?></p>	
			       		<?php
						$cta_button = get_sub_field('cta_button');
						if($cta_button):
						$link_url = $cta_button['url'];
						$link_title = $cta_button['title'];
						$link_target = $cta_button['target'] ? $cta_button['target'] : '_self';
						?>
						<a class="btn fw-cta" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a>
						<?php endif; ?> 
			        </div>
				</div>
			</section>			
			<?php if( get_sub_field('divider')): ?>
				<div class="inner-wrap"><hr></div>
			<?php endif; ?>
		</section>		
        

 	<?php elseif( get_row_layout() == 'multiple_columns' ): ?>
 		<section class="multiple-cols-module" <?php if( get_sub_field('bg_color')): ?>style="background-color:<?php echo get_sub_field('bg_color'); ?>"<?php endif; ?> <?php if( get_sub_field('id')): ?> id="<?php echo get_sub_field('id'); ?>"<?php endif; ?>>
		 	<div class="inner-wrap">	
		 		<?php if( get_sub_field('section_header')): ?>
					<h2><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
				<?php endif; ?>
				<section class="<?php if (get_sub_field('number_columns') == '2') {
						echo 'rows-of-2';
					} else if (get_sub_field('number_columns') == '3') {
					        echo 'rows-of-3';
					} else if (get_sub_field('number_columns') == '4') {
					        echo 'rows-of-4';
					}
					?> <?php if( get_sub_field('new_class')): ?><?php echo get_sub_field('new_class'); ?><?php endif; ?>">

		         	<?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
						<div><?php echo get_sub_field('content_column'); ?></div>
					<?php endwhile; ?>
					<?php endif; ?>				
				</section>
				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
 		</section>	

	<?php elseif( get_row_layout() == 'img_gallery_section' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="image-gallery-module">
				<div class="inner-wrap">	
					<?php if( get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<section class="popup-gallery <?php if (get_sub_field('number_columns') == '2') {
								echo 'rows-of-2';
							} else if (get_sub_field('number_columns') == '3') {
							        echo 'rows-of-3';
							} else if (get_sub_field('number_columns') == '4') {
							        echo 'rows-of-4';
							}
							?>">
						<?php $images = get_sub_field('img_gallery');
							if( $images ): ?>
								<?php foreach( $images as $image ): ?>
			                    	<a href="<?php echo $image['sizes']['large']; ?>" class=" loop-item">
				                    	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"/>
			                    		<h3 class="li-title"><?php echo $image['caption']; ?></h3>
			                    	</a>
								<?php endforeach; ?>
							<?php endif; ?>
					</section>
					<?php if( get_sub_field('divider')): ?>
							<hr>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
		
	

			
	<?php elseif( get_row_layout() == 'img_gallery_with_thumbnails' ): ?>
    <section class="image-gallery-with-thumbs">
          <div class="inner-wrap"><?php if( get_sub_field('imt_section_header')): ?>
            <h2><span><?php echo get_sub_field('imt_section_header'); ?></span></h2><?php endif; ?>
            
            <?php $images = get_sub_field('imgwt_gallery');
              if( $images ): ?>
            <div class="innerpage-carousel">
              <div id="slider"  class="slides slider-for popup-gallery">
                <?php foreach( $images as $image ): ?>
                <div class="item">
                  <a href="<?php echo $image['sizes']['large']; ?>">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
                  </a>
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
            </div> <?php endif; ?>
           <?php if( get_sub_field('divider')): ?>
        <hr>
      <?php endif; ?>
      </div>
    </section>


	<?php elseif( get_row_layout() == 'image_gallery_without_thumbnails' ): ?>
		<?php if( get_sub_field('wim_slider')): ?>

			<?php $img = get_sub_field('wim_slider');
			if( $img ): ?>	
				<div class="inner-wrap">
			       	<section class="innerpage-carousel-widthout-thumb">
			       		<div class="icwt-slider popup-gallery">
							<?php foreach( $img as $image ): ?>
			                <div class="item">
			                  	<a href="<?php echo $image['sizes']['large']; ?>">
									<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php $image['alt']; ?>" title="<?php $image['alt']; ?>"/>
								</a>
			                </div> 
			 				<?php endforeach; ?>  
	              		</div>
	         		</section>
              		<?php if( get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
	 		 	</div>
			<?php endif; ?>
		<?php endif; ?>


	<?php elseif( get_row_layout() == 'click_expand' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<section class="click-expand-module">
				<div class="inner-wrap">
					<div class="click-expand <?php if( get_sub_field('spacing')): ?>spacing-bottom<?php endif; ?>">
			          <h3 class="ce-header" tabindex="0"><?php echo get_sub_field('section_header'); ?></h3>
			          <div class="ce-body"><?php echo get_sub_field('section_body'); ?></div>
			      	</div>
			    </div>
			</section>	        
		<?php endif; ?>

 			
	<?php elseif( get_row_layout() == 'table' ): ?>
		<section class="tabular-data">
		   <div class="inner-wrap">
		        <?php if( get_sub_field('section_header')): ?>
		            <div class="headexpand-wrap">  
		            	<h2 class="headexpand"><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
							<?php if( get_sub_field('section_header')): ?>
								<h3 class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></h3>
							<?php endif; ?>
					        <?php if( get_sub_field('table_content')): ?>
					            <div class="table-wrap">
					                <table class="tablesaw tablesaw-stack" data-tablesaw-mode="stack">
					                	<?php echo get_sub_field('table_content'); ?>
					                </table>
					            </div>
					        <?php endif; ?>
					        <?php if( get_sub_field('section_header')): ?>
		           </div> 
		           <!--headexpand-wrap END -->
		        <?php endif; ?>

		        <?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>	


	<?php elseif( get_row_layout() == 'product_grid' ): ?>
		<section class="product-grid-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('section_header')): ?>
					<h2 class="carousel-header"><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p><?php echo get_sub_field('section_subtext'); ?></p>
				<?php endif; ?>

				<div class="product-item-wap">
					<div class="product-items">
						<?php if( have_rows('product_row') ): while ( have_rows('product_row') ) : the_row(); ?>
							<div>
								<?php 	
																	
									$link = get_sub_field('product_url');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										?>
										<a class="product-item" href="<?php echo esc_url($link_url); ?>"> 
											<span class="product-img">
												<?php if(get_sub_field('product_picture')) : ?>
													<?php $product_picture = get_sub_field('product_picture'); ?>
													   <img class="pmi-img" src="<?php echo $product_picture['sizes']['product_thumb']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>">
												<?php endif; ?>
											</span>									
											<span class="product-title"><?php echo esc_html($link_title); ?></span>
										</a>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>
					</div>

				</div>


				<div class="<?php if( get_sub_field('carousel')): ?>flexslider<?php endif; ?> product-carousel">
					<ul class="slides">
						<?php if( have_rows('product_row') ): while ( have_rows('product_row') ) : the_row(); ?>
							<li>
								
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>

	<?php elseif( get_row_layout() == 'text_media' ): ?>
		<section class="text-media-module">
			<div class="inner-wrap">
				<?php if( get_sub_field('section_header')): ?>
					<h2><?php echo get_sub_field('section_header'); ?></h2>
				<?php endif; ?>			

				<div class="rows-of-2">
	              <div>
	                <?php echo get_sub_field('media'); ?>
	              </div>
	              <div>
	                <?php echo get_sub_field('text'); ?>
	              </div>
	            </div>

				<?php if( get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</div>
		</section>

	<?php elseif( get_row_layout() == 'heading_wrap' ): ?>
		<!-- Headign with BG -->
		<div class="heading-wrap">
			<div class="inner-wrap">
				<div class="rows-of-2">
				    <div class="on-light-bg">
					    <div class="hw-txt">
					    	<h1 class="lb-title"><?php echo get_sub_field('lh_heading'); ?></h1>
					        <h2><?php echo get_sub_field('lh_sub_heading'); ?></h2>
					        <p><?php echo get_sub_field('lh_intro_text'); ?></p>
					    </div>
				    </div>
				    <div class="on-color-bg">
					    <div class="hw-txt">                
					        <h1><?php echo get_sub_field('right_heading'); ?></h1>
					        <h2><?php echo get_sub_field('right_subheading'); ?></h2>
					        <p><?php echo get_sub_field('right_intro_text'); ?></p>
					    </div>
				    </div>
				</div>
			</div>
		</div>
		<!-- Headign with BG -->

	<?php elseif( get_row_layout() == 'image_content_grid_module' ): ?>
		<section class="image-content-grid-module">
			<div class="inner-wrap">
				<?php if (get_sub_field('icgm_section_heading')): ?>
					<h2 class="icgm-section-heading"><?php echo get_sub_field('icgm_section_heading') ?></h2>
				<?php endif ?>

				<?php if (get_sub_field('icgm_section_description')): ?>
					<p class="icgm-section-description"><?php echo get_sub_field('icgm_section_description') ?></p>
				<?php endif ?>

				<?php if (get_sub_field('number_of_columns') == '2') {
					$gridClass = 'tse-cols-2';
				} else if (get_sub_field('number_of_columns') == '3') {
				        $gridClass = 'tse-cols-3';
				} else if (get_sub_field('number_of_columns') == '4') {
				        $gridClass = 'tse-cols-4';
				} else {
					$gridClass = '';
				}
				?>

				<?php if (have_rows('icgm_items')): ?>
				<div class="<?php echo $gridClass; ?> icgm-wrap">

					<?php while (have_rows('icgm_items')): the_row(); ?>
					<div class="icgm-item">
						<?php 
						$icgm_image = get_sub_field('icgm_img');
						$icgm_img_title = get_sub_field('icgm_heading') ? get_sub_field('icgm_heading') : $icgm_image['alt'];
						if( !empty( $icgm_image ) ): ?>
							<?php 
							$link = get_sub_field('icgm_link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'] ? $link['title'] : 'Learn More';
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="icgm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
							<?php else: ?>
								<a href="<?php echo esc_url($icgm_image['url' ]); ?>" class="icgm-link lightbox">
							<?php endif;?>
						    	<img class="icgm-img" src="<?php echo esc_url($icgm_image['url' ]); ?>" alt="<?php echo esc_attr($icgm_img_title); ?>" title="<?php echo esc_attr($icgm_img_title); ?>" />
						    <?php //if (get_sub_field('icgm_link')): ?>
								</a>
							<?php //endif ?>
						<?php endif; ?>

						<?php if (get_sub_field('icgm_heading')): ?>
							<h3 class="icgm-heading">
								<?php if ($link): ?>
									<a class="icgm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<?php endif ?>
									<?php echo get_sub_field('icgm_heading') ?>
								<?php if (get_sub_field('icgm_link')): ?>
								</a>
							<?php endif ?>	
							</h3>
						<?php endif ?>

						<?php if (get_sub_field('icgm_description')): ?>
							<p class="icgm-description"><?php echo get_sub_field('icgm_description') ?></p>
						<?php endif ?>

						<?php if ($link): ?>
							<a class="icgm-btn btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_url( $link_title ); ?> ?></a>
						<?php endif ?>
					</div>
					<?php endwhile ?>

				</div>
				<?php endif ?>
			</div>
		</section>




	<?php elseif( get_row_layout() == 'internal_page_cta_module' ): ?>    
	
      <section class="internal-page-cta-module">
        <div class="inner-wrap">
          <?php if( get_sub_field('ipcm_heading')): ?>
          <h2 class="hfwc-heading"><?php echo get_sub_field('ipcm_heading'); ?></h2>
          <?php endif; ?>	
          <div class="hfwc-cta">
          	<?php
			$ipcm_cta_one = get_sub_field('ipcm_cta_one');
			if($ipcm_cta_one):
			$link_url = $ipcm_cta_one['url'];
			$link_title = $ipcm_cta_one['title'];
			$link_target = $ipcm_cta_one['target'] ? $ipcm_cta_one['target'] : '_self';
			?>
            <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html($link_title); ?></span></a>
            <?php endif; ?>

            <?php
			$ipcm_cta_two = get_sub_field('ipcm_cta_two');
			if($ipcm_cta_two):
			$link_url = $ipcm_cta_two['url'];
			$link_title = $ipcm_cta_two['title'];
			$link_target = $ipcm_cta_two['target'] ? $ipcm_cta_two['target'] : '_self';
			?>
            <a class="btn-alt" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html($link_title); ?></span></a>
            <?php endif; ?>

          </div>
        </div>
      </section>

	   <?php elseif( get_row_layout() == 'home_products_module' ): ?> 
	  <section class="home-products-module">
		<div class="inner-wrap">
			<div class="hpm-wrap">
               <?php if( have_rows('hpm_items') ): while ( have_rows('hpm_items') ) : the_row(); ?>
				<div class="hpm-item">
					<?php
					$hpm_link = get_sub_field('hpm_link');
					if($hpm_link):
					$link_url = $hpm_link['url'];
					$link_title = $hpm_link['title'];
					$link_target = $hpm_link['target'] ? $hpm_link['target'] : '_self';
					?>
					<a href="<?php echo esc_url($link_url); ?>" class="hpm-link" target="<?php echo esc_attr( $link_target ); ?>">
							<?php 
							$image = get_sub_field('hpm_image');
							if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="hpm-img" /><?php endif; ?> </a>
					<a href="<?php echo esc_url($link_url); ?>" class="hpm-link" target="<?php echo esc_attr( $link_target ); ?>"><span class="hpm-text"><?php echo get_sub_field('hpm_title'); ?></span></a>
					<a href="<?php echo esc_url($link_url); ?>" class="hpm-btn btn" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a><?php endif; ?>
				</div>
				<?php endwhile; ?>	
					<?php endif; ?>	

			</div>
		</div>
	  </section>

<?php elseif( get_row_layout() == 'play_finder_module' ): ?> 
<?php
/**
 * Single pass through pfm_items: capture the checkbox choices (for the
 * filter buttons) AND each product's data into plain PHP arrays. Doing
 * this in one loop sidesteps ACF's context quirks around reading a
 * repeater sub-field's choices from outside an active row — we already
 * know have_rows()/the_row()/get_sub_field() work here, since your
 * products were rendering correctly before.
 */
$product_rows      = array();
$category_choices  = array();
$size_choices       = array();

if ( have_rows('pfm_items') ) :
  while ( have_rows('pfm_items') ) : the_row();

    // Grab the choices once, from the first row only.
    if ( empty( $product_rows ) ) {
      $cat_obj  = get_sub_field_object('pfm_catgegory');
      $size_obj = get_sub_field_object('pfm_size');
      $category_choices = ( $cat_obj && ! empty( $cat_obj['choices'] ) ) ? $cat_obj['choices'] : array();
      $size_choices       = ( $size_obj && ! empty( $size_obj['choices'] ) ) ? $size_obj['choices'] : array();
    }

    $pfm_link = get_sub_field('pfm_link');

    $product_rows[] = array(
      'link_url'    => $pfm_link ? $pfm_link['url'] : '#',
      'link_target' => ( $pfm_link && ! empty( $pfm_link['target'] ) ) ? $pfm_link['target'] : '_self',
      'categories'  => get_sub_field('pfm_catgegory'), // array
      'sizes'       => get_sub_field('pfm_size'),       // array
      'image_1'     => get_sub_field('pfm_mage_1'),
      'image_2'     => get_sub_field('pfm_image_2'),
      'title'       => get_sub_field('pfm_title'),
    );

  endwhile;
endif;
?>
<section class="play-finder-module">
  <div class="inner-wrap">
    <div class="pfm-heading-section">
      <?php if ( get_sub_field('pfm_heading') ): ?>
        <h2 class="pfm-heading"><?php echo get_sub_field('pfm_heading'); // raw: field is expected to contain the <span> markup ?></h2>
      <?php endif; ?>
      <?php if ( get_sub_field('pfm_text') ): ?>
        <div class="pfm-text"><?php echo esc_html( get_sub_field('pfm_text') ); ?></div>
      <?php endif; ?>
    </div>

    <div class="pfm-filter-wrap">
      <?php if ( ! empty( $category_choices ) ) : ?>
      <div class="pfm-filter-row pfm-category-row">
        <?php $i = 0; foreach ( $category_choices as $slug => $label ) : ?>
          <button
            class="pfm-filter<?php echo ( $i === 0 ) ? ' active' : ''; ?>"
            type="button"
            data-filter="<?php echo esc_attr( $slug ); ?>"
          ><?php echo esc_html( $label ); ?></button>
        <?php $i++; endforeach; ?>
      </div>
      <?php endif; ?>

      <?php if ( ! empty( $size_choices ) ) : ?>
      <div class="pfm-filter-row pfm-size-row">
        <?php $i = 0; foreach ( $size_choices as $slug => $label ) : ?>
          <button
            class="pfm-filter<?php echo ( $i === 0 ) ? ' active blue' : ''; ?>"
            type="button"
            data-filter="<?php echo esc_attr( $slug ); ?>"
          ><?php echo esc_html( $label ); ?></button>
        <?php $i++; endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <div class="pfm-slider-wrap">
      <button class="pfm-arrow pfm-arrow-prev" type="button" aria-label="Previous"></button>

      <div class="pfm-product-wrap">
        <?php foreach ( $product_rows as $product ) :
          $category_attr = $product['categories'] ? implode( ',', $product['categories'] ) : '';
          $size_attr      = $product['sizes'] ? implode( ',', $product['sizes'] ) : '';
        ?>
        <a
          href="<?php echo esc_url( $product['link_url'] ); ?>"
          target="<?php echo esc_attr( $product['link_target'] ); ?>"
          class="pfm-product-card"
          data-category="<?php echo esc_attr( $category_attr ); ?>"
          data-size="<?php echo esc_attr( $size_attr ); ?>"
        >
          <div class="pfm-img-wrap">
            <?php if ( ! empty( $product['image_1'] ) ) : ?>
              <img
                src="<?php echo esc_url( $product['image_1']['url'] ); ?>"
                alt="<?php echo esc_attr( $product['image_1']['alt'] ); ?>"
                title="<?php echo esc_attr( $product['image_1']['alt'] ); ?>"
                class="pfm-img pfm-img-default"
              />
            <?php endif; ?>

            <?php if ( ! empty( $product['image_2'] ) ) : ?>
              <img
                src="<?php echo esc_url( $product['image_2']['url'] ); ?>"
                alt="<?php echo esc_attr( $product['image_2']['alt'] ); ?>"
                title="<?php echo esc_attr( $product['image_2']['alt'] ); ?>"
                class="pfm-img pfm-img-hover"
              />
            <?php endif; ?>
          </div>

          <div class="pfm-card-text">
            <?php if ( $product['title'] ) : ?>
              <h3 class="pfm-title"><?php echo esc_html( $product['title'] ); ?></h3>
            <?php endif; ?>
            <span class="pfm-cta">Read More <span aria-hidden="true">&rarr;</span></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>

      <button class="pfm-arrow pfm-arrow-next" type="button" aria-label="Next"></button>
    </div>
  </div>
</section>


<?php elseif( get_row_layout() == 'retailer_cta_module' ): ?> 
<section class="retailer-cta-module">
  <div class="inner-wrap">
    <div class="rcm-img-wrap">
		<?php $image = get_sub_field('rcm_image');  if( !empty( $image ) ): ?>
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="rcm-img" />
	  <?php endif; ?>
    </div>

    <div class="rcm-content">
      <?php if( get_sub_field('rcm_heading')): ?><h2 class="rcm-heading"><?php echo get_sub_field('rcm_heading'); ?></h2><?php endif; ?>

      <ul class="rcm-list">
		<?php if( have_rows('rcm_list_item') ): while ( have_rows('rcm_list_item') ) : the_row(); ?>
        <?php if( get_sub_field('rcm_list_text')): ?><li><?php echo get_sub_field('rcm_list_text'); ?></li><?php endif; ?>
		<?php endwhile; ?>	
		<?php endif; ?>	
      </ul>

      <div class="rcm-actions">
		 <?php
			$rcm_cta_1 = get_sub_field('rcm_cta_1');
			if($rcm_cta_1):
			$link_url = $rcm_cta_1['url'];
			$link_title = $rcm_cta_1['title'];
			$link_target = $rcm_cta_1['target'] ? $rcm_cta_1['target'] : '_self';
			?>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn"><?php echo esc_html($link_title); ?></a><?php endif; ?>
		<?php
			$rcm_cta_2 = get_sub_field('rcm_cta_2');
			if($rcm_cta_2):
			$link_url = $rcm_cta_2['url'];
			$link_title = $rcm_cta_2['title'];
			$link_target = $rcm_cta_2['target'] ? $rcm_cta_2['target'] : '_self';
			?>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-alt"><?php echo esc_html($link_title); ?></a><?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php elseif( get_row_layout() == 'home_social_media_module' ): ?> 
<section class="home-social-media-module">
	<div class="inner-wrap">
		<div class="hsmm-heading-section">
           <?php if( get_sub_field('sbpsm_heading')): ?><h2 class="hsmm-heading"><?php echo get_sub_field('sbpsm_heading'); ?></h2><?php endif; ?>
			<?php if( get_sub_field('sbpsm_description')): ?><div class="hsmm-text"><?php echo get_sub_field('sbpsm_description'); ?></div><?php endif; ?>
		</div>
		<div class="hsmm-cta-wrap">
			<?php if( have_rows('sbpsm_ctas') ): while ( have_rows('sbpsm_ctas') ) : the_row(); ?>
			 <?php
			$sbpsm_link = get_sub_field('sbpsm_link');
			if($sbpsm_link):
			$link_url = $sbpsm_link['url'];
			$link_title = $sbpsm_link['title'];
			$link_target = $sbpsm_link['target'] ? $sbpsm_link['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn <?php echo get_sub_field('sbpsm_class'); ?>"><?php $image = get_sub_field('sbpsm_icon');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="sbpsm-icon style-svg" /><?php endif; ?><span><?php echo esc_html($link_title); ?></span></a><?php endif; ?>
			<?php  endwhile; ?><?php endif; ?>
		</div>
		<?php if( get_sub_field('sbpsm_title')): ?><h3 class="hsmm-title"><?php echo get_sub_field('sbpsm_title'); ?></h3><?php endif; ?>
		<?php if( get_sub_field('sbpsm_hash_tags')): ?><span class="hsmm-hashtags"><?php echo get_sub_field('sbpsm_hash_tags'); ?></span><?php endif; ?>
	</div>
</section>

<?php elseif( get_row_layout() == 'reviews_module' ): ?> 
<section class="reviews-module">
	<div class="inner-wrap">
		<?php if( get_sub_field('rm_heading')): ?><div class="rm-heading-section">
			 <h2 class="reviews-heading"><?php echo get_sub_field('rm_heading'); ?></h2>
		</div><?php endif; ?>

		<div class="slider-shell">
			<button class="arrow prev" aria-label="Previous review">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="34" viewBox="0 0 20 34" fill="none">
			<path d="M16.6667 33.3333L19.625 30.375L5.91667 16.6667L19.625 2.95833L16.6667 0L0 16.6667L16.6667 33.3333Z" fill="#0A4492"/>
			</svg></button>

			<!-- STATIC stage: this box never moves. JS only ever swaps what's inside it. -->
			<div class="review-card" id="siReviewStage">
			<div class="stage-photo" id="stagePhoto">
				<div class="polaroid"><img id="photoImg" src="" alt=""></div>
			</div>
			<div class="stage-text" id="stageText">
				<span class="quote-mark">&ldquo;</span>
				<p class="review-text" id="textQuote"></p>
				<div class="review-name" id="textName"></div>
				<div class="review-role" id="textRole"></div>
			</div>
			</div>

			<button class="arrow next" aria-label="Next review">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="34" viewBox="0 0 20 34" fill="none">
			<path d="M2.95833 33.3333L0 30.375L13.7083 16.6667L0 2.95833L2.95833 0L19.625 16.6667L2.95833 33.3333Z" fill="#0A4492"/>
			</svg>
			</button>

			<div class="review-dots" id="dots"></div>
		</div>

		<div class="review-ctas">
			 <?php
			$rcm_cta_1 = get_sub_field('rm_cta1');
			if($rcm_cta_1):
			$link_url = $rcm_cta_1['url'];
			$link_title = $rcm_cta_1['title'];
			$link_target = $rcm_cta_1['target'] ? $rcm_cta_1['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-alt"><?php echo esc_html($link_title); ?></a><?php endif; ?>	
			<?php
			$rcm_cta_2 = get_sub_field('rm_cta2');
			if($rcm_cta_2):
			$link_url = $rcm_cta_2['url'];
			$link_title = $rcm_cta_2['title'];
			$link_target = $rcm_cta_2['target'] ? $rcm_cta_2['target'] : '_self';
			?>
			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn"><?php echo esc_html($link_title); ?></a><?php endif; ?>
		</div>

		<ul class="si-review-data" id="siReviewData" hidden>
			<?php if( have_rows('rm_items') ): while ( have_rows('rm_items') ) : the_row(); ?>
			<?php $image = get_sub_field('rmi_image');  if( !empty( $image ) ): ?>
			<li data-side="<?php echo get_sub_field('rmi_class'); ?>"
				data-img="<?php echo esc_url($image['url']); ?>"
				data-alt="<?php echo esc_attr($image['alt']); ?>"
				data-name="<?php echo get_sub_field('rmi_name'); ?>"
                data-role="<?php echo get_sub_field('rmi_role'); ?>">
				>
			     <?php echo get_sub_field('rmi_text'); ?>
			</li><?php endif; ?>	
			<?php endwhile; ?>	
		<?php endif; ?>	
		</ul>
	</div>
</section>


<?php elseif( get_row_layout() == 'shop_by_play_style_module' ): ?>
	<section class="shop-by-play-module">
		<div class="inner-wrap">
			<div class="sbpm-heading-section">
                <?php if( get_sub_field('sbpsm_heading')): ?><h2 class="sbpm-heading"><?php echo get_sub_field('sbpsm_heading'); ?></h2><?php endif; ?>
				<?php if( get_sub_field('sbpsm_description')): ?><div class="sbmp-text"><?php echo get_sub_field('sbpsm_description'); ?></div><?php endif; ?>
			</div>
			<div class="sbpm-wrap">
                 <?php if( have_rows('sbpsm_items') ): while ( have_rows('sbpsm_items') ) : the_row(); ?>
                <?php
					$sbpsm_link = get_sub_field('sbpsm_link');
					if($sbpsm_link):
					$link_url = $sbpsm_link['url'];
					$link_title = $sbpsm_link['title'];
					$link_target = $sbpsm_link['target'] ? $sbpsm_link['target'] : '_self';
					?>
				<a class="play-card <?php echo get_sub_field('sbpsm_class'); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php $image = get_sub_field('sbpsm_image');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="sbpm-img" /><?php endif; ?>
				    <?php if( get_sub_field('sbpsm_title')): ?><span class="badge badge-red"><?php echo get_sub_field('sbpsm_title'); ?></span><?php endif; ?>
				</a> <?php endif; ?>	

               <?php endwhile; ?>	
			  <?php endif; ?>	
			</div>
		</div>
	</section>

<?php elseif( get_row_layout() == 'your_dog_goes_hard_module' ): ?>
<section class="your-dog-goes-hard-module">
  <div class="inner-wrap">
    <div class="ydghm-media">
	  <?php $image = get_sub_field('ydghm_image');  if( !empty( $image ) ): ?>
		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="ydghm-img" /><?php endif; ?>
    </div>

    <div class="ydghm-content">
      <div class="ydghm-heading-section">
        <?php if( get_sub_field('ydghm_heading')): ?><h2 class="ydghm-heading"><?php echo get_sub_field('ydghm_heading'); ?></h2><?php endif; ?>
      </div>

      <div class="ydghm-list">
        <?php if( have_rows('list_item') ): while ( have_rows('list_item') ) : the_row(); ?>
        <div class="ydghm-item">
          <span class="ydghm-icon">
            <?php $image = get_sub_field('ydghm_icon');  if( !empty( $image ) ): ?>
		    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" /><?php endif; ?>
          </span>
          <div class="ydghm-item-content">
             <?php if( get_sub_field('ydghm_title')): ?><h3><?php echo get_sub_field('ydghm_title'); ?></h3><?php endif; ?>
            <?php if( get_sub_field('ydghm_content')): ?> <div class="ydghm-text"><?php echo get_sub_field('ydghm_content'); ?></div><?php endif; ?>
          </div>
        </div>
		<?php endwhile; ?>	
			  <?php endif; ?>	
 
      </div>
       <?php
			$shop_cta = get_sub_field('shop_cta');
			if($shop_cta):
			$link_url = $shop_cta['url'];
			$link_title = $shop_cta['title'];
			$link_target = $shop_cta['target'] ? $shop_cta['target'] : '_self'; ?>
      <div class="ydghm-actions ydghm-actions-mobile">
        <a class="btn btn-outline" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a>
      </div><?php endif; ?>

      <div class="ydghm-guarantee">
		<?php $image = get_sub_field('ydghm_image');  if( !empty( $image ) ): ?>
		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="ydghm-guarantee-img" /><?php endif; ?>

        <div class="ydghm-guarantee-content">
         <?php if( get_sub_field('guarantee_title')): ?> <h3><?php echo get_sub_field('guarantee_title'); ?></h3><?php endif; ?>
          <div class="ydghm-guarantee-text">
            <?php if( get_sub_field('guarantee_text')): ?><p><?php echo get_sub_field('guarantee_text'); ?></p><?php endif; ?>
          </div>
		   <?php
			    $about_cta = get_sub_field('about_cta');
				if($about_cta):
				$link_url = $about_cta['url'];
				$link_title = $about_cta['title'];
				$link_target = $about_cta['target'] ? $about_cta['target'] : '_self';
				?>
          <a class="btn btn-yellow ydghm-guarantee-mobile-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a><?php endif; ?>
        </div>
      </div>

      <div class="ydghm-actions ydghm-actions-desktop">
		<?php
			$shop_cta = get_sub_field('shop_cta');
		    if($shop_cta):
			$link_url = $shop_cta['url'];
			$link_title = $shop_cta['title'];
			$link_target = $shop_cta['target'] ? $shop_cta['target'] : '_self';?>
        <a class="btn-alt" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a><?php endif; ?>
        <?php
			$about_cta = get_sub_field('about_cta');
			if($about_cta):
			$link_url = $about_cta['url'];
			$link_title = $about_cta['title'];
			$link_target = $about_cta['target'] ? $about_cta['target'] : '_self';?>
		<a class="btn-yellow" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a><?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php elseif( get_row_layout() == 'home_bucket_module' ): ?>
<section class="home-bucket-module">
	<div class="inner-wrap">
       <?php if( have_rows('hbm_item') ): while ( have_rows('hbm_item') ) : the_row(); ?>
	    <?php
		$hbm_link = get_sub_field('hbm_link');
	    if($hbm_link):
		$link_url = $hbm_link['url'];
		$link_title = $hbm_link['title'];
		$link_target = $hbm_link['target'] ? $hbm_link['target'] : '_self';
		?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="hbm-item">
			 <?php $hbm_image = get_sub_field('hbm_image');  if( !empty( $hbm_image ) ): ?>
          <img src="<?php echo esc_url($hbm_image['url']); ?>" alt="<?php echo esc_attr($hbm_image['alt']); ?>" title="<?php echo esc_attr($hbm_image['alt']); ?>" class="hbm-icon" />
		   <?php endif; ?>
			<?php if( get_sub_field('hbm_title')): ?><span class="hbm-title"><?php echo get_sub_field('hbm_title'); ?></span><?php endif; ?>
			<?php if( get_sub_field('hbm_text')): ?><span class="hbm-text"><?php echo get_sub_field('hbm_text'); ?></span><?php endif; ?>
		</a><?php endif; ?>	
        <?php endwhile; ?>	
	<?php endif; ?>	
	</div>
</section>

<?php elseif( get_row_layout() == 'product_favorites_module' ): ?>
<section class="product-favorites-module">
  <div class="inner-wrap">
    <div class="pfm-heading-section">
      <?php if( get_sub_field('pfm_heading')): ?><h2 class="pfm-heading"><?php echo get_sub_field('pfm_heading'); ?></h2><?php endif; ?>
      <?php if( get_sub_field('pfm_text')): ?><div class="pfm-text"><?php echo get_sub_field('pfm_text'); ?></div><?php endif; ?>
    </div>

    <div class="pfm-wrap">
      <?php if( have_rows('pfm_item') ): while ( have_rows('pfm_item') ) : the_row(); ?>
      <div class="pfm-card">
        <div class="pfm-badges">
			<?php $pfm_icon_image1 = get_sub_field('pfm_icon_image1');  if( !empty( $pfm_icon_image1 ) ): ?>
          <span class="pfm-badge pfm-badge-bone"><img src="<?php echo esc_url($pfm_icon_image1['url']); ?>" alt="<?php echo esc_attr($pfm_icon_image1['alt']); ?>" title="<?php echo esc_attr($pfm_icon_image1['alt']); ?>" /></span>
		  <?php endif; ?>
		  <?php $pfm_icon_image2 = get_sub_field('pfm_icon_image2');  if( !empty( $pfm_icon_image2 ) ): ?>
          <span class="pfm-badge pfm-badge-paw"><img src="<?php echo esc_url($pfm_icon_image2['url']); ?>" alt="<?php echo esc_attr($pfm_icon_image2['alt']); ?>" title="<?php echo esc_attr($pfm_icon_image2['alt']); ?>" /></span>
		   <?php endif; ?>
        </div>
		<?php $pfm_featured_image = get_sub_field('pfm_featured_image');  if( !empty( $pfm_featured_image ) ): ?>
        <div class="pfm-img-wrap">
		  <img src="<?php echo esc_url($pfm_featured_image['url']); ?>" alt="<?php echo esc_attr($pfm_featured_image['alt']); ?>" title="<?php echo esc_attr($pfm_featured_image['alt']); ?>"  class="pfm-img" />
        </div>
		<?php endif; ?>
        <div class="pfm-card-content">
          <?php if( get_sub_field('pfm_title')): ?><h3><?php echo get_sub_field('pfm_title'); ?></h3><?php endif; ?>
          <?php if( get_sub_field('pfm_desc')): ?><p><?php echo get_sub_field('pfm_desc'); ?></p><?php endif; ?>
          <a href="#" class="btn-blue">Read More</a>
        </div>
      </div>
	  <?php endwhile; ?>	
	<?php endif; ?>	

    </div>
     <?php
		$pfm_main_cta = get_sub_field('pfm_main_cta');
	    if($pfm_main_cta):
		$link_url = $pfm_main_cta['url'];
		$link_title = $pfm_main_cta['title'];
		$link_target = $pfm_main_cta['target'] ? $pfm_main_cta['target'] : '_self';
		?>
    <div class="pfm-actions">
      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-red"><?php echo esc_html($link_title); ?></a>
    </div>
	 <?php endif; ?>	
  </div>
</section>


<?php elseif( get_row_layout() == 'dogs_support_module' ): ?>
	<section class="dogs-support-module">
  <div class="inner-wrap">
    <div class="dsm-content">
      <div class="dsm-heading-section">
        <?php if( get_sub_field('dsm_heading')): ?><h2 class="dsm-heading"><?php echo get_sub_field('dsm_heading'); ?></h2><?php endif; ?>	
      </div>

      <?php if( get_sub_field('dsm_text')): ?><div class="dsm-text"><?php echo get_sub_field('dsm_text'); ?></div><?php endif; ?>

      <div class="dsm-quote">
        <div class="dsm-quote-mark">&ldquo;</div>
        <blockquote>
          <?php if( get_sub_field('quote_text')): ?><?php echo get_sub_field('quote_text'); ?><?php endif; ?>
          <cite><strong><?php echo get_sub_field('quote_author'); ?></strong><br /><?php echo get_sub_field('quote_designation'); ?></cite>
        </blockquote>
      </div>

      <div class="dsm-actions">
		 <?php
		$cta_1 = get_sub_field('cta_1');
	    if($cta_1):
		$link_url = $cta_1['url'];
		$link_title = $cta_1['title'];
		$link_target = $cta_1['target'] ? $cta_1['target'] : '_self';
		?>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn-alt"><?php echo esc_html($link_title); ?></a><?php endif; ?>
         <?php
		$cta_2 = get_sub_field('cta_2');
	    if($cta_2):
		$link_url = $cta_2['url'];
		$link_title = $cta_2['title'];
		$link_target = $cta_2['target'] ? $cta_2['target'] : '_self';
		?>
		<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn"><?php echo esc_html($link_title); ?></a><?php endif; ?>
      </div>
    </div>

    <div class="dsm-media">
      <div class="dsm-photo-card">
		 <?php $dsm_image = get_sub_field('dsm_image');  if( !empty( $dsm_image ) ): ?>
        <img src="<?php echo esc_url($dsm_image['url']); ?>" alt="<?php echo esc_attr($dsm_image['alt']); ?>" title="<?php echo esc_attr($dsm_image['title']); ?>" class="dsm-photo" />
		<?php endif; ?>
		<?php $dsm_stamp_image = get_sub_field('dsm_stamp_image');  if( !empty( $dsm_stamp_image ) ): ?>
        <img src="<?php echo esc_url($dsm_stamp_image['url']); ?>" alt="<?php echo esc_attr($dsm_stamp_image['alt']); ?>" alt="<?php echo esc_attr($dsm_stamp_image['title']); ?>" class="dsm-stamp" /><?php endif; ?>
      </div>
      </div>
    </div>
  </div>
</section>


	  <?php elseif( get_row_layout() == 'news_module' ): ?>
	  <section class="news-module">
		<div class="inner-wrap">
           <?php if( have_rows('nm_items') ): while ( have_rows('nm_items') ) : the_row(); ?>
			<div class="nm-wrap">
				<div class="nm-image">
					<?php $image = get_sub_field('nm_image');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="nm-img" /><?php endif; ?>
				</div>
				<div class="nm-content">
					<?php if( get_sub_field('nm_heading')): ?><h2 class="nm-heading"><?php echo get_sub_field('nm_heading'); ?></h2><?php endif; ?>	
					<?php if( get_sub_field('nm_text')): ?><div class="nm-text"><?php echo get_sub_field('nm_text'); ?></div><?php endif; ?>	
					<?php
					$nm_link = get_sub_field('nm_link');
					if($nm_link):
					$link_url = $nm_link['url'];
					$link_title = $nm_link['title'];
					$link_target = $nm_link['target'] ? $nm_link['target'] : '_self';
					?>
						<a href="<?php echo esc_url($link_url); ?>" class="nm-btn btn" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a><?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>	
			<?php endif; ?>	

		</div>
	  </section>

	  	  <?php elseif( get_row_layout() == 'giving_back_module' ): ?>
	  <section class="giving-back-module">
		<div class="inner-wrap">
             <?php if( have_rows('gbm_items') ): while ( have_rows('gbm_items') ) : the_row(); ?>
			<div class="gbm-wrap <?php echo get_sub_field('class'); ?>">
				<div class="gbm-image">
					<?php
					$gbm_image_link = get_sub_field('gbm_image_link');
					if($gbm_image_link):
					$link_url = $gbm_image_link['url'];
					$link_title = $gbm_image_link['title'];
					$link_target = $gbm_image_link['target'] ? $gbm_image_link['target'] : '_self';
					?>
					<a href="<?php echo esc_url($link_url); ?>" class="gbmi-link" target="<?php echo esc_attr( $link_target ); ?>">
                      <?php $image = get_sub_field('gbim_image');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="gbim-logo" /><?php endif; ?>
					</a><?php endif; ?>	
				</div>
				<?php if( get_sub_field('gbim_content')): ?><div class="gbm-content"><?php echo get_sub_field('gbim_content'); ?></div><?php endif; ?>	
				<div class="gbm-img-caption">
                    <?php $image = get_sub_field('gbim_img');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="gbim-img" />
					      <span class="gbim-caption"><?php echo esc_attr($image['caption']); ?></span>	
						<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>	
			<?php endif; ?>	

		</div>
	  </section>

      <?php elseif( get_row_layout() == 'guarantee_module' ): ?>  
	  <section class="guarantee-module">
		<div class="inner-wrap">
            <?php if( have_rows('gm_items') ): while ( have_rows('gm_items') ) : the_row(); ?>
			<div class="gm-wrap">
				<div class="gm-imgage">
					<?php $image = get_sub_field('gm_image');  if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="gm-img" />
						<?php endif; ?>
				</div>
				<div class="gm-content">
					<?php if( get_sub_field('gm_heading')): ?><h2 class="gm-heading"><?php echo get_sub_field('gm_heading'); ?></h2><?php endif; ?>	
					<?php if( get_sub_field('gm_content')): ?><div class="gm-text"><?php echo get_sub_field('gm_content'); ?></div><?php endif; ?>	
				</div>
			</div>
            <?php endwhile; ?>	
			<?php endif; ?>	
		</div>
	  </section>


      <?php elseif( get_row_layout() == 'pillar_page_nav_module' ): ?>    
      <section class="internal-links-nav">
      	<div class="inner-wrap">
			<div class="isn-wrap">
				<?php if( have_rows('isn_link_wrap') ): ?>
				<ul class="internal-links-wrap">
					<?php while ( have_rows('isn_link_wrap') ) : the_row(); ?>

					<li>
						<?php $link = get_sub_field('isn_add_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="super-smooth"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>	
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
      	</div>
		</section>	

		<?php elseif( get_row_layout() == 'destination_bucket_page_module' ): ?> 
		<section class="destination-bucket-page-module">
			<div class="inner-wrap">
				<div class="dbpm-buckets-wrap">
					<?php if( have_rows('dbpm_buckets') ): while ( have_rows('dbpm_buckets') ) : the_row(); ?>
						<div class="dbpm-buckets">
							<?php if(get_sub_field('dbpm_image')) : ?>
							<?php $dbpm_image = get_sub_field('dbpm_image'); ?>
							<div class="dbpm-image">
							   	<img src="<?php echo $dbpm_image['url']; ?>" alt="<?php echo $dbpm_image['title']; ?>" title="<?php echo $dbpm_image['title']; ?>">
							</div>
							<?php endif; ?>
							<div class="dbpm-content">
								<?php if( get_sub_field('dbpm_title')): ?>
						        <h2 class="dbpm-heading"><?php echo get_sub_field('dbpm_title'); ?></h2>
						        <?php endif; ?>

						        <?php if( get_sub_field('dbpm_desc')): ?>
						        <div><?php echo get_sub_field('dbpm_desc'); ?></div>
						        <?php endif; ?>

						        <?php
								$dbpm_link = get_sub_field('dbpm_link');
								if($dbpm_link):
								$link_url = $dbpm_link['url'];
								$link_title = $dbpm_link['title'];
								$link_target = $dbpm_link['target'] ? $dbpm_link['target'] : '_self';
								?>
								<div class="dbpm-cta-wrap">
					            	<a class="btn" href="<?php echo esc_url($link_url); ?>"><span><?php echo esc_html($link_title); ?></span></a>
								</div>
					            <?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>	
					<?php endif; ?>
				</div>
			</div>
		</section>   

<?php endif; ?>
<?php endwhile; echo '</section>'; ?>
<?php endif; ?>




