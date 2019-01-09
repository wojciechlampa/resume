<?php
if (!empty(get_sub_field('product')->ID)) {
    $product = wc_get_product(get_sub_field('product')->ID);
} else {
    global $product;
}

if (is_archive()) {
    $column_class = 'column small-12 medium-6 large-4 small-product';
} else {
    $column_class = 'column small-12 medium-4 large-3 small-product';
}
?>
<div class="<?php echo $column_class ?>">
        <div class="photo">
        <div class="notify-label">
            <?php if ($product->is_on_sale()): ?>
                <div class="promo label">
                    <span><?php percent_of_discount($product) ?></span>
                </div>
            <?php endif; ?>
            <?php if ( strtotime($product->get_date_created()) > strtotime('-30 days') ) { ?>
                <div class="new label">
                    <span>Nowość</span>
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo $product->get_permalink() ?>">
            <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'image-270-210') ?>"
                 alt="<?php echo get_bloginfo('name') ?> - <?php $product->get_name() ?>">
        </a>
    </div>
    <div class="info">
        <?php $product_cat = get_term($product->get_category_ids()[0], 'product_cat') ?>
        <a href="<?php echo get_term_link($product_cat->term_id, 'product_cat') ?>">
            <span class="product-category"><?php echo $product_cat->name ?></span>
        </a>
        <a href="<?php echo $product->get_permalink() ?>">
            <h4 class="product-title"><?php echo $product->get_title() ?></h4>
        </a>
    </div>
    <div class="price-cart">
        <span class="price"><?php echo $product->get_price_html() ?></span>
        <a href="<?php echo $product->add_to_cart_url() ?>"
           class="btn btn-text btn-add-to-cart">Dodaj do koszyka <i class="fa fa-shopping-basket"></i></a>
    </div>
</div>