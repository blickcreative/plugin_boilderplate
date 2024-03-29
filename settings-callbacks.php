<?php 
//exit if file is called directly
if(! defined('ABSPATH')){
    exit;
}

// callback: text field
function blickplugin_callback_field_text( $args ) {
	// get plugin options, first parameter looks for register_settings second parameter, second paremter looks for fallbacks from blickplugin_options_default method
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	echo '<input id="blickplugin_options_'. $id .'" name="blickplugin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="blickplugin_options_'. $id .'">'. esc_html__($label, 'blickplugin') .'</label>';
}

// callback: radio field
function blickplugin_callback_field_radio( $args ) {
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = array(
		'enable'  => 'Enable custom styles',
		'disable' => 'Disable custom styles'
	);
	
	foreach ( $radio_options as $value => $label ) {
		$checked = checked( $selected_option === $value, true, false );
		echo '<label><input name="blickplugin_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. esc_html__($label, 'blickplugin') .'</span></label><br />';
	}
}

// callback: textarea field
function blickplugin_callback_field_textarea( $args ) {
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$allowed_tags = wp_kses_allowed_html( 'post' );
	//wp_kses( stripslashes_deep) sanitizes variable
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	echo '<textarea id="blickplugin_options_'. $id .'" name="blickplugin_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="blickplugin_options_'. $id .'">'. esc_html__($label, 'blickplugin') .'</label>';
}

// callback: checkbox field
function blickplugin_callback_field_checkbox( $args ) {
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	echo '<input id="blickplugin_options_'. $id .'" name="blickplugin_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="blickplugin_options_'. $id .'">'. esc_html__($label, 'blickplugin') .'</label>';
}

// callback: select field
function blickplugin_callback_field_select( $args ) {
	$options = get_option( 'blickplugin_options', blickplugin_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = array(
		'default'   => 'Default',
		'light'     => 'Light',
		'blue'      => 'Blue',
		'coffee'    => 'Coffee',
		'ectoplasm' => 'Ectoplasm',
		'midnight'  => 'Midnight',
		'ocean'     => 'Ocean',
		'sunrise'   => 'Sunrise',
	);
	
	echo '<select id="blickplugin_options_'. $id .'" name="blickplugin_options['. $id .']">';
	foreach ( $select_options as $value => $option ) {
		$selected = selected( $selected_option === $value, true, false );
		echo '<option value="'. $value .'"'. $selected .'>'. esc_html__($option, 'blickplugin') .'</option>';
	}
	echo '</select> <label for="blickplugin_options_'. $id .'">'. esc_html__($label, 'blickplugin') .'</label>';
}