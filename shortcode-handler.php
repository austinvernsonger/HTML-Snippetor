<?php 
global $wpdb;

add_shortcode('PFL-HS','PFL_HS_display_content');		

function PFL_HS_display_content($PFL_snippet_name){
	global $wpdb;

	if(is_array($PFL_snippet_name)){
		$snippet_name = $PFL_snippet_name['snippet'];
		
		$query = $wpdb->get_results($wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."PFL_HS_short_code WHERE title=%s" ,$snippet_name));
		
		if(count($query)>0){
			
			foreach ($query as $sippetdetails){
// 				return stripslashes($sippetdetails->content);
			if($sippetdetails->status==1)
				return do_shortcode($sippetdetails->content) ;
			else 
				return '';
				break;
			}
			
		}else{

			return '';
/*			return "<div style='padding:20px; font-size:16px; color:#FA5A6A; width:93%;text-align:center;background:lightyellow;border:1px solid #3FAFE3; margin:20px 0 20px 0'>
			
			Please use a valid short code to call snippet.
			
			
			</div>";
*/			
		}
		
	}
}


add_filter('widget_text', 'do_shortcode'); // to run shortcodes in text widgets