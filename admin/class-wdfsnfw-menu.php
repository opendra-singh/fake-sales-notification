<?php

/**
 * The admin-specific functionality of the plugin.
 * Php version 7.4
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version CVS:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */

defined('ABSPATH') || die('Sorry!, No script kiddies allowed!');

/**
 * This is a menu class in which all the settings are found
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @link https://woodevz.com/
 */
class Wdfsnfw_Admin_Menu {

	public $plugin_name;
	public $version;
	public $menu;

	/**
	 * Contructor of class
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		add_action('admin_menu', array( $this, 'wdfsnfwAdminPluginMenu' ));
	}

	/**
	 * Admin Plugin Menu
	 *
	 * @return void
	 */
	public function wdfsnfwAdminPluginMenu() {
		$this->menu = add_menu_page(
			__('WooDevz Fake Sales Notification For Woocommerce'),
			__('Woo Fake Notify'),
			'manage_options',
			'wdfsnfw',
			array( $this, 'wdfsnfwAdminMenuPage' ),
			'//woodevz.com/wp-content/uploads/2023/01/woodevz_icon-20x20-1.png',
			6
		);
	}

	/**
	 * Admin Plugin Menu
	 *
	 * @return void
	 */
	public function wdfsnfwAdminMenuPage() {
		include plugin_dir_path(dirname(__FILE__)) . 'includes/includes.php';
		$general_settings      = new Wdfsnfw_Admin_General_Settings($this->plugin_name, $this->version);
		$general_settings_data = $general_settings->tabContent();
		$display_settings      = new Wdfsnfw_Admin_Display_Settings($this->plugin_name, $this->version);
		$display_settings_data = $display_settings->tabContent();
		$product_settings      = new Wdfsnfw_Admin_Product_Settings($this->plugin_name, $this->version);
		$product_settings_data = $product_settings->tabContent();
		$page_settings         = new Wdfsnfw_Admin_Page_Settings($this->plugin_name, $this->version);
		$page_settings_data    = $page_settings->tabContent();
		$arr                   = array(
		array( 'active', '#wdfsnfw_admin_general_settings', 'General Settings', $general_settings_data ),
		array( '', '#wdfsnfw_admin_display_settings', 'Display Settings', $display_settings_data ),
		array( '', '#wdfsnfw_admin_product_settings', 'Product Settings', $product_settings_data ),
		array( '', '#wdfsnfw_admin_page_settings', 'Page Settings', $page_settings_data ),
		);
		?>
			<div class='nk-header is-light nk-header-wrap p-3'>
				<a href='<?php echo esc_url(plugin_dir_url(__DIR__) . 'img/logo.png'); ?>' target='_blank'><img height='50' src='<?php echo esc_url(plugin_dir_url(__DIR__) . 'img/logo.png'); ?>' alt='<?php echo esc_url(WOODEVZ_FAKE_SALES_NOTIFICATION_URL) . 'logo.png'; ?>'></a>
				<a href='<?php echo esc_url(WOODEVZ_FAKE_SALES_NOTIFICATION_URL); ?>' target='_blank'><h4>WooDevz Fake Sales Notification For Woocommerce</h4></a>
			</div>
			<div class='card'>
				<div class='card-inner'>
					<ul class='nav nav-tabs mt-n3'>
		<?php
		foreach ( $arr as $value ) {
			?>
							<li class='nav-item'>
								<a class='nav-link wdfsnfw-nav-link <?php echo esc_html($value[0]); ?>' id='<?php echo esc_attr(ltrim($value[1], '#') . '_nav_link'); ?>' data-bs-toggle='tab' href='<?php echo esc_url($value[1]); ?>'>
			<?php
			echo esc_html($value[2]);
			?>
								</a>
							</li>
			<?php
		}
		?>
					</ul>
					<div class='tab-content'>
		 <?php
			foreach ( $arr as $v ) {
				?>
							<div class='tab-pane wdfsnfw-tab-pane <?php echo esc_html($v[0]); ?>' id='<?php echo esc_attr(ltrim($v[1], '#')); ?>'>
				<?php print_r($v[3]); ?>
							</div>
				<?php
			}
			?>
					</div>
				</div>
			</div>
		<?php
	}
}
?>
