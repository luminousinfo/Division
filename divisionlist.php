<?php
	require_once("functionclass.php");
	$objPub = new functionClass();
	global $wpdb;

	$table_name = $wpdb->prefix . "manage_division";

	$info=$_REQUEST["info"];

	if($info=="saved")
	{
		echo "<div class='updated' id='message'><p><strong>Record Added</strong>.</p></div>";
	}

	if($info=="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Record Updated</strong>.</p></div>";
	}

	if($info=="del")
	{
		$delid=$_GET["did"];
		$wpdb->query("delete from ".$table_name." where id=".$delid);
		echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong>.</p></div>";
	}

?>

<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function(){
		jQuery('#memberlist').dataTable();
	});
	/* ]]> */

</script>
<style type="text/css">
.alignleft {
	width:250px !important;
}
</style>
<div class="wrap">
    <h2>Manage Employee Corner <a class="button add-new-h2" href="admin.php?page=division_new&act=add">Add New</a></h2>
    <?php
    extract($_GET);
	$search_query = 'where 1=1 ';
	$search_office_type = '';
	if(isset($office_type) && $office_type!=''){
		$search_query .= " and office_type = '$office_type' ";
		$search_office_type = $office_type;
	}
	if(isset($master_board_id) && $master_board_id!=''){
		$search_query .= " and master_board_id = $master_board_id ";
	}
	if(isset($master_category_id) && $master_category_id!=''){
		$search_query .= " and master_category_id = $master_category_id ";
	}
	if(isset($reg_ofc_id) && $reg_ofc_id!=''){
		$search_query .= " and reg_ofc_id = $reg_ofc_id ";
	}
	if(isset($master_section_id) && $master_section_id!=''){
		$search_query .= " and master_section_id = $master_section_id ";
	}
	if(isset($title) && $title!=''){
		$search_query .= " and lower(title) like '%".strtolower($title)."%'";
	}
	 $sql = "select * from ".$table_name." $search_query order by id desc";
	$arrresult = $wpdb->get_results($sql);
    ?>
    <form method="get">
    	<input type="hidden" size="40" class="input_feold" id="page" name="page" value="division.php"/>
	    <div class="tablenav top">
	    	<div class="alignleft">
				<label for="category">Office Type </label> 
				<select name="office_type" id="office_type" onchange="showSearch(this.value)">
					<option value="0">Please Select</option>
					<option <?php echo ((isset($office_type) && $office_type=='Head Office')) ? "selected": "" ?> value="Head Office">Head Office</option>
					<option <?php echo (isset($office_type) && $office_type=='Regional Office') ? "selected": "" ?> value="Regional Office">Regional Office</option>
					<option <?php echo (isset($office_type) && $office_type=='Central Lab') ? "selected": "" ?> value="Central Lab">Central Lab</option>
				</select>
			</div>
			<span id="head_office">
			<!-- <div class="alignleft">
				<label for="category">Board </label>  -->
				<?php //echo $objPub->createList($wpdb->prefix."master_board","master_board_id",$master_board_id); ?>
			<!-- </div> -->
			<div class="alignleft">
				<label for="section">Section </label> 
				<span id="section">
				<?php echo $objPub->createList($wpdb->prefix."master_section","master_section_id",$master_section_id); ?>
										
				</span>
			</div>
			
			</span>
            <span id="regional_office">
			<div class="alignleft" style="width: 300px !important;">
				<label for="category">Regional Office</label> 
				<span>
				<?php echo $objPub->createList($wpdb->prefix."master_regional_office","reg_ofc_id",$reg_ofc_id); ?>
				</span>
			</div>
			</span>
			<div class="alignleft">
				<label for="category">Category</label>
				<span id="category">

				<?php
					//if(isset($master_category_id) && $master_category_id!=''){
						echo $objPub->createList($wpdb->prefix."master_category","master_category_id",$master_category_id,false);
					//}else{
						?>
						<!-- <select name="master_category_id" id="master_category_id">
							<option value="">Please Select</option>
						</select> -->
						<?php
					//}
					?>
					</span>
			</div>
			
			<div class="alignleft">
				<input type="submit" value="Search" class="button action" id="doaction">
			</div>
		</div>
	</form>
	<table class="wp-list-table widefat fixed " id="<?php echo (sizeof($arrresult) > 0) ? 'memberlist': ''; ?>">
		<thead>
			<tr>
				<th><u>Sl. No.</u></th>
				<!-- <th>Section</th> -->
				<th>Name and Designation</th>
				<th>Photo</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
		if (sizeof($arrresult) > 0 )
		{
		?>
			
<?php		
			foreach($arrresult as $key => $val)
			{
				$id		= $val->id;
				$office_type	= $val->office_type;
				$master_board	= $val->master_board_id;
				$title	= $val->title;
				$designation	= $val->designation;
				$section	= $objPub->getName($wpdb->prefix."master_section",$val->master_section_id);
				$photo	= $val->photo;
	?>
			<tr>
				<td style="width:20%;"><?php echo ++$key; ?></td>
				<!-- <td><?php //echo $section; ?></td> -->
				<td nowrap><?php echo $title."<br>".$designation; ?></td>
				<td nowrap><a href="../wp-content/plugins/division/uploads/<?php echo $photo; ?>" target="_blank" class="button" style="background: #6495ED; border-color:#6495ED; color: #ffffff;">Download</a></td>
				<td><a href="admin.php?page=division_new&act=upd&id=<?php echo $id;?>" class="button" style="background: #4CAF50; border-color:#4CAF50; color: #ffffff;" onclick="return confirm('Are you sure want to Edit!')">Edit</a></td>
				<td><a href="admin.php?page=division.php&info=del&did=<?php echo $id;?>" class="button" style="background: #DC143C; border-color:#DC143C; color: #ffffff;" onclick="return confirm('Are sure want to Delete!')">Delete</a></td>
			</tr>
<?php }
	} else { ?>
			<tr>
				<td colspan="5">No records found</td>
			<tr>
	<?php } ?>
	</tbody>
	</table>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#mytable').dataTable();
	showSearch("<?php echo $search_office_type; ?>");
	// jQuery(document).on('change', '.master_section_id', function() {
	//    jQuery.post(
	//     ajaxurl, 
	// 	    {
	// 	        'action': 'category',
	// 	        'data':   'foobarid',
	// 	        'master_section_id':   this.value
	// 	    }, 
	// 	    function(response){
	// 	    	jQuery("#category").html(response);
	// 	    }
	// 	);
	// });		
});

	function showSearch(value){
		if(value == "Head Office"){
			jQuery("#head_office").show();
			jQuery("#regional_office").hide();
			jQuery(".master_district_id").val("");
		}else if(value == "Regional Office"){
			jQuery("#head_office").hide();
			jQuery(".master_board_id").val("");
			jQuery(".master_section_id").val("");
			jQuery(".master_category_id").val("");
			jQuery("#regional_office").show();
		}else{
			jQuery("#head_office").hide();
			jQuery("#regional_office").hide();
			jQuery(".master_board_id").val("");
			jQuery(".master_section_id").val("");
			jQuery(".master_category_id").val("");
			jQuery(".reg_ofc_id").val("");
		}
	}
	
</script>
