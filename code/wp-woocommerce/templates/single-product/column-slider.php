<?php global $product ?>
<div class="small-12 medium-8 large-8 column column-slider">
    <div class="row row-in">
        <div class="small-12 medium-3 large-3 column column-as-nav">
            <div class="product-gallery-slider-as-nav" id="product-gallery-slider-as-nav">
                <?php
                $gallery_ids = $product->get_gallery_image_ids();
                foreach ($gallery_ids as $id): ?>
                    <div class="slide">
                        <img src="<?php echo wp_get_attachment_image_url($id, 'image-170-130') ?>" alt="">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="small-12 medium-9 large-9 column column-slider">
            <div class="notify-label">
                <?php if ($product->is_on_sale()): ?>
                    <div class="promo label">
                        <span><?php percent_of_discount($product) ?></span>
                    </div>
                <?php endif; ?>
                <?php if (strtotime($product->get_date_created()) > strtotime('-30 days')) { ?>
                    <div class="new label">
                        <span>Nowość</span>
                    </div>
                <?php } ?>
            </div>
            <div class="product-gallery-slider" id="product-gallery-slider">
                <?php foreach ($gallery_ids as $id): ?>
                    <div class="slide">
                        <a href="<?php echo wp_get_attachment_image_url($id, 'image-1200-1200') ?>"
                           data-lightbox="products-gallery">
                            <img src="<?php echo wp_get_attachment_image_url($id, 'image-570-440') ?>"
                                 alt="">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>