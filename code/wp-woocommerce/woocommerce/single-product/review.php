<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div class="row row-comment">
        <div class="small-4 medium-2 column column-rating">
            <?php if (get_comment_meta($comment->comment_ID, 'rating', true)): ?>
                <?php
                $rating = get_comment_meta($comment->comment_ID, 'rating', true);
                $rating_output = ($rating * 2) * 10;
                ?>
                <span class="stars">
                    <i class="star-o"></i>
                    <i class="star" style="width: <?php echo $rating_output . '%' ?>;"></i>
                </span>
                <div class="rating"><?php echo get_comment_meta($comment->comment_ID, 'rating', true) ?> / 5</div>
            <?php endif ?>
        </div>
        <div class="small-8 medium-10 column column-review">
            <p class="text"><?php echo get_comment_text() ?></p>
            <p class="author"><?php echo get_comment_author() ?> | <?php echo get_comment_date('d.m.Y') ?></p>
        </div>
    </div>
</li>