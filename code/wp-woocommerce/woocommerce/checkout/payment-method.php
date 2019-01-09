<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="wc_payment_method payment_method_<?php echo $gateway->id; ?>">
    <div class="inner">
        <input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
        <label for="payment_method_<?php echo $gateway->id; ?>">
            <span class="image-outer">
            <?php if ($gateway->id == 'przelewy24') { ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/przelewy24_icon.jpg" alt="<?php echo $gateway->id ?>">
            <?php } elseif ($gateway->id == 'bacs') { ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/bacs_icon.jpg" alt="<?php echo $gateway->id ?>">
            <?php } elseif ($gateway->id == 'cod') { ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/images/cod_icon.png" alt="<?php echo $gateway->id ?>">
            <?php } ?>
            </span>
            <span class="payment-method">
            <?php echo $gateway->get_title(); ?>
        </span>
        </label>
    </div>
</li>
