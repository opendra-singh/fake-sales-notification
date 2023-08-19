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

class Wdfsnfw_Admin_Page_Settings {

	public $plugin_name;
	public $settings = array();
	public $active_tab;
	public $this_tab     = 'page';
	public $tab_name     = 'Page Settings';
	public $setting_key  = 'wdfsnfw_page_settings';
	public $message_text = array(
	array(
	'field'   => 'wdfsnfw_text_transform',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Text Tranform',
	'type'    => 'select',
	'default' => 'uppercase',
	'desc'    => '',
	'value'   => array(
				'uppercase'  => 'UPPERCASE',
				'lowercase'  => 'lowercase',
				'capitalize' => 'Capitalize',
	),
	),
	array(
	'field'   => 'wdfsnfw_font_size',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Font Size ( pixels)',
	'type'    => 'number',
	'default' => '',
	'desc'    => '',
	),
	array(
	'field'   => 'wdfsnfw_text_color',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Text Color',
	'type'    => 'color',
	'default' => '',
	'desc'    => '',
	),
	array(
	'field' => 'wdfsnfw_sales_message_format',
	'class' => 'wdfsnfw_admin_page_settings',
	'label' => 'Sales Message Format',
	'type'  => 'textarea',
	'value' => '',
	'desc'  => 'Set the format of the description shown on the sales popup using the shortcodes.',
	),
	array(
	'field'   => 'wdfsnfw_date_format',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Date Format {date}',
	'type'    => 'select',
	'default' => '',
	'desc'    => '',
	'value'   => array(
				'Y/m/d' => '',
				'd/m/Y' => '',
				'm/d/y' => '',
				'Y-m-d' => '',
				'd-m-Y' => '',
				'm-d-y' => '',
	),
	),
	array(
	'field'   => 'wdfsnfw_time_format',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Time Format {time}',
	'type'    => 'select',
	'default' => '',
	'desc'    => '',
	'value'   => array(
				'H:i'   => '',
				'H:i a' => '',
				'H:i A' => '',
	),
	),
	);
	public $pages;
	public $products;

	/**
	 * This function is used to show the specified excluded pages
	 *
	 * @param string $pages Getting all pages.
	 *
	 * @return void
	 */
	public function excludeSpecificPages( $pages ) {
		if (is_array($pages) ) {
			$page = array();
			foreach ( $pages as $key => $value ) {
				$page[ $pages[ $key ]->ID ] = $pages[ $key ]->post_title;
			};
		}
		return $page;
	}

	/**
	 * This function is used to show the specified excluded pages
	 *
	 * @param string $products Getting all pages.
	 *
	 * @return void
	 */
	public function excludeSpecificProducts( $products ) {
		$product = array();
		if (is_array($products) ) {
			foreach ( $products as $key => $value ) {
				$product[ $products[ $key ]->ID ] = $products[ $key ]->post_title;
			};
		}
		return $product;
	}

	public $include_pages = array(
	array(
	'field'   => 'wdfsnfw_page_ids',
	'class'   => 'wdfsnfw_admin_page_settings',
	'label'   => 'Page ID',
	'type'    => 'text',
	'default' => '',
	'desc'    => 'Add page ids Seperated with comma.',
	),
	);

	public $wdfsnfw_page_settings = array();

