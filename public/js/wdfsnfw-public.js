(function ( $ ) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
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


    $(document).ready(
        function () {
            if (wdfsnfw_how_long_to_keep_the_popup == undefined) {
                   const wdfsnfw_how_long_to_keep_the_popup = 10
            }
            if (wdfsnfw_time_gap_bt_two_popup === undefined) {
                const wdfsnfw_time_gap_bt_two_popup = 5
            }
            function show_popup(body)
            {
                if(popup  !== undefined) {
                    $(document).find("#wdfsnfw_popup_time").text(Math.floor((Math.random() * 60) + 1) + ' ' + randomProperty(popup['header']['timing']));
                    $(document).find("#wdfsnfw_popup_heading").text(popup['header']['heading']);
                    const single_product = randomProperty(popup['header']['products']);
                    const single_user = randomProperty(popup['user']);
                    const single_country = randomProperty(popup['country_names']);
                    let content = body;
                    let currency
                    if (country_with_currency !== undefined) {
                        currency = country_with_currency[single_country]
                    }
                    if(content.indexOf('product') || content.indexOf('PRODUCT') || content.indexOf('Product')) {
                        content = content.replaceAll("{product}", single_product['Name']);
                        content = content.replaceAll("{PRODUCT}", single_product['Name']);
                        content = content.replaceAll("{Product}", single_product['Name']);
                    }
                    if(content.indexOf('{date}') || content.indexOf('{DATE}') || content.indexOf('{Date}')) {
                         content = content.replaceAll("{date}", single_product['Date']);
                         content = content.replaceAll("{DATE}", single_product['Date']);
                         content = content.replaceAll("{Date}", single_product['Date']);
                    }
                    if(content.indexOf('{time}') || content.indexOf('{TIME}') || content.indexOf('{Time}')) {
                        content = content.replaceAll("{time}", single_product['Time']);
                        content = content.replaceAll("{TIME}", single_product['Time']);
                        content = content.replaceAll("{Time}", single_product['Time']);
                    }
                    if(content.indexOf('{price}') || content.indexOf('{PRICE}') || content.indexOf('{Price}')) {
                             content = content.replaceAll("{price}", currency + single_product['Price']);
                             content = content.replaceAll("{PRICE}", currency + single_product['Price']);
                             content = content.replaceAll("{Price}", currency + single_product['Price']);
                    }
                    if(content.indexOf('{user}') || content.indexOf('{USER}') || content.indexOf('{User}')) {
                        content = content.replaceAll("{user}", single_user);
                        content = content.replaceAll("{USER}", single_user);
                        content = content.replaceAll("{User}", single_user);
                    }
                    if(content.indexOf('{country}') || content.indexOf('{COUNTRY}') || content.indexOf('{Country}')) {
                        content = content.replaceAll("{country}", single_country);
                        content = content.replaceAll("{COUNTRY}", single_country);
                        content = content.replaceAll("{Country}", single_country);
                    }
                    $(document).find("#wdfsnfw_popup_desc").text(content);
                    $(document).find("#wdfsnfw_popup_img").attr('src', single_product['Img']);
                    $(document).find("#wdfsnfw_popup_img_anchor").attr('href', single_product['Img']);
                    $(document).find("#wdfsnfw_popup_desc_anchor").attr('href', single_product['Link']);
                    if(wdfsnfw_open_product_link_in_new_tab !== undefined) {
                          $(document).find("#wdfsnfw_popup_img_anchor").attr('target', '_blank');
                          $(document).find("#wdfsnfw_popup_desc_anchor").attr('target', '_blank');
                    }else{
                        $(document).find("#wdfsnfw_popup_img_anchor").removeAttr('target');
                        $(document).find("#wdfsnfw_popup_desc_anchor").removeAttr('target');
                    }
                }
                $(document).find(".toast").show();
                if(typeof $(document).find("#wdfsnfw_popup_audio_url").length) {
                    const audio = new Audio($(document).find("#wdfsnfw_popup_audio_url").attr("value"));
                    audio.play();
                }
                setTimeout(hide_popup, wdfsnfw_how_long_to_keep_the_popup * 1000);
            }
            function hide_popup()
            {
                $(document).find(".toast").hide();
            }
            function randomProperty(obj)
            {
                const keys = Object.keys(obj);
                return obj[keys[ keys.length * Math.random() << 0]];
            }
            if (wdfsnfw_enable_sales_notification !== undefined) {
                if (typeof wdfsnfw_disable_current_page !== 'undefined') {
                    localStorage.setItem("wdfsnfw_popup_close_timeout", "");
                }

                (async() => {
                    const sleep = time => new Promise(response => setTimeout(response, time));
                    while (true) {
                        if(localStorage.getItem('wdfsnfw_popup_close_timeout') === null) {
                            show_popup(popup['body'])
                            await sleep(wdfsnfw_how_long_to_keep_the_popup * 1000);
                            hide_popup()
                            await sleep(wdfsnfw_time_gap_bt_two_popup * 1000);
                        }else{
                            break;
                        }                    
                    }
                })()

                if (wdfsnfw_img_position !== undefined) {
                    if (wdfsnfw_img_position == 'img_on_right') {
                        $('.popup_img').insertAfter($('.popup_desc'));
                    } else if (wdfsnfw_img_position == 'txt_only') {
                        $('.popup_img').hide();
                        $('.popup_desc').removeClass('col-md-8');
                    }
                }
                $(document).on(
                    "click", "#wdfsnfw_popup_close", function (e) {
                        e.preventDefault();
                        if (scale_out != undefined) {
                                 $(".toast").css({ '-webkit-animation': 'scale-out-center 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                                 $(".toast").css({ 'animation': 'scale-out-center 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                        } else if (rotate_out != undefined) {
                                 $(".toast").css({ '-webkit-animation': 'rotate-out-center 0.6s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                                 $(".toast").css({ 'animation': 'rotate-out-center 0.6s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                        } else if (swirl_out != undefined) {
                               $(".toast").css({ '-webkit-animation': 'swirl-out-bck 0.6s ease-in both' });
                               $(".toast").css({ 'animation': 'swirl-out-bck 0.6s ease-in both' });
                        } else if (flip_out != undefined) {
                            $(".toast").css({ '-webkit-animation': 'flip-out-hor-top 0.45s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                            $(".toast").css({ 'animation': 'flip-out-hor-top 0.45s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                        } else if (slit_out != undefined) {
                               $(".toast").css({ '-webkit-animation': 'slit-out-vertical 0.5s ease-in both' });
                               $(".toast").css({ 'animation': 'slit-out-vertical 0.5s ease-in both' });
                        } else if (slide_out != undefined) {
                            $(".toast").css({ '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                            $(".toast").css({ 'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both' });
                        } else if (bounce_out != undefined) {
                                      $(".toast").css({ '-webkit-animation': 'bounce-out-top 1.5s both' });
                                      $(".toast").css({ 'animation': 'bounce-out-top 1.5s both' });
                        } else if (roll_out != undefined) {
                                   $(".toast").css({ '-webkit-animation': 'roll-out-left 0.6s ease-in both' });
                                   $(".toast").css({ 'animation': 'roll-out-left 0.6s ease-in both' });
                        } else if (swing_out != undefined) {
                                $(".toast").css({ '-webkit-animation': 'swing-out-top-bck 0.45s cubic-bezier(0.600, -0.280, 0.735, 0.045) both' });
                                $(".toast").css({ 'animation': 'swing-out-top-bck 0.45s cubic-bezier(0.600, -0.280, 0.735, 0.045) both' });
                        } else if (fade_out != undefined) {
                             $(".toast").css({ '-webkit-animation': 'fade-out 1s ease-out both' });
                             $(".toast").css({ 'animation': 'fade-out 1s ease-out both' });
                        } else if (puff_out != undefined) {
                              $(".toast").css({ '-webkit-animation': 'puff-out-center 1s cubic-bezier(0.165, 0.840, 0.440, 1.000) both' });
                              $(".toast").css({ 'animation': 'puff-out-center 1s cubic-bezier(0.165, 0.840, 0.440, 1.000) both' });
                        } else if (flicker_out != undefined) {
                             $(".toast").css({ '-webkit-animation': 'flicker-out-1 2s linear both' });
                             $(".toast").css({ 'animation': 'flicker-out-1 2s linear both' });
                        }
                        if (wdfsnfw_dismiss_notification_option !== undefined) {
                            localStorage.setItem("wdfsnfw_popup_close_timeout", "");
                        }
                    }
                );

                if(show_close_button !== undefined) {
                       $(document).find("#wdfsnfw_popup_close").removeAttr("hidden");
                }
            }
        }
    );

})(jQuery);
