<?php

/**
 * This file is used to show the display settings
 * Php version 8.2
 *
 * @package Wdfsnfw
 * @link    https://woodevz.com/
 */

/**
 * This file is used to show the display settings
 * Php version 8.2
 *
 * @package Wdfsnfw
 * @link    https://woodevz.com/
 */

class Wdfsnfw_Admin_Display_Settings {

	public $plugin_name;
	public $settings = array();
	public $active_tab;
	public $this_tab                 = 'display';
	public $tab_name                 = 'Display Settings';
	public $setting_key              = 'wdfsnfw_display_settings';
	public $popup                    = array(
	array(
	'field'   => 'wdfsnfw_popup_position',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Popup position',
	'type'    => 'select',
	'default' => 'left_bottom',
	'desc'    => 'Set popup position on the page',
	'value'   => array(
				'select'       => '--Select--',
				'left_bottom'  => 'Left Bottom',
				'right_bottom' => 'Right Bottom',
				'left_top'     => 'Left Top',
				'right_top'    => 'Right Top',
	),
	),
	array(
	'field'   => 'wdfsnfw_popup_width',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Popup Width',
	'type'    => 'select',
	'default' => 'small',
	'desc'    => '',
	'value'   => array(
				'select' => '--Select--',
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large',
	),
	),
	array(
	'field'   => 'wdfsnfw_popup_img_width',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Popup Image Width',
	'type'    => 'select',
	'default' => 'small',
	'desc'    => '',
	'value'   => array(
				'select' => '--Select--',
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large',
	),
	),
	);
	public $background               = array(
	array(
	'field'   => 'wdfsnfw_background_color',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Backgroung Color',
	'type'    => 'color',
	'default' => '',
	'value'   => '',
	'desc'    => 'Backgroung color of the popup',
	),
	array(
	'field' => 'wdfsnfw_background_image',
	'class' => 'wdfsnfw_admin_display_settings wdfsnfw_custom_uploader_btn',
	'label' => 'Backgroung Image',
	'type'  => 'image',
	'value' => '',
	'desc'  => 'This image will be used inside the popup',
	),
	);
	public $layout                   = array(
	array(
	'field'   => 'wdfsnfw_border_radius',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Border radius',
	'type'    => 'number',
	'default' => 0,
	'desc'    => '',
	),
	array(
	'field'   => 'wdfsnfw_border_color',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Border Color',
	'type'    => 'color',
	'default' => '',
	'value'   => '',
	'desc'    => '',
	),
	array(
	'field'   => 'wdfsnfw_border_width',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Border Width',
	'type'    => 'select',
	'default' => 'small',
	'desc'    => '',
	'value'   => array(
				'select' => '--Select--',
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large',
	),
	),
	array(
	'field'   => 'wdfsnfw_border_radius_of_img',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Border radius of Image',
	'type'    => 'number',
	'default' => '2',
	'desc'    => '',
	),
	array(
	'field'   => 'wdfsnfw_inner_padding',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Inner Padding',
	'type'    => 'number',
	'default' => '',
	'desc'    => '',
	),
	);
	public $animation                = array(
	array(
	'field'   => 'wdfsnfw_popup_opening_animation',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Popup opening animation',
	'type'    => 'select',
	'default' => '',
	'desc'    => 'This animation is used when sales notification message opens',
	'value'   => array(),
	),
	array(
	'field'   => 'wdfsnfw_popup_closing_animation',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Popup closing animation',
	'type'    => 'select',
	'default' => '',
	'desc'    => 'This animation is used when sales notification message closes',
	'value'   => array(),
	),
	);
	public $close_option             = array(
	array(
	'field'   => 'wdfsnfw_show_close_btn',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Show close button',
	'type'    => 'switch',
	'default' => 0,
	'desc'    => '',
	),
	);
	public $image                    = array(
	array(
	'field'   => 'wdfsnfw_img_style',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Image Style',
	'type'    => 'select',
	'default' => 'square',
	'desc'    => '',
	'value'   => array(
				'select' => '--Select--',
				'square' => 'Square',
				'circle' => 'Circle',
	),
	),
	array(
	'field'   => 'wdfsnfw_img_position',
	'class'   => 'wdfsnfw_admin_display_settings',
	'label'   => 'Image Position',
	'type'    => 'select',
	'default' => 'img_on_left',
	'desc'    => '',
	'value'   => array(
				'select'       => '--Select--',
				'img_on_left'  => 'Image on Left',
				'img_on_right' => 'Image on Rigth',
				'txt_only'     => 'Text Only',
	),
	),
	);
	public $wdfsnfw_display_settings = array();

