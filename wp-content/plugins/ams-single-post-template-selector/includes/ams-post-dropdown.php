<?php

// Exit if accessed directly.
defined('ABSPATH') or die();

wp_nonce_field( 'ams-spts-ms-post-nonce-act', 'ams-spts-ms-post-nonce' );  

?>

<label class="" for="ams_spts_ms_template_selector"><?php _e( 'Template', 'ams-spts-ms-text-domain' ); ?></label><br />
<select name="ams_spts_ms_template_selector" id="post_template" class="dropdown widefat" style="margin-top: 10px;margin-bottom: 10px;">
	<option value=""><?php _e( 'Default', 'ams-spts-ms-text-domain' ); ?></option>
	
	<!-- Get filled in options with template names -->
	<?php $this->ams_spts_ms_post_template_selector_dropdown(); ?>
</select>
<?php _e( 'Select the template to replace single.php.', 'ams-spts-ms-text-domain' ); ?>