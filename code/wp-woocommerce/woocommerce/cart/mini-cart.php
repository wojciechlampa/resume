<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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
 * @version 3.2.0
 */
if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>

    <table class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
        <?php
        do_action('woocommerce_before_mini_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                $product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                ?>
                <?php if (!$_product->is_visible()) : ?>
                    <?php echo str_replace(array('http:', 'https:'), '', $thumbnail) . '<span>' . $product_name . '</span>' . '&nbsp;'; ?>
                <?php else : ?>

                    <tr>
                        <td class="product-image">
                            <a href="<?php echo esc_url($product_permalink); ?>">
                                <?php echo str_replace(array('http:', 'https:'), '', $thumbnail); ?>
                            </a>
                        </td>
                        <td class="product-details">
                            <div class="product-title">
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo '<span>' . $product_name . '</span>'; ?>
                                </a>
                            </div>
                            <div class="product-quantity-price">
                                <?php echo WC()->cart->get_item_data($cart_item); ?>
                                <?php echo apply_filters('woocommerce_widget_cart_item_quantity', sprintf('%s &times; %s', $cart_item['quantity'], $product_price), $cart_item, $cart_item_key); ?>
                            </div>
                            <div class="product-remove">
                                <?php
                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">Usuń produkt <i class="fa fa-close"></i></a>',
                                    esc_url(WC()->cart->get_remove_url($cart_item_key)),
                                    __('Remove this item', 'woocommerce'),
                                    esc_attr($product_id),
                                    esc_attr($cart_item_key),
                                    esc_attr($_product->get_sku())
                                ), $cart_item_key);
                                ?>
                            </div>
                        </td>
                    </tr>

                <?php endif; ?>

                <?php
            }
        }

        do_action('woocommerce_mini_cart_contents');
        ?>
    </table>
    <table class="minicart-summary">
        <tr>
            <td class="subtotal-text">
                <?php _e('Suma', 'woocommerce'); ?>:
            </td>
            <td class="subtotal-price">
                <strong><?php echo WC()->cart->get_cart_subtotal(); ?></strong>
            </td>
        </tr>
    </table>

    <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

    <div class="row woocommerce-mini-cart__buttons buttons">
        <div class="small-12 column column-button-summary">
            <a class="btn btn-big btn-orange" href="<?php echo esc_url(wc_get_checkout_url()) ?>">Podsumowanie</a>
        </div>
        <div class="small-12 column column-button-cart">
            <a class="btn btn-text btn-brown" href="<?php echo esc_url(wc_get_cart_url()) ?>">Zobacz koszyk  <i class="fa fa-shopping-basket"></i></a>
        </div>
    </div>

<?php else : ?>

    <p class="woocommerce-mini-cart__empty-message"><?php _e('Brak produktów w koszyku', 'woocommerce'); ?></p>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>
