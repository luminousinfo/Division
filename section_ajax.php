<?php
require_once("functionclass.php");
$objPub = new functionClass();
global $wpdb;
echo $objPub->createList($wpdb->prefix."master_section","master_section_id",$_POST['selected_value'],false,"master_board_id = ".$_POST['master_board_id']);
?>