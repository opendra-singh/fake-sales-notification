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

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 * @link       https://woodevz.com/
 */
class Wdfsnfw_Admin {




	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $plugin_name    The ID of this plugin.
	 */
	private $_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $version    The current version of this plugin.
	 */
	private $_version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $_plugin_name The name of this plugin.
	 * @param string $_version     The version of this plugin.
	 */
	public function __construct( $_plugin_name, $_version ) {
		$this->_plugin_name = $_plugin_name;
		$this->_version     = $_version;
		
		global $wpdb;
		wp_cache_set('wpdb', $wpdb);

		include 'class-wdfsnfw-menu.php';

		new wdfsnfw_admin_menu($this->_plugin_name, $this->_version);

		// Redirecting to plugin page.
		add_action('admin_init', array( $this, 'pluginRedirect' ));
	}//end __construct()


	/**
	 * Plugin_redirect is used to redirect the user on plugin page.
	 *
	 * @return void
	 */
	public function pluginRedirect() {
		if (get_option('wdfsnfw_activate_plugin_redirect', false) ) {
			delete_option('wdfsnfw_activate_plugin_redirect');
			wp_verify_nonce(wp_create_nonce(isset($_GET['activate-multi']) ? sanitize_text_field($_GET['activate-multi']) : ''));
			if (! isset($_GET['activate-multi']) ) {
				if ( wp_redirect( 'admin.php?page=wdfsnfw' ) ) {
					exit;
				}
			}
		}
	}//end pluginRedirect()


	/**
	 * Wdfsnfw_admin_form_submit_ajax is used to save the data to option to database.
	 *
	 * @return void
	 */
	public function wdfsnfwAdminFormSubmitAjax() {
		wp_verify_nonce(wp_create_nonce(isset($_POST) ? $_POST : ''));
		$post = $_POST;
		wp_verify_nonce(wp_create_nonce(isset($post['key']) ? $post['key'] : ''));
		wp_verify_nonce(wp_create_nonce(isset($post['data']) ? $post['data'] : ''));
		$key  = isset($post['key']) ? $post['key'] : '';
		$data = isset($post['data']) ? $post['data'] : '';
		update_option($key, $data);
		echo 'Setting Saved Successfully.';
		exit;
	}//end wdfsnfwAdminFormSubmitAjax()


	/**
	 * Wdfsnfw_Accordion_search_specific_product is used to get specific product from keyword.
	 *
	 * @return void
	 */
	public function accordionSearchSpecificProduct() {
		global $wpdb;
		wp_verify_nonce(wp_create_nonce(isset($_POST) ? $_POST : ''));
		$post = $_POST;
		wp_verify_nonce(wp_create_nonce(isset($post['key']) ? $post['key'] : ''));
		wp_verify_nonce(wp_create_nonce(isset($post['keyword']) ? $post['keyword'] : ''));
		$key       = isset($post['key']) ? $post['key'] : '';
		$keyword   = isset($post['keyword']) ? $post['keyword'] : '';
		$post_type = '';
		switch ( $key ) {
			case 'wdfsnfw_search_pages':
				$post_type = 'page';
				break;
			case 'wdfsnfw_search_products':
				$post_type = 'product';
				break;
		}
		$wild = '%';
		$like = $wild . $wpdb->esc_like( $keyword ) . $wild;
		$result = wp_cache_get('wpdb')->get_results($wpdb->prepare('SELECT post_title, ID FROM `wp_posts` WHERE `post_type` = %s AND `post_title` LIKE %s', $post_type, $like));
		$names  = array();
		if (is_array($result) && ! empty($result) ) {
			foreach ( $result as $key => $value ) {
				$names[] = array(
				'Name' => $value->post_title,
				'ID'   => $value->ID,
				);
			}
		}

		echo wp_json_encode($names);
		exit;
	}//end accordionSearchSpecificProduct()


	/**
	 * Wdfsnfw_Search_specific_product is used to get specific product from keyword.
	 *
	 * @return void
	 */
	public function searchSpecificProduct() {
		global $wpdb;
		$post_type     = '';
		wp_verify_nonce(wp_create_nonce(isset($_POST) ? $_POST : ''));
		$post = $_POST;
		wp_verify_nonce(wp_create_nonce(isset($post['key']) ? $post['key'] : ''));
		wp_verify_nonce(wp_create_nonce(isset($post['keyword']) ? $post['keyword'] : ''));
		$key     = isset($post['key']) && ! empty($post['key']) ? $post['key'] : '';
		$keyword = isset($post['keyword']) && ! empty($post['keyword']) ? $post['keyword'] : '';
		switch ( $key ) {
			case 'wdfsnfw_admin_show_selected_product':
				$post_type = 'product';
				break;
		}
		$wild = '%';
		$like = $wild . $wpdb->esc_like( $keyword ) . $wild;
		$result = wp_cache_get('wpdb')->get_results($wpdb->prepare('SELECT post_title, ID FROM `wp_posts` WHERE `post_type` = %s AND `post_title` LIKE %s', $post_type, $like));
		$names  = array();
		if (is_array($result) && ! empty($result) ) {
			foreach ( $result as $key => $value ) {
				$names[] = array(
				'Name' => $value->post_title,
				'ID'   => $value->ID,
				);
			}
		}

		echo wp_json_encode($names);
		exit;
	}//end searchSpecificProduct()


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @param string $page_id It is used to get the id of the current page
	 *
	 * @return void
	 */
	public function enqueueStyles( $page_id ) {
		/*
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run() function
		* defined in Wdfsnfw_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Wdfsnfw_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/

		if ('toplevel_page_wdfsnfw' == $page_id ) {
			wp_enqueue_style(
				'wdfsnfw_admin_dashlab_css',
				// "https://woodevz.com/assets/woodevz.css",
				plugin_dir_url(__FILE__) . 'css/dashlab.css',
				array(),
				$this->_version,
				'all'
			);
			wp_enqueue_style(
				'wdfsnfw_admin_css',
				plugin_dir_url(__FILE__) . 'css/wdfsnfw-admin.css',
				array(),
				$this->_version,
				'all'
			);
		}
	}//end enqueueStyles()


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @param string $page_id It is used to get the id of the current page.
	 *
	 * @return void
	 */
	public function enqueueScripts( $page_id ) {
		/*
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run() function
		* defined in Wdfsnfw_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Wdfsnfw_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/

		if ('toplevel_page_wdfsnfw' == $page_id ) {
			wp_enqueue_script(
				'wdfsnfw_admin_bundle_js',
				WOODEVZ_FAKE_SALES_NOTIFICATION_URL . 'assets/bundle.js',
				array( 'jquery' ),
				$this->_version,
				false
			);
			wp_enqueue_script(
				'wdfsnfw_admin_js',
				plugin_dir_url(__FILE__) . 'js/wdfsnfw-admin.js',
				array( 'jquery' ),
				$this->_version,
				false
			);
			wp_localize_script(
				'wdfsnfw_admin_js',
				'ajax_object',
				array(
				'ajax_url' => admin_url('admin-ajax.php'),
				)
			);
		} //end if

	}//end enqueueScripts()


}//end class
