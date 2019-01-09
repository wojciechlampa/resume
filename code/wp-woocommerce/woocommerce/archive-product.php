<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<section class="archive-products-section">
    <div class="row">
        <div class="small-12 medium-4 large-3 column column-left column-filters">
            <div class="row row-top">
                <div class="small-12 column column-title">
                    <h4 class="border-bottom">Filtrowanie</h4>
                </div>
            </div>
            <div class="row row-bottom">
                <div class="small-12 column column-widget column-widget-categories">
                    <div class="inner">
                        <span class="widget-title">Kategorie</span>
                        <?php the_widget('WC_Widget_Product_Categories'); ?>
                    </div>
                </div>
                <div class="small-12 column column-widget column-widget-price-filter">
                    <div class="inner">
                        <span class="widget-title">Ceny</span>
                        <?php the_widget('WC_Widget_Price_Filter'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-12 medium-8 large-9 column column-right column-products">
            <div class="row row-sorting">
                <div class="small-12 column column-sorting">
                    <div class="row row-in">
                        <div class="small-6 column column-result-count">
                            <?php woocommerce_result_count() ?>
                        </div>
                        <div class="small-6 column column-sort-by">
                            <?php woocommerce_catalog_ordering() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-products">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php include(locate_template('templates/small-product.php', false, false)); ?>
                    <?php endwhile; ?>
                    <?php woocommerce_product_loop_end(); ?>
                <?php else: ?>
                    <?php wc_get_template('loop/no-products-found.php'); ?>
                <?php endif; ?>
            </div>
            <div class="row row-pagination">
                <div class="small-12 column column-pagination">
                    <?php woocommerce_pagination() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>