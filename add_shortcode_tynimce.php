<?php

if(!class_exists('PFL_Insert_Html_TinyMCESelector')):

class PFL_Insert_Html_TinyMCESelector{
	var $buttonName = 'PFL_ihs_snippet_selector';
	function addSelector(){
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;

	   // Add only in Rich Editor mode
	    if ( get_user_option('rich_editing') == 'true') {
	      add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
	      add_filter('mce_buttons', array($this, 'registerButton'));
	    }
	}

	function registerButton($buttons){
		array_push($buttons, "separator", $this->buttonName);
		return $buttons;
	}

	function registerTmcePlugin($plugin_array){
		$plugin_array[$this->buttonName] =get_site_url() . '/index.php?wp_ihs=editor_plugin_js';
		if ( get_user_option('rich_editing') == 'true')
		 	//var_dump($plugin_array);
		return $plugin_array;
	}
}

endif;

if(!isset($shortcodesPFLEH)){
	$shortcodesPFLEH = new PFL_Insert_Html_TinyMCESelector();
	add_action('admin_head', array($shortcodesPFLEH, 'addSelector'));
}

?>
