<?php

/**
 * The user IP address class
 *
 * @link       www.deninichi.com
 * @since      1.0.0
 *
 * @package    WP_User_Locator
 * @subpackage WP_User_IP
 */

/**
 * Defines the user IP functions
 *
 * @package    WP_User_Locator
 * @subpackage WP_User_IP
 * @author     Denis Nichik <info@deninichi.com>
 */
class WP_User_IP {

	/**
	 * Get user IP address
	 * 
	 * Get IP address using PHP $_SERVER global array
	 *
	 * @since 1.0.0
	 *
	 * @return string IF address.
	 */
	public static function wpul_get_user_ip(){

		$ipaddress = '';
	    
		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {

	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];

		} else if( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	        
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];

	    } else if( isset( $_SERVER['HTTP_X_FORWARDED'] ) ) {
	        
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];

	    } else if( isset( $_SERVER['HTTP_FORWARDED_FOR'] ) ) {
	        
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];

	    } else if( isset( $_SERVER['HTTP_FORWARDED'] ) ) {
	        
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];

	    } else if( isset( $_SERVER['REMOTE_ADDR'] ) ) {

	        $ipaddress = $_SERVER['REMOTE_ADDR'];

	    } else {

	        $ipaddress = 'UNKNOWN';

	    }

	    return $ipaddress;

	}
}