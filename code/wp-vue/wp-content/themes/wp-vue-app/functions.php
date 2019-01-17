<?php

require_once "inc/theme.php";

gc()->filter('gc_cf7_custom_data', function ($items, $options) {
    $contact = gc_get_option('contact');

    foreach ($contact as $key => $field) {
        if (in_array("gc.$key", $options)) {
            $items = explode(',', $field);
            if (!(empty($items))) {
                foreach ($items as &$item) {
                    $item = trim($item);
                }
                array_unshift($items, ucwords(implode(' ', explode('_', $key))));
            }
        }
    }

    return $items;

}, 10, 2);

function gc_site_meta(WP_REST_Request $request)
{
    if (isset($request['slug'])) {
        if ($request['slug'] === 'home') {
            $title = get_bloginfo('title');
        } else {
            $page = get_page_by_path($request['slug']);
            $seoFED = WPSEO_Frontend::get_instance();
            $title = $seoFED->get_content_title($page);
        }
        return [
            'title' => $title
        ];
    } else {
        return \WP_Error('gc_no_slug', 'Invalid Meta Slug path', ['status' => 404]);
    }
}

gc('rest_api')->addEndpoint('/meta/(?P<slug>[a-zA-Z-]+)', [
    'callback' => 'gc_site_meta'
]);

function get_hyperlocal_all()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'gc_hyperlocal';
    $retrieve_data = $wpdb->get_results("SELECT * FROM $table_name");

    foreach ($retrieve_data as $retrieved_data) {
        $options = $retrieved_data->data;
        $options = json_decode($options, true);
    }

    //

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $ip = '85.202.154.202';

    function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    $content = file_get_contents_curl("https://ip.goldencomm.com/lookupJSON.aspx?ip=" . $ip);
    $user = json_decode($content, true);

    //

    $result = [
        'options' => $options,
        'user' => $user
    ];
    return $result;

};

add_action('rest_api_init', function () {
    register_rest_route('hyperlocal/v2', '/all', array(
        'methods' => 'GET',
        'callback' => 'get_hyperlocal_all',
    ));
});

gc_start();

