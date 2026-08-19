<?php if (!is_front_page() && is_home()):
	$id = intval(get_option('page_for_posts'));
else:
	$id = get_the_ID();
endif; ?>
<?php
$on_background = get_field('on_background', $id);
?>
<?php if ($on_background == true): ?>
	<div class="page-intro"
		<?php if (get_field('pi_bg', $id)) {
			echo 'style="background-image:url(' . get_field('pi_bg', $id) . ')"';
		} elseif (get_field('global_inner_page_banner', 'option')) {
			echo 'style="background-image:url(' . get_field('global_inner_page_banner', 'option') . ')"';
		} ?>>

		<div class="inner-wrap">
			<div class="pi-wrap">

				<?php if (is_home()): ?>
					<h1 class="pi-heading">Did You Know</h1>

				<?php elseif (is_404()): ?>
					<h1 class="pi-heading">Error 404: Page not found</h1>

				<?php elseif (is_author()): ?>
					<h1 class="pi-heading"><?php echo get_the_author(); ?></h1>

				<?php elseif (is_search()): ?>
					<h1 class="pi-heading">Search Results for: <?php echo get_search_query(); ?></h1>

				<?php elseif (is_category()): ?>
					<h1 class="pi-heading"><?php echo single_cat_title('', false); ?></h1>

				<?php elseif (is_archive('featured-product')): ?>
					<h1 class="pi-heading">Products</h1>

				<?php elseif (is_archive('post')): ?>

					<h1 class="pi-heading"><?php echo get_the_archive_title(); ?></h1>

				<?php elseif (get_field('pi_heading')): ?>
					<h1 class="pi-heading"><?php echo get_field('pi_heading', $id); ?></h1>

				<?php else: ?>
					<h1 class="pi-heading"><?php the_title(); ?></h1>
				<?php endif; ?>

			</div>

		</div>
	</div>
<?php else: ?>
	<div class="page-intros no-bg">
		<div class="inner-wrap">
			<div class="pi-wrap">

				<?php if (is_home()): ?>
					<h1 class="pi-heading">Did You Know</h1>

				<?php elseif (is_404()): ?>
					<h1 class="pi-heading">Error 404: Page not found</h1>

				<?php elseif (is_author()): ?>
					<h1 class="pi-heading"><?php echo get_the_author(); ?></h1>

				<?php elseif (is_search()): ?>
					<h1 class="pi-heading">Search Results for: <?php echo get_search_query(); ?></h1>

				<?php elseif (is_category()): ?>
					<h1 class="pi-heading"><?php echo single_cat_title('', false); ?></h1>

				<?php elseif (is_archive('featured-product')): ?>
					<h1 class="pi-heading">Products</h1>

				<?php elseif (is_archive('post')): ?>

					<h1 class="pi-heading"><?php echo get_the_archive_title(); ?></h1>

				<?php elseif (get_field('pi_heading')): ?>
					<h1 class="pi-heading"><?php echo get_field('pi_heading', $id); ?></h1>

				<?php else: ?>
					<h1 class="pi-heading"><?php the_title(); ?></h1>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif; ?>
<?php
$breadcrumbs = get_field('on_breadcrumb', $id);
if ($breadcrumbs == true):
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumb-menu"><div class="inner-wrap">', '</div></div>');
    }
endif;
?>