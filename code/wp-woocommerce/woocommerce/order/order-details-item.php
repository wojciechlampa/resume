<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<tr class="product <?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order ) ); ?>">

    <td class="thumbnail">
        <img src="<?php echo get_the_post_thumbnail_url($item->get_product_id(), 'image-100-100') ?>" alt="<?php echo $item->get_name() ?>">
    </td>
    <td class="title-data">
        <p class="product-details">
            <span class="product-title"><?php echo $item->get_name() ?></span>
        </p>
        <div class="quantity-total">
            <span class="product-total"><?php echo $order->get_formatted_line_subtotal( $item ); ?></span>
            <span class="product-quantity"> <strong class="product-quantity">× <?php echo $item->get_quantity() ?></strong></span>
        </div>
    </td>

</tr>


<?php if ( $show_purchase_note && $purchase_note ) : ?>

<tr class="woocommerce-table__product-purchase-note product-purchase-note">

	<td colspan="2"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>

</tr>

<?php endif; ?>
