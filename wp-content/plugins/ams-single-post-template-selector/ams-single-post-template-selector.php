<?php

/*
Plugin Name: AMS Single Post Template Selector
Description: Plugin allows to choose different template for individual post.
Author: Manoj Sathyavrathan
Version: 1.0
*/

// Exit if accessed directly.
defined('ABSPATH') or die();

/**
 * Plugin directory
 * @var constant, AMS_SPTS_DIR
 */
define( 'AMS_SPTS_MS_TEMPLATE_DIR', plugin_dir_path( __FILE__ ) );

class ams_SPTS_MS_Selector_Plugin_Init {

	/**
	 * Class initialization
	 *
	 */
	function __construct() {
	
		$this->includes();
	}
	
	/**
	 * Includes file includes/ams-post-metabox.php
	 *
	 * @Const 'AMS_SPTS_MS_TEMPLATE_DIR'
	 */
	function includes(){
	
		if (file_exists (AMS_SPTS_MS_TEMPLATE_DIR . 'includes/ams-post-metabox.php'))
			include_once(AMS_SPTS_MS_TEMPLATE_DIR . 'includes/ams-post-metabox.php');
    }
	
	/**
	 * Class Initialization
	 * 
	 */
	public static function ams_SPTS_MS_Selector_Init() {
	
        new ams_SPTS_MS_Selector_Plugin_Init();
    }
}

/**
 *
 * Instantiate the class after wordpress loaded.
 */
function ams_SPTS_MS_Selector_Plugin_Setup() {

	ams_SPTS_MS_Selector_Plugin_Init::ams_SPTS_MS_Selector_Init();
}
add_action( 'wp_loaded', 'ams_SPTS_MS_Selector_Plugin_Setup' );
?>