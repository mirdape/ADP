<?php

/**
 * Custom footer items on the Theme customizer admin page.
 * 
 * @package Camp Maine
 */

/**
 * Adds the Footer section, footer item settings, and controls to the theme customizer.
 *
 * @param WP_Customize_Manager $wp_customize instance of the WP_Customize_Manager class.
 */
function campmaine_footer_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('Footer', 'campmaine'),
            'description' => sprintf(__('This theme supports setting up to %d footer items.', 'campmaine'), MAX_FOOTER_ITEMS),
            'priority' => 100
        )
    );

    for ($i=0; $i<MAX_FOOTER_ITEMS;$i++) {
    	$wp_customize->add_setting('campmaine_footer_item_' . $i, 
		array('default' => '',
		      'sanitize_callback' => 'campmaine_sanitize_footer_item',)
		);
    }

    for ($i=0; $i<MAX_FOOTER_ITEMS;$i++) {
        $wp_customize->add_control(
        'campmaine_footer_item_' . $i,
            array(
                'label' => sprintf(__('Footer item #%d', 'campmaine'), (1+$i)),
                'section' => 'footer_section',
                'type' => 'text',
                'priority' => $i,
            )
	);    
    }

    $wp_customize->add_setting('campmaine_show_wordpress_branding', array('sanitize_callback' => 'campmaine_sanitize_checkbox'));
    $wp_customize->add_control('campmaine_show_wordpress_branding',
        array(
    	    'type' => 'checkbox',
            'label' => __('Show Proudly powered by WordPress', 'campmaine'),
	    'default' => '1',
            'section' => 'footer_section',
	)
    );

    $wp_customize->add_setting('campmaine_show_design_team_branding', array('sanitize_callback' => 'campmaine_sanitize_checkbox'));
    $wp_customize->add_control('campmaine_show_design_team_branding',
        array(
            'type' => 'checkbox',
            'label' => __("Show Camp Maine theme by TAM'S TRADING POST", 'campmaine'),
	    'default' => '0',
            'section' => 'footer_section',
        )
    );

}
add_action( 'customize_register', 'campmaine_footer_customizer' );

/**
 * Callback for footer item textfield input.
 *
 * @uses wp_kses_post() to sanitize content for allowed HTML tags for input.
 * @uses force_balance_tags() to balance unclosed html tags.
 * @param string $input user input from footer item textfield.
 * @return string sanitized input.
 */
function campmaine_sanitize_footer_item ($input) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Callback to check checkbox input.
 *
 * @uses strcmp to compare input
 * @param string $input user input from checkbox
 * @return string sanitized input
 */
function campmaine_sanitize_checkbox ($input) {
    return strcmp('1', $input) == 0 ? '1' : '';
}