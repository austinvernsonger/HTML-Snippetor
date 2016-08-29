<?php
function PFL_HS_plugin_query_vars($vars)
{
    $vars[] = 'wp_HS';
    return $vars;
}
add_filter('query_vars', 'PFL_HS_plugin_query_vars');
function PFL_HS_plugin_parse_request($wp)
{
    /*confirmation*/
    if (array_key_exists('wp_HS', $wp->query_vars) && $wp->query_vars['wp_HS'] == 'editor_plugin_js') {
        require(dirname(__FILE__) . '/editor_plugin.js.php');
        die;
    }
}
add_action('parse_request', 'PFL_HS_plugin_parse_request');
