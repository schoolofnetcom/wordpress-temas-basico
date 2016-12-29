<?php

// Exit if accessed directly
defined('ABSPATH') or die();

class ams_SPTS_MS_Selector_Init {

	/**
	 * Loads Post Template Selector only in posts
	 * Adds post template selector meta box, saves meta box, and apply filter single post view
	 */
	function __construct() {
		
		add_action( 'add_meta_boxes_post', array( $this, 'ams_spts_ms_template_selector_add_metabox' ) );
		add_action( 'save_post', array( $this, 'ams_spts_ms_template_selector_metabox_save' ), 1, 2 );
		add_filter( 'single_template', array( $this, 'ams_spts_ms_template_selector_get_post_template' ) );
	}

	/**
	 * Adds post template selector meta box
	 *
	 */
	function ams_spts_ms_template_selector_add_metabox() {

		if ( $this->ams_spts_ms_template_selector_get_post_templates() )
			add_meta_box( 
				'ams_spts_ms_template_selector', 
				__( 'Post Template Selector', 'ams-spts-ms-text-domain' ), 
				array( $this, 'ams_spts_ms_template_selector_metabox' ), 
				'post', 
				'side', 
				'high' 
			);
	}
	
	/**
	 * Filters single post and applies the saved template
	 *
	 */
	function ams_spts_ms_template_selector_get_post_template( $ams_spts_template ) {

		global $post;

		$ams_spts_file_name = get_post_meta( $post->ID, 'ams_spts_ms_template_selector', true );

		if( ! $ams_spts_file_name )
			return $ams_spts_template;

		/** Prevent directory traversal */
		$ams_spts_file_name = str_replace( '..', '', $ams_spts_file_name );

		if( file_exists( get_stylesheet_directory() . "/{$ams_spts_file_name}" ) )
			$ams_spts_template = get_stylesheet_directory() . "/{$ams_spts_file_name}";
		elseif( file_exists( get_template_directory() . "/{$ams_spts_file_name}" ) )
			$ams_spts_template = get_template_directory() . "/{$ams_spts_file_name}";

		return $ams_spts_template;
	}
	
	/**
	 * Search files and return files with templates if match found
	 *
	 */
	function ams_spts_ms_template_selector_get_post_templates() {

		$ams_spts_tpl_files = wp_get_theme()->get_files( 'php', 1 );
		$ams_spts_post_templates = array();

		foreach ( (array) $ams_spts_tpl_files as $ams_spts_tpl_file => $ams_spts_file_name ) {
			
			$ams_spts_file_content = file_get_contents( $ams_spts_file_name );
			if ( ! preg_match( '|Post Template - Name:(.*)$|mi', $ams_spts_file_content, $ams_spts_tpl_name ) )
				continue;

			$ams_spts_post_templates[ $ams_spts_tpl_file ] =  $this->clean_tpl_name( $ams_spts_tpl_name[1] ) ;
		}
		return $ams_spts_post_templates;
	}

	/**
	 * Strip php tag and comment tag
	 *
	 */
	function clean_tpl_name( $tpl_name ) {
	
		return trim(preg_replace("{\s*(?:\*\/|\?>|/).*}", '', $tpl_name));
	}
	
	/**
	 * Populates the dropdown with template names
	 *
	 */
	function ams_spts_ms_post_template_selector_dropdown() {

		global $post;
		
		// Searches for files with templates
		$ams_spts_post_tpl_files = $this->ams_spts_ms_template_selector_get_post_templates();

		// Loop through files, fill the drop down with template name
		foreach ( (array) $ams_spts_post_tpl_files as $ams_spts_tpl_file => $ams_spts_tpl_name ) :
			
			// Gets the saved template name from db
			$ams_spts_selected = ( $ams_spts_tpl_file == get_post_meta( $post->ID, 'ams_spts_ms_template_selector', true ) ) ? ' selected="selected"' : '';
			
			// Creates new options for the drop down with each template name,
			// and selects the saved one based on the post id, stores file name as option value
			$ams_spts_ms_opt = '<option value="' . esc_attr( $ams_spts_tpl_file ) . '"' . $ams_spts_selected . '>' . esc_html( $ams_spts_tpl_name ) . '</option>';
			
			// Displays the filled in options
			echo $ams_spts_ms_opt;
		endforeach;
	}

	/**
	 * Saves/updates selected template name when active post published/updated
	 *
	 */
	function ams_spts_ms_template_selector_metabox_save( $post_id, $post ) {
	
		// Verifies nonce
		 if ( ! isset( $_POST['ams-spts-ms-post-nonce'] ) || ! wp_verify_nonce( $_POST['ams-spts-ms-post-nonce'], 'ams-spts-ms-post-nonce-act' ) ) 
			return $post->ID;
		
		// Object with post type 'post'
		$ams_post_type = get_post_type_object( $post->post_type );

		// Check if the current user has permission to edit the post
		if ( !current_user_can( $ams_post_type->cap->edit_post, $post_id ) )
			return $post->ID;
		
		// New selected template's file name
		if(isset($_POST['ams_spts_ms_template_selector'])){
			$ams_spts_new_tpl_name = sanitize_text_field($_POST['ams_spts_ms_template_selector']);
		}
		
		// Template file option key
		$ams_spts_selector_name = 'ams_spts_ms_template_selector';

		// Get the saved template's file name
		$ams_spts_old_tpl_name = get_post_meta( $post_id, $ams_spts_selector_name, true );

		// If a new template is added and there is no previous template, add it's file name
		if ( $ams_spts_new_tpl_name && '' == $ams_spts_old_tpl_name )
			add_post_meta( $post_id, $ams_spts_selector_name, $ams_spts_new_tpl_name, true );

		// If the new template does not match the old template, update it's file name
		elseif ( $ams_spts_new_tpl_name && $ams_spts_new_tpl_name != $ams_spts_old_tpl_name )
			update_post_meta( $post_id, $ams_spts_selector_name, $ams_spts_new_tpl_name );

		// If there is no new template but an old template exists, delete it's file name
		elseif ( '' == $ams_spts_new_tpl_name && $ams_spts_old_tpl_name )
			delete_post_meta( $post_id, $ams_spts_selector_name, $ams_spts_old_tpl_name );
	}

	/**
	 * Displays post template selector drop down meta box
	 *
	 */
	function ams_spts_ms_template_selector_metabox() {

		if (file_exists (AMS_SPTS_MS_TEMPLATE_DIR . "includes/ams-post-dropdown.php"))
			include_once (AMS_SPTS_MS_TEMPLATE_DIR . "includes/ams-post-dropdown.php");
	}

}

// Initializes the class
$ams_SPTS_MS_Selector_Box = new ams_SPTS_MS_Selector_Init();
?>