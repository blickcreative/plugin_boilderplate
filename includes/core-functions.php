<?php 
function blick_custom_login_url($url){
    $options = get_option('blickplugin_options', blickplugin_options_default());

    if(isset($options['custom_url']) && ! empty($options['custom_url'])):
        $url = esc_url($options['custom_url']);
    endif;

    return $url;
}
//change the url for the login logo
add_filter('login_headerurl', 'blick_custom_login_url'); 

function blick_custom_login_title($title){
    $options = get_option('blickplugin_options', blickplugin_options_default());

    if(isset($options['custom_title']) && ! empty($options['custom_title'])):
        $title = esc_attr($options['custom_title']);
    endif;

    return $title;
}
//change the title for the login logo
add_filter('login_headertitle', 'blick_custom_login_title'); 

// custom login styles
function blickplugin_custom_login_styles() {
	
	$styles = false;
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	
	if ( isset( $options['custom_style'] ) && ! empty( $options['custom_style'] ) ) {
		$styles = sanitize_text_field( $options['custom_style'] );
	}
	
	if ( 'enable' === $styles ) {
		wp_enqueue_style( 'blickplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/blickplugin-login.css', array(), null, 'screen' );
		wp_enqueue_script( 'blickplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/blickplugin-login.js', array(), null, true );
	}
	
}
add_action( 'login_enqueue_scripts', 'blickplugin_custom_login_styles' );

// custom login message
function blickplugin_custom_login_message( $message ) {
	
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	if ( isset( $options['custom_message'] ) && ! empty( $options['custom_message'] ) ) {
		$message = "<p class='custom-message'>" . wp_kses_post( $options['custom_message'] ) . "</p>";
	}
	return $message;
}
add_filter( 'login_message', 'blickplugin_custom_login_message' );


// custom admin footer message
function blickplugin_custom_admin_footer( $message ) {
	
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	
	if ( isset( $options['custom_footer'] ) && ! empty( $options['custom_footer'] ) ) {
		$message = sanitize_text_field( $options['custom_footer'] );
	}
	
	return $message;
}
add_filter( 'admin_footer_text', 'blickplugin_custom_admin_footer' );

// remove toolbar comments and new-content items
function blickplugin_custom_admin_toolbar() {
	$toolbar = false;
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	
	if ( isset( $options['custom_toolbar'] ) && ! empty( $options['custom_toolbar'] ) ) {
		$toolbar = boolval($options['custom_toolbar']);
	}
	
	if ( $toolbar ) {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'new-content' );
		
	}
	
}
add_action( 'wp_before_admin_bar_render', 'blickplugin_custom_admin_toolbar', 999 );

// add custom admin color scheme for new users
function blickplugin_custom_admin_scheme( $user_id ) {
	
	$scheme = 'default';
	
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	
	if ( isset( $options['custom_scheme'] ) && ! empty( $options['custom_scheme'] ) ) {
		$scheme = sanitize_text_field( $options['custom_scheme'] );
	}
	
	$args = array( 'ID' => $user_id, 'admin_color' => $scheme );
	wp_update_user( $args );
	
}
add_action( 'user_register', 'blickplugin_custom_admin_scheme' );