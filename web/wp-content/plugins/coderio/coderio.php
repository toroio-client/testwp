<?php

/**
 * CODER.IO Wordpress Plugin
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://coder.io
 * @since             0.0.1
 * @package           Coderio
 *
 * @wordpress-plugin
 * Plugin Name:       Coder.io Plugin
 * Plugin URI:        http://toro.io/
 * Description:       Put description here.
 * Version:           0.0.1
 * Author:            Alex Quiambao <alexquiambao@gmail.com>
 * Author URI:        https://github.com/silverbux
 * License:           MIT
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       toro.io
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-coderio-activator.php
 */
function activate_Coderio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-coderio-activator.php';
	Coderio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-coderio-deactivator.php
 */
function deactivate_Coderio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-coderio-deactivator.php';
	Coderio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Coderio' );
register_deactivation_hook( __FILE__, 'deactivate_Coderio' );

/**
 * Load Coderio Configurations,
 */
require plugin_dir_path( __FILE__ ) . 'includes/coderio-config.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-coderio.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_Coderio() {

	$plugin = new Coderio();
	$plugin->run();

}
run_Coderio();
