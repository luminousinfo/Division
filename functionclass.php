<?php

	class functionClass
	{

		function createList($table_name,$name,$selected_value='',$required = false,$condition='',$feild_name = ''){
			global $wpdb;
			$conditionSql = '';
			if($feild_name==''){
				$feild_name = "id, title";
			}
			if($condition!=''){
				$conditionSql = " where ".$condition;
			}
			$sql = "select $feild_name from ".$table_name.$conditionSql." order by title asc";
			$arrresult = $wpdb->get_results($sql);
			$select  = "";
			$select  .= "<select style='width:165px;' name='".$name."' class='".$name."'";
			$select  .= ($required) ? "required='required'>": " >";
			$select  .= "<option value=''>Please Select</option>";
			if (sizeof($arrresult) > 0 )
			{
				foreach($arrresult as $key => $val)
				{
					if($val->id == $selected_value){
						$select  .= "<option selected='selected' value='".$val->id."'>".$val->title."</option>";
					}else{						
						$select  .= "<option value='".$val->id."'>".$val->title."</option>";
					}
				}
			}
			$select  .= "</select>";
			return $select;
		}

		function getName($table_name,$id){
			global $wpdb;
			
			$sql = "select title from ".$table_name." where id = $id";
			$arrresult = $wpdb->get_results($sql);
			$name  = "";
			if (sizeof($arrresult) > 0 )
			{				
				foreach($arrresult as $key => $val)
				{
					$name  .= $val->title;
				}
			}
			return $name;
		}

		function pageRedirect($address){
			?>
			<script type="text/javascript">
			 	document.location='<?php echo $address; ?>';
			</script>
			<?php
		}

		function fileUpload($file_name = array()){
			$extension_array=array('jpg','jpeg','png');
			$dir = plugin_dir_path( __FILE__ );
			// $target_dir = " ";
			$target_file = $dir . "/uploads/".basename($file_name["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if(in_array($imageFileType, $extension_array))
			{
				$image_info = getimagesize($file_name["tmp_name"]);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				if($image_width>=370 && $image_height>=220)
				{
					$baseFileName = "files_".time()."_".rand().".".$imageFileType;
					$target_file = $dir . "/uploads/".$baseFileName;
					if(move_uploaded_file($file_name['tmp_name'],$target_file)){
						return $baseFileName;
					}	
				}
				else
				{
					return "sizewrong";
				}

			}
			else{
				return "extensionwrong";
			}		
		}

		function save($tblname, $data){
			global $wpdb;
			$count = sizeof($data);
			// print_r($meminfo);
			if($count>3)
			{
				$columnsvalues = array();

				foreach($_POST as $key => $value)
				{
					if(!in_array($key, array("submit","addme","id"))){
						$columnsvalues[]    = "`".$key."`='".$value."'";
					}		
				}
				
				if(isset($data['id']) && $data['id']!=''){
					$sSQL = "update ".$tblname." set ".implode(",", $columnsvalues)." where id = ".$data['id'].";";
				}else{
					$sSQL = "INSERT INTO ".$tblname." set ".implode(",", $columnsvalues).";";
				}
				// echo $sSQL;exit;
				$wpdb->query($sSQL);
				return true;
			}
			else
			{
				return false;
			}
		}
	}


?>