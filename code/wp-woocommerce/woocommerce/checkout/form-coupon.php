<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! wc_coupons_enabled() ) {
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?>

<section class="form-coupon-section">
    <form class="checkout_coupon" method="post" style="display:none">
        <div class="row">
            <div class="small-12 large-4 large-offset-4 column column-form-coupon">
                <div class="inner">
                    <div class="row row-in">
                        <div class="small-12 column column-title">
                            <p>Jeśli masz kod promocyjny, wpisz go poniżej</p>
                        </div>
                        <div class="column column-input">
                            <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
                        </div>
                        <div class="shrink column column-submit">
                            <button type="submit" class="btn btn-big btn-black" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>