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

<link rel='stylesheet' id='demo_table.css-css'  href='<?php echo plugin_dir_url(__FILE__); ?>css/demo_table.css?ver=4.7.2' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo plugin_dir_url(__FILE__); ?>/js/jquery.dataTables.js?ver=4.7.2'></script>
<script type='text/javascript' src='<?php echo plugin_dir_url(__FILE__); ?>/js/jquery.modal.js'></script>
<link rel='stylesheet' id='jquery.modal.css'  href='<?php echo plugin_dir_url(__FILE__); ?>css/jquery.modal.css' type='text/css' media='all' />

<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function(){
		jQuery('#memberlist').dataTable();
	});
	/* ]]> */	
	jQuery(document).on('click', '.modalView', function(){

		var section     		= $(this).attr("section"); 
		var title       		= $(this).attr("title");
		var designation 		= $(this).attr("designation"); 
		var educational 		= $(this).attr("educational"); 
		var category 				= $(this).attr("category"); 
		var basic_pay 	= $(this).attr("basic_pay"); 
		var mobile 				= $(this).attr("mobile"); 
		var email 				= $(this).attr("email"); 
		var photo 				= $(this).attr("photo");   
		jQuery('#section_data').html(section);
		jQuery('#title_data').html(title);
		jQuery('#designation_data').html(designation);
		jQuery('#educational_data').html(educational);
		jQuery('#category_data').html(category);
		jQuery('#basic_pay').html(basic_pay);
		jQuery('#mobile_data').html(mobile);
		jQuery('#email_data').html(email);		
		jQuery('#profile_photo').attr('src',photo);		
	});		
</script>
<style type="text/css">
.alignleft {
	width:250px !important;
}
.inline { 
    display: inline-block;     
}
#img01{
	width: 100%;
}
</style>

<div class="wrap">
    <?php
    extract($_GET);
	$search_query = 'where 1=1 ';
	$search_office_type = '';
	if(isset($office_type) && $office_type!=''){
		$search_query .= " and office_type = '$office_type' ";
		$search_office_type = $office_type;
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
	if(isset($master_district_id) && $master_district_id!=''){
		$search_query .= " and master_district_id = $master_district_id ";
	}
	if(isset($title) && $title!=''){
		$search_query .= " and lower(title) like '%".strtolower($title)."%'";
	}
	
	$sql = "select * from ".$table_name." $search_query order by designation asc";
	$arrresult = $wpdb->get_results($sql);
    ?>
    <form method="get">
    	<input type="hidden" size="40" class="input_feold" id="page" name="page" value="division.php"/>
	    <div class="tablenav top" style="height: 60px;">
	    	<div class="alignleft">
				<label for="category">Office Type </label> 
				<select name="office_type" id="office_type" onchange="showSearch(this.value)">
					<option value="0">Please Select</option>
					<option <?php echo ((isset($office_type) && $office_type=='Head Office')) ? "selected": "" ?> value="Head Office">Head Office</option>
					<option <?php echo (isset($office_type) && $office_type=='Regional Office') ? "selected": "" ?> value="Regional Office">Regional Office</option>
					<option <?php echo (isset($office_type) && $office_type=='Central Lab') ? "selected": "" ?> value="Central Lab">Central Lab</option>
				</select>
			</div>
			<span id="head_office" style="display: none;">
			<!-- <div class="alignleft"> -->
				<!-- <label for="category">Board </label>  -->
				<?php //echo $objPub->createList($wpdb->prefix."master_board","master_board_id",$master_board_id); ?>
			<!-- </div> -->
			<div class="alignleft">
				<label for="category">Section </label> 
				<span id="section">
				<?php echo $objPub->createList($wpdb->prefix."master_section","master_section_id",$master_section_id); ?>
									
				</span>
			</div>
			
			</span>
            <span id="regional_office" style="display: none;">
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
				<input type="submit" value="Search" class="button action" id="doaction" style="background: #1E90FF; border-color:#1E90FF; color: #ffffff; border:1px solid;padding: 5px 14px;border-radius: 4px;">
			</div>
		</div>
	</form>
	<br/>
	<table class="wp-list-table widefat fixed  table table-bordered" id="<?php echo (sizeof($arrresult) > 0) ? 'memberlist': ''; ?>">
		<thead>
			<tr>
				<th>Sl.No.</th>
				<th>Employee Name</th>
				<th>Designation</th>	
				<th>Mobile No.</th>
				<th>Email ID</th>				
				<th>View</th>
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
				$id					= $val->id;
				$office_type		= $val->office_type;
				$master_board		= $val->master_board_id;
				$title				= $val->title;
				$designation		= $val->designation;
				$section			= $objPub->getName($wpdb->prefix."master_section",$val->master_section_id);
				$category			= $objPub->getName($wpdb->prefix."master_category",$val->master_category_id);
				$photo				= $val->photo;
				$educational    	= $val->educational;
				$mobile   			= $val->mobile;
				$email   			= $val->email;
				$basic_pay   			= $val->basic_pay;
	?>
			<tr>
				<td><?php echo ++$key; ?></td>
				<td nowrap><?php echo $title; ?></td>
				<td nowrap><?php echo $designation; ?></td>
				<td nowrap><?php echo $mobile; ?></td>					
				<td nowrap><?php echo $email; ?></td>		
				<td class="text-center" nowrap><a href="#ex1" rel="modal:open" class = "modalView button" section="<?php echo $section; ?>" title="<?php echo $title; ?>" designation="<?php echo $designation; ?>" educational="<?php echo $educational; ?>" category="<?php echo $category; ?>" basic_pay="<?php echo $basic_pay; ?>" mobile="<?php echo $mobile; ?>" email="<?php echo $email; ?>" photo="<?php echo plugin_dir_url(__FILE__); ?>/uploads/<?php echo $photo; ?>" style="background: #ff7f50 none repeat scroll 0 0;border-color: #ff7f50;border-radius: 4px;color: #ffffff;padding: 5px 14px;text-decoration: none;">View</a></td>	

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
<div id="ex1" style="display:none;">		       
<!--     <div class="modal-body"> -->
    <table class="table table-bordered table-striped table-hover" style="border: 1px solid #523f6d;">
	    <tbody>
	    	<tr>
	    		<th></th>
	    			<td ><img align="right" src="" width='90' height='100' id="profile_photo"/></td>
	    	</tr>	        
	        <tr>
	          	<th>Section</th>
		            <td id="section_data"></td>		           
	        </tr>
	        <tr>
	          	<th>Category</th>
		          	<td id="category_data"></td>
	        </tr>
	        <tr>
	          	<th>Name</th>
		            <td id="title_data"></td>	            
	        </tr>
	      	<tr>
	          	<th>Designation</th>
		          	<td id="designation_data"></td>
	        </tr>
	        <tr>
	          	<th>Educational Qualification</th>
		          	<td id="educational_data"></td>
	        </tr>
	        
	       
	        <tr>
	          	<th>Mobile</th>
		          	<td id="mobile_data"></td>
	        </tr>
	        <tr>
	          	<th>Email</th>
		          	<td id="email_data"></td>
	        </tr>
	         <tr>
	          	<th>Basic Pay</th>
		          	<td id="basic_pay"></td>
	        </tr>
	    </tbody>
	</table>	   
    <!-- </div>  -->           
</div>
<div id="myModal" class="myModal">

  <img class="myModal-content" id="img01">  
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#mytable').dataTable();
		showSearch("<?php echo $search_office_type; ?>");
	// 	jQuery(document).on('change', '.master_section_id', function() {
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
