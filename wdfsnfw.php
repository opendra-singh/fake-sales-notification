<?php
/**
 * The plugin bootstrap file
 * Php version 8.2
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version CVS:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       WooDevz Fake Sales Notification for WooCommerce
 * Plugin URI:        https://woodevz.com/
 * Description:       This Live Sales Notification plugin for WordPress is the perfect tool for boosting conversions and sales. This plugin enables you to display real-time notifications of successful sales directly on your website, helping to boost customer confidence and encourage more conversions.
 * Version:           1.0.0
 * Author:            WooDevz Technologies
 * Author URI:        https://woodevz.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wdfsnfw
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}




/*
	Making sure woocommerce is there
*/
require_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

	/**
	 * Check whether woocommerce is installed or not.
	 *
	 * @return void
	 */
	function wdfsnfwAdminCheckWoocommerce() {
		?>
		<div class="error notice">
			<p><?php echo esc_html( ' Installation Error:- Please Install and Activate WooCommerce plugin. To get WooCommerce <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">click here</a>.', 'wdfsnfw' ); ?></p>
		</div>
		<?php
		unset( $_GET['activate'] );
	}
	add_action( 'admin_notices', 'wdfsnfwAdminCheckWoocommerce' );
	deactivate_plugins( plugin_basename( __FILE__ ) );
	return;
}

define( 'WOODEVZ_FAKE_SALES_NOTIFICATION_URL', 'https://woodevz.com/' );
define( 'WOODEVZ_FAKE_SALES_NOTIFICATION_DELETE_SETTING', false );

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WDFSNFW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wdfsnfw-activator.php
 *
 * @return void
 */
function activateWdfsnfw() {
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-wdfsnfw-activator.php';
	Wdfsnfw_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wdfsnfw-deactivator.php
 *
 * @return void
 */
function deactivateWdfsnfw() {
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-wdfsnfw-deactivator.php';
	Wdfsnfw_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activateWdfsnfw' );
register_deactivation_hook( __FILE__, 'deactivateWdfsnfw' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-wdfsnfw.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since  1.0.0
 * @return void
 */
function runWdfsnfw() {
	 $plugin = new Wdfsnfw();
	$plugin->run();
}
runWdfsnfw();
