<?php
/*
// TEMP: Enable update check on every request. Normally you don't need this! This is for testing only!
// NOTE: The 
//	if (empty( $checked_data->checked) )
//		return $checked_data; 
// lines will need to be commented in the check_for_plugin_update function as well.
*/
//set_site_transient( 'update_plugins', null);
/*
// TEMP: Show which variables are being requested when query plugin API
add_filter( 'plugins_api_result', 'aaa_result', 10, 3);
function aaa_result( $res, $action, $args) {
	print_r( $res);
	return $res;
}
// NOTE: All variables and functions will need to be prefixed properly to allow multiple plugins to be updated
*/
global $grsc_api_url, $grsc_plugin_slug;
$grsc_api_url = 'http://updates.graphene-theme.com/';
$grsc_plugin_slug = basename( GRSC_ROOTURI );


/**
 * Take over the update check
 */
function grsc_check_for_plugin_update( $checked_data ) {
	global $grsc_api_url, $grsc_plugin_slug, $wp_version;
	
	/* Comment out this line during testing. */
	if ( empty( $checked_data->checked ) ) return $checked_data;
	
	$args = array(
		'slug' => $grsc_plugin_slug,
		'version' => $checked_data->checked[$grsc_plugin_slug . '/' . $grsc_plugin_slug . '.php'],
	);
	$request_string = array(
			'body' => array(
				'action' => 'basic_check', 
				'request' => serialize( $args ),
				'api-key' => md5( get_bloginfo( 'url' ) )
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' )
		);
	
	/* Start checking for an update */
	$raw_response = wp_remote_post( $grsc_api_url, $request_string );
	
	if ( ! is_wp_error( $raw_response ) && ( $raw_response['response']['code'] == 200 ) )
		$response = unserialize( $raw_response['body']);
	
	if ( is_object( $response ) && ! empty( $response ) ) // Feed the update data into WP updater
		$checked_data->response[$grsc_plugin_slug .'/'. $grsc_plugin_slug .'.php'] = $response;
	
	return $checked_data;
}
add_filter( 'pre_set_site_transient_update_plugins', 'grsc_check_for_plugin_update' );


/**
 * Take over the Plugin info screen
 */
function grsc_plugin_api_call( $def, $action, $args ) {
	global $grsc_plugin_slug, $grsc_api_url, $wp_version;
	
	if ( ! isset( $args->slug ) || ( $args->slug != $grsc_plugin_slug ) )
		return false;
	
	// Get the current version
	$plugin_info = get_site_transient( 'update_plugins' );
	$current_version = $plugin_info->checked[$grsc_plugin_slug . '/' . $grsc_plugin_slug . '.php'];
	$args->version = $current_version;
	
	$request_string = array(
			'body' => array(
				'action' => $action, 
				'request' => serialize( $args ),
				'api-key' => md5( get_bloginfo( 'url' ) )
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' )
		);
	
	$request = wp_remote_post( $grsc_api_url, $request_string );
	
	if ( is_wp_error( $request ) ) {
		$res = new WP_Error( 'plugins_api_failed', 
							  'An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>', 
							  $request->get_error_message() );
	} else {
		$res = unserialize( $request['body'] );
		if ( $res === false) $res = new WP_Error( 'plugins_api_failed', 'An unknown error occurred', $request['body']);
	}
	
	return $res;
}
add_filter( 'plugins_api', 'grsc_plugin_api_call', 10, 3 );