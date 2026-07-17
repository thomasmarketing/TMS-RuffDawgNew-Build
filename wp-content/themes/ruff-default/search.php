<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="site-content" role="main">

<div class="inner-wrap">

    <?php if ( have_posts() ) : ?>

        <div class="entries"
             data-archive="default"
             data-layout="grid"
             data-cards="boxed">

            <?php while ( have_posts() ) : the_post(); ?>

                <article <?php post_class('entry-card card-content'); ?>>

                    <?php
                    $categories = get_the_category();

                    if ( ! empty( $categories ) ) :
                    ?>
                        <ul class="entry-meta">
                            <li class="meta-categories">
                                <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                                    <?php echo esc_html( $categories[0]->name ); ?>
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

        <div class="custom-pagination">

            <div class="pagination-prev">
                <?php
                previous_posts_link(
                    '<span class="arrow">
                        <svg width="9" height="9" viewBox="0 0 15 15" fill="currentColor">
                            <path d="M10.9,15c-0.2,0-0.4-0.1-0.6-0.2L3.6,8c-0.3-0.3-0.3-0.8,0-1.1l6.6-6.6c0.3-0.3,0.8-0.3,1.1,0c0.3,0.3,0.3,0.8,0,1.1L5.2,7.4l6.2,6.2c0.3,0.3,0.3,0.8,0,1.1C11.3,14.9,11.1,15,10.9,15z"></path>
                        </svg>
                    </span> Prev'
                );
                ?>
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
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $wp_query->max_num_pages,
                    'mid_size'  => 2,
                    'end_size'  => 1,
                    'prev_next' => false,
                    'type'      => 'plain'
                ));
                ?>
            </div>

            <div class="pagination-next">
                <?php
                next_posts_link(
                    'Next
                    <span class="arrow">
                        <svg width="9" height="9" viewBox="0 0 15 15" fill="currentColor">
                            <path d="M4.1,15c0.2,0,0.4-0.1,0.6-0.2L11.4,8c0.3-0.3,0.3-0.8,0-1.1L4.8,0.2C4.5-0.1,4-0.1,3.7,0.2C3.4,0.5,3.4,1,3.7,1.3l6.1,6.1l-6.2,6.2c-0.3,0.3-0.3,0.8,0,1.1C3.7,14.9,3.9,15,4.1,15z"></path>
                        </svg>
                    </span>'
                );
                ?>
            </div>

        </div>

    <?php else : ?>

        <div class="no-results">

            <h2>No Results Found</h2>

            <p>
                Sorry, we couldn't find anything matching
                "<?php echo esc_html( get_search_query() ); ?>".
            </p>

        </div>

    <?php endif; ?>

</div>

</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>