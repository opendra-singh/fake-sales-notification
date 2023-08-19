<?php
/**
 * This file is used to show the general settings
 * Php version 7.4
 *
 * @package Wdfsnfw
 * @link    https://woodevz.com/
 */

/**
 * This file is used to show the general settings
 * Php version 7.4
 *
 * @package Wdfsnfw
 * @link    https://woodevz.com/
 */

class Wdfsnfw_Admin_General_Settings {

	public $plugin_name;
	public $settings = array();
	public $active_tab;
	public $this_tab                 = 'general';
	public $tab_name                 = 'General Settings';
	public $setting_key              = 'wdfsnfw_general_settings';
	public $wdfsnfw_general_settings = array();
	public $timing_for_popup         = array(
	array(
	'field'   => 'wdfsnfw_how_long_to_keep_the_popup',
	'class'   => 'wdfsnfw_admin_general_settings',
	'label'   => 'How long to keep the popup opened ( seconds)',
	'type'    => 'number',
	'default' => 0,
	'desc'    => '',
	),
	array(
	'field'   => 'wdfsnfw_time_gap_bt_two_popup',
	'class'   => 'wdfsnfw_admin_general_settings',
	'label'   => 'Time gap between 2 popups ( seconds)',
	'type'    => 'number',
	'default' => 0,
	'desc'    => 'Once a popup closes then after how much time new popup should open',
	'wdfsnfw-time-gap-bt-two-popup',
	),
	);
	public $audio_alert              = array(
	array(
	'field'   => 'wdfsnfw_enable_audio_alert',
	'class'   => 'wdfsnfw_admin_general_settings',
	'label'   => 'Enable Audio alert',
	'type'    => 'switch',
	'default' => 0,
	'desc'    => 'This will create an audio alert when a sales popup comes up, Audio feature is not stable as it depend on browser and user permission',
	'wdfsnfw-enable-audio-alert',
	),
	array(
	'field' => 'wdfsnfw_add_audio_file',
	'class' => 'wdfsnfw_admin_general_settings wdfsnfw_custom_uploader_btn',
	'label' => 'Add audio file url ( mp3)',
	'type'  => 'audio',
	'value' => '',
	'desc'  => 'Add your custom audio file url that will be played as alert, file should be MP3 and it should be hosted on your own server',
	'wdfsnfw-add-audio-file',
	),
	);

	/**
	 * General Settings Data
	 *
	 * @param string $wdfsnfw_general_settings getting general settings.
	 *
	 * @return void
	 */
	public function wdfsnfwGeneralSettingsData( $wdfsnfw_general_settings ) {
		$wdfsnfw_enable_sales_notification   = 0;
		$wdfsnfw_dismiss_notification_option = 0;
		$wdfsnfw_how_long_to_keep_the_popup  = 0;
		is_array($wdfsnfw_general_settings) && ! empty($wdfsnfw_general_settings['wdfsnfw_enable_sales_notification']) && 'false' != $wdfsnfw_general_settings['wdfsnfw_enable_sales_notification'] ? $wdfsnfw_enable_sales_notification       = 1 : $wdfsnfw_enable_sales_notification = 0;
		is_array($wdfsnfw_general_settings) && ! empty($wdfsnfw_general_settings['wdfsnfw_dismiss_notification_option']) && 'false' != $wdfsnfw_general_settings['wdfsnfw_dismiss_notification_option'] ? $wdfsnfw_dismiss_notification_option = 1 : $wdfsnfw_dismiss_notification_option = 0;
		return array(
		'wdfsnfw_enable_sales_notification'   => $wdfsnfw_enable_sales_notification,
		'wdfsnfw_dismiss_notification_option' => $wdfsnfw_dismiss_notification_option,
		'wdfsnfw_how_long_to_keep_the_popup'  => $wdfsnfw_how_long_to_keep_the_popup,
		);
	}

