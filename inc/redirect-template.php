<?php
if (! defined( 'ABSPATH' )){ 
  exit;
}

// get value from option for enable or disable
$smart_csm_setting = get_option('smart_csm_option');

if( $smart_csm_setting['disabled']==1){

	// Render the coming soon mode page if user not logged in.
	if ( !is_user_logged_in()  ){

		//get path of our coming soon mode page.
		$default_template = plugin_dir_path(__FILE__).'../templates/default/index.php';
		include($default_template);
		exit();

	}else{

		global $current_user; 
		$Current_User_ID = $current_user->ID;
		$LoggedInUserData = get_userdata($Current_User_ID );

		//if user not 'administrator' Render the coming soon mode page.
		if($LoggedInUserData->roles[0]!= "administrator"){
			
			//get path of our coming soon mode page.
			$default_template = plugin_dir_path(__FILE__).'../templates/default/index.php';
			include($default_template);
			exit();	
		}
	}
}