	/**
	 * Constructor of class
	 *
	 * @param string $plugin_name Getting all pages.
	 *
	 * @return void
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name                       = $plugin_name;
		$this->wdfsnfw_page_settings             = get_option('wdfsnfw_page_settings');
		$this->message_text[4]['value']['Y/M/d'] = gmdate('Y/M/d');
		$this->message_text[4]['value']['Y/m/d'] = gmdate('Y/m/d');
		$this->message_text[4]['value']['d/m/Y'] = gmdate('d/m/Y');
		$this->message_text[4]['value']['m/d/y'] = gmdate('m/d/y');
		$this->message_text[4]['value']['Y-m-d'] = gmdate('Y-m-d');
		$this->message_text[4]['value']['d-m-Y'] = gmdate('d-m-Y');
		$this->message_text[4]['value']['m-d-y'] = gmdate('m-d-y');
		$this->message_text[5]['value']['H:i']   = gmdate('H:i');
		$this->message_text[5]['value']['H:i a'] = gmdate('H:i a');
		$this->message_text[5]['value']['H:i A'] = gmdate('H:i A');
		$this->pages                             = get_pages();
		$get_products                            = array(
		'post_type' => 'product',
		);
		$this->products                          = get_posts($get_products);
		$this->settings                          = array(
		array(
		'field'   => 'wdfsnfw_message_text',
		'class'   => 'wdfsnfw_admin_page_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'message_text',
		'heading' => 'Message Text',
		'data'    => $this->message_text,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_exclude_specific_pages',
		'class'   => 'wdfsnfw_admin_page_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'exclude_specific_pages',
		'heading' => 'Exclude Specific Pages',
		'data'    => array(
					array(
						'field' => 'wdfsnfw_search_pages',
						'class' => 'wdfsnfw_admin_page_settings',
						'label' => 'Search Specific Page',
						'type'  => 'search',
						'value' => '',
						'desc'  => '',
		),
		),
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_exclude_specific_products',
		'class'   => 'wdfsnfw_admin_page_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'exclude_specific_products',
		'heading' => 'Exclude Specific Products',
		'data'    => array(
					array(
						'field' => 'wdfsnfw_search_products',
						'class' => 'wdfsnfw_admin_page_settings',
						'label' => 'Search Specific Product',
						'type'  => 'search',
						'value' => '',
						'desc'  => '',
		),
		),
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_include_pages',
		'class'   => 'wdfsnfw_admin_page_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'include_pages',
		'heading' => 'Include Pages',
		'data'    => $this->include_pages,
		'default' => '',
		'desc'    => '',
		),
		);

		if (isset($this->wdfsnfw_page_settings['wdfsnfw_text_transform']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_text_transform']) ) {
			switch ( $this->wdfsnfw_page_settings['wdfsnfw_text_transform'] ) {
				case 'lowercase':
					$this->settings[0]['data'][0]['value'] = array(
					'lowercase'  => 'lowercase',
					'select'     => '--Select--',
					'capitalize' => 'Capitalize',
					'uppercase'  => 'UPPERCASE',
					);
					break;
				case 'capitalize':
					$this->settings[0]['data'][0]['value'] = array(
					'capitalize' => 'Capitalize',
					'select'     => '--Select--',
					'lowercase'  => 'lowercase',
					'uppercase'  => 'UPPERCASE',
					);
					break;
				case 'uppercase':
					$this->settings[0]['data'][0]['value'] = array(
					'uppercase'  => 'UPPERCASE',
					'select'     => '--Select--',
					'lowercase'  => 'lowercase',
					'capitalize' => 'Capitalize',
					);
					break;

				default:
					$this->settings[0]['data'][0]['value'] = array(
					'select'     => '--Select--',
					'lowercase'  => 'lowercase',
					'capitalize' => 'Capitalize',
					'uppercase'  => 'UPPERCASE',
					);
					break;
			}
		} else {
			$this->settings[0]['data'][0]['value'] = array(
			'select'     => '--Select--',
			'lowercase'  => 'lowercase',
			'capitalize' => 'Capitalize',
			'uppercase'  => 'UPPERCASE',
			);
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_font_size']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_font_size']) ) {
			$this->settings[0]['data'][1]['default'] = $this->wdfsnfw_page_settings['wdfsnfw_font_size'];
		} else {
			$this->settings[0]['data'][1]['default'] = '';
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_text_color']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_text_color']) ) {
			$this->settings[0]['data'][2]['value'] = $this->wdfsnfw_page_settings['wdfsnfw_text_color'];
		} else {
			$this->settings[0]['data'][2]['value'] = '';
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_sales_message_format']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_sales_message_format']) ) {
			$this->settings[0]['data'][3]['value'] = $this->wdfsnfw_page_settings['wdfsnfw_sales_message_format'];
		} else {
			$this->settings[0]['data'][3]['value'] = '';
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_date_format']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_date_format']) ) {
			switch ( $this->wdfsnfw_page_settings['wdfsnfw_date_format'] ) {
				case 'Y/m/d':
					$this->settings[0]['data'][4]['value'] = array(
					'Y/m/d'  => gmdate('Y/m/d'),
					'select' => '--Select--',
					'd/m/Y'  => gmdate('d/m/Y'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'm-d-y'  => gmdate('m-d-y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;
				case 'd/m/Y':
					$this->settings[0]['data'][4]['value'] = array(
					'd/m/Y'  => gmdate('d/m/Y'),
					'select' => '--Select--',
					'Y/m/d'  => gmdate('Y/m/d'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'm-d-y'  => gmdate('m-d-y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;

				case 'm/d/y':
					$this->settings[0]['data'][4]['value'] = array(
					'm/d/y'  => gmdate('m/d/y'),
					'select' => '--Select--',
					'Y/m/d'  => gmdate('Y/m/d'),
					'd/m/Y'  => gmdate('d/m/Y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'm-d-y'  => gmdate('m-d-y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;

				case 'Y-m-d':
					$this->settings[0]['data'][4]['value'] = array(
					'Y-m-d'  => gmdate('Y-m-d'),
					'select' => '--Select--',
					'm/d/y'  => gmdate('m/d/y'),
					'Y/m/d'  => gmdate('Y/m/d'),
					'd/m/Y'  => gmdate('d/m/Y'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'm-d-y'  => gmdate('m-d-y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;

				case 'd-m-Y':
					$this->settings[0]['data'][4]['value'] = array(
					'd-m-Y'  => gmdate('d-m-Y'),
					'select' => '--Select--',
					'd/m/Y'  => gmdate('d/m/Y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y/m/d'  => gmdate('Y/m/d'),
					'm-d-y'  => gmdate('m-d-y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;

				case 'm-d-y':
					$this->settings[0]['data'][4]['value'] = array(
					'm-d-y'  => gmdate('m-d-y'),
					'select' => '--Select--',
					'd/m/Y'  => gmdate('d/m/Y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y/m/d'  => gmdate('Y/m/d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;
				case 'Y/M/d':
					$this->settings[0]['data'][4]['value'] = array(
					'Y/M/d'  => gmdate('Y/M/d'),
					'select' => '--Select--',
					'm-d-y'  => gmdate('m-d-y'),
					'd/m/Y'  => gmdate('d/m/Y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y/m/d'  => gmdate('Y/m/d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'Y/M/d'  => gmdate('Y/M/d'),
					);
					break;

				default:
					$this->settings[0]['data'][4]['value'] = array(
					'select' => '--Select--',
					'Y/m/d'  => gmdate('Y/m/d'),
					'Y/M/d'  => gmdate('Y/M/d'),
					'd/m/Y'  => gmdate('d/m/Y'),
					'm/d/y'  => gmdate('m/d/y'),
					'Y-m-d'  => gmdate('Y-m-d'),
					'd-m-Y'  => gmdate('d-m-Y'),
					'm-d-y'  => gmdate('m-d-y'),
					);
					break;
			}
		} else {
			$this->settings[0]['data'][4]['value'] = array(
			'select' => '--Select--',
			'Y/m/d'  => gmdate('Y/m/d'),
			'd/m/Y'  => gmdate('d/m/Y'),
			'm/d/y'  => gmdate('m/d/y'),
			'Y-m-d'  => gmdate('Y-m-d'),
			'd-m-Y'  => gmdate('d-m-Y'),
			'm-d-y'  => gmdate('m-d-y'),
			);
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_time_format']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_time_format']) ) {
			switch ( $this->wdfsnfw_page_settings['wdfsnfw_time_format'] ) {
				case 'H:i':
					$this->settings[0]['data'][5]['value'] = array(
					'H:i'    => gmdate('H:i'),
					'select' => '--Select--',
					'H:i a'  => gmdate('H:i a'),
					'H:i A'  => gmdate('H:i A'),
					);
					break;
				case 'H:i a':
					$this->settings[0]['data'][5]['value'] = array(
					'H:i a'  => gmdate('H:i a'),
					'select' => '--Select--',
					'H:i'    => gmdate('H:i'),
					'H:i A'  => gmdate('H:i A'),
					);
					break;

				case 'H:i A':
					$this->settings[0]['data'][5]['value'] = array(
					'H:i A'  => gmdate('H:i A'),
					'select' => '--Select--',
					'H:i'    => gmdate('H:i'),
					'H:i a'  => gmdate('H:i a'),
					);
					break;

				default:
					$this->settings[0]['data'][5]['value'] = array(
					'select' => '--Select--',
					'H:i'    => gmdate('H:i'),
					'H:i a'  => gmdate('H:i a'),
					'H:i A'  => gmdate('H:i A'),
					);
					break;
			}
		} else {
			$this->settings[0]['data'][5]['value'] = array(
			'select' => '--Select--',
			'H:i'    => gmdate('H:i'),
			'H:i a'  => gmdate('H:i a'),
			'H:i A'  => gmdate('H:i A'),
			);
		}
		if (isset($this->wdfsnfw_page_settings['wdfsnfw_page_ids']) && ! empty($this->wdfsnfw_page_settings['wdfsnfw_page_ids']) ) {
			$this->settings[3]['data'][0]['default'] = $this->wdfsnfw_page_settings['wdfsnfw_page_ids'];
		} else {
			$this->settings[3]['data'][0]['default'] = '';
		}
		if (isset($this->wdfsnfw_page_settings) && ! empty($this->wdfsnfw_page_settings) && is_array($this->wdfsnfw_page_settings) ) {
			foreach ( $this->wdfsnfw_page_settings as $key => $value ) {
				if ('true' == $value ) {
					foreach ( $this->settings[1]['data'] as $k => $v ) {
						if ($key == $v['field'] ) {
							   $this->settings[1]['data'][ $k ]['default'] = 1;
						}
					}
					foreach ( $this->settings[2]['data'] as $k => $v ) {
						if ($key == $v['field'] ) {
							$this->settings[2]['data'][ $k ]['default'] = 1;
						}
					}
				}
			}
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
		$get_page = isset($get['page']) && ! empty($get['page']) ? $get['page'] : '';
		?>
		<a class='  wdfsnfw-side-menu  <?php echo ( $this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary' ); ?>' href='<?php echo esc_url(admin_url('admin.php?page=' . sanitize_text_field($get_page) . '&tab=' . $this->this_tab)); ?>'>
			<span class='dashicons dashicons-dashboard'></span> <?php echo esc_html($this->tab_name); ?>
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
			<form method='POST' class='wdfsnfw-page-setting-form' enctype= multipart/form-data>
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
				<button type='button' id='page_settings_btn' class='btn btn-round btn-primary wdfsnfw-admin-form-btn' option-key='<?php echo esc_attr($this->setting_key); ?>' data-class='wdfsnfw_admin_page_settings'>
					Save
					&nbsp;
					<em class='icon ni ni-arrow-right'></em>
				</button>
				<div style='display:none;' class='loading'>
					&#8230;
				</div>
			</form>
		<?php
		$page_settings = ob_get_contents();
		ob_clean();
		return $page_settings;
	}
}
?>
