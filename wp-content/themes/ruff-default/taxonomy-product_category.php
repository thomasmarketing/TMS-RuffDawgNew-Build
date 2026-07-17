<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="site-content" role="main">
    <div class="inner-wrap">
<?php

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$order_by = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : '';

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 16,
    'paged'          => $paged,

    'tax_query' => array(
        array(
            'taxonomy'         => 'product_category',
            'field'            => 'term_id',
            'terms'            => get_queried_object_id(),
            'include_children' => true
        )
    )
);

/*
|--------------------------------------------------------------------------
| Sorting
|--------------------------------------------------------------------------
*/

switch ($order_by) {

    case 'latest':

        $args['orderby'] = 'date';
        $args['order']   = 'DESC';

        break;

    case 'title':

        $args['orderby'] = 'title';
        $args['order']   = 'ASC';

        break;

    case 'price_low':

        $args['meta_key'] = 'product_price';
        $args['orderby']  = 'meta_value_num';
        $args['order']    = 'ASC';

        break;

    case 'popularity':

        $args['meta_key'] = 'product_views';
        $args['orderby']  = 'meta_value_num';
        $args['order']    = 'DESC';

        break;

    case 'price_high':

        $args['meta_key'] = 'product_price';
        $args['orderby']  = 'meta_value_num';
        $args['order']    = 'DESC';

        break;

    default:

        $args['orderby'] = 'date';
        $args['order']   = 'DESC';

        break;
}

$products = new WP_Query($args);

?>

<div class="product-archive">

    <div class="archive-header">

        <div class="result-count">

            <?php if ($products->found_posts <= 16) : ?>

                Showing all <?php echo $products->found_posts; ?> results

            <?php else : ?>

                Showing
                <?php echo (($paged - 1) * 16) + 1; ?>
                –
                <?php echo min($paged * 16, $products->found_posts); ?>
                of
                <?php echo $products->found_posts; ?>
                results

            <?php endif; ?>

        </div>

        <?php get_template_part('parts/product-filter'); ?>

    </div>

    <div class="product-grid">

        <?php while($products->have_posts()) : $products->the_post(); ?>

            <?php get_template_part(
                'parts/product-card'
            ); ?>

        <?php endwhile; ?>

    </div>

 <?php
$total_pages = $products->max_num_pages;

if ($total_pages > 1) :
?>

<div class="custom-pagination">

    <div class="pagination-prev">
        <?php
        echo previous_posts_link(
            '<span class="arrow"><svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M10.9,15c-0.2,0-0.4-0.1-0.6-0.2L3.6,8c-0.3-0.3-0.3-0.8,0-1.1l6.6-6.6c0.3-0.3,0.8-0.3,1.1,0c0.3,0.3,0.3,0.8,0,1.1L5.2,7.4l6.2,6.2c0.3,0.3,0.3,0.8,0,1.1C11.3,14.9,11.1,15,10.9,15z"></path></svg></span> Prev',
            $total_pages
        );
        ?>
    </div>

    <div class="pagination-numbers">
        <?php
        echo paginate_links(array(
            'total'     => $total_pages,
            'current'   => $paged,
            'prev_next' => false,

            'add_args'  => array(
                'orderby' => $order_by
            )
        ));
        ?>
    </div>

    <div class="pagination-next">
        <?php
        echo next_posts_link(
            'Next <span class="arrow"><svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M4.1,15c0.2,0,0.4-0.1,0.6-0.2L11.4,8c0.3-0.3,0.3-0.8,0-1.1L4.8,0.2C4.5-0.1,4-0.1,3.7,0.2C3.4,0.5,3.4,1,3.7,1.3l6.1,6.1l-6.2,6.2c-0.3,0.3-0.3,0.8,0,1.1C3.7,14.9,3.9,15,4.1,15z"></path></svg></span>',
            $total_pages
        );
        ?>
    </div>

</div>

<?php endif; ?>

</div>
</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>