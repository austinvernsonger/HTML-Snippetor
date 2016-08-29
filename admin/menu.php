<?php

	add_action('admin_menu', 'PFL_HS_menu');


function PFL_HS_menu(){
	
	add_menu_page('insert-html-snippet', 'PFL Html', 'manage_options', 'insert-html-snippet-manage','PFL_HS_snippets',plugins_url('insert-html-snippet/images/logo.png'));

	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets', 'HTML Snippets', 'manage_options', 'insert-html-snippet-manage','PFL_HS_snippets');
	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - Manage settings', 'Settings', 'manage_options', 'insert-html-snippet-settings' ,'PFL_HS_settings');	
	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - About', 'About', 'manage_options', 'insert-html-snippet-about' ,'PFL_HS_about');
	
}

function PFL_HS_snippets(){
	$formflag = 0;
	if(isset($_GET['action']) && $_GET['action']=='snippet-delete' )
	{
		include(dirname( __FILE__ ) . '/snippet-delete.php');
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-edit' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		include(dirname( __FILE__ ) . '/snippet-edit.php');
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-add' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippet-add.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-status' )
	{
		require( dirname( __FILE__ ) . '/snippet-status.php' );
		$formflag=1;
	}
	if($formflag == 0){
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippets.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
	}
}

function PFL_HS_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
	
}

function PFL_HS_about(){
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}


function PFL_HS_add_style_script(){

	wp_enqueue_script('jquery');
	
	wp_register_script( 'PFL_notice_script', plugins_url('insert-html-snippet/js/notice.js') );
	wp_enqueue_script( 'PFL_notice_script' );
	
	
	// Register stylesheets
	wp_register_style('PFL_HS_style', plugins_url('insert-html-snippet/css/PFL_HS_styles.css'));
	wp_enqueue_style('PFL_HS_style');
}
add_action('admin_enqueue_scripts', 'PFL_HS_add_style_script');



?>