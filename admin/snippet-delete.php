<?php
global $wpdb;

$_POST = stripslashes_deep($_POST);
$_GET = stripslashes_deep($_GET);

$PFL_HS_snippetId = intval($_GET['snippetId']);
$PFL_HS_pageno = intval($_GET['pageno']);

if($PFL_HS_snippetId=="" || !is_numeric($PFL_HS_snippetId)){
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage'));
	exit();

}
$snippetCount = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'PFL_HS_short_code WHERE id=%d LIMIT 0,1',$PFL_HS_snippetId )) ;

if($snippetCount==0){
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&PFL_HS_msg=2'));
	exit();
}else{
	
	$wpdb->query($wpdb->prepare( 'DELETE FROM  '.$wpdb->prefix.'PFL_HS_short_code  WHERE id=%d',$PFL_HS_snippetId)) ;
	
	header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&PFL_HS_msg=3&pagenum='.$PFL_HS_pageno));
	exit();
	
}
?>