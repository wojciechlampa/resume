<?php global $product ?>
<div class="small-12 medium-4 large-4 column column-buy">
    <div class="inner">
        <h2 class="title"><?php echo $product->get_title() ?></h2>
        <div class="reviews">
            <div class="row row-in-reviews">
                <div class="shrink column column-in column-in-reviews-link align-self-middle">
                    <a class="scroll-to-product-tabs"
                       href="#opinie"><?php product_reviews_count($product) ?></a>
                </div>
                <div class="column column-in column-in-reviews-stars">
                    <?php product_avarage_rating($product) ?>
                </div>
            </div>
        </div>
        <div class="small-details">
            <?php if (!empty($product->get_sku())): ?>
                <p class="sku"><strong><i>Kod:</i></strong> <?php echo $product->get_sku() ?></p>
            <?php endif; ?>
            <?php if (!empty($product->get_attribute('kolor'))): ?>
                <p class="color">
                    <strong><i>Kolor:</i></strong> <?php echo $product->get_attribute('kolor') ?></p>
            <?php endif; ?>
        </div>
        <div class="price">
            <?php echo $product->get_price_html() ?>
        </div>
        <div class="add-to-cart">
            <?php wc_get_template_part('single-product/add-to-cart/simple') ?>
        </div>
        <div class="other-info">
            <div class="row row-in row-in-other-info">
                <div class="small-4 column column-in column-in-deliver">
                    <i class="fa fa-share"></i>
                    <p>
                        <strong>Wysyłka:</strong><br>
                        3-7 dni <br>roboczych
                    </p>
                </div>
                <div class="small-4 column column-in column-in-returns">
                    <i class="fa fa-undo"></i>
                    <p>
                        <strong>Zwrot:</strong><br>
                        Do 12 dni <br>roboczych
                    </p>
                </div>
                <div class="small-4 column column-in column-in-guarantee">
                    <i class="fa fa-certificate"></i>
                    <p>
                        <strong>Gwarancja:</strong><br>
                        12 miesięcy
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="row row-in row-in-bottom">
            <div class="small-6 column column-in column-in-ask-for-product">
                <a class="scroll-to-product-tabs" href="#zapytaj">Zapytaj o produkt <i
                        class="fa fa-comment-o"></i></a>
            </div>
            <div class="small-6 column column-in column-in-share">
                <ul>
                    <?php
                    $product_permalink = urlencode(get_permalink());
                    $product_description = $product->get_short_description();
                    $imageurl = urlencode(wp_get_attachment_image_url($product->get_image_id()));
                    ?>
                    <li>
                        <a target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $product_permalink ?>&t=<?php echo get_the_title() ?>"><i
                                class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a target="_blank"
                           href="https://twitter.com/share?url=<?php echo $product_permalink ?>&via=<?php echo $twitter_handle ?>&text=<?php echo $product_description ?>"><i
                                class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a target="_blank"
                           href="//pinterest.com/pin/create/link/?url=<?php echo $product_permalink ?>&description=<?php echo get_the_title(); ?>&media=<?php echo $imageurl ?>"><i
                                class="fa fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
