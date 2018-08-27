<?php 

// Include Geo IP library
require_once WPUL_PATH . 'includes/vendor/autoload.php';


/**
 * Get user lat/lon
 * 
 * Get user location lat/lon coordinates
 *
 * @since 1.0.0
 *
 * @return array Lat/Lon coordinates
 */
function wpul_get_user_location( $ip = '' ){

	$gi = geoip_open( WPUL_PATH . "includes/geo-ip-database/GeoLiteCity.dat" ,GEOIP_STANDARD );

	if ( '' === $ip ) {
		$ip = WP_User_IP::wpul_get_user_ip();
	}

	$location = GeoIP_record_by_addr( $gi, $ip );

	return $location;

}