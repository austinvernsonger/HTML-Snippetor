<?php 

global $wpdb;
global $current_user;
get_currentuserinfo();

$PFL_HS_snippetId = $_GET['snippetId'];

$PFL_HS_message = '';
if(isset($_GET['PFL_HS_msg'])){
	$PFL_HS_message = $_GET['PFL_HS_msg'];
}
if($PFL_HS_message == 1){

	?>
<div class="system_notice_area_style1" id="system_notice_area">
HTML Snippet successfully updated.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php
}




if(isset($_POST) && isset($_POST['updateSubmit'])){

// 		echo '<pre>';
// 		print_r($_POST);
// 		die("JJJ");
	$_POST = stripslashes_deep($_POST);
	$_POST = PFL_trim_deep($_POST);
	
	$PFL_HS_snippetId = $_GET['snippetId'];
	
	$temp_PFL_HS_title = str_replace(' ', '', $_POST['snippetTitle']);
	$temp_PFL_HS_title = str_replace('-', '', $temp_PFL_HS_title);
	
	$PFL_HS_title = str_replace(' ', '-', $_POST['snippetTitle']);
	$PFL_HS_content = $_POST['snippetContent'];

	if($PFL_HS_title != "" && $PFL_HS_content != ""){
		
		if(ctype_alnum($temp_PFL_HS_title))
		{
		$snippet_count = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'PFL_HS_short_code WHERE id!=%d AND title=%s LIMIT 0,1',$PFL_HS_snippetId,$PFL_HS_title)) ;
		
		if($snippet_count == 0){
			$PFL_shortCode = '[PFL-HS snippet="'.$PFL_HS_title.'"]';
			
			$wpdb->update($wpdb->prefix.'PFL_HS_short_code', array('title'=>$PFL_HS_title,'content'=>$PFL_HS_content,'short_code'=>$PFL_shortCode,), array('id'=>$PFL_HS_snippetId));
			
			header("Location:".admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-edit&snippetId='.$PFL_HS_snippetId.'&PFL_HS_msg=1'));
	
		}
		else{
			?>
			<div class="system_notice_area_style0" id="system_notice_area">
			HTML Snippet already exists. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
			</div>
			<?php	
	
		}
		}
		else
		{
			?>
		<div class="system_notice_area_style0" id="system_notice_area">
		HTML Snippet title can have only alphabets,numbers or hyphen. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
		<?php
		
		}
		
	
	}else{
?>		
		<div class="system_notice_area_style0" id="system_notice_area">
			Fill all mandatory fields. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
<?php 
	}

}


global $wpdb;


$snippetDetails = $wpdb->get_results($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'PFL_HS_short_code WHERE id=%d LIMIT 0,1',$PFL_HS_snippetId )) ;
$snippetDetails = $snippetDetails[0];

?>

<div >
	<fieldset
		style="width: 99%; border: 1px solid #F7F7F7; padding: 10px 0px;">
		<legend>
			<b>Edit HTML Snippet</b>
		</legend>
		<form name="frmmainForm" id="frmmainForm" method="post">
			<input type="hidden" id="snippetId" name="snippetId"
				value="<?php if(isset($_POST['snippetId'])){ echo esc_attr($_POST['snippetId']);}else{ echo esc_attr($snippetDetails->id); }?>">
			<div>
				<table
					style="width: 99%; background-color: #F9F9F9; border: 1px solid #E4E4E4; border-width: 1px;margin: 0 auto">
					<tr><td><br/>
					<div id="shortCode"></div>
					<br/></td></tr>
					<tr valign="top">
						<td style="border-bottom: none;width:20%;">&nbsp;&nbsp;&nbsp;Tracking Name&nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td><input style="width:80%;"
							type="text" name="snippetTitle" id="snippetTitle"
							value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}else{ echo esc_attr($snippetDetails->title); }?>"></td>
					</tr>
					<tr>
						<td style="border-bottom: none;width:20%; ">&nbsp;&nbsp;&nbsp;HTML code &nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td >
							<textarea name="snippetContent" style="width:80%;height:150px;"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}else{ echo esc_textarea($snippetDetails->content); }?></textarea>
						</td>
					</tr>				

				<tr>
				<td></td><td></td>
					<td><input class="button-primary" style="cursor: pointer;"
							type="submit" name="updateSubmit" value="Update"></td>
				</tr>
				<tr><td><br/></td></tr>
				</table>
			</div>

		</form>
	</fieldset>

</div>
