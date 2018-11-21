<?php
/**
 * Plugin Name: WC Name Your Price - Done Typing
 * Plugin URI: https://github.com/helgatheviking/wc-nyp-done-typing
 * Description: Triggers the NYP validation when done typing
 * Version: 1.0.0
 * Author: Kathy Darling
 * Author URI: http://kathyisawesome.com/
 * WC requires at least: 3.4.0
 * WC tested up to: 3.5.0
 *
 * Copyright: © 2018 Kathy Darling
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


/**
 * The Main WC_NYP_Finish_Typing class
 **/
if ( ! class_exists( 'WC_NYP_Finish_Typing' ) ) :

class WC_NYP_Finish_Typing {

	/**
	 * constants
	 */
	CONST VERSION      = '1.0.0';

	/**
	 * WC_NYP_Finish_Typing "Pseudo" Constructor
	 */
	public static function init() {
		
		add_action( 'woocommerce_nyp_after_price_input', array( __CLASS__, 'load_script' ) );


    }


	/*-----------------------------------------------------------------------------------*/
	/*  Helper Functions                                                                 */
	/*-----------------------------------------------------------------------------------*/

	/**
	 * Get the plugin url.
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}


	/*-----------------------------------------------------------------------------------*/
	/*  Display Functions                                                                      */
	/*-----------------------------------------------------------------------------------*/


	/**
	 * Get the plugin base path name.
	 *
	 * @param  int $order_id
	 * @return void
	 */
	public static function load_script( $order_id ) {
        wp_enqueue_script( 'wc_nyp_done_typing', plugins_url( 'assets/js/wc-nyp-done-typing.js',  __FILE__  ), array(), '1.0', true );
	}


} // End class: do not remove or there will be no more guacamole for you.

endif; // End class_exists check.



// Launch the whole plugin.
add_action( 'woocommerce_loaded', array( 'WC_NYP_Finish_Typing', 'init' ) );
