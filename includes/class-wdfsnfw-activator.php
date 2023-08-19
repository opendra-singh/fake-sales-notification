<?php

/**
 * Fired during plugin activation
 * Php version 8.2
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version CVS:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version Release:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */
class Wdfsnfw_Activator {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function activate() {
		add_option('wdfsnfw_activate_plugin_redirect', true);
		update_option(
			'wdfsnfw_general_settings',
			array(
			'wdfsnfw_enable_sales_notification'   => 'true',
			'wdfsnfw_dismiss_notification_option' => 'false',
			'wdfsnfw_how_long_to_keep_the_popup'  => 10,
			'wdfsnfw_time_gap_bt_two_popup'       => 5,
			'wdfsnfw_enable_audio_alert'          => 'true',
			)
		);
		update_option(
			'wdfsnfw_display_settings',
			array(
			'wdfsnfw_popup_position'          => 'left_bottom',
			'wdfsnfw_popup_width'             => 'medium',
			'wdfsnfw_popup_img_width'         => 'small',
			'wdfsnfw_background_color'        => '#ffffff',
			'wdfsnfw_border_radius'           => 2,
			'wdfsnfw_border_color'            => '#ffffff',
			'wdfsnfw_border_width'            => 'medium',
			'wdfsnfw_border_radius_of_img'    => 2,
			'wdfsnfw_inner_padding'           => 5,
			'wdfsnfw_popup_opening_animation' => 'scale_in',
			'wdfsnfw_popup_closing_animation' => 'scale_out',
			'wdfsnfw_show_close_btn'          => 'true',
			'wdfsnfw_img_style'               => 'circle',
			'wdfsnfw_img_position'            => 'img_on_left',
			)
		);
		update_option(
			'wdfsnfw_product_settings',
			array(
			'wdfsnfw_open_product_link_in_new_tab' => 'true',
			'wdfsnfw_sales_message_heading'        => get_bloginfo(),
			)
		);
		update_option(
			'wdfsnfw_page_settings',
			array(
			'wdfsnfw_text_transform'       => 'capitalize',
			'wdfsnfw_font_size'            => 15,
			'wdfsnfw_text_color'           => '#000000',
			'wdfsnfw_sales_message_format' => 'A {product} has been purchased by {user} at {price} from {country}.',
			'wdfsnfw_date_format'          => 'select',
			'wdfsnfw_time_format'          => 'select',
			'wdfsnfw_page_ids'             => '',
			)
		);
	}

}
