<?php
/**
 * Message blocks
 */
function grsc_warning_block( $atts, $content= NULL, $code = '' ) {
    return '<div class="warning_block message-block alert alert-warning" role="alert">' . grsc_print_only_text( '<strong>Warning!</strong>' ) . grsc_first_p( do_shortcode( $content ) ) . '</div>';
}
function grsc_error_block( $atts, $content= NULL, $code = '' ) {
    return '<div class="error_block message-block alert alert-danger" role="alert">' . grsc_print_only_text( '<strong>Error!</strong>' ) . grsc_first_p( do_shortcode( $content ) ) . '</div>';
}
function grsc_notice_block( $atts, $content= NULL, $code = '' ) {
    return '<div class="notice_block message-block alert alert-info" role="alert">' . grsc_print_only_text( '<strong>Notice</strong>' ) . grsc_first_p( do_shortcode( $content ) ) . '</div>';
}
function grsc_important_block( $atts, $content = NULL, $code = '' ) {
    return '<div class="important_block message-block alert alert-success" role="alert">' . grsc_print_only_text( '<strong>Important!</strong>' ) . grsc_first_p( do_shortcode( $content ) ) . '</div>';
}
add_shortcode( 'warning', 'grsc_warning_block' );
add_shortcode( 'error', 'grsc_error_block' );
add_shortcode( 'notice', 'grsc_notice_block' );
add_shortcode( 'important', 'grsc_important_block' );


/**
 * Pullquote
 */
function grsc_pullquote( $atts, $content = NULL, $code = '' ) {
	if ( ! $content ) return;
	
	$style = array();
	$class = array( 'pullquote', 'align' => 'alignleft' );
	
	if ( $atts ) {
		if ( array_key_exists( 'align', $atts ) ) {
			if ( in_array( $atts['align'], array( 'left', 'center', 'right' ) ) )
				$class['align'] = 'align' . $atts['align'];
			if ( $atts['align'] == 'center' ) $style['text-align'] = 'center';
		}
		
		if ( array_key_exists( 'width', $atts ) ) {
			if ( $atts['width'] ) $style['width'] = trim( $atts['width'] );
		}
		
		if ( array_key_exists( 'textalign', $atts ) ) {
			if ( in_array( $atts['textalign'], array( 'left', 'center', 'right' ) ) )
				$style['text-align'] = $atts['textalign'];
		}
	}
	
	$style_attr = '';
	if ( $style ) {
		foreach ( $style as $prop => $val ) {
			$style_attr .= $prop . ':' . $val . ';';
		}
		if ( $style_attr ) $style_attr = ' style="' . $style_attr . '"';
	}
	$attr = 'class="' . implode( ' ', $class ) . '"' . $style_attr;
	
    return '<div ' . $attr . '>' . wpautop( do_shortcode( $content ) ) . '</div>';
}
add_shortcode( 'pullquote', 'grsc_pullquote' );


/**
 * Extend TinyMCE plugin class
*/
class GRSC_Shortcodes_Buttons{
	
	function GRSC_Shortcodes_Buttons(){
		if ( current_user_can( 'edit_posts' ) &&  current_user_can( 'edit_pages' ) ) {	
			// add_filter( 'tiny_mce_version', array(&$this, 'tiny_mce_version' ) );
			add_filter( 'mce_external_plugins', array(&$this, 'grsc_add_plugin' ) );  
			add_filter( 'mce_buttons_2', array(&$this, 'grsc_register_button' ) );  
	   }
	}
	
	function grsc_register_button( $buttons ){
		array_push( $buttons, "separator", "warning", "error", "notice", "important", "separator", "pullquote");
		return $buttons;
	}
	
	function grsc_add_plugin( $plugin_array ){
		$plugin_array['grscshortcodes'] = GRSC_ROOTURI . '/js/mce.js';
		return $plugin_array; 
	}
}


/**
 * Hook the shortcode buttons to the TinyMCE editor
*/
function GRSC_Shortcodes_Buttons(){
	global $GRSC_Shortcodes_Buttons;
	$GRSC_Shortcodes_Buttons = new GRSC_Shortcodes_Buttons();
}
add_action( 'init', 'GRSC_Shortcodes_Buttons' );


/**
 * Tell WordPress to load external language file for the shortcodes buttons
 */
function grsc_mce_external_languages( $files ){
	$files['grscshortcodes'] = GRSC_ROOTDIR . '/js/mce-l10n.php';
	return $files;
}
add_filter( 'mce_external_languages', 'grsc_mce_external_languages' );


/**
 * Add css to post edit screen
 */
function grsc_enqueue_scripts(){
	if ( ! is_admin() ) return;
	
	wp_enqueue_style( 'font-awesome', GRSC_ROOTURI . '/css/font-awesome/css/font-awesome.min.css', array(), '', 'all' );
	wp_enqueue_style( 'grsc-admin', GRSC_ROOTURI . '/css/grsc.css', array( 'font-awesome' ), '', 'all' );
}
add_action( 'admin_enqueue_scripts', 'grsc_enqueue_scripts' );