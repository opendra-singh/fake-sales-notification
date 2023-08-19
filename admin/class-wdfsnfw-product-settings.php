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

class Wdfsnfw_Admin_Product_Settings {

	public $plugin_name;
	public $settings = array();
	public $active_tab;
	public $this_tab                 = 'product';
	public $tab_name                 = 'Product Settings';
	public $setting_key              = 'wdfsnfw_product_settings';
	public $wdfsnfw_product_settings = array();

	/**
	 * Contructor of class
	 *
	 * @param string $plugin_name The name of this plugin.
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name              = $plugin_name;
		$this->wdfsnfw_product_settings = get_option('wdfsnfw_product_settings');
		$this->settings                 = array(
		array(
		'field'   => 'wdfsnfw_open_product_link_in_new_tab',
		'class'   => 'wdfsnfw_admin_product_settings',
		'label'   => __(
			'Open Product link in new tab',
			'wdfsnfw-open-product-link-in-new-tab'
		),
		'type'    => 'switch',
		'default' => 1,
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_sales_message_heading',
		'class'   => 'wdfsnfw_admin_product_settings',
		'label'   => __('Sales Message Heading', 'wdfsnfw-sales-messags-heading'),
		'type'    => 'text',
		'default' => '',
		'desc'    => __('Title of the popup'),
		),
		array(
		'field'       => 'wdfsnfw_admin_show_selected_product',
		'class'       => 'wdfsnfw_admin_product_settings',
		'label'       => __('Show Selected product', 'wdfsnfw-show-selected-product'),
		'type'        => 'search',
		'desc'        => __('Select Product of your choice', 'wdfsnfw-show-selected-product'),
		'placeholder' => 'Please enter 4 or more characters.',
		'value'       => '',
		),
		);
		if (isset($this->wdfsnfw_product_settings['wdfsnfw_open_product_link_in_new_tab']) && ! empty($this->wdfsnfw_product_settings['wdfsnfw_open_product_link_in_new_tab']) && 'true' == $this->wdfsnfw_product_settings['wdfsnfw_open_product_link_in_new_tab'] ) {
			$this->settings[0]['default'] = 1;
		} else {
			$this->settings[0]['default'] = 0;
		}
		if (isset($this->wdfsnfw_product_settings['wdfsnfw_sales_message_heading']) && ! empty($this->wdfsnfw_product_settings['wdfsnfw_sales_message_heading']) ) {
			$this->settings[1]['default'] = $this->wdfsnfw_product_settings['wdfsnfw_sales_message_heading'];
		} else {
			$this->settings[1]['default'] = get_bloginfo();
		}

		add_action($this->plugin_name . '_tab', array( $this, 'tab' ), 5);
		$this->registerSettings();

		if (WOODEVZ_FAKE_SALES_NOTIFICATION_DELETE_SETTING ) {
			$this->deleteSettings();
		}
	}

	/**
	 * This function is used to delete the setting feild
	 *
	 * @return void
	 */
	public function deleteSettings() {
		foreach ( $this->settings as $setting ) {
			delete_option($setting['field']);
		}
	}

	/**
	 * This function is used to register each setting feild
	 *
	 * @return void
	 */
	public function registerSettings() {
		foreach ( $this->settings as $setting ) {
			register_setting($this->setting_key, $setting['field']);
		}
	}

	/**
	 * This function is used to show the side menu
	 *
	 * @return void
	 */
	public function tab() {
		wp_verify_nonce(wp_create_nonce(isset($_GET) ? $_GET : ''));
		$get = $_GET;
		?>
		<a class='  wdfsnfw-side-menu  <?php echo esc_html(( $this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary' )); ?>' href='<?php echo esc_url(admin_url('admin.php?page=' . sanitize_text_field(isset($get['page']) ? $get['page'] : '') . '&tab=' . $this->this_tab)); ?>'>
			<span class='dashicons dashicons-dashboard'></span> <?php esc_html($this->tab_name); ?>
		</a>
		<?php
	}

	/**
	 * This function is used to show the content of the tab
	 *
	 * @return void
	 */
	public function tabContent() {
		ob_start();
		?>
		<form method='POST' class='wdfsnfw-product-setting-form' enctype=multipart/form-data>
		<?php settings_fields($this->setting_key); ?>
			<div class='row'>
				<div class='col-12 card-inner'>
					<div class='preview-block'>
						<div id='<?php echo esc_attr($this->setting_key); ?>'>
		<?php
		foreach ( $this->settings as $setting ) {
			new Wdfsnfw_Admin_Core_Elements($setting, $this->setting_key);
		}
		?>
						</div>
					</div>
				</div>
			</div>
			<button type='button' id='product_settings_btn' class='btn btn-round btn-primary wdfsnfw-admin-form-btn' option-key='<?php echo esc_attr($this->setting_key); ?>' data-class='wdfsnfw_admin_product_settings'>
				Save
				&nbsp;
				<em class='icon ni ni-arrow-right'></em>
			</button>
			<div style='display:none;' class='loading'>
				&#8230;
			</div>
		</form>
		<?php
		$product_settings = ob_get_contents();
		ob_clean();
		return $product_settings;
	}
}
?>
