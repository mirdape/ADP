<?php
/**
 * Wrap in "printonly" class
 */
function grsc_print_only_text( $text ){
    return sprintf( '<p class="printonly">%s</p>', $text );
}


/**
 * Add .first-p class to the first <p> element in a text block
 *
 * @param string $text A text block
 * @return string $text The text block with the .first-p class added to the first <p> element
 */
function grsc_first_p( $text ){
	$text = preg_replace('/<p([^>]+)?>/', '<p$1 class="first-p">', $text , 1 );
	return apply_filters( 'grsc_first_p', $text );
}