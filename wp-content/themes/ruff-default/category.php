<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
 <div class="site-content blog-archive" role="main">
    <div class="inner-wrap">

        <?php if (have_posts()) : ?>

            <div class="entries"
                 data-archive="default"
                 data-layout="enhanced-grid"
                 data-cards="boxed">

                <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class('entry-card card-content'); ?>>

                        <?php
                        $categories = get_the_category();

                        if (!empty($categories)) :
                        ?>
                            <ul class="entry-meta">
                                <li class="meta-categories">
                                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
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

                            <?php if ( get_comments_number() > 0 ) : ?>
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

            <?php
            $paged = max(1, get_query_var('paged'));
            global $wp_query;
            $total_pages = $wp_query->max_num_pages;
            ?>

            <div class="custom-pagination">

                <div class="pagination-prev">
                    <?php
                    previous_posts_link(
                        '<span class="arrow">&larr;</span> Prev'
                    );
                    ?>
                </div>

                <div class="pagination-numbers">
                    <?php
                    echo paginate_links(array(
                        'base'      => str_replace(
                            999999999,
                            '%#%',
                            esc_url(get_pagenum_link(999999999))
                        ),
                        'format'    => '/page/%#%/',
                        'current'   => $paged,
                        'total'     => $total_pages,
                        'mid_size'  => 2,
                        'end_size'  => 1,
                        'prev_next' => false
                    ));
                    ?>
                </div>

                <div class="pagination-next">
                    <?php
                    next_posts_link(
                        'Next <span class="arrow">&rarr;</span>',
                        $total_pages
                    );
                    ?>
                </div>

            </div>

        <?php else : ?>

            <h2>No posts found in this category.</h2>

        <?php endif; ?>

    </div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>