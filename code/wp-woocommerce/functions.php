<?php

include_once 'acf_sections.php';

add_image_size('image-1200-1200', 1200, 1200);
add_image_size('image-970-370', 970, 370, true);
add_image_size('image-570-500', 570, 500, true);
add_image_size('image-570-440', 570, 450);
add_image_size('image-570-280', 570, 280, true);
add_image_size('image-370-240', 370, 240, true);
add_image_size('image-370-210', 370, 210, true);
add_image_size('image-270-210', 270, 210, true);
add_image_size('image-170-170', 170, 170, true);
add_image_size('image-170-130', 170, 130);
add_image_size('image-100-100', 100, 100, true);

function theme_enqueue_style()
{
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/dist/css/main.css', array(), false, false);
}

function theme_enqueue_script()
{
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/dist/js/script.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_style');
add_action('wp_enqueue_scripts', 'theme_enqueue_script');

add_theme_support('post-thumbnails');

add_action('after_setup_theme', 'nav_register');

function nav_register()
{
    register_nav_menus(array(
        'header-menu-primary' => __('Header menu primary', 'theme'),
        'header-menu-secondary' => __('Header menu secondary', 'theme'),
        'footer-menu-primary' => __('Footer menu primary', 'theme'),
        'footer-menu-secondary' => __('Footer menu secondary', 'theme')
    ));
}

function custom_woocommerce_breadcrumb($args = array())
{
    $args = wp_parse_args($args, apply_filters('woocommerce_breadcrumb_defaults', array(
        'delimiter' => '&nbsp;&#47;&nbsp;',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after' => '</nav>',
        'before' => '',
        'after' => '',
        'home' => _x('Strona główna', 'breadcrumb', 'woocommerce'),
    )));

    $breadcrumbs = new WC_Breadcrumb();

    if (!empty($args['home'])) {
        $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
    }

    $args['breadcrumb'] = $breadcrumbs->generate();

    /**
     * WooCommerce Breadcrumb hook
     *
     * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
     */
    do_action('woocommerce_breadcrumb', $breadcrumbs, $args);

    wc_get_template('global/breadcrumb.php', $args);
}

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('init', 'kolekcja_lamp_taxonomy', 0);
function kolekcja_lamp_taxonomy()
{
    $labels = array(
        'name' => _x('Kolekcja lamp', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Kolekcja lamp', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Szukaj kolekcji lamp', 'textdomain'),
        'all_items' => __('Wszystkie kolekcje lamp', 'textdomain'),
        'parent_item' => __('Rodzic kolekcji lamp', 'textdomain'),
        'parent_item_colon' => __('Rodzic kolekcji lamp:', 'textdomain'),
        'edit_item' => __('Edytuj kolekcję lamp', 'textdomain'),
        'update_item' => __('Aktualizuj kolekcję lamp', 'textdomain'),
        'add_new_item' => __('Dodaj nową kolekcję lamp', 'textdomain'),
        'new_item_name' => __('Nazwa nowej kolekcji lamp', 'textdomain'),
        'menu_name' => __('Rodziny lamp', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kolekcja'),
    );

    register_taxonomy('kolekcja', array('product'), $args);
}

function cart_totals_count()
{
    $count = WC()->cart->get_cart_contents_count();

    if ($count == 0 || $count > 4) {
        echo $count . ' produktów';
    } elseif ($count == 1) {
        echo $count . ' produkt';
    } else {
        echo $count . ' produkty';
    }
}

function percent_of_discount($product)
{
    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();

    echo '-' . round(($regular_price - $sale_price) / $regular_price, 2) * 100 . '%';
}

function post_comments_number($post_id)
{
    $number = get_comments_number($post_id);

    if ($number == 0 || $number >= 5) {
        $output = $number . ' komentarzy';
    } elseif ($number == 1) {
        $output = $number . ' komentarz';
    } elseif ($number >= 2 && $number <= 4) {
        $output = $number . ' komentarze';
    }

    return $output;
}

function product_total_sales_number($product)
{
    $sales_number = $product->get_total_sales();

    if ($sales_number >= 5) {
        $output = 'Sprzedano już ' . $sales_number . ' sztuk';
    } elseif ($sales_number == 1) {
        $output = 'Sprzedano już ' . $sales_number . ' sztukę';
    } elseif ($sales_number >= 2 && $sales_number <= 4) {
        $output = 'Sprzedano już ' . $sales_number . ' sztuki';
    }

    echo $output;
}

function product_avarage_rating($product)
{
    $rating = $product->get_average_rating();
    $rating_output = ($rating * 2) * 10;
    ?>
    <span class="stars">
        <i class="star-o"></i>
        <i class="star" style="width: <?php echo $rating_output . '%' ?>;"></i>
    </span>
    <?php
}

function product_reviews_count($product)
{
    $reviews_count = $product->get_review_count();

    if ($reviews_count >= 5 || $reviews_count == 0) {
        $output = $reviews_count . ' opinii';
    } elseif ($reviews_count == 1) {
        $output = $reviews_count . ' opinia';
    } elseif ($reviews_count >= 2 && $reviews_count <= 4) {
        $output = $reviews_count . ' opinie';
    }

    echo $output;
}

function product_category_base_same_shop_base($flash = false)
{
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'post_type' => 'product',
        'hide_empty' => false,
    ));
    if ($terms && !is_wp_error($terms)) {
        $siteurl = esc_url(home_url('/'));
        foreach ($terms as $term) {
            $term_slug = $term->slug;
            $baseterm = str_replace($siteurl, '', get_term_link($term->term_id, 'product_cat'));
            add_rewrite_rule($baseterm . '?$', 'index.php?product_cat=' . $term_slug, 'top');
            add_rewrite_rule($baseterm . 'page/([0-9]{1,})/?$', 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]', 'top');
            add_rewrite_rule($baseterm . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]', 'top');
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}

add_filter('init', 'product_category_base_same_shop_base');

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
    $cols = 12;
    return $cols;
}

/* Filter payment gateways */

function my_custom_available_payment_gateways( $gateways ) {
    $chosen_shipping_rates = ( isset( WC()->session ) ) ? WC()->session->get( 'chosen_shipping_methods' ) : array();

    if ( in_array( 'flat_rate:1', $chosen_shipping_rates ) ) :
        unset( $gateways['cod'] );

    elseif ( in_array( 'flat_rate:11', $chosen_shipping_rates ) ) :
        unset( $gateways['przelewy24'] );
        unset( $gateways['bacs'] );

    endif;
    return $gateways;
}
// add_filter( 'woocommerce_available_payment_gateways', 'my_custom_available_payment_gateways' );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
    $free = array();
    foreach ( $rates as $rate_id => $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $free[ $rate_id ] = $rate;
            break;
        }
    }
    return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );