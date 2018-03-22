<?php
	require_once("functionclass.php");
	$objPub = new functionClass();

	$addme=$_POST["addme"];
	global $wpdb;

	$table_name = $wpdb->prefix."manage_division";
	$page_name = 'division.php';
	if($addme==1)
	{

		if(isset($_FILES['photo']) && $_FILES['photo']["name"]!=""){
			$photo_name=$objPub->fileUpload($_FILES['photo']); 

			if($photo_name=="extensionwrong")
			{
				echo "<div class='updated' id='message'><p><strong>Please Upload jpg or png.</strong>.</p></div>";
			}
			else
			{
				if($photo_name=="sizewrong")
				{
					echo "<div class='updated' id='message'><p><strong>Please Upload 370x220</strong>.</p></div>";
				}
				else{
				 if($_POST["office_type"]=="Head Office")	
			 {
			 	if(isset($_POST["master_section_id"]) && $_POST["master_section_id"]!="" && isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["master_section_id"]==""){$errormsg .="<p>Please select section.</p>";}
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
			 
			 if($_POST["office_type"]=="Regional Office")	
			 {
			 	if(isset($_POST["reg_ofc_id"]) && $_POST["reg_ofc_id"]!="" && isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["reg_ofc_id"]==""){$errormsg .="<p>Please select regional office.</p>";}
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
			 
			 if($_POST["office_type"]=="Central Lab")	
			 {
			 	if(isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
					
				}
				
			}
		}
		else
		{
			$photo_name="";
			if($_POST["office_type"]=="Head Office")	
			 {
			 	if(isset($_POST["master_section_id"]) && $_POST["master_section_id"]!="" && isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["master_section_id"]==""){$errormsg .="<p>Please select section.</p>";}
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
			 
			 if($_POST["office_type"]=="Regional Office")	
			 {
			 	if(isset($_POST["reg_ofc_id"]) && $_POST["reg_ofc_id"]!="" && isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["reg_ofc_id"]==""){$errormsg .="<p>Please select regional office.</p>";}
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
			 
			 if($_POST["office_type"]=="Central Lab")	
			 {
			 	if(isset($_POST["master_category_id"]) &&  $_POST["master_category_id"]!="" && isset($_POST["title"]) && $_POST["title"]!="" && isset($_POST["designation"]) && $_POST["designation"]!="" && isset($_POST["educational"]) && $_POST["educational"]!="" && isset($_POST["basic_pay"]) && $_POST["basic_pay"]!="")
			 	
			 	{
			 		$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
			 	}
			 	else
				 {
				 	$errormsg="";
				 	if($_POST["master_category_id"]==""){$errormsg .="<p>Please select category.</p>";}
				 	if($_POST["title"]==""){$errormsg .="<p>Please enter Name.</p>";}
				 	if($_POST["designation"]==""){$errormsg .="<p>Please enter designation.</p>";}
				 	if($_POST["educational"]==""){$errormsg .="<p>Please enter educational qualification.</p>";}
				 	if($_POST["basic_pay"]==""){$errormsg .="<p>Please enter basic pay.</p>";}
				 	echo "<div class='updated' id='message'>".$errormsg."</p></div>";
				 }
			 }
			 
		}

		
	}
	else if($addme==2)
	{
		if(isset($_FILES['photo']['name']) && $_FILES['photo']['name']!=''){
			//$_POST["photo"]	= $objPub->fileUpload($_FILES['photo']); 

			$photo_name=$objPub->fileUpload($_FILES['photo']); 

			if($photo_name=="extensionwrong")
			{
				echo "<div class='updated' id='message'><p><strong>Please Upload jpg or png.</strong>.</p></div>";
			}
			else
			{
				if($photo_name=="sizewrong")
				{
					echo "<div class='updated' id='message'><p><strong>Please Upload 370x220</strong>.</p></div>";
				}
				else{
					$_POST["photo"]	= $photo_name; 
					// print_r($_POST);exit;
					$objPub->save($table_name,$_POST);
					$objPub->pageRedirect("admin.php?page=".$page_name."&info=saved");
					exit;
				}
				
			}
		}
		else
		{
			$objPub->save($table_name,$_POST);
			$objPub->pageRedirect("admin.php?page=".$page_name."&info=upd");
			exit;
		}
		
	}

	$act=$_REQUEST["act"];
	if($act=="upd")
	{
		$recid=$_REQUEST["id"];
		$sSQL="select * from ".$table_name . " where id=$recid";
		$result = $wpdb->get_results($sSQL);
		// print_r($result);
		$result = $result[0];
		if (sizeof($result) > 0 )
		{
			$id					= $result->id;
			$office_type        = $result->office_type;
			$master_board_id	= $result->master_board_id;
			$master_section_id	= $result->master_section_id;
			$master_category_id	= $result->master_category_id;
			$title				= $result->title;
			$designation        = $result->designation;
			$educational        = $result->educational;
			$basic_pay	= $result->basic_pay;
			$mobile        		= $result->mobile;
			$master_district_id = $result->master_district_id;
			$reg_ofc_id			= $result->reg_ofc_id; 	
			$email        		= $result->email;
			$photo        		= $result->photo;
			$btn	   			= "Update";
			$hidval	   			= 2;
		}
	}
	else
	{
		$btn	   ="Add New";
		$id        = "";
		$office_type        = "";
		$master_board_id        = "";
		$master_section_id        = "";
		$title        = "";
		$designation        = "";
		$educational        = "";
		$responsibilities        = "";
		$photo        = "";
		$mobile        = "";
		$email        = "";
		$add       = "";
		$hidval	   = 1;
	}
?>
<div xmlns="http://www.w3.org/1999/xhtml" class="wrap nosubsub">
<style type="text/css">

</style>
<div class="icon32" id="icon-edit"><br/></div>
<h2>Manage Employee Corner <a class="button add-new-h2" href="admin.php?page=division.php">Employee Corner List</a></h2>
<div id="col-left">
	<div class="col-wrap">
		<div>
			<div class="form-wrap">
				<h3>Add New Employee Corner</h3>
				<hr />
				<form class="validate" action="admin.php?page=division_new" method="post" enctype="multipart/form-data" id="addtag">
					<div class="form-field">
						<label for="tag-name">Office Type<span style="color:red">*</span></label>
						<select required="required" name="office_type" id="office_type" onchange="showSearch(this.value)">
							<option value="">Please Select</option>
							<option <?php echo ((isset($office_type) && $office_type=='Head Office')) ? "selected": "" ?> value="Head Office">Head Office</option>
							<option <?php echo (isset($office_type) && $office_type=='Regional Office') ? "selected": "" ?> value="Regional Office">Regional Office</option>
							<option <?php echo (isset($office_type) && $office_type=='Central Lab') ? "selected": "" ?> value="Central Lab">Central Lab</option>
						</select>
					</div>
					<span id="head_office">
						<!-- <div class="form-field"> -->
							<!-- <label for="tag-slug">Board<span style="color:red">*</span></label> -->
							<?php //echo $objPub->createList($wpdb->prefix."master_board","master_board_id",$master_board_id,true); ?>
						<!-- </div> -->
						<div class="form-field">
							<label for="tag-name">Section<span style="color:red">*</span></label>
							<div id="section">
								<?php echo $objPub->createList($wpdb->prefix."master_section","master_section_id",$master_section_id,true); ?>	
							</div>
						</div>
						
					</span>
                    <div class="alignleft" id="regional_office">
						<label for="category">Regional Office<span style="color:red">*</span></label> 

						<?php
								if(isset($reg_ofc_id) && $reg_ofc_id!=''){
									echo $objPub->createList($wpdb->prefix."master_regional_office","reg_ofc_id",$reg_ofc_id,true);
								}else{
									echo $objPub->createList($wpdb->prefix."master_regional_office","reg_ofc_id",$reg_ofc_id);
									?>
									<!-- <select name="master_category_id" id="master_category_id">
										<option value="">Please Select</option>
									</select> -->
									<?php
								}
								?>
						
					</div>
					<div class="form-field">
							<label for="tag-slug">Category<span style="color:red">*</span></label>
							<div id="category">

							<?php
								if(isset($master_category_id) && $master_category_id!=''){
									echo $objPub->createList($wpdb->prefix."master_category","master_category_id",$master_category_id,true);
								}else{
									echo $objPub->createList($wpdb->prefix."master_category","master_category_id",$master_category_id,true);
									?>
									<!-- <select name="master_category_id" id="master_category_id">
										<option value="">Please Select</option>
									</select> -->
									<?php
								}
								?>
								</div>
						</div>	
					
					<div style="clear:both;"></div>
					<div class="form-field">
						<label for="tag-name">Name <span style="color:red">*</span></label>
						<input type="text" required="required" size="40" id="title" name="title" value="<?php echo $title; ?>" class="alpha"/>
					</div>	
					<div class="form-field">
						<label for="tag-name">Designation <span style="color:red">*</span></label>
						<input type="text" required="required" size="40" id="designation" name="designation" value="<?php echo $designation; ?>"/>
					</div>	
					<div class="form-field">
						<label for="tag-name">Educational Qualification<span style="color:red">*</span></label>
						<input type="text" required="required" size="40" id="educational" name="educational" value="<?php echo $educational; ?>"/>
					</div>	
	
					<div class="form-field">
						<label for="tag-name">Basic Pay <span style="color:red">*</span></label>
						<input type="text" class="mobile" required="required" size="40" id="basic_pay" name="basic_pay" value="<?php echo $basic_pay; ?>"/>
					</div>	
					<div class="form-field">
						<label for="photo">Upload photo</label>
						<input type="file" size="40" <?php echo (isset($photo) && trim($photo)!='') ? "": "" ?> id="photo" name="photo"/>
						<div><span style="color: #f00">Upload Photo size (370x220) & format (jpg,png)</span></div>
					</div>
					<div class="form-field">
						<label for="tag-name">Mobile</label>
						<input type="text" size="40" id="mobile" name="mobile" value="<?php echo $mobile; ?>"/>
					</div>
					<div class="form-field">
						<label for="tag-name">Email</label>
						<input type="text" size="40" id="email" name="email" value="<?php echo $email; ?>"/>
					</div>
					<hr />
					<p class="submit">
						<input type="submit" value="<?php echo $btn; ?>" class="button" id="submit" name="submit" style="background: #FF7F50; border-color:#FF7F50; color: #ffffff;"/>
						<input type="hidden" name="addme" value=<?php echo $hidval;?> >
						<input type="hidden" name="id" value=<?php echo $id;?> >
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).on('keypress','.alpha',function (event){
          var regex = new RegExp("^[a-zA-z ]+$");
          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
          if(event.which == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
              return true;
          }
          if (!regex.test(key)) {
             event.preventDefault();
             return false;
          }
});
 jQuery(document).on('keypress','.alphanumeric',function (event){
                var regex = new RegExp("^[a-zA-z0-9 ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if(event.which == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
                    return true;
                }
                if (!regex.test(key)) {
                   event.preventDefault();
                   return false;
                }
            });             
           jQuery(document).on('keypress','.numeric',function (event){
                var regex = new RegExp("^[0-9.]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if(event.which == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
                    return true;
                }
                if(event.which == 46 && $(this).val().indexOf('.') != -1) {
                    event.preventDefault();
                    return false;
                }
                if (!regex.test(key)) {
                   event.preventDefault();
                   return false;
                }
            }); 
            jQuery(document).on('keypress','.mobile',function (event){
                var regex = new RegExp("^[0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if(event.which == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
                    return true;
                }
                if (!regex.test(key)) {
                   event.preventDefault();
                   return false;
                }
            });
            jQuery(document).on('keypress','.phone',function (event){
                var regex = new RegExp("^[0-9-]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if(event.which == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
                    return true;
                }
                if(event.which == 45 && $(this).val().indexOf('-') != -1) {
                    event.preventDefault();
                    return false;
                }
                if (!regex.test(key)) {
                   event.preventDefault();
                   return false;
                }
            });
jQuery(document).ready(function(){
	jQuery('#mytable').dataTable();
	showSearch("<?php echo $office_type; ?>");
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
			jQuery(".master_category_id").attr("required","required");
			jQuery(".master_section_id").attr("required","required");
			jQuery(".reg_ofc_id").removeAttr( "required" );
			
		}else if(value == "Regional Office"){
			jQuery("#head_office").hide();
			jQuery(".master_board_id").val("");
			jQuery(".master_section_id").val("");
			jQuery("#regional_office").show();
			jQuery(".master_category_id").attr("required","required");
			jQuery(".reg_ofc_id").attr("required","required");
			jQuery(".master_section_id").removeAttr( "required" );
			
		}else{
			jQuery("#head_office").hide();
			jQuery("#regional_office").hide();
			jQuery(".master_board_id").val("");
			jQuery(".master_section_id").val("");
			jQuery(".master_district_id").val("");
			jQuery(".master_category_id").attr("required","required");
			jQuery(".master_section_id").removeAttr( "required" );
			jQuery(".reg_ofc_id").removeAttr( "required" );
			
			
		}
	}
	
</script>