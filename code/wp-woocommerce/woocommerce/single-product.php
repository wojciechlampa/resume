<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php
    $product = wc_get_product();
    ?>

    <section class="single-product-section">
        <div class="row row-product row-top">
            <?php include(locate_template('templates/single-product/column-slider.php', false, false)) ?>
            <?php include(locate_template('templates/single-product/column-buy.php', false, false)) ?>
        </div>
        <div class="row row-product row-bottom">
            <?php include(locate_template('templates/single-product/column-details.php', false, false)) ?>
            <?php include(locate_template('templates/single-product/column-cross.php', false, false)) ?>
        </div>
    </section>

<?php endwhile ?>
<?php include(locate_template('templates/featured-products.php', false, false)) ?>
<?php get_footer();