<?php
/**
 * Customize the customizer.
 *
 * @package Camp Maine
 */

/**
 * Customize the customizer.
 *
 * @param WP_Customize_Manager $wp_customize instance of the WP_Customize_Manager class.
 */
function campmaine_customizer_setup($wp_customize) {

    // Remove Tagline control
    $wp_customize->remove_control('blogdescription');

    // Rename existing section
    $wp_customize->add_section( 'title_tagline' , array(
			    'title'	      => __('Site Title', 'campmaine'),
			    'priority'	      => 20,
    ));

    // Add Content Background color control
    $wp_customize->add_setting('campmaine_content_background_color', array(
                                             'default'   => '#687120',
                                             'sanitize_callback' => 'campmaine_sanitize_content_background_color',
					     'transport' => 'refresh'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_background_color', array(
                                             'label'      => __( 'Content Background Color', 'campmaine' ),
                                             'section'    => 'colors',
                                             'settings'   => 'campmaine_content_background_color',)
    ));

    // Add Menu Text color control
    $wp_customize->add_setting('campmaine_menu_text_color', array(
                                             'default'   => '#687120',
                                             'sanitize_callback' => 'campmaine_sanitize_menu_text_color',
                                             'transport' => 'refresh'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
                                             'label'      => __( 'Menu & Footer Text Color', 'campmaine' ),
                                             'section'    => 'colors',
                                             'settings'   => 'campmaine_menu_text_color',)
    ));
}
add_action( 'customize_register', 'campmaine_customizer_setup' );


/**
 * Callback for footer item textfield input.
 *
 * @uses wp_kses_post() to sanitize content for allowed HTML tags for input.
 * @uses force_balance_tags() to balance unclosed html tags.
 * @param string $input user input from footer item textfield.
 * @return string sanitized input.
 */
function campmaine_sanitize_content_background_color($input) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Callback for footer item textfield input.
 *
 * @uses wp_kses_post() to sanitize content for allowed HTML tags for input.
 * @uses force_balance_tags() to balance unclosed html tags.
 * @param string $input user input from footer item textfield.
 * @return string sanitized input.
 */
function campmaine_sanitize_menu_text_color($input) {
    return wp_kses_post( force_balance_tags( $input ) );
}