<?php
/*
Plugin Name: CoolClock
Plugin URI: https://status301.net/wordpress-plugins/coolclock/
Description: Add an analog clock to your sidebar.
Text Domain: coolclock
Domain Path: languages
Version: 4.2
Author: RavanH
Author URI: https://status301.net/
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/**************
 *   CLASSES
 **************/

require plugin_dir_path( __FILE__ ) . '/includes/class-coolclock.php';
require plugin_dir_path( __FILE__ ) . '/includes/class-coolclock-widget.php';
require plugin_dir_path( __FILE__ ) . '/includes/class-coolclock-shortcode.php';

/**************
 *  INITIATE
 **************/

new CoolClock( __FILE__, '4.2' );
