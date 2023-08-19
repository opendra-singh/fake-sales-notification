(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$( document ).ready(
		function () {
			// Multiselect CDN
			$( document ).find( ".non-accordion-multiselect" ).select2()

			const popup_outer                   = document.getElementById( "popup_outer" )
			const message_text_outer            = document.getElementById( "message_text_outer" )
			const retrievedObject               = localStorage.getItem( "wdfsnfw_data_class" );
			const wdfsnfw_accordion_img_btn_url = {};
			const sales_message_format_variable = document.getElementsByClassName( "wdfsnfw-page-settings-sales-message-format-variable" )
			const non_accordion_multiselect     = document.getElementsByClassName( "non-accordion-multiselect" )

			$( document ).find( ".non-accordion-search" ).on(
				"keypress",
				function () {
					const element = this
					if (element.value.length >= 3) {
						const data = {
							action : 'searchSpecificProduct',
							keyword : element.value,
							key : element.getAttribute( "id" ),
						}
						element.setAttribute( "disabled", true )
						element.nextElementSibling.nextElementSibling.classList.remove( "d-none" )
						jQuery.post(
							ajax_object.ajax_url,
							data,
							function (response) {
								element.removeAttribute( "disabled" )
								if (response == "[]") {
									  const toastr      = '<div id="toast-container" class="toast-bottom-right is-dark"><div class="toastr toast-info" aria-live="polite" style=""><span class="btn-trigger toast-close-button" role="button">Close</span><div class="toast-message"><span class="toastr-icon"><em class="icon ni ni-info-fill"></em></span><div class="toastr-text">No result found.</div></div></div></div>';
									  const parser      = new DOMParser();
									  const htmlDoc     = parser.parseFromString( toastr, 'text/html' );
									  document.body.appendChild( htmlDoc.querySelector( "div" ) )
									setTimeout(
										() => {
                                        const toast = document.getElementById( "toast-container" )
											if (toast !== undefined) {
												toast.remove()
											}
											  },
										2000
									);
								} else {
									 const product_list = JSON.parse( response )
									for (let i = 0; i < product_list.length; i++) {
										const product_id   = product_list[i].ID;
										const product_name = product_list[i].Name;
										element.nextElementSibling.nextElementSibling.nextElementSibling.append( $( "<option></option>" ).attr( "value", product_id ).text( product_name )[0] );
									}
									element.classList.add( "d-none" )
									element.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove( "d-none" )
								}
								element.nextElementSibling.nextElementSibling.classList.add( "d-none" )
							}
						)
					}
				}
			)

			$( document ).find( ".toast-close-button" ).on(
				"click",
				function () {
					const element = this
					console.log( "ashu" );
					element.parentElement.parentElement.classList.add( "d-none" )
				}
			)

			$( document ).find( ".wdfsnfw-search-switch" ).on(
				"click",
				function () {
					const element      = this
					const search_box   = element.previousElementSibling
					const multi_select = element.nextElementSibling.nextElementSibling.nextElementSibling
					let disabled       = false
					for (let i = 0; i < search_box.classList.length; i++) {
						if (search_box.classList[i] == "d-none") {
							  disabled = true
						}
					}
					if (disabled) {
						search_box.classList.remove( "d-none" )
						multi_select.classList.add( "d-none" )
					} else {
						multi_select.classList.remove( "d-none" )
						search_box.classList.add( "d-none" )
					}
				}
			)

			$( document ).find( ".accordion-search" ).on(
				"keypress",
				function () {
					const element = this
					let id        = ''
					switch (element.getAttribute( "id" )) {
						case "wdfsnfw_search_pages":
							  id = 'exclude_specific_pages'
				 break;
						case "wdfsnfw_search_products":
							id = 'exclude_specific_products'
				 break;
					}
					element.nextElementSibling.classList.remove( "d-none" )
					if (element.value.length >= 3) {
						const data = {
							action : 'accordionSearchSpecificProduct',
							keyword : element.value,
							key : element.getAttribute( "id" ),
						}
						element.setAttribute( "disabled", true )
						jQuery.post(
							ajax_object.ajax_url,
							data,
							function (response) {
								element.removeAttribute( "disabled" )
								if (response == "[]") {
									const toastr        = '<div id="toast-container" class="toast-bottom-right is-dark"><div class="toastr toast-info" aria-live="polite" style=""><span class="btn-trigger toast-close-button" role="button">Close</span><div class="toast-message"><span class="toastr-icon"><em class="icon ni ni-info-fill"></em></span><div class="toastr-text">No result found.</div></div></div></div>';
									const parser        = new DOMParser();
									const htmlDoc       = parser.parseFromString( toastr, 'text/html' );
									document.body.appendChild( htmlDoc.querySelector( "div" ) )
									setTimeout(
										() => {
                                        const toast = document.getElementById( "toast-container" )
											if (toast !== undefined) {
												toast.remove()
											}
										},
										2000
									);
								} else {
									const product_list = JSON.parse( response )
									for (let i = 0; i < product_list.length; i++) {
										const product   = '<div class="accordion-body collapse show" id="' + id + '" data-bs-parent="#' + id + '_outer" style=""><div class="accordion-inner"><div class="row" id="row_' + product_list[i].Name.toLowerCase().replace( " ", "" ) + '"><div class="col-12 col-md-6"><label class="h6 mb-0" for="' + product_list[i].ID + '">' + product_list[i].Name + '</label><br><small></small></div><div class="col-12 col-md-6"><div class="custom-control custom-switch"><input class="wdfsnfw_admin_page_settings" type="checkbox" name="' + product_list[i].Name.toLowerCase().replace( " ", "" ) + '" id="' + product_list[i].ID + '"></div></div></div></div></div>'
										const parser    = new DOMParser();
										const htmlDoc   = parser.parseFromString( product, 'text/html' );
										const outer_div = element.parentElement.parentElement.parentElement.parentElement.parentElement
										for (let j = 2; j < outer_div.children.length; j++) {
											if (outer_div.children[j].firstElementChild.firstElementChild.firstElementChild.firstElementChild.getAttribute( "for" ) == product_list[i].ID) {
												outer_div.children[j].remove()
											}
										}
										outer_div.append( htmlDoc.querySelector( "div" ) )
									}
								}
								element.nextElementSibling.classList.add( "d-none" )
							}
						)
					}
				}
			)

			if (sales_message_format_variable !== undefined) {
				for (let i = 0; i < sales_message_format_variable.length; i++) {
					sales_message_format_variable[i].addEventListener(
						"click",
						function () {
							this.parentElement.nextElementSibling.firstElementChild.value += this.textContent.split( "=>" )[0]
						}
					)
				}
			}
			if (popup_outer !== undefined) {
				popup_outer.querySelector( "a" ).click()
			}
			if (message_text_outer !== undefined) {
				message_text_outer.querySelector( "a" ).click()
			}
			if (non_accordion_multiselect !== undefined) {
				for (let i = 0; i < non_accordion_multiselect.length; i++) {
					non_accordion_multiselect[i].nextElementSibling.classList.add( "d-none" )
				}
			}

			// Retrieve the object from storage
			if (retrievedObject != null) {
				$( document ).find( ".wdfsnfw-tab-pane" ).removeClass( "active" );
				$( document ).find( "#" + retrievedObject ).addClass( "active" );
				$( document ).find( ".wdfsnfw-nav-link" ).removeClass( "active" );
				$( document ).find( "#" + retrievedObject + "_nav_link" ).addClass( "active" );
			} else {
				$( document ).find( "#wdfsnfw_admin_general_settings" ).addClass( "active" );
				$( document ).find( "#wdfsnfw_admin_general_settings_nav_link" ).addClass( "active" );
			}

			$( document ).find( ".wdfsnfw_custom_uploader_btn" ).each(
				function () {
					// On click of each custom uploader
					$( this ).on(
						"click",
						function (e) {
							e.preventDefault();
							// Create Custom uplader
							const custom_uploader = wp.media(
								{
									title: "Select an Image",
									button: {
										text: 'Use this Image'
									},
									multiple: false
								}
							);

							// Get the element ID
							const id = $( this ).attr( 'id' );
							if (custom_uploader) {
								custom_uploader.open();
								// Open Custom uplader
								custom_uploader.on(
									"select",
									function () {
										// On select in custom uploader
										const attachment                  = custom_uploader.state().get( "selection" ).first().toJSON();
										wdfsnfw_accordion_img_btn_url[id] = attachment.url;
										switch (id) {
											case "wdfsnfw_background_image":
												   $( document ).find( "#" + id ).attr( "src", wdfsnfw_accordion_img_btn_url[id] );
									break;

											case "wdfsnfw_add_audio_file":
														   $( document ).find( '#' + id + '_show' ).parent( 'audio' ).remove();
														   const source = '<audio class="pb-3" controls><source id="wdfsnfw_add_audio_file_show" src="' + wdfsnfw_accordion_img_btn_url[id] + '" type="audio/mpeg"></audio>';
														   $( document ).find( ".wdfsnfw_audio_div" ).prepend( source );
									break;
										}
									}
								);
							}
						}
					);
				}
			);

			// Remove btn click event
			$( document ).on(
				"click",
				".wdfsnfw_remove_image",
				function (e) {
					e.preventDefault();
					$( this ).siblings( "img" ).attr( "src", $( this ).siblings( ".wdfsnfw_remove_image_default_value" ).val() );
				}
			);

			// Save btn click event
			$( document ).find( ".wdfsnfw-admin-form-btn" ).each(
				function () {
					$( this ).on(
						'click',
						function (e) {
							$( document ).find( ".loading" ).css( {"display":"block"} );
							e.preventDefault();
							const form_data  = {};
							const form_key   = $( this ).attr( 'option-key' );
							const data_class = $( this ).attr( 'data-class' );
							// Put the object into storage
							localStorage.setItem( "wdfsnfw_data_class", data_class );
							$( "." + data_class ).each(
								function () {
									switch ($( this ).attr( 'type' )) {
										case 'number':
											form_data[$( this ).attr( "id" )] = $( this ).val();
									 break;

										case 'text':
											form_data[$( this ).attr( "id" )] = $( this ).val();
									 break;

										case 'color':
											form_data[$( this ).attr( 'id' )] = $( this ).val();
									 break;

										case 'checkbox':
											if ($( this ).is( ":checked" ) == true) {
												form_data[$( this ).attr( 'id' )] = true;
											} else {
												form_data[$( this ).attr( 'id' )] = false;
											}
									break;
									}
									if ($( this ).is( 'select' )) {
										if ($( this ).attr( 'multiple' ) == false || $( this ).attr( 'multiple' ) == undefined) {
											form_data[$( this ).attr( 'id' )] = $( this ).children( 'option:selected' ).val();
										} else {
											var multi_select = [];
											$( this ).children( 'option:selected' ).each(
												function () {
													multi_select.push( $( this ).val() );
												}
											);
											form_data[$( this ).attr( 'id' )] = multi_select;
										}
									}
									if ($( this ).attr( 'class' ).indexOf( 'wdfsnfw_admin_accordion_img_btn' ) != -1) {
										form_data['wdfsnfw_accordion_img_btn_url'] = wdfsnfw_accordion_img_btn_url;
									}
									if ($( this ).is( 'textarea' )) {
										 form_data[$( this ).attr( "id" )] = $( this ).val();
									}
								}
							);
							const data = {
								'action' : 'wdfsnfwAdminFormSubmitAjax',
								'key' : form_key,
								'data' : form_data,
							}
							jQuery.post(
								ajax_object.ajax_url,
								data,
								function (response) {
									$( document ).find( ".loading" ).css( {"display":"none"} );
									alert( response );
									location.reload();
								}
							);
						}
					);
				}
			);
		}
	);

})( jQuery );
