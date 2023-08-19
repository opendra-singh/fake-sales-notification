<?php

/**
 * Fired during plugin deactivation
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
 * Fired during plugin deactivation
 * Php version 8.2
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version Release:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */
class Wdfsnfw_Deactivator {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function deactivate() {
		delete_option('wdfsnfw_general_settings');
		delete_option('wdfsnfw_display_settings');
		delete_option('wdfsnfw_product_settings');
		delete_option('wdfsnfw_page_settings');
		?>
		<script>
			localStorage.removeItem("wdfsnfw_popup_close_timeout");
		</script>
		<?php

	}
}
