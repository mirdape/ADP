<?php
/***
 * Custom Header Slider
 *
 * This file contains a function display the image slider. Responsive slides.
 *
 * @package Camp Maine
 */
	

// Display Image slider.
if ( ! function_exists( 'campmaine_display_image_slider' ) ):
	
    function campmaine_display_image_slider() {
        $options = campmaine_get_image_slider_options(get_option('campmaine_image_slider_theme_options'));

        $image_slider_urls     = $options['image_slider_urls'];
        $image_slider_captions = $options['image_slider_captions'];
        $image_slider_links    = $options['image_slider_links'];

        $has_slider_images = false;

        if (!empty($image_slider_urls)) {

            $slider_items = '';

            for ($i=0;$i<MAX_SLIDER_IMAGES;$i++) {
                if (!empty($image_slider_urls['image_slider_url_' . (1+$i) . '_textfield'])) {
                    $has_slider_images = true;

                    $slider_items .= '<li>';

                    if (!empty($image_slider_links) &&
                        !empty($image_slider_links['image_slider_link_' . (1+$i) . '_textfield'])) {
		      
                        $slider_items .= '<a href="';
                        $slider_items .= esc_url($image_slider_links['image_slider_link_' . (1+ $i) . '_textfield']);
                        $slider_items .= '">';
                    }
		  
                    $slider_items .= '<img src="';
                    $slider_items .= esc_url($image_slider_urls['image_slider_url_' . (1+$i) . '_textfield']);
                    $slider_items .= '" alt="">';

                    if (!empty($image_slider_links) &&
                        !empty($image_slider_links['image_slider_link_' . (1+$i) . '_textfield'])) {
                        $slider_items .= '</a>';
                    }

                    if (!empty($image_slider_captions) && 
                        !empty($image_slider_captions['image_slider_caption_' . (1+$i) . '_textfield'])) {
                        $slider_items .= '<p class="caption">';
                        $slider_items .= esc_attr(sprintf(__('%s', 'campmaine'), $image_slider_captions['image_slider_caption_' . (1+$i) . '_textfield']));
                        $slider_items .= '</p>';
                    }
	      
                    $slider_items .= '</li>';
                }
            }
        }

	?>
	
	<div class="rslides_container" <?php if (!$has_slider_images) : ?> style="height:350px;"<?php endif; ?>>
          <div class="site-name">
            <?php if ( get_header_image() ) : ?>
                <a href="<?php echo esc_url( sprintf(__('%s', 'campmaine'), home_url( '/' )) ); ?>"><img src="<?php header_image();?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
            <?php else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( sprintf(__('%s', 'campmaine'), home_url( '/' )) ); ?>" title="<?php echo esc_attr( sprintf(__('%s', 'campmaine'), get_bloginfo( 'name', 'display' )) ); ?>" rel="home"><?php esc_attr(sprintf(__('%s', 'campmaine'), bloginfo( 'name' )) ); ?></a></h1>
            <?php endif; ?>
          </div>

          <!-- Homepage Slider -->
	  <?php if ($has_slider_images) : ?>
	    <ul class="rslides" id="homepage_slider">
	      <?php echo $slider_items; ?>
	    </ul>
	  <?php endif; ?>
	</div>
<?php
    }
endif;
