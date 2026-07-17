<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="site-content blog-archive author-archive" role="main">
     <div class="author-top-section">
                 <?php

		$author = get_queried_object();

		$author_post_count = count_user_posts($author->ID);

		$joined_date = date(
			'F j, Y',
			strtotime($author->user_registered)
		);

		?>

        <div class="author-hero">

			<div class="author-hero__avatar">
				<?php
				echo get_avatar(
					$author->ID,
					160,
					'',
					$author->display_name,
					array(
						'class' => 'author-avatar',
						'alt'   => $author->display_name,
						'extra_attr' => 'title="' . esc_attr($author->display_name) . '"'
					)
				);
				?>
			</div>

			<div class="author-hero__content">

				<h1 class="author-hero__name">
					<?php echo esc_html($author->display_name); ?>
				</h1>

				<?php if (!empty($author->description)) : ?>
					<div class="author-hero__bio">
						<?php echo wpautop($author->description); ?>
					</div>
				<?php endif; ?>

				<div class="author-hero__meta">

					<span>
						Joined: <?php echo esc_html($joined_date); ?>
					</span>

					<span class="separator">/</span>

					<span>
						Articles: <?php echo esc_html($author_post_count); ?>
					</span>

				</div>

				<div class="author-box-socials"><span><a href="<?php bloginfo('url'); ?>" aria-label="Website icon"><svg class="ct-icon" width="12" height="12" viewBox="0 0 20 20"><path d="M10 0C4.5 0 0 4.5 0 10s4.5 10 10 10 10-4.5 10-10S15.5 0 10 0zm6.9 6H14c-.4-1.8-1.4-3.6-1.4-3.6s2.8.8 4.3 3.6zM10 2s1.2 1.7 1.9 4H8.1C8.8 3.6 10 2 10 2zM2.2 12s-.6-1.8 0-4h3.4c-.3 1.8 0 4 0 4H2.2zm.9 2H6c.6 2.3 1.4 3.6 1.4 3.6C4.3 16.5 3.1 14 3.1 14zM6 6H3.1c1.6-2.8 4.3-3.6 4.3-3.6S6.4 4.2 6 6zm4 12s-1.3-1.9-1.9-4h3.8c-.6 2.1-1.9 4-1.9 4zm2.3-6H7.7s-.3-2 0-4h4.7c.3 1.8-.1 4-.1 4zm.3 5.6s1-1.8 1.4-3.6h2.9c-1.6 2.7-4.3 3.6-4.3 3.6zm1.7-5.6s.3-2.1 0-4h3.4c.6 2.2 0 4 0 4h-3.4z"></path></svg></a></span></div>

			</div>

		</div>
	 </div> 

    <div class="inner-wrap">
        <?php if (have_posts()) : ?>

            <div class="entries"
                 data-archive="author"
                 data-layout="grid"
                 data-cards="boxed">

                <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class('entry-card card-content'); ?>>

                        <?php
                        $categories = get_the_category();

                        if (!empty($categories)) :
                        ?>
                            <ul class="entry-meta">
                                <li class="meta-categories">
                                    <a href="<?php echo esc_url(
                                        get_category_link(
                                            $categories[0]->term_id
                                        )
                                    ); ?>">
                                        <?php echo esc_html(
                                            $categories[0]->name
                                        ); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="entry-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <ul class="entry-meta post-meta">

                            <li class="meta-author">
                                <?php the_author_posts_link(); ?>
                            </li>

                            <li class="meta-date">
                                <?php echo get_the_date('F j, Y'); ?>
                            </li>

                            <?php if (get_comments_number() > 0) : ?>
                                <li class="meta-comments">
                                    <?php comments_popup_link(
                                        '0 Comments',
                                        '1 Comment',
                                        '% Comments'
                                    ); ?>
                                </li>
                            <?php endif; ?>

                        </ul>

                    </article>

                <?php endwhile; ?>

            </div>

            <div class="custom-pagination">

                <div class="pagination-prev">
                    <?php previous_posts_link('← Prev'); ?>
                </div>

                <div class="pagination-numbers">

                    <?php
                    global $wp_query;

                    echo paginate_links(array(
                        'base'      => str_replace(
                            999999999,
                            '%#%',
                            esc_url(get_pagenum_link(999999999))
                        ),
                        'format'    => '/page/%#%/',
                        'current'   => max(
                            1,
                            get_query_var('paged')
                        ),
                        'total'     => $wp_query->max_num_pages,
                        'prev_next' => false
                    ));
                    ?>

                </div>

                <div class="pagination-next">
                    <?php next_posts_link(
                        'Next →',
                        $wp_query->max_num_pages
                    ); ?>
                </div>

            </div>

        <?php else : ?>

            <h2>No posts found.</h2>

        <?php endif; ?>

    </div>

</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>