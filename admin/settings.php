<?php

global $wpdb;
// Load the options


if($_POST){
	
$_POST=PFL_trim_deep($_POST);
$_POST = stripslashes_deep($_POST);

			
			
			$PFL_ihs_limit = abs(intval($_POST['PFL_ihs_limit']));
			if($PFL_ihs_limit==0)$PFL_ihs_limit=20;
			
			$PFL_ihs_credit = $_POST['PFL_ihs_credit'];
			
			$PFL_ihs_sortfield=$_POST['PFL_ihs_sort_by_field'];
			$PFL_ihs_sortorder=$_POST['PFL_ihs_sort_by_order'];
			update_option('PFL_ihs_limit',$PFL_ihs_limit);
			update_option('PFL_credit_link',$PFL_ihs_credit);
			
			update_option('PFL_ihs_sort_field_name',$PFL_ihs_sortfield);
			update_option('PFL_ihs_sort_order',$PFL_ihs_sortorder);

?>


<div class="system_notice_area_style1" id="system_notice_area">
	Settings updated successfully. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>


<?php
}


?>

<div>

	
	<form method="post">
	<div style="float: left;width: 98%">
	<fieldset style=" width:100%; border:1px solid #F7F7F7; padding:10px 0px 15px 10px;">
	<legend ><h3>Settings</h3></legend>
	<table class="widefat"  style="width:99%;">
		
				<tr valign="top">	
				<td scope="row" ><label for="PFL_ihs_sort">Sorting of snippets</label>
				</td>
				<td>
				<select id="PFL_ihs_sort_by_field" name="PFL_ihs_sort_by_field">
				<option value="id" <?php if(isset($_POST['PFL_ihs_sort_by_field']) && $_POST['PFL_ihs_sort_by_field']=='id'){echo 'selected';} else if(get_option('PFL_ihs_sort_field_name')=="id"){echo 'selected';} ?>>Based on create time</option>
				<option value="title" <?php if(isset($_POST['PFL_ihs_sort_by_field']) && $_POST['PFL_ihs_sort_by_field']=='title'){ echo 'selected';}elseif(get_option('PFL_ihs_sort_field_name')=="title"){echo 'selected';} ?>>Based on name</option>
			
			
				</select>&nbsp;
				<select id="PFL_ihs_sort_by_order" name="PFL_ihs_sort_by_order"  >
				<option value="asc" <?php if(isset($_POST['PFL_ihs_sort_by_order']) && $_POST['PFL_ihs_sort_by_order']=='asc'){ echo 'selected';}elseif(get_option('PFL_ihs_sort_order')=="asc"){echo 'selected';} ?>>Ascending</option>
				<option value="desc" <?php if(isset($_POST['PFL_ihs_sort_by_order']) && $_POST['PFL_ihs_sort_by_order']=='desc'){echo 'selected';} elseif(get_option('PFL_ihs_sort_order')=="desc"){echo 'selected';} ?>>Descending</option>
			
				</select>
				</td>
				</tr>
				<tr valign="top">
				<td scope="row" ><label for="PFL_ihs_credit">Credit link to author</label>
				</td>
				<td><select name="PFL_ihs_credit" id="PFL_ihs_credit">
						<option value="ihs"
						<?php if(isset($_POST['PFL_ihs_credit']) && $_POST['PFL_ihs_credit']=='ihs') { echo 'selected';}elseif(get_option('PFL_credit_link')=="ihs"){echo 'selected';} ?>>Enable</option>
						<option value="0"
						<?php if(isset($_POST['PFL_ihs_credit']) && $_POST['PFL_ihs_credit']!='ihs') { echo 'selected';}elseif(get_option('PFL_credit_link')!="ihs"){echo 'selected';} ?>>Disable</option>

				</select>
				</td>
				</tr>
			
				<tr valign="top">
				<td scope="row" class=" settingInput" id=""><label for="PFL_ihs_limit">Pagination limit</label></td>
				<td id=""><input  name="PFL_ihs_limit" type="text"
					id="PFL_ihs_limit" value="<?php if(isset($_POST['PFL_ihs_limit']) ){echo abs(intval($_POST['PFL_ihs_limit']));}else{print(get_option('PFL_ihs_limit'));} ?>" />
				</td>
			</tr>
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id="bottomBorderNone">
				</td>
				<td id="bottomBorderNone"><input style="margin:10px 0 20px 0;" id="submit" class="button-primary bottonWidth" type="submit" value=" Update Settings " />
				</td>
			</tr>
			
	</table>
	</fieldset>
	
	</div>

	</form>
</div>