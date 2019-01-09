<?php global $product; ?>

<div class="row row-product">
    <div class="shrink column column-thumbnail">
        <div class="thumbnail">
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
                <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'image-100-100') ?>"
                     alt="<?php echo get_bloginfo('name') ?> - <?php $product->get_name() ?>">
            </a>
        </div>
    </div>
    <div class="column column-details">
        <div class="product-name">
            <a href="<?php echo $product->get_permalink() ?>">
                <h4 class="product-title"><?php echo $product->get_title() ?></h4>
            </a>
        </div>
        <div class="price">
            <span class="price"><?php echo $product->get_price_html() ?></span>
        </div>
        <div class="add-to-cart">
            <a href="<?php echo $product->add_to_cart_url() ?>" class="btn btn-text btn-add-to-cart">Dodaj do koszyka <i class="fa fa-shopping-basket"></i></a>
        </div>
    </div>
</div>