	/**
	 * Contructor of class
	 *
	 * @param string $plugin_name The name of this plugin.
	 *
	 * @return void
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name              = $plugin_name;
		$this->wdfsnfw_general_settings = get_option('wdfsnfw_general_settings');
		$this->settings                 = array(
		array(
		'field'   => 'wdfsnfw_enable_sales_notification',
		'class'   => 'wdfsnfw_admin_general_settings',
		'label'   => esc_html__('Enable sales notification', 'wdfsnfw-enable-sales-notification'),
		'type'    => 'switch',
		'default' => $this->wdfsnfwGeneralSettingsData($this->wdfsnfw_general_settings)['wdfsnfw_enable_sales_notification'],
		'desc'    => __('Enable sales notification or disable it', 'wdfsnfw-enable-sales-notification'),
		),
		array(
		'field'   => 'wdfsnfw_dismiss_notification_option',
		'class'   => 'wdfsnfw_admin_general_settings',
		'label'   => __(
			'Dismiss notification option',
			'wdfsnfw-dismiss-notification-option'
		),
		'type'    => 'switch',
		'default' => $this->wdfsnfwGeneralSettingsData($this->wdfsnfw_general_settings)['wdfsnfw_dismiss_notification_option'],
		'desc'    => __('Once user dismiss the notification, user will not see any live sales notification on your site ( if enabled show close button)', 'wdfsnfw-dismiss-notification-option'),
		),
		array(
		'field'   => 'wdfsnfw_timing_for_popup',
		'class'   => 'wdfsnfw_admin_general_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'timing_for_popup',
		'heading' => 'Timing For Popup',
		'data'    => $this->timing_for_popup,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_audio_alert',
		'class'   => 'wdfsnfw_admin_general_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'audio_alert',
		'heading' => 'Audio alert',
		'data'    => $this->audio_alert,
		'default' => '',
		'desc'    => '',
		),
		);

		if (! empty($this->wdfsnfw_general_settings['wdfsnfw_how_long_to_keep_the_popup']) ) {
			$this->settings[2]['data'][0]['default'] = $this->wdfsnfw_general_settings['wdfsnfw_how_long_to_keep_the_popup'];
		} else {
			$this->settings[2]['data'][0]['default'] = 3;
		}
		if (! empty($this->wdfsnfw_general_settings['wdfsnfw_time_gap_bt_two_popup']) ) {
			$this->settings[2]['data'][1]['default'] = $this->wdfsnfw_general_settings['wdfsnfw_time_gap_bt_two_popup'];
		} else {
			$this->settings[2]['data'][1]['default'] = 5;
		}
		( is_array($this->wdfsnfw_general_settings) && ! empty($this->wdfsnfw_general_settings['wdfsnfw_enable_audio_alert']) && 'true' == $this->wdfsnfw_general_settings['wdfsnfw_enable_audio_alert'] ) ? $this->settings[3]['data'][0]['default'] = 1 : $this->settings[3]['data'][0]['default'] = 0;
		if (isset($this->wdfsnfw_general_settings['wdfsnfw_accordion_img_btn_url']) && ! empty($this->wdfsnfw_general_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_add_audio_file']) ) {
			$this->settings[3]['data'][1]['value'] = $this->wdfsnfw_general_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_add_audio_file'];
		} else {
			$this->settings[3]['data'][1]['value'] = plugin_dir_url(__DIR__) . 'audio/pop_tone.mp3';
		}
		add_action($this->plugin_name . '_tab', array( $this, 'tab' ), 5);
		$this->registerSettings();
		if (WOODEVZ_FAKE_SALES_NOTIFICATION_DELETE_SETTING ) {
			$this->deleteSettings();
		}
	}

	/**
	 * Delete Settings is used to delete the setting feild
	 *
	 * @return void
	 */
	public function deleteSettings() {
		foreach ( $this->settings as $setting ) {
			delete_option($setting['field']);
		}
	}

	/**
	 * Register Settings is used to register each setting feild
	 *
	 * @return void
	 */
	public function registerSettings() {
		foreach ( $this->settings as $setting ) {
			register_setting($this->setting_key, $setting['field']);
		}
	}

	/**
	 * It is showing the side menu
	 *
	 * @return void
	 */
	public function tab() {
		wp_verify_nonce(wp_create_nonce(isset($_GET) ? $_GET : ''));
		$get = $_GET;
		$get_page = isset($get['page']) && ! empty($get['page']) ? $get['page'] : '';
		?>
		<a class='  wdfsnfw-side-menu  <?php echo ( $this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary' ); ?>' href='<?php echo esc_url(admin_url('admin.php?page=' . sanitize_text_field($get_page) . '&tab=' . $this->this_tab)); ?>'>
			<span class='dashicons dashicons-dashboard'></span> <?php esc_html($this->tab_name); ?>
		</a>
		<?php
	}

	/**
	 * It is showing the tab content
	 *
	 * @return void
	 */
	public function tabContent() {
		ob_start();
		?>
			<form method='POST' class='wdfsnfw-general-setting-form' enctype= multipart/form-data>
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
				<button type='button' id='general_settings_btn' class='btn btn-round btn-primary wdfsnfw-admin-form-btn' option-key='<?php echo esc_attr($this->setting_key); ?>' data-class='wdfsnfw_admin_general_settings'>
					Save
					&nbsp;
					<em class='icon ni ni-arrow-right'></em>
				</button>
					<div style='display:none;' class='loading'>
						&#8230;
					</div>
			</form>
		<?php
		$general_settings = ob_get_contents();
		ob_clean();
		return $general_settings;
	}
}
?>
