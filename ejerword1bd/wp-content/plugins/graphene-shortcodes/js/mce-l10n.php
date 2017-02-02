<?php
/**
 * Generates the javascript for translatable TinyMCE editor buttons
 */
function grsc_mce_translation(){
	
	$buttons = array(
		'warning_title'		=> __( 'Add a warning message block', 'grsc' ),
		'error_title'		=> __( 'Add an error message block', 'grsc' ),
		'notice_title'		=> __( 'Add a notice message block', 'grsc' ),
		'important_title'	=> __( 'Add an important message block', 'grsc' ),
		'pullquote'			=> __( 'Add a pullquote', 'grsc' ),
	);	
	
	$locale = _WP_Editors::$mce_locale;
	$translated = 'tinyMCE.addI18n("' . $locale . '.grscmcebuttons",' . json_encode( $buttons ) . ");\n";
	
	return $translated;
}
$strings = grsc_mce_translation();