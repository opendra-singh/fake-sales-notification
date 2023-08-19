<?php
/**
 * The public-facing functionality of the plugin.
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
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wdfsnfw
 * @subpackage Wdfsnfw/admin
 *
 * @version Release:  <1.0.0>
 * @link    https://woodevz.com/
 * @since   1.0.0
 */
class Wdfsnfw_Public {


	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $plugin_name    The ID of this plugin.
	 */
	public $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $version    The current version of this plugin.
	 */
	public $version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}//end __construct()


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueueStyles() {
		/*
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run( ) function
		* defined in Wdfsnfw_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Wdfsnfw_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wdfsnfw-public.css', array(), $this->version, 'all');
		wp_enqueue_style('wdfsnfw_public_dashlab_css', WOODEVZ_FAKE_SALES_NOTIFICATION_URL . 'assets/woodevz.css', array(), $this->version, 'all');

	}//end enqueueStyles()


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueueScripts() {
		/*
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run( ) function
		* defined in Wdfsnfw_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Wdfsnfw_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wdfsnfw-public.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script('wdfsnfw_public_bundle_js', WOODEVZ_FAKE_SALES_NOTIFICATION_URL . 'assets/bundle.js', array( 'jquery' ), $this->version, false);

	}//end enqueueScripts()


	/**
	 * This function is used to create all neccessary settings used in general settings.
	 *
	 * @param string $general_settings Getting array to filter settings.
	 *
	 * @since  1.0.0
	 * @return void general settings as per requirement
	 */
	public function generalSettings( $general_settings ) {
		if (true === $general_settings['wdfsnfw_dismiss_notification_option'] || 'true' === $general_settings['wdfsnfw_dismiss_notification_option'] ) {
			?>
			<script>
				let wdfsnfw_dismiss_notification_option = <?php echo esc_html($general_settings['wdfsnfw_dismiss_notification_option']); ?>
			</script>
			<?php
		}

		if (isset($general_settings['wdfsnfw_how_long_to_keep_the_popup']) && ! empty($general_settings['wdfsnfw_how_long_to_keep_the_popup']) ) {
			?>
			<script>
				let wdfsnfw_how_long_to_keep_the_popup = <?php echo esc_html($general_settings['wdfsnfw_how_long_to_keep_the_popup']); ?>
			</script>
			<?php
		}

		if (isset($general_settings['wdfsnfw_time_gap_bt_two_popup']) && ! empty($general_settings['wdfsnfw_time_gap_bt_two_popup']) ) {
			?>
			<script>
				let wdfsnfw_time_gap_bt_two_popup = <?php echo esc_html($general_settings['wdfsnfw_time_gap_bt_two_popup']); ?>
			</script>
			<?php
		}

		if ('true' == $general_settings['wdfsnfw_enable_audio_alert'] ) {
			if (isset($general_settings['wdfsnfw_accordion_img_btn_url']) && ! empty($general_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_add_audio_file']) ) {
				?>
				<input type='hidden' name='wdfsnfw_popup_audio_url' id='wdfsnfw_popup_audio_url' value='<?php echo esc_attr($general_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_add_audio_file']); ?>'>
				<?php
			} else {
				?>
				<input type='hidden' name='wdfsnfw_popup_audio_url' id='wdfsnfw_popup_audio_url' value='<?php echo esc_attr(plugin_dir_url(__DIR__) . 'audio/pop_tone.mp3'); ?>'>
				<?php
			}
		}

	}//end generalSettings()


	/**
	 * This function is used to create all neccessary settings used in display settings.
	 *
	 * @param string $display_settings Getting array to filter settings.
	 *
	 * @since  1.0.0
	 * @return void display settings as per requirement
	 */
	public function displaySettings( $display_settings ) {
		if (isset($display_settings['wdfsnfw_popup_position']) && ! empty($display_settings['wdfsnfw_popup_position']) ) {
			if ('right_bottom' === $display_settings['wdfsnfw_popup_position'] ) {
				?>
				<style>
					.toast {
						right: 0 !important;
						bottom: 0 !important;
					}
				</style>
				<?php
			} elseif ('right_top' == $display_settings['wdfsnfw_popup_position'] ) {
				?>
				<style>
					.toast {
						right: 0 !important;
						top: 0 !important;
					}
				</style>
				<?php
			} elseif ('left_bottom' == $display_settings['wdfsnfw_popup_position'] ) {
				?>
				<style>
					.toast {
						left: 0 !important;
						bottom: 0 !important;
					}
				</style>
				<?php
			} elseif ('left_top' == $display_settings['wdfsnfw_popup_position'] ) {
				?>
				<style>
					.toast {
						left: 0 !important;
						top: 0 !important;
					}
				</style>
				<?php
			} else {
				?>
					<style>
						.toast {
							left: 0 !important;
							bottom: 0 !important;
						}
					</style>
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_popup_width']) && ! empty($display_settings['wdfsnfw_popup_width']) ) {
			if ('small' == $display_settings['wdfsnfw_popup_width'] ) {
				?>
				<style>
					.toast {
						width: 300px !important;
					}

					.toast {
						font-size: 10px !important;
					}
				</style>
				<?php
			} elseif ('medium' == $display_settings['wdfsnfw_popup_width'] ) {
				?>
				<style>
					.toast {
						width: 400px !important;
					}

					.toast {
						font-size: 15px !important;
					}
				</style>
				<?php
			} elseif ('large' == $display_settings['wdfsnfw_popup_width'] ) {
				?>
				<style>
					.toast {
						width: 500px !important;
					}

					.toast {
						font-size: 20px !important;
					}
				</style>
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_popup_img_width']) && ! empty($display_settings['wdfsnfw_popup_img_width']) ) {
			if ('small' == $display_settings['wdfsnfw_popup_img_width'] ) {
				?>
				<style>
					#wdfsnfw_popup_img {
						height: 80px !important;
						width: 50px !important;
					}
				</style>
				<?php
			} elseif ('medium' == $display_settings['wdfsnfw_popup_img_width'] ) {
				?>
				<style>
					#wdfsnfw_popup_img {
						height: 130px !important;
						width: 150px !important;
					}
				</style>
				<?php
			} elseif ('large' == $display_settings['wdfsnfw_popup_img_width'] ) {
				?>
				<style>
					#wdfsnfw_popup_img {
						height: 180px !important;
						width: 250px !important;
					}
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_background_color']) && ! empty($display_settings['wdfsnfw_background_color']) ) {
			?>
			<style>.toast {
					background-color: <?php echo esc_html($display_settings['wdfsnfw_background_color']); ?> !important;
				}
			</style>
			<?php
		}

		if (isset($display_settings['wdfsnfw_border_radius']) && ! empty($display_settings['wdfsnfw_border_radius']) ) {
			?>
			<style>
				.toast {
					border-radius: <?php echo esc_html($display_settings['wdfsnfw_border_radius']); ?>px !important;
				}
			</style>
			<?php
		}

		if (isset($display_settings['wdfsnfw_border_color']) && ! empty($display_settings['wdfsnfw_border_color']) ) {
			?>
			<style>
				.toast {
					border-color: <?php echo esc_html($display_settings['wdfsnfw_border_color']); ?> !important;
				}
			</style>
			<?php
		}

		if (isset($display_settings['wdfsnfw_border_width']) && ! empty($display_settings['wdfsnfw_border_width']) ) {
			if ('small' == $display_settings['wdfsnfw_border_width'] ) {
				?>
				<style>
					.toast {
						border-width: 2px !important;
					}
				</style>
				<?php
			} elseif ('medium' == $display_settings['wdfsnfw_border_width'] ) {
				?>
				<style>
					.toast {
						border-width: 3px !important;
					}
				</style>
				<?php
			} elseif ('large' == $display_settings['wdfsnfw_border_width'] ) {
				?>
				<style>
					.toast {
						border-width: 5px !important;
					}
				</style>
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_border_radius_of_img']) && ! empty($display_settings['wdfsnfw_border_radius_of_img']) ) {
			?>
			<style>
				#wdfsnfw_popup_img {
					border-radius: <?php echo esc_html($display_settings['wdfsnfw_border_radius_of_img']); ?>px !important;
				}
			</style>
			<?php
		}

		if (isset($display_settings['wdfsnfw_inner_padding']) && ! empty($display_settings['wdfsnfw_inner_padding']) ) {
			?>
			<style>
				.toast {
					padding: <?php echo esc_html($display_settings['wdfsnfw_inner_padding']); ?>px !important;
				}
			</style>
			<?php
		}

		if (isset($display_settings['wdfsnfw_popup_opening_animation']) && ! empty($display_settings['wdfsnfw_popup_opening_animation']) ) {
			if ('scale_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
						animation: scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
					}
				</style>
				<?php
			} elseif ('rotate_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: rotate-in-center 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
						animation: rotate-in-center 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
					}
				</style>
				<?php
			} elseif ('swirl_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: swirl-in-fwd 0.6s ease-out both;
						animation: swirl-in-fwd 0.6s ease-out both;
					}
				</style>
				<?php
			} elseif ('flip_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: flip-in-hor-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
						animation: flip-in-hor-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
					}
				</style>
				<?php
			} elseif ('slit_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: slit-in-vertical 0.45s ease-out both;
						animation: slit-in-vertical 0.45s ease-out both;
					}
				</style>
				<?php
			} elseif ('slide_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
						animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
					}
				</style>
				<?php
			} elseif ('bounce_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: bounce-in-top 1.1s both;
						animation: bounce-in-top 1.1s both;
					}
				</style>
				<?php
			} elseif ('roll_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: roll-in-left 0.6s ease-out both;
						animation: roll-in-left 0.6s ease-out both;
					}
				</style>
				<?php
			} elseif ('tilt_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: tilt-in-top-1 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
						animation: tilt-in-top-1 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940 ) both;
					}
				</style>
				<?php
			} elseif ('swing_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: swing-in-top-fwd 0.5s cubic-bezier(0.175, 0.885, 0.320, 1.275 ) both;
						animation: swing-in-top-fwd 0.5s cubic-bezier(0.175, 0.885, 0.320, 1.275 ) both;
					}
				</style>
				<?php
			} elseif ('fade_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000 ) both;
						animation: fade-in 1.2s cubic-bezier(0.390, 0.575, 0.565, 1.000 ) both;
					}
				</style>
				<?php
			} elseif ('puff_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: puff-in-center 0.7s cubic-bezier(0.470, 0.000, 0.745, 0.715 ) both;
						animation: puff-in-center 0.7s cubic-bezier(0.470, 0.000, 0.745, 0.715 ) both;
					}
				</style>
				<?php
			} elseif ('flicker_in' == $display_settings['wdfsnfw_popup_opening_animation'] ) {
				?>
				<style>
					.toast {
						-webkit-animation: flicker-in-1 2s linear both;
						animation: flicker-in-1 2s linear both;
					}
				</style>
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_popup_closing_animation']) && ! empty($display_settings['wdfsnfw_popup_closing_animation']) ) {
			if ('scale_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let scale_out = true;
				</script>
				<?php
			} elseif ('rotate_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let rotate_out = true;
				</script>
				<?php
			} elseif ('swirl_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let swirl_out = true;
				</script>
				<?php
			} elseif ('flip_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let flip_out = true;
				</script>
				<?php
			} elseif ('slit_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let slit_out = true;
				</script>
				<?php
			} elseif ('slide_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let slide_out = true;
				</script>
				<?php
			} elseif ('bounce_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let bounce_out = true;
				</script>
				<?php
			} elseif ('roll_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let roll_out = true;
				</script>
				<?php
			} elseif ('swing_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let swing_out = true;
				</script>
				<?php
			} elseif ('fade_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let fade_out = true;
				</script>
				<?php
			} elseif ('puff_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let puff_out = true;
				</script>
				<?php
			} elseif ('flicker_out' == $display_settings['wdfsnfw_popup_closing_animation'] ) {
				?>
				<script>
					let flicker_out = true;
				</script>
				<?php
			}//end if
		}//end if

		if (isset($display_settings['wdfsnfw_show_close_btn']) && ! empty($display_settings['wdfsnfw_show_close_btn']) && 'true' == $display_settings['wdfsnfw_show_close_btn'] ) {
			?>
			<script>
				let show_close_button = <?php echo esc_html($display_settings['wdfsnfw_show_close_btn']); ?>;
			</script>
			<?php
		}

		if (isset($display_settings['wdfsnfw_img_style']) && ! empty($display_settings['wdfsnfw_img_style']) ) {
			if ('square' == $display_settings['wdfsnfw_img_style'] ) {
				?>
				<style>
					#wdfsnfw_popup_img {
						border-radius: 0px !important;
					}
				</style>
				<?php
			} elseif ('circle' == $display_settings['wdfsnfw_img_style'] ) {
				?>
				<style>
					#wdfsnfw_popup_img {
						border-radius: 100% !important;
						width: 100% !important;
					}
				</style>
				<?php
			}
		}

		if (isset($display_settings['wdfsnfw_img_position']) && ! empty($display_settings['wdfsnfw_img_position']) ) {
			if ('img_on_left' == $display_settings['wdfsnfw_img_position'] ) {
				?>
				<script>
					let wdfsnfw_img_position = '<?php echo esc_html($display_settings['wdfsnfw_img_position']); ?>';
				</script>
				<?php
			} elseif ('img_on_right' == $display_settings['wdfsnfw_img_position'] ) {
				?>
				<script>
					let wdfsnfw_img_position = '<?php echo esc_html($display_settings['wdfsnfw_img_position']); ?>';
				</script>
				<?php
			} elseif ('txt_only' == $display_settings['wdfsnfw_img_position'] ) {
				?>
				<script>
					let wdfsnfw_img_position = '<?php echo esc_html($display_settings['wdfsnfw_img_position']); ?>';
				</script>
				<?php
			}
		}//end if

		if (isset($display_settings['wdfsnfw_accordion_img_btn_url']) && ! empty($display_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_background_image']) ) {
			?>
			<style>
				.toast {
					background: url(<?php echo esc_html($display_settings['wdfsnfw_accordion_img_btn_url']['wdfsnfw_background_image']); ?> ) no-repeat right center;
				}
			</style>
			<?php
		}

	}//end displaySettings()


	/**
	 * This function is used to create all neccessary settings used in product settings.
	 *
	 * @param string $product_settings Getting array to filter settings.
	 * @param string $single_product   Getting array to filter settings.
	 *
	 * @since  1.0.0
	 * @return string product settings as per requirement
	 */
	public function productSettings( $product_settings, $single_product ) {
		$heading  = '';
		$products = array();
		$timing   = array(
		'mins ago',
		'secs ago',
		);
		if (isset($product_settings['wdfsnfw_open_product_link_in_new_tab']) && ! empty($product_settings['wdfsnfw_open_product_link_in_new_tab']) && ( 'true' == $product_settings['wdfsnfw_open_product_link_in_new_tab'] || $product_settings['wdfsnfw_open_product_link_in_new_tab'] ) ) {
			?>
			<script>
				let wdfsnfw_open_product_link_in_new_tab = true;
			</script>
			<?php
		}

		if (isset($product_settings['wdfsnfw_sales_message_heading']) && ! empty($product_settings['wdfsnfw_sales_message_heading']) ) {
			$heading = $product_settings['wdfsnfw_sales_message_heading'];
		}

		if (isset($product_settings['wdfsnfw_admin_show_selected_product_multiselect']) && ! empty($product_settings['wdfsnfw_admin_show_selected_product_multiselect']) && count(is_array($product_settings['wdfsnfw_admin_show_selected_product_multiselect']) ? $product_settings['wdfsnfw_admin_show_selected_product_multiselect'] : array()) > 0 ) {
			if (is_array($product_settings) ) {
				foreach ( $product_settings['wdfsnfw_admin_show_selected_product_multiselect'] as $key => $value ) {
					if (is_array($single_product) ) {
						foreach ( $single_product as $k => $v ) {
							if ($value == $v->id ) {
								$products[] = array(
								'ID'          => $v->id,
								'Name'        => $v->name,
								'Date'        => $v->date_created->date('Y/m/d'),
								'Time'        => $v->date_created->date('h:i:sa'),
								'Price'       => $v->price,
								'Category_ID' => $v->category_ids[0],
								'Img'         => wp_get_attachment_image_src($v->image_id)[0],
								'Link'        => get_permalink($v->id),
								);
							}
						}
					}
				}
			}
		} else {
			if (is_array($single_product) ) {
				foreach ( $single_product as $k => $v ) {
					$products[] = array(
					 'ID'          => $v->id,
					 'Name'        => $v->name,
					 'Date'        => $v->date_created->date('Y/m/d'),
					 'Time'        => $v->date_created->date('h:i:sa'),
					 'Price'       => $v->price,
					 'Category_ID' => $v->category_ids[0],
					 'Img'         => wp_get_attachment_image_src($v->image_id)[0],
					 'Link'        => get_permalink($v->id),
					);
				}
			}
		}//end if

		return array(
		'heading'  => $heading,
		'products' => $products,
		'timing'   => $timing,
		);

	}//end productSettings()


	/**
	 * This function is used to create all neccessary settings used in page settings.
	 *
	 * @param string $page_settings Getting array to filter settings.
	 *
	 * @since  1.0.0
	 * @return string page settings as per requirement
	 */
	public function pageSettings( $page_settings ) {
		$current_page_id = get_the_ID();
		if (is_array($page_settings) ) {
			foreach ( $page_settings as $key => $value ) {
				if ('true' == $value || $value ) {
					if ($current_page_id == $key ) {
						echo '
                        <script>
                            let wdfsnfw_disable_current_page = true;
                        </script>
                        ';
					}
				}
			}
		}

		if (isset($page_settings['wdfsnfw_text_transform']) && ! empty($page_settings['wdfsnfw_text_transform']) ) {
			if ('uppercase' == $page_settings['wdfsnfw_text_transform'] ) {
				?>
				<style>
					.toast p {
						text-transform: uppercase;
					}
				</style>
				<?php
			} elseif ('lowercase' == $page_settings['wdfsnfw_text_transform'] ) {
				?>
				<style>
					.toast p {
						text-transform: lowercase;
					}
				</style>
				<?php
			} elseif ('capitalize' == $page_settings['wdfsnfw_text_transform'] ) {
				?>
				<style>
					.toast p {
						text-transform: capitalize;
					}
				</style>
				<?php
			}//end if
		}//end if

		if (isset($page_settings['wdfsnfw_font_size']) && ! empty($page_settings['wdfsnfw_font_size']) ) {
			?>
			<style>
				#wdfsnfw_popup_desc {
					font-size: <?php echo esc_html($page_settings['wdfsnfw_font_size']); ?>px;
				}
			</style>
			<?php
		}

		if (isset($page_settings['wdfsnfw_text_color']) && ! empty($page_settings['wdfsnfw_text_color']) ) {
			?>
			<style>
				#wdfsnfw_popup_desc {
					color: <?php echo esc_html($page_settings['wdfsnfw_text_color']); ?>;
				}
			</style>
			<?php
		}

		if (isset($page_settings['wdfsnfw_page_ids']) && ! empty($page_settings['wdfsnfw_page_ids']) ) {
			$page_ids = explode(',', $page_settings['wdfsnfw_page_ids']);
			foreach ( $page_ids as $key => $value ) {
				if ($current_page_id == $value ) {
					?>
					<style>
						.toast {
							display: block;
						}
					</style>
					 <?php
				}
			}
		}

		if (isset($page_settings['wdfsnfw_sales_message_format']) && ! empty($page_settings['wdfsnfw_sales_message_format']) ) {
			$sales_message_format = $page_settings['wdfsnfw_sales_message_format'];
		} else {
			$sales_message_format = 'A {product} has been purchased by {user} at {price}.';
		}

		return $sales_message_format;

	}//end pageSettings()


	/**
	 * This function is used to get all the settings from the database.
	 *
	 * @since  1.0.0
	 * @return string loaded data as per requirement
	 */
	public function loadData() {
		$general_settings = get_option('wdfsnfw_general_settings');
		$display_settings = get_option('wdfsnfw_display_settings');
		$product_settings = get_option('wdfsnfw_product_settings');
		$page_settings    = get_option('wdfsnfw_page_settings');

		$get_products = array( 'post_type' => 'product' );

		$products_post = get_posts($get_products);

		$product_ids = array();

		foreach ( $products_post as $key => $value ) {
			array_push($product_ids, $value->ID);
		}

		$single_product = array();
		foreach ( $product_ids as $key => $value ) {
			array_push($single_product, wc_get_product($value));
		}

		return array(
		'product_settings' => $product_settings,
		'general_settings' => $general_settings,
		'display_settings' => $display_settings,
		'page_settings'    => $page_settings,
		'single_product'   => $single_product,
		'user_names'       => array(
		'Dr. Noemie Jast',
		'Theo Walsh',
		'Miss Dena Hessel',
		'Lexie Kassulke Jr.',
		'Ms. Marielle Kiehn',
		'Lavinia Olson',
		'Mrs. Carole Zulauf',
		'Mr. Lee Rohan Jr.',
		'Jewell Hudson',
		'Dr. Kelton Pfeffer',
		'Kip Schmitt',
		'Bud Smith',
		'Prof. Orrin Kihn DDS',
		'Zack Thiel MD',
		'Elisa Monahan',
		'Felicia Murazik',
		'Miss Dena Hessel',
		'Nash Borer',
		'Prof. Patsy Cole IV',
		'Dawson Lindgren MD',
		'Mr. Ryann Anderson',
		'Yoshiko Konopelski',
		),
		'country_names'    => array(
		'Albania'                      => 'Lek',
		'Afghanistan'                  => '؋',
		'Argentina'                    => '$',
		'Aruba'                        => 'ƒ',
		'Australia'                    => '$',
		'Azerbaijan'                   => '₼',
		'Bahamas'                      => '$',
		'Barbados'                     => '$',
		'Belarus'                      => 'Br',
		'Belize'                       => 'BZ$',
		'Bermuda'                      => '$',
		'Bolivia'                      => '$b',
		'Botswana'                     => 'P',
		'Bulgaria'                     => 'лв',
		'Brazil'                       => 'R$',
		'Brunei Darussalam'            => '$',
		'Cambodia'                     => '៛',
		'Canada'                       => '$',
		'Cayman Islands'               => '$',
		'Chile'                        => '$',
		'China Yuan'                   => '¥',
		'Colombia'                     => '$',
		'Costa Rica'                   => '₡',
		'Croatia'                      => 'kn',
		'Cuba'                         => '₱',
		'Czech Republic'               => 'Kč',
		'Denmark'                      => 'kr',
		'Dominican Republic'           => 'RD$',
		'East Caribbean'               => '$',
		'Egypt'                        => '£',
		'El Salvador'                  => '$',
		'Euro Member'                  => '€',
		'Falkland Islands (Malvinas )' => '£',
		'Fiji'                         => '$',
		'Ghana'                        => '¢',
		'Gibraltar'                    => '£',
		'Guatemala'                    => 'Q',
		'Guernsey'                     => '£',
		'Guyana'                       => '$',
		'Honduras'                     => 'L',
		'Hong Kong'                    => '$',
		'Hungary'                      => 'Ft',
		'Iceland'                      => 'kr',
		'India'                        => '₹',
		'Indonesia'                    => 'Rp',
		'Iran'                         => '﷼',
		'Isle of Man'                  => '£',
		'Israel'                       => '₪',
		'Jamaica'                      => 'J$',
		'Japan'                        => '¥',
		'Jersey'                       => '£',
		'Kazakhstan'                   => 'лв',
		'North Korea'                  => '₩',
		'South Korea'                  => '₩',
		'Kyrgyzstan'                   => 'лв',
		'Laos'                         => '₭',
		'Lebanon'                      => '£',
		'Liberia'                      => '$',
		'Macedonia'                    => 'ден',
		'Malaysia'                     => 'RM',
		'Mauritius'                    => '₨',
		'Mexico'                       => '$',
		'Mongolia'                     => '₮',
		'Moroccan'                     => 'د.إ',
		'Mozambique'                   => 'MT',
		'Namibia'                      => '$',
		'Nepal'                        => '₨',
		'Netherlands Antilles'         => 'ƒ',
		'New Zealand'                  => '$',
		'Nicaragua'                    => 'C$',
		'Nigeria'                      => '₦',
		'Norway'                       => 'kr',
		'Oman'                         => '﷼',
		'Pakistan'                     => '₨',
		'Panama'                       => 'B/.',
		'Paraguay'                     => 'Gs',
		'Peru'                         => 'S/.',
		'Philippines'                  => '₱',
		'Poland'                       => 'zł',
		'Qatar'                        => '﷼',
		'Romania'                      => 'lei',
		'Russia'                       => '₽',
		'Saint Helena'                 => '£',
		'Saudi Arabia'                 => '﷼',
		'Serbia'                       => 'Дин.',
		'Seychelles'                   => '₨',
		'Singapore'                    => '$',
		'Solomon Islands'              => '$',
		'Somalia'                      => 'S',
		'South Korean'                 => '₩',
		'South Africa'                 => 'R',
		'Sri Lanka'                    => '₨',
		'Sweden'                       => 'kr',
		'Switzerland'                  => 'CHF',
		'Suriname'                     => '$',
		'Syria'                        => '£',
		'Taiwan New'                   => 'NT$',
		'Thailand'                     => '฿',
		'Trinidad and Tobago'          => 'TT$',
		'Turkey'                       => '₺',
		'Tuvalu'                       => '$',
		'Ukraine'                      => '₴',
		'UAE'                          => 'د.إ',
		'United Kingdom'               => '£',
		'United States'                => '$',
		'Uruguay'                      => '$U',
		'Uzbekistan'                   => 'лв',
		'Venezuela'                    => 'Bs',
		'Viet Nam'                     => '₫',
		'Yemen'                        => '﷼',
		'Zimbabwe'                     => 'Z$',
		),
		);

	}//end loadData()


	/**
	 * This function is used for debugging.
	 *
	 * @param string $data data to debug.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	private function debug( $data ) {
		echo '<pre>';
		die;

	}//end debug()


	/**
	 * Main function to show the popup.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function wdfsnfwFrontened() {
		$get_data = $this->loadData();

		if (isset($get_data['general_settings']) && ! empty($get_data['general_settings']) && 'true' == $get_data['general_settings']['wdfsnfw_enable_sales_notification'] ) {
			?>
			<script>
				let wdfsnfw_enable_sales_notification = true;
			</script>
			<?php
			$this->generalSettings($get_data['general_settings']);
			if (isset($get_data['product_settings']) && ! empty($get_data['product_settings']) ) {
				$header = $this->productSettings($get_data['product_settings'], $get_data['single_product']);
			}

			if (isset($get_data['display_settings']) && ! empty($get_data['display_settings']) ) {
				$this->displaySettings($get_data['display_settings']);
			} else {
				?>
				<style>
				.toast {
					left: 0 ;
					bottom: 0 ;
					}
				</style>
				<?php
			}

			if (isset($get_data['page_settings']) && ! empty($get_data['page_settings']) ) {
				$body = $this->pageSettings($get_data['page_settings']);
			}

			if (! isset($header) ) {
				$timing   = array(
				'mins ago',
				'secs ago',
				);
				$products = array();
				if (is_array($get_data) ) {
					foreach ( $get_data['single_product'] as $k => $v ) {
						$products[] = array(
						'ID'          => $v->id,
						'Name'        => $v->name,
						'Date'        => $v->date_created->date('Y/m/d'),
						'Time'        => $v->date_created->date('h:i:sa'),
						'Price'       => $v->price,
						'Category_ID' => $v->category_ids[0],
						'Img'         => wp_get_attachment_image_src($v->image_id)[0],
						'Link'        => get_permalink($v->id),
						);
					}
				}

				$header = array(
				'heading'  => get_bloginfo(),
				'products' => $products,
				'timing'   => $timing,
				);
			}//end if

			if (! isset($body) ) {
				$body = 'A {product} has been purchased by {user} at {price} from {country}.';
			}

			$popup = array(
			'header'        => $header,
			'body'          => $body,
			'user'          => $get_data['user_names'],
			'country_names' => array_keys($get_data['country_names']),
			);
			?>
				<script>
					let popup = <?php echo wp_json_encode($popup); ?>;
					const country_with_currency = <?php echo wp_json_encode($get_data['country_names']); ?>
				</script>

				<div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
					<div class='toast-header'>
						<strong id='wdfsnfw_popup_heading' class='me-auto text-primary'></strong>
						<small id='wdfsnfw_popup_time'></small>
						<img id='wdfsnfw_popup_close_img' src='' alt='#' hidden>
						<button id='wdfsnfw_popup_close' type='button' class='close' data-dismiss='toast' aria-label='Close' hidden>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>
					<div class='toast-body'>
						<div class='row'>
							<div class='col-12 col-md-4 popup_img'>
								<a id='wdfsnfw_popup_img_anchor' href='#'>
									<img id='wdfsnfw_popup_img' src='' alt='#'>
								</a>
							</div>
							<div class='col-12 col-md-8 popup_desc'>
								<a id='wdfsnfw_popup_desc_anchor' href='#'>
									<p id='wdfsnfw_popup_desc'></p>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php
		}//end if

	}//end wdfsnfwFrontened()

}//end class

