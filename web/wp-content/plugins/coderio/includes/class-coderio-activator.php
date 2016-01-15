<?php

/**
 * Fired during plugin activation
 *
 * @link       http://toro.io
 * @since      0.0.1
 *
 * @package    Coderio
 * @subpackage Coderio/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.0.1
 * @package    Coderio
 * @subpackage Coderio/includes
 * @author     Alex Quiambao <alexquiambao@gmail.com>
 */
class Coderio_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.0.1
	 */
	public static function activate() {
        if ( !is_dir(ABSPATH . 'wp-content/plugins/rest-api/') ) {
            die('<a href="http://v2.wp-api.org/" target="_blank">WP-API</a> plugin is required, Please install plugin first.');
        }

        if ( !is_dir(ABSPATH . 'wp-content/plugins/Basic-Auth/') ) {
            die('<a href="https://github.com/WP-API/Basic-Auth" target="_blank">WP-API Basic Auth</a> plugin is required, Please install plugin first.');
        }

        Coderio_Activator::run_activate_plugin( 'Basic-Auth/basic-auth.php' );
        Coderio_Activator::run_activate_plugin( 'rest-api/plugin.php' );
	}

    public function run_activate_plugin( $plugin ) {
        $current = get_option( 'active_plugins' );
        $plugin = plugin_basename( trim( $plugin ) );

        if ( !in_array( $plugin, $current ) ) {
            $current[] = $plugin;
            sort( $current );
            do_action( 'activate_plugin', trim( $plugin ) );
            update_option( 'active_plugins', $current );
            do_action( 'activate_' . trim( $plugin ) );
            do_action( 'activated_plugin', trim( $plugin) );
        }

        return null;
    }
}