	/**
	 * Constructor of this class
	 *
	 * @param string $plugin_name It takes the name of the plugin
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;

		$this->wdfsnfw_display_settings = get_option('wdfsnfw_display_settings');

		$this->settings = array(
		array(
		'field'   => 'wdfsnfw_popup',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'popup',
		'heading' => 'Popup',
		'data'    => $this->popup,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_background',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'background',
		'heading' => 'Background',
		'data'    => $this->background,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_layout',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'layout',
		'heading' => 'Layout',
		'data'    => $this->layout,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_animation',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'animation',
		'heading' => 'Animation',
		'data'    => $this->animation,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_close_option',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'close_option',
		'heading' => 'Close Option',
		'data'    => $this->close_option,
		'default' => '',
		'desc'    => '',
		),
		array(
		'field'   => 'wdfsnfw_image',
		'class'   => 'wdfsnfw_admin_display_settings',
		'label'   => '',
		'type'    => 'accordion',
		'id'      => 'image',
		'heading' => 'Image',
		'data'    => $this->image,
		'default' => '',
		'desc'    => '',
		),
		);

		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_popup_position']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_popup_position'] ) {
				case 'left_bottom':
					$this->settings[0]['data'][0]['value'] = array(
					'left_bottom'  => 'Left Bottom',
					'select'       => '--Select--',
					'right_bottom' => 'Right Bottom',
					'left_top'     => 'Left Top',
					'right_top'    => 'Right Top',
					);
					break;
				case 'right_bottom':
					$this->settings[0]['data'][0]['value'] = array(
					'right_bottom' => 'Right Bottom',
					'select'       => '--Select--',
					'left_bottom'  => 'Left Bottom',
					'left_top'     => 'Left Top',
					'right_top'    => 'Right Top',
					);
					break;
				case 'left_top':
					$this->settings[0]['data'][0]['value'] = array(
					'left_top'     => 'Left Top',
					'select'       => '--Select--',
					'left_bottom'  => 'Left Bottom',
					'right_bottom' => 'Right Bottom',
					'right_top'    => 'Right Top',
					);
					break;
				case 'right_top':
					$this->settings[0]['data'][0]['value'] = array(
					'right_top'    => 'Right Top',
					'select'       => '--Select--',
					'left_bottom'  => 'Left Bottom',
					'right_bottom' => 'Right Bottom',
					'left_top'     => 'Left Top',
					);
					break;

				default:
					$this->settings[0]['data'][0]['value'] = array(
					'select'       => '--Select--',
					'left_bottom'  => 'Left Bottom',
					'right_bottom' => 'Right Bottom',
					'left_top'     => 'Left Top',
					'right_top'    => 'Right Top',
					);
					break;
			}
		} else {
			$this->settings[0]['data'][0]['value'] = array(
			'select'       => '--Select--',
			'left_bottom'  => 'Left Bottom',
			'right_bottom' => 'Right Bottom',
			'left_top'     => 'Left Top',
			'right_top'    => 'Right Top',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_popup_width']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_popup_width'] ) {
				case 'small':
					$this->settings[0]['data'][1]['value'] = array(
					'small'  => 'Small',
					'select' => '--Select--',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
				case 'medium':
					$this->settings[0]['data'][1]['value'] = array(
					'medium' => 'Medium',
					'select' => '--Select--',
					'small'  => 'Small',
					'large'  => 'Large',
					);
					break;
				case 'large':
					$this->settings[0]['data'][1]['value'] = array(
					'large'  => 'Large',
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					);
					break;

				default:
					$this->settings[0]['data'][1]['value'] = array(
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
			}
		} else {
			$this->settings[0]['data'][1]['value'] = array(
			'select' => '--Select--',
			'small'  => 'Small',
			'medium' => 'Medium',
			'large'  => 'Large',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_popup_img_width']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_popup_img_width'] ) {
				case 'small':
					$this->settings[0]['data'][2]['value'] = array(
					'small'  => 'Small',
					'select' => '--Select--',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
				case 'medium':
					$this->settings[0]['data'][2]['value'] = array(
					'medium' => 'Medium',
					'select' => '--Select--',
					'small'  => 'Small',
					'large'  => 'Large',
					);
					break;
				case 'large':
					$this->settings[0]['data'][2]['value'] = array(
					'large'  => 'Large',
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					);
					break;

				default:
					$this->settings[0]['data'][2]['value'] = array(
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
			}
		} else {
			$this->settings[0]['data'][2]['value'] = array(
			'select' => '--Select--',
			'small'  => 'Small',
			'medium' => 'Medium',
			'large'  => 'Large',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_background_color']) ) {
			$this->settings[1]['data'][0]['value'] = $this->wdfsnfw_display_settings['wdfsnfw_background_color'];
		} else {
			$this->settings[1]['data'][0]['value'] = '#5c92ff';
		}
		if (isset($this->wdfsnfw_display_settings['wdfsnfw_accordion_img_btn_url']) && ! empty($this->wdfsnfw_display_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_background_image']) ) {
			$this->settings[1]['data'][1]['value'] = $this->wdfsnfw_display_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_background_image'];
		} else {
			$this->settings[1]['data'][1]['value'] = plugin_dir_url(__DIR__) . 'img/default-upload-image.jpg';
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_border_radius']) ) {
			$this->settings[2]['data'][0]['default'] = $this->wdfsnfw_display_settings['wdfsnfw_border_radius'];
		} else {
			$this->settings[2]['data'][0]['default'] = 0;
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_border_color']) ) {
			$this->settings[2]['data'][1]['value'] = $this->wdfsnfw_display_settings['wdfsnfw_border_color'];
		} else {
			$this->settings[2]['data'][1]['value'] = '#ffffff';
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_border_width']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_border_width'] ) {
				case 'small':
					$this->settings[2]['data'][2]['value'] = array(
					'small'  => 'Small',
					'select' => '--Select--',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
				case 'medium':
					$this->settings[2]['data'][2]['value'] = array(
					'medium' => 'Medium',
					'select' => '--Select--',
					'small'  => 'Small',
					'large'  => 'Large',
					);
					break;
				case 'large':
					$this->settings[2]['data'][2]['value'] = array(
					'large'  => 'Large',
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					);
					break;

				default:
					$this->settings[2]['data'][2]['value'] = array(
					'select' => '--Select--',
					'small'  => 'Small',
					'medium' => 'Medium',
					'large'  => 'Large',
					);
					break;
			}
		} else {
			$this->settings[2]['data'][2]['value'] = array(
			'select' => '--Select--',
			'small'  => 'Small',
			'medium' => 'Medium',
			'large'  => 'Large',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_border_radius_of_img']) ) {
			$this->settings[2]['data'][3]['default'] = $this->wdfsnfw_display_settings['wdfsnfw_border_radius_of_img'];
		} else {
			$this->settings[2]['data'][3]['default'] = 0;
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_inner_padding']) ) {
			$this->settings[2]['data'][4]['default'] = $this->wdfsnfw_display_settings['wdfsnfw_inner_padding'];
		} else {
			$this->settings[2]['data'][4]['default'] = 0;
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_popup_opening_animation']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_popup_opening_animation'] ) {
				case 'scale_in':
					$this->settings[3]['data'][0]['value'] = array(
					'scale_in'   => 'Scale IN',
					'select'     => '--Select--',
					'rotate_in'  => 'Rotate In',
					'swirl_in'   => 'Swirl In',
					'flip_in'    => 'Flip In',
					'slit_in'    => 'Slit In',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;
				case 'rotate_in':
					$this->settings[3]['data'][0]['value'] = array(
					'rotate_in'  => 'Rotate In',
					'select'     => '--Select--',
					'scale_in'   => 'Scale IN',
					'swirl_in'   => 'Swirl In',
					'flip_in'    => 'Flip In',
					'slit_in'    => 'Slit In',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;
				case 'swirl_in':
					$this->settings[3]['data'][0]['value'] = array(
					'swirl_in'   => 'Swirl In',
					'select'     => '--Select--',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'flip_in'    => 'Flip In',
					'slit_in'    => 'Slit In',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'flip_in':
					$this->settings[3]['data'][0]['value'] = array(
					'flip_in'    => 'Flip In',
					'select'     => '--Select--',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'slit_in'    => 'Slit In',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'slit_in':
					$this->settings[3]['data'][0]['value'] = array(
					'slit_in'    => 'Slit In',
					'select'     => '--Select--',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'slide_in':
					$this->settings[3]['data'][0]['value'] = array(
					'slide_in'   => 'Slide In',
					'select'     => '--Select--',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'bounce_in':
					$this->settings[3]['data'][0]['value'] = array(
					'bounce_in'  => 'Bounce In',
					'select'     => '--Select--',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'roll_in':
					$this->settings[3]['data'][0]['value'] = array(
					'roll_in'    => 'Roll In',
					'select'     => '--Select--',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'tilt_in':
					$this->settings[3]['data'][0]['value'] = array(
					'tilt_in'    => 'Tilt In',
					'select'     => '--Select--',
					'roll_in'    => 'Roll In',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'swing_in':
					$this->settings[3]['data'][0]['value'] = array(
					'swing_in'   => 'Swing In',
					'select'     => '--Select--',
					'tilt_in'    => 'Tilt In',
					'roll_in'    => 'Roll In',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'fade_in':
					$this->settings[3]['data'][0]['value'] = array(
					'fade_in'    => 'Fade In',
					'select'     => '--Select--',
					'swing_in'   => 'Swing In',
					'tilt_in'    => 'Tilt In',
					'roll_in'    => 'Roll In',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'puff_in':
					$this->settings[3]['data'][0]['value'] = array(
					'puff_in'    => 'Puff In',
					'select'     => '--Select--',
					'fade_in'    => 'Fade In',
					'swing_in'   => 'Swing In',
					'tilt_in'    => 'Tilt In',
					'roll_in'    => 'Roll In',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'flicker_in' => 'Flicker In',
					);
					break;

				case 'flicker_in':
					$this->settings[3]['data'][0]['value'] = array(
					'flicker_in' => 'Flicker In',
					'select'     => '--Select--',
					'puff_in'    => 'Puff In',
					'fade_in'    => 'Fade In',
					'swing_in'   => 'Swing In',
					'tilt_in'    => 'Tilt In',
					'roll_in'    => 'Roll In',
					'bounce_in'  => 'Bounce In',
					'slide_in'   => 'Slide In',
					'slit_in'    => 'Slit In',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					);
					break;

				default:
					$this->settings[3]['data'][0]['value'] = array(
					'select'     => '--Select--',
					'flip_in'    => 'Flip In',
					'swirl_in'   => 'Swirl In',
					'rotate_in'  => 'Rotate In',
					'scale_in'   => 'Scale IN',
					'slit_in'    => 'Slit In',
					'slide_in'   => 'Slide In',
					'bounce_in'  => 'Bounce In',
					'roll_in'    => 'Roll In',
					'tilt_in'    => 'Tilt In',
					'swing_in'   => 'Swing In',
					'fade_in'    => 'Fade In',
					'puff_in'    => 'Puff In',
					'flicker_in' => 'Flicker In',
					);
					break;
			}
		} else {
			$this->settings[3]['data'][0]['value'] = array(
			'select'     => '--Select--',
			'scale_in'   => 'Scale In',
			'rotate_in'  => 'Rotate In',
			'swirl_in'   => 'Swirl In',
			'flip_in'    => 'Flip In',
			'slit_in'    => 'Slit In',
			'slide_in'   => 'Slide In',
			'bounce_in'  => 'Bounce In',
			'roll_in'    => 'Roll In',
			'tilt_in'    => 'Tilt In',
			'swing_in'   => 'Swing In',
			'fade_in'    => 'Fade In',
			'puff_in'    => 'Puff In',
			'flicker_in' => 'Flicker In',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_popup_closing_animation']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_popup_closing_animation'] ) {
				case 'scale_out':
					$this->settings[3]['data'][1]['value'] = array(
					'scale_out'   => 'Scale Out',
					'select'      => '--Select--',
					'rotate_out'  => 'Rotate Out',
					'swirl_out'   => 'Swirl Out',
					'flip_out'    => 'Flip Out',
					'slit_out'    => 'Slit Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;
				case 'rotate_out':
					$this->settings[3]['data'][1]['value'] = array(
					'rotate_out'  => 'Rotate Out',
					'select'      => '--Select--',
					'scale_out'   => 'Scale Out',
					'swirl_out'   => 'Swirl Out',
					'flip_out'    => 'Flip Out',
					'slit_out'    => 'Slit Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;
				case 'swirl_out':
					$this->settings[3]['data'][1]['value'] = array(
					'swirl_out'   => 'Swirl Out',
					'select'      => '--Select--',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'flip_out'    => 'Flip Out',
					'slit_out'    => 'Slit Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'flip_out':
					$this->settings[3]['data'][1]['value'] = array(
					'flip_out'    => 'Flip Out',
					'select'      => '--Select--',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'slit_out'    => 'Slit Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'slit_out':
					$this->settings[3]['data'][1]['value'] = array(
					'slit_out'    => 'Slit Out',
					'select'      => '--Select--',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'slide_out':
					$this->settings[3]['data'][1]['value'] = array(
					'slide_out'   => 'Slide Out',
					'select'      => '--Select--',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'bounce_out':
					$this->settings[3]['data'][1]['value'] = array(
					'bounce_out'  => 'Bounce Out',
					'select'      => '--Select--',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'roll_out':
					$this->settings[3]['data'][1]['value'] = array(
					'roll_out'    => 'Roll Out',
					'select'      => '--Select--',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'tilt_out':
					$this->settings[3]['data'][1]['value'] = array(
					'tilt_out'    => 'Tilt Out',
					'select'      => '--Select--',
					'roll_out'    => 'Roll Out',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'swing_out':
					$this->settings[3]['data'][1]['value'] = array(
					'swing_out'   => 'Swing Out',
					'select'      => '--Select--',
					'tilt_out'    => 'Tilt Out',
					'roll_out'    => 'Roll Out',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'fade_out':
					$this->settings[3]['data'][1]['value'] = array(
					'fade_out'    => 'Fade Out',
					'select'      => '--Select--',
					'swing_out'   => 'Swing Out',
					'tilt_out'    => 'Tilt Out',
					'roll_out'    => 'Roll Out',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'puff_out':
					$this->settings[3]['data'][1]['value'] = array(
					'puff_out'    => 'Puff Out',
					'select'      => '--Select--',
					'fade_out'    => 'Fade Out',
					'swing_out'   => 'Swing Out',
					'tilt_out'    => 'Tilt Out',
					'roll_out'    => 'Roll Out',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'flicker_out' => 'Flicker Out',
					);
					break;

				case 'flicker_out':
					$this->settings[3]['data'][1]['value'] = array(
					'flicker_out' => 'Flicker Out',
					'select'      => '--Select--',
					'puff_out'    => 'Puff Out',
					'fade_out'    => 'Fade Out',
					'swing_out'   => 'Swing Out',
					'tilt_out'    => 'Tilt Out',
					'roll_out'    => 'Roll Out',
					'bounce_out'  => 'Bounce Out',
					'slide_out'   => 'Slide Out',
					'slit_out'    => 'Slit Out',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					);
					break;

				default:
					$this->settings[3]['data'][1]['value'] = array(
					'select'      => '--Select--',
					'flip_out'    => 'Flip Out',
					'swirl_out'   => 'Swirl Out',
					'rotate_out'  => 'Rotate Out',
					'scale_out'   => 'Scale Out',
					'slit_out'    => 'Slit Out',
					'slide_out'   => 'Slide Out',
					'bounce_out'  => 'Bounce Out',
					'roll_out'    => 'Roll Out',
					'tilt_out'    => 'Tilt Out',
					'swing_out'   => 'Swing Out',
					'fade_out'    => 'Fade Out',
					'puff_out'    => 'Puff Out',
					'flicker_out' => 'Flicker Out',
					);
					break;
			}
		} else {
			$this->settings[3]['data'][1]['value'] = array(
			'select'      => '--Select--',
			'flip_out'    => 'Flip Out',
			'swirl_out'   => 'Swirl Out',
			'rotate_out'  => 'Rotate Out',
			'scale_out'   => 'Scale Out',
			'slit_out'    => 'Slit Out',
			'slide_out'   => 'Slide Out',
			'bounce_out'  => 'Bounce Out',
			'roll_out'    => 'Roll Out',
			'tilt_out'    => 'Tilt Out',
			'swing_out'   => 'Swing Out',
			'fade_out'    => 'Fade Out',
			'puff_out'    => 'Puff Out',
			'flicker_out' => 'Flicker Out',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_show_close_btn']) && 'true' == $this->wdfsnfw_display_settings['wdfsnfw_show_close_btn'] ) {
			$this->settings[4]['data'][0]['default'] = 1;
		} else {
			$this->settings[4]['data'][0]['default'] = 0;
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_img_style']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_img_style'] ) {
				case 'square':
					$this->settings[5]['data'][0]['value'] = array(
					'square' => 'Square',
					'select' => '--Select--',
					'circle' => 'Circle',
					);
					break;
				case 'circle':
					$this->settings[5]['data'][0]['value'] = array(
					'circle' => 'Circle',
					'select' => '--Select--',
					'square' => 'Square',
					);
					break;
				default:
					$this->settings[5]['data'][0]['value'] = array(
					'select' => '--Select--',
					'square' => 'Square',
					'circle' => 'Circle',
					);
					break;
			}
		} else {
			$this->settings[5]['data'][0]['value'] = array(
			'select' => '--Select--',
			'square' => 'Square',
			'circle' => 'Circle',
			);
		}
		if (! empty($this->wdfsnfw_display_settings['wdfsnfw_img_position']) ) {
			switch ( $this->wdfsnfw_display_settings['wdfsnfw_img_position'] ) {
				case 'img_on_left':
					$this->settings[5]['data'][1]['value'] = array(
					'img_on_left'  => 'Image on Left',
					'select'       => '--Select--',
					'img_on_right' => 'Image on Right',
					'txt_only'     => 'Text Only',
					);
					break;
				case 'img_on_right':
					$this->settings[5]['data'][1]['value'] = array(
					'img_on_right' => 'Image on Right',
					'select'       => '--Select--',
					'img_on_left'  => 'Image on Left',
					'txt_only'     => 'Text Only',
					);
					break;
				case 'txt_only':
					$this->settings[5]['data'][1]['value'] = array(
					'txt_only'     => 'Text Only',
					'select'       => '--Select--',
					'img_on_left'  => 'Image on Left',
					'img_on_right' => 'Image on Right',
					);
					break;

				default:
					$this->settings[5]['data'][1]['value'] = array(
					'select'       => '--Select--',
					'img_on_left'  => 'Image on Left',
					'img_on_right' => 'Image on Right',
					'txt_only'     => 'Text Only',
					);
					break;
			}
		} else {
			$this->settings[5]['data'][1]['value'] = array(
			'select'       => '--Select--',
			'img_on_left'  => 'Image on Left',
			'img_on_right' => 'Image on Right',
			'txt_only'     => 'Text Only',
			);
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
	 * This function is used to register the setting feild
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
			<span class='dashicons dashicons-dashboard'></span><?php esc_html($this->tab_name); ?>
		</a>
		<?php
	}

	/**
	 * This function contains tab content
	 *
	 * @return void
	 */
	public function tabContent() {
		ob_start();
		?>
		<form method='POST' class='wdfsnfw-display-setting-form' enctype=multipart/form-data>
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
			<button type='button' id='display_settings_btn' class='btn btn-round btn-primary wdfsnfw-admin-form-btn' option-key='<?php echo esc_attr($this->setting_key); ?>' data-class='wdfsnfw_admin_display_settings'>
				Save
				&nbsp;
				<em class='icon ni ni-arrow-right'></em>
			</button>
			<div style='display:none;' class='loading'>
				&#8230;
			</div>
		</form>
		<?php
		$display_settings = ob_get_contents();
		ob_clean();
		return $display_settings;
	}
}
?>
