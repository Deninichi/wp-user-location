<?php 

/**
 * Plugin Name: WP User locator
 * Description: Plugin for user location detection. You can get user location coordinates or address (city, zip). You can use PHP function wpul_get_user_location() to get array with user location or global JS object WPUL.
 * Plugin URI: https://wp-user-locator.deninichi.com
 * Author: Denis Nichik
 * Author URI: http://deninichi.com
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: wp-u-locator
 */

/*
	Copyright (C) 2018  Denis Nichik  info@deninichi.com

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WPUL_VERSION', '1.0.0' );
define( 'WPUL_PATH', plugin_dir_path( __FILE__ ) );

class WP_User_Locator {

	private static $instance = null;

	/**
	 * Creates or returns an instance of this class.
	 * @since  1.0.0
	 * @return WP_User_Locator A single instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function __construct() {

		// Include user IP address functions
		require_once WPUL_PATH . 'includes/wpul-ip.php';


		// Include Geo IP functions
		require_once WPUL_PATH . 'includes/wpul-geo-ip-functions.php';

		// Enqueue scripts/styles
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 5 );
	}

	function enqueue(){

		// enqueue scripts
		wp_enqueue_script( 'wpul-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_localize_script( 'wpul-scripts', 'WPUL', array(
			'user_location' => wpul_get_user_location()
		) );
	}

}

add_action( 'plugins_loaded', array( 'WP_User_Locator', 'get_instance' ) );
