<?php

/**
 * Define the internationalization functionality
 * Php version 8.2
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version CVS:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version Release:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */
class Wdfsnfw_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function wdfsnfwI18nloadPluginTextdomain() {

		load_plugin_textdomain(
			'wdfsnfw',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);

	}
}
