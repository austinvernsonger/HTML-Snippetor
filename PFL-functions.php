<?php

if(!function_exists('PFL_HS_plugin_get_version'))
{
	function PFL_HS_plugin_get_version()
	{
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( PFL_INSERT_HTML_PLUGIN_FILE ) ) );
		// 		print_r($plugin_folder);
		return $plugin_folder['HTML-Snippetor.php']['Version'];
	}
}

if(!function_exists('PFL_trim_deep'))
{

	function PFL_trim_deep($value) {
		if ( is_array($value) ) {
			$value = array_map('PFL_trim_deep', $value);
		} elseif ( is_object($value) ) {
			$vars = get_object_vars( $value );
			foreach ($vars as $key=>$data) {
				$value->{$key} = PFL_trim_deep( $data );
			}
		} else {
			$value = trim($value);
		}

		return $value;
	}

}


if(!function_exists('PFL_HS_links')){
function PFL_HS_links($links, $file) {
	$base = plugin_basename(PFL_INSERT_HTML_PLUGIN_FILE);
	if ($file == $base) {

		$links[] = '<a href="" class="PFL_support" title="Support"></a>';
		$links[] = '<a href="" class="PFL_twitt" title="Follow us on Twitter"></a>';
		$links[] = '<a href="" class="PFL_fbook" title="Like us on Facebook"></a>';
		$links[] = '<a href="" class="PFL_gplus" title="+1 us on Google+"></a>';
		$links[] = '<a href="" class="PFL_linkedin" title="Follow us on LinkedIn"></a>';
	}
	return $links;
}
}
add_filter( 'plugin_row_meta','PFL_HS_links',10,2);

?>
