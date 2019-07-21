<?php 
function blick_custom_login_url($url){
    $options = get_options('blickplugin_options', blickplugin_options_default());

    echo "Loaded blick_custom_login_url";
    if(isset($options['custom_url']) && ! empty($options['custom_url'])):
        $url = esc_url($options['custom_url']);
    endif;

    return $url;
}

add_filter('login_headerurl', 'blick_custom_login_url'); 
/* 
// custom login logo url
function blick_custom_login_url( $url ) {
	
	$options = get_option( 'blickplugin_options', blickplugin_options_options_default() );
	
	if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {
		
		$url = esc_url( $options['custom_url'] );
		
	}
	
	return $url;
	
}
add_filter( 'login_headerurl', 'blick_custom_login_url' );

*/