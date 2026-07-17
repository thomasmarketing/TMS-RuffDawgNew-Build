<article class="product-card">

    <a href="<?php the_permalink(); ?>" class="product-image-link">
        <?php the_post_thumbnail(
            'medium',
            array(
                'class' => 'product-image'
            )
        ); ?>
    </a>

    <h3 class="product-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h3>

<?php
$terms = get_the_terms(get_the_ID(), 'product_category');

if ($terms && !is_wp_error($terms)) :

    $links = array();

    // Replace with your actual parent category slug
    $parent_term = get_term_by(
        'slug',
        'all-retrieving-toys',
        'product_category'
    );

    // Show parent category first
    if ($parent_term) {
        $links[] = sprintf(
            '<a href="%s">%s</a>',
            esc_url(get_term_link($parent_term)),
            esc_html($parent_term->name)
        );
    }

    // Show other categories
    foreach ($terms as $term) {

        // Skip the parent category if already assigned
        if (
            $parent_term &&
            $term->term_id === $parent_term->term_id
        ) {
            continue;
        }

        $links[] = sprintf(
            '<a href="%s">%s</a>',
            esc_url(get_term_link($term)),
            esc_html($term->name)
        );
    }
?>
    <div class="pc-categories">
        <?php echo implode(', ', $links); ?>
    </div>
<?php endif; ?>

    <a href="<?php the_permalink(); ?>" class="btn pc-btn">
        Read More
    </a>

</article>