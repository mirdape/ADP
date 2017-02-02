<?php

/**
 * Custom functions for the theme.
 * 
 * @package Camp Maine
 */

/**
 * Adds get image slider options using Settings API.
 *
 * @return Array of image slider options retrieved from the database as one row.
 */
function campmaine_get_image_slider_options($options) {

    $image_slider_urls     = array();
    $image_slider_captions = array();
    $image_slider_links    = array();

    if (!empty($options)) {
        foreach ($options as $key => $value) {
            if (strpos($key, 'image_slider_url') === 0) {
                $image_slider_urls[$key] = $value;
            } else if (strpos($key, 'image_slider_caption') === 0) {
                $image_slider_captions[$key] = $value;
            } else if (strpos($key, 'image_slider_link') === 0) {
                $image_slider_links[$key] = $value;
            }
        }
    }

    return array('image_slider_urls'     => $image_slider_urls,
                 'image_slider_captions' => $image_slider_captions,
                 'image_slider_links'    => $image_slider_links);
}