<?php
//exit if file is called directly
if(! defined('ABSPATH')){
    exit;
}

// display the plugin settings page
function blickplugin_display_settings_page() {
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html__( get_admin_page_title(), 'blickplugin'); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'blickplugin_options' );
			
			// output setting sections
			do_settings_sections( 'blickplugin' );
			
			// submit button
			submit_button();
			?>
		</form>
	</div>
	<?php
}