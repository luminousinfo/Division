<?php
	require_once("functionclass.php");
	$objPub = new functionClass();

	global $wpdb;
	$addme=$_POST["addme"];
	$tableName = "master_regional_office";
	$table_name1 = $wpdb->prefix . $tableName;
	if($addme==1)
	{
		$objPub->save($table_name1,$_POST);
		$objPub->pageRedirect("admin.php?page=".$tableName."&info=saved");
		exit;
	}else if($addme==2)
	{
		$objPub->save($wpdb->prefix.$tableName, $_POST);
		$objPub->pageRedirect("admin.php?page=".$tableName."&info=upd");
		exit;
	}

	// print_r($_POST);exit;
	
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
		$wpdb->query("delete from ".$table_name1." where id=".$delid);
		echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong>.</p></div>";
	}

	$act=$_REQUEST["act"];
	if($act=="upd")
	{
		$recid=$_REQUEST["id"];
		$sSQL="select * from ".$table_name1 = $wpdb->prefix . "$tableName where id=$recid";
		$result = $wpdb->get_results($sSQL);
		// print_r($result);
		$result = $result[0];
		if (sizeof($result) > 0 )
		{
			$id        = $result->id;
			$title      = $result->title;
			$btn	   = "Update";
			$hidval	   = 2;
		}
	}
	else
	{
		$btn	   ="Add New";
		$id        = "";
		$title  	   = "";
		$photo     = "";
		$file   = "";
		$add       = "";
		$hidval	   = 1;
	}
?>
<div xmlns="http://www.w3.org/1999/xhtml" class="wrap nosubsub">

	<div class="icon32" id="icon-edit"><br/></div>
	<h2>Manage Regional Office</h2>
	<div id="col-left" style="background-color: #FFF !important;">
		<div class="col-wrap">
			<div>
				<div class="form-wrap">
					<h3>Add New Regional Office</h3>
					<form class="validate" action="admin.php?page=<?php echo $tableName; ?>" method="post" id="addtag">
						<div class="form-field">
							<label for="tag-name">Regional Office Name </label>
							<input type="text" required="required" size="40" id="title" name="title" value="<?php echo $title; ?>"/>
						</div>	
						<!-- <div class="form-field">
							<label for="tag-name">Description </label>
							<textarea name="description"><?php //echo $description; ?></textarea>
						</div> -->					
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
	<div id="col-right">
		<table class="wp-list-table widefat fixed " id="memberlist">
			<thead>
				<tr>
					<th><u>S No.</u></th>
					<th>Regional Office Name</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
	<?php
			$sql = "select * from ".$table_name1." order by title asc";
			$arrresult = $wpdb->get_results($sql);
			
			if (sizeof($arrresult) > 0 )
			{
			?>
				<script type="text/javascript">
				/* <![CDATA[ */
				jQuery(document).ready(function(){
					jQuery('#mytable').dataTable();
				});
				/* ]]> */
				</script>
	<?php
				foreach($arrresult as $key => $val)
				{
					$id		= $val->id;
		?>
				<tr>
					<td><?php echo ++$key; ?></td>
					<td nowrap><?php echo $val->title; ?></td>
					<td><a href="admin.php?page=<?php echo $tableName ?>&act=upd&id=<?php echo $id;?>" class="button" style="background: #4CAF50; border-color:#4CAF50; color: #ffffff;" onclick="return confirm('Are you sure want to Edit!')">Edit</a></td>
					<td><a href="admin.php?page=<?php echo $tableName ?>&info=del&did=<?php echo $id;?>" class="button" onclick="return confirm('Are sure want to Delete!')" style="background: #DC143C; border-color:#DC143C; color: #ffffff;">Delete</a></td>
				</tr>
	<?php }
		} else { ?>
				<tr>
					<td>No Record Found!</td>
				<tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
