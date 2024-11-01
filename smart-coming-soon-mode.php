<?php
/*
 * Plugin Name: Smart Coming Soon Mode
 * Description: Smart Coming Soon Mode is a simple and lite plugin allow you to create a beautiful and clean Smart Coming Soon Page / Under Constructions Page / Pre Launch Page for your website and share your Contact Informations with users and connects with users on your Social Networks.
 * Author: @webdzier
 * Author URI: http://webdzier.com/
 * Text Domain: smart-coming-soon-mode
 * Version: 1.2
 * Domain Path: /languages
 * License :GPL2 or later
 */


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('SCSM_DIR_PATH', plugin_dir_path(__FILE__));

define('SCSM_DIR_URL', plugin_dir_url(__FILE__));

define('SCSM_TEXTDOMAIN', 'smart-coming-soon-mode');

/* include Option Panel 
 *
 * Redux Framwork links 
 *
 */

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/ReduxCore/framework.php' ) ) {

	require_once( SCSM_DIR_PATH . '/admin/ReduxCore/framework.php' );

}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/admin/smart-coming-soon-mode-option/options.php' ) ) {

 require_once( SCSM_DIR_PATH . '/admin/smart-coming-soon-mode-option/options.php' );

}

/* Included CSS / JS files */

add_action( 'admin_enqueue_scripts', 'SCSM_admin_script' );

function SCSM_admin_script( $hook ){

	if( $hook = 'toplevel_page_smart-coming-soon-mode' ){

	    wp_enqueue_style( 'jquery-ui' ,SCSM_DIR_URL. 'assest/css/jquery-ui.css',array(),'1.0' );

	    wp_enqueue_style( 'jquery-ui-datepicker' );

		wp_enqueue_script('jquery');

		wp_enqueue_script( 'jquery-ui-datepicker' );

		wp_enqueue_style( 'scsm-custom-admin-style', SCSM_DIR_URL. 'assest/css/custom_admin.css',array(),'1.0');

		wp_enqueue_script( 'scsm-custom-admin', SCSM_DIR_URL. 'assest/js/custom_admin.js',array(),'1.0');
	}
	
}

/* To redirect our site url by smart coming soon mode page,after redirecting only smart coming soon mode page can display
*/
function SCSM_template_redirect(){	

   include_once( 'inc/redirect-template.php');

}

/* The redirect action will not be called on login pages */

add_action('init','SCSM_redirect_on_login');

function SCSM_redirect_on_login (){

	global $pagenow;

	if ('wp-login.php' == $pagenow){

		return;		

	}else{

		add_action( 'template_redirect', 'SCSM_template_redirect' );

	}

}

/* smart coming soon mode Live Preview */

if((isset($_GET['smart_coming_soon_mode_preview']) && $_GET['smart_coming_soon_mode_preview'] == 'true')){

	$scsm_file = plugin_dir_path(__FILE__) . 'templates/default/index.php';

	include($scsm_file);

	exit();

}

/* add settings link to plugins page */

add_filter('plugin_action_links_'.plugin_basename(__FILE__),'SCSM_add_settings_link');

function SCSM_add_settings_link($links){

  $scsm_settings_link = '<a href="' . admin_url('admin.php?page=smart-coming-soon-mode&tab=1') . '" title="Wbd Coming Soon Mode Settings">Settings</a>';

  array_unshift($links, $scsm_settings_link);

  return $links;

} 

/* hook for the plugin uninstall. */ 

register_uninstall_hook(__FILE__, 'SCSM_Option_Data_Uninstall');

function SCSM_Option_Data_Uninstall(){

	$scsm_option_name = 'smart_csm_option';

	delete_option($scsm_option_name);

}


/* More features page included in admin option panel */ 

function SCSM_More_Features(){
	ob_start();

	require_once( SCSM_DIR_PATH .'/inc/more-features.php');

	$scsm_more_features_content = ob_get_contents();

	ob_end_clean();

	return $scsm_more_features_content;

}

/* Help Page Displaying with below function */ 

function SCSM_Help_Page(){

	ob_start();

	require_once( SCSM_DIR_PATH .'/inc/help.php');

	$scsm_help_content = ob_get_contents();

	ob_end_clean();

	return $scsm_help_content;
}