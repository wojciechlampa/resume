<?php

add_filter('template_include', 'template_wrapper');
function template_wrapper($template)
{
    if (is_admin()) {
        return true;
    } else {
        $url = $template;
        $keys = parse_url($url);
        $path = explode("/", $keys['path']);
        $last = end($path);
        get_template_part('header');
        if (is_page_template()) {
            include('templates/' . $last);
        } else {
            include($template);
        }
        get_template_part('footer');
        return false;
    }
}

function theme_enqueue_style()
{
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/dist/css/main.css', array(), false, false);
}

function theme_enqueue_script()
{
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/dist/js/script.js', array(), false, true);
    wp_localize_script('scripts', 'ajaxpagination', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}


add_action('wp_enqueue_scripts', 'theme_enqueue_style');
add_action('wp_enqueue_scripts', 'theme_enqueue_script');

add_theme_support('post-thumbnails');

add_image_size('icon-thumbnail', 100, 100, true);

add_action('after_setup_theme', 'nav_register');
function nav_register()
{
    register_nav_menus(array(
        'header-menu-primary' => __('Header menu primary', 'theme'),
        'footer-menu-primary' => __('Footer menu primary', 'theme'),
    ));
}

function update_upload_file_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'update_upload_file_types');