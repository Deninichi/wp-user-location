<?php

/**
 * Get user IP address
 * 
 * Get IP address using PHP $_SERVER global array
 *
 * @since 1.0.0
 *
 * @return string IF address.
 */
function wpul_get_user_ip(){

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