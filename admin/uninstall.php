<?php 

function PFL_ihs_network_uninstall($networkwide) {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
			$old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				PFL_ihs_uninstall();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	PFL_ihs_uninstall();
}

function PFL_ihs_uninstall(){

global $wpdb;
delete_option("PFL_ihs_sort_order");
delete_option("PFL_ihs_sort_field_name");
delete_option("PFL_ihs_limit");

/* table delete*/
$wpdb->query("DROP TABLE ".$wpdb->prefix."PFL_ihs_short_code");


}

register_uninstall_hook( PFL_INSERT_HTML_PLUGIN_FILE, 'PFL_ihs_network_uninstall' );
?>
