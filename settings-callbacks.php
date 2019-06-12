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
	// todo: add callback functionality..
	echo 'This will be a text field.';
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
