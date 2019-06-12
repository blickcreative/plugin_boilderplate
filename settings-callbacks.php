<?php 
//exit if file is called directly
if(! defined('ABSPATH')){
    exit;
}

// validate plugin settings
function blickplugin_validate_options($input) {
	// todo: add validation functionality..
	return $input;
}

// callback: text field
function blickplugin_callback_field_text( $args ) {
	// get plugin options, first parameter looks for register_settings second parameter, second paremter looks for fallbacks from myplugin_options_default method
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="blickplugin_options_'. $id .'" name="blickplugin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="blickplugin_options_'. $id .'">'. $label .'</label>';
}

// callback: radio field
function blickplugin_callback_field_radio( $args ) {
	// todo: add callback functionality..
	echo 'This will be a radio field.';
}

// callback: textarea field
function blickplugin_callback_field_textarea( $args ) {
	// todo: add callback functionality..
	echo 'This will be a textarea.';
}

// callback: checkbox field
function blickplugin_callback_field_checkbox( $args ) {
	// todo: add callback functionality..
	echo 'This will be a checkbox.';
}

// callback: select field
function blickplugin_callback_field_select( $args ) {
	// todo: add callback functionality..
	echo 'This will be a select menu.';

}
