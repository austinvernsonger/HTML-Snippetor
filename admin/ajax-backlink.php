<?php
add_action('wp_ajax_ajax_backlink', 'PFL_HS_ajax_backlink');
function PFL_HS_ajax_backlink() {

	global $wpdb;
	
	if($_POST){
		update_option('PFL_credit_link','HS');
		
	}
}


?>