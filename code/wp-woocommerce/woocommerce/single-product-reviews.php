<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.2.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

if (!comments_open()) {
    return;
}

?>
<div class="product-reviews" id="product-reviews">

    <?php if (have_comments()) : ?>

        <ul class="list-reviews">
            <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            echo '<nav class="reviews-pagination">';
            paginate_comments_links(apply_filters('woocommerce_comment_pagination_args', array(
                'prev_text' => '<i class="fa fa-caret-left"></i> Wcześniejsze',
                'next_text' => 'Późniejsze <i class="fa fa-caret-right"></i>',
                'type' => 'list',
            )));
            echo '</nav>';
        endif; ?>

    <?php else : ?>

        <p>Ten produkt nie posiada jeszcze opinii.</p>

    <?php endif; ?>

    <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>

        <div id="review_form_wrapper">
            <div id="review_form">
                <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                    'title_reply' => '<h4>Dodaj opinię</h4>',
                    'title_reply_to' => __('', 'woocommerce'),
                    'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
                    'title_reply_after' => '</span>',
                    'fields' => array(
                        'author' => '<div class="small-12 medium-4 column column-input column-author">' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" placeholder="Imię *" required /></div>',
                        'email' => '<div class="small-12 medium-4 column column-input column-email">' . '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" placeholder="Email *" required /></div>',
                    ),
                    'logged_in_as' => '',
                    'comment_field' => '',
                    'comment_notes_before' => '',
                    'comment_notes_after'  => '',
                    'label_submit'         => 'Wystaw opinię',
                    'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-orange btn-big">Wystaw opinię</button>',
                    'submit_field'         => '<div class="small-12 medium-4 column">%1$s %2$s</div></div></div></div>',
                );

                if ($account_page_url = wc_get_page_permalink('myaccount')) {
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(__('Musisz być <a href="%s">zalogowanym</a> by wystawić opinię.', 'woocommerce'), esc_url($account_page_url)) . '</p>';
                }

                if (get_option('woocommerce_enable_review_rating') === 'yes') {
                    $comment_form['comment_field'] = '<div class="row row-review-outer"><div class="small-12 medium-2 column column-rating"><label for="rating">' . 'Twoja ocena' . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__('Rate&hellip;', 'woocommerce') . '</option>
							<option value="5">' . esc_html__('Perfect', 'woocommerce') . '</option>
							<option value="4">' . esc_html__('Good', 'woocommerce') . '</option>
							<option value="3">' . esc_html__('Average', 'woocommerce') . '</option>
							<option value="2">' . esc_html__('Not that bad', 'woocommerce') . '</option>
							<option value="1">' . esc_html__('Very poor', 'woocommerce') . '</option>
						</select></div>';
                }

                $comment_form['comment_field'] .= '<div class="small-12 medium-10 column column-review"><div class="row row-review-inner"><div class="small-12 column column-input column-text"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Treść *" required></textarea></div>';

                comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                ?>
            </div>
        </div>

    <?php else : ?>

        <p class="woocommerce-verification-required"><?php _e('Tylko zalogowani użytkownicy, którzy zakupili ten produkt mogą wystawić opinie.', 'woocommerce'); ?></p>

    <?php endif; ?>

    <div class="clear"></div>
</div>