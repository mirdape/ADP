<?php

/**
 * Custom Image slider on the customize screen.
 * 
 * @package Camp Maine
 */

/**
 * Adds the Image slider section, item settings, and controls to the theme customizer.
 *
 * @param WP_Customize_Manager $wp_customize instance of the WP_Customize_Manager class.
 */
function campmaine_image_slider_customizer( $wp_customize ) {

    $sectionDescription  = '<h2>';
    $sectionDescription .= __('Configure slider images', 'campmaine');
    $sectionDescription .= '</h2><p>';
    $sectionDescription .= sprintf(__('This theme supports up to %d slider images. To configure the images, upload the images using the Media Tool and then enter the url into the text fields below. For best results, the images must be the same size. E.g., 1024px wide by 350px high.', 'campmaine'), MAX_SLIDER_IMAGES);
    $sectionDescription .= '</p><p>';
    $sectionDescription .= __('E.g., http://campmaine.tamstradingpost.com/wp-content/uploads/2014/10/02_GROUSE_MTN_1024_350.jpg.', 'campmaine');
    $sectionDescription .= '</p><p>';
    $sectionDescription .= __('Optional image captions and onclick urls are configured below.', 'campmaine');
    $sectionDescription .= '</p>';

    $wp_customize->add_section(
        'image_slider_section',
        array(
            'title'       => __('Image slider', 'campmaine'),
            'description' => $sectionDescription,
            'priority'    => 100
        )
    );

    for ($i=1; $i<=MAX_SLIDER_IMAGES;$i++) {

        $imageUrlSettingName = 'campmaine_image_slider_theme_options[image_slider_url_' . $i . '_textfield]';
        $imageCaptionSettingName = 'campmaine_image_slider_theme_options[image_slider_caption_' . $i . '_textfield]';
        $imageLinkSettingName = 'campmaine_image_slider_theme_options[image_slider_link_' . $i . '_textfield]';

    	$wp_customize->add_setting($imageUrlSettingName,
            array('default'           => '',
                  'type'              => 'option',
                  'capability'        => 'edit_theme_options',
	          'sanitize_callback' => 'campmaine_sanitize_image_slider_url_link'));

        $wp_customize->add_setting($imageCaptionSettingName,
            array('default'           => '',
                  'type'              => 'option',
                  'capability'        => 'edit_theme_options',
                  'sanitize_callback' => 'campmaine_sanitize_image_slider_caption'));

        $wp_customize->add_setting($imageLinkSettingName,
            array('default'           => '',
                  'type'              => 'option',
                  'capability'        => 'edit_theme_options',
                  'sanitize_callback' => 'campmaine_sanitize_image_slider_url_link'));

        $wp_customize->add_control($imageUrlSettingName,
            array('label'    => sprintf(__('Image # %d', 'campmaine'), $i),
                  'section'  => 'image_slider_section',
                  'type'     => 'text',
                  'setting'  => $imageUrlSettingName,
                  'priority' => $i));

        $wp_customize->add_control($imageCaptionSettingName,
            array('label'    => __('Caption', 'campmaine'),
                  'section'  => 'image_slider_section',
                  'type'     => 'text',
                  'setting'  => $imageCaptionSettingName,
                  'priority' => $i));

        $wp_customize->add_control($imageLinkSettingName,
            array('label'    => __('Link', 'campmaine'),
                  'section'  => 'image_slider_section',
                  'type'     => 'text',
                  'setting'  => $imageLinkSettingName,
                  'priority' => $i));
    }
}
add_action( 'customize_register', 'campmaine_image_slider_customizer' );

/**
 * Callback for image url and link textfield input.
 *
 * @uses trim() to remove whitespaces on both ends.
 * @uses esc_url_raw to make url safe for db use.
 * @param string $input user input.
 * @return string sanitized input.
 */
function campmaine_sanitize_image_slider_url_link($input) {
    $newInput = esc_url_raw(trim($input));

    return $newInput;
}

/**
 * Callback for image caption textfield input.
 *
 * @param string $input user input from caption textfield.
 * @return string sanitized input.
 */
function campmaine_sanitize_image_slider_caption ($input) {
    $newInput = trim($input);
    if (!empty($newInput)) {
        if (strlen($newInput) > MAX_CAPTION_LENGTH) {
            $newInput = '';
        }
    }
    return $newInput;
}