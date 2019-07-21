<?php 
/*
Plugin Name: BlickPlugin
Description: Welcome to the Blick Plugin.
Plugin URI:  foo@foo.com
Author:      Blick Creative
Version:     1.0
Text Domain  blickplugin
Domain Path /languages
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 
2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/

//exit if file is called directly
if(! defined('ABSPATH')){
    exit;
}

if(is_admin()){
    require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';

    require_once plugin_dir_path(__FILE__) . 'settings-callbacks.php';
    require_once plugin_dir_path(__FILE__) . 'settings-register.php';
}

require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';

// default plugin option settings
function blickplugin_options_default() {
	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'blickplugin'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">' . esc_html__('My custom message', 'blickplugin') . '</p>',
		'custom_footer'  => esc_html__('Special message for users', 'blickplugin'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);
} 

// load text domain
function blickplugin_load_textdomain() {
	load_plugin_textdomain( 'blickplugin', false, plugin_dir_path( __FILE__ ) . 'languages/' );
}
add_action( 'plugins_loaded', 'blickplugin_load_textdomain' );


// remove options on uninstall
/* 
An uninstall file will run when users delete the plugin from admin
function blickplugin_on_uninstall() {
	if ( ! current_user_can( 'activate_plugins' ) ) return;
	delete_option( 'blickplugin_options' );
}
register_uninstall_hook( __FILE__, 'blickplugin_on_uninstall' ); */