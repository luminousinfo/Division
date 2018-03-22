<?php
/*
Plugin Name: Division Module
Plugin URI: 
Description: This is used for Division module.
Version: 1.0
Author: Avinash pathak
Author URI: 
*/


require_once("functionclass.php");
$objPub = new functionClass();
global $wpdb;
// $table_name = $wpdb->prefix . "publiaction";

/*function addmyplug() {

	global $wpdb;

	$table_name = $wpdb->prefix . "publiaction";

	$MSQL = "show tables like '$table_name'";

	if($wpdb->get_var($MSQL) != $table_name)
	{
	   $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  title varchar(255) NULL,
		  category varchar(255) NULL,
		  photo varchar(255) NULL,
		  file varchar(255) NULL,
		  PRIMARY KEY id (id)
		) ";

		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta($sql);
	}

}
	
register_activation_hook(__FILE__,'addmyplug');*/


/* Creating Menus */
function division_Menu()
{

	/* Adding menus */
	add_menu_page(__('Division'),'Employee Corner',"manage_options",'division.php', 'division_list');

	/* Adding Sub menus */
	add_submenu_page('division.php', 'Add Employee Corner', 'Add Employee Corner' ,"manage_division", 'division_new', 'division_new');
	//add_submenu_page('division.php', 'Master Board', 'Master Board' ,"manage_division", 'master_board', 'master_board');
	add_submenu_page('division.php', 'Master Section', 'Master Section',"manage_division", 'master_section', 'master_section');
	add_submenu_page('division.php', 'Master Category', 'Master Category',"manage_division", 'master_category', 'master_category');
	add_submenu_page('division.php', 'Master District', 'Master District',"manage_division", 'master_district', 'master_district');
	add_submenu_page('division.php', 'Master Regional Office', 'Master Regional Office',"manage_division", 'master_regional_office', 'master_regional_office');

	wp_register_style('demo_table.css', plugin_dir_url(__FILE__) . 'css/demo_table.css');
	wp_enqueue_style('demo_table.css');

	wp_register_script('jquery.dataTables.js', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.js', array('jquery'));
	wp_enqueue_script('jquery.dataTables.js');

}

add_action('admin_menu', 'division_Menu');
add_action( 'wp_ajax_section', 'section');
add_action( 'wp_ajax_category', 'category');
// code goes for ajax========
function section() {
    // Handle request then generate response using WP_Ajax_Response
	include "section_ajax.php";
    // Don't forget to stop execution afterward.
    wp_die();
}
function category() {
    // Handle request then generate response using WP_Ajax_Response
	include "category_ajax.php";
    // Don't forget to stop execution afterward.
    wp_die();
}
function master_board() {
	include "manage-board.php";
}

function master_section() {
	include "manage-section.php";
}
function master_category() {
	include "manage-category.php";
}
function master_district() {
	include "manage-district.php";
}
function master_regional_office() {
	include "master-regional-office.php";
}
function division_new() {
	include "division-new.php";
}

function division_list() {
	include "divisionlist.php";
}


function viewdivision_list()
{
	include "divisionlistview.php";
}


add_shortcode('division', 'viewdivision_list');

?>
