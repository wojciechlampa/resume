<section class="featured-products-section">
    <div class="row row-top">
        <div class="large-12 column column-title">
            <h3>Wyróżnione produkty</h3>
            <p>Lorem ipsum dolor sit amet consecteur</p>
        </div>
    </div>
    <div class="row row-bottom">
        <div class="small-12 medium-12 large-12 column column-slider">
            <div class="row products-slider">
                <?php if (have_rows('products')): ?>
                    <?php while (have_rows('products')) : the_row() ?>
                        <?php include(locate_template('templates/small-product.php', false, false)) ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'orderby' => 'post_date',
                        'order' => 'DESC'
                    );
                    $products_query = new WP_Query($args);

                    while ($products_query->have_posts()) :
                        $products_query->the_post();
                        include(locate_template('templates/small-product.php', false, false));
                    endwhile;
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>