<?php
/**
 * Custom backgrounds
 * http://codex.wordpress.org/Custom_Backgrounds
 *
 * @package Camp Maine
 */

function campmaine_custom_background_setup() {
        add_theme_support( 'custom-background', apply_filters( 'campmaine_custom_background_args', array(
                'default-color' => '223a00',
                'default-image' => get_template_directory_uri() . '/images/01_GROUSE_MTN_1024_350.jpg',
		'default-repeat' => 'no-repeat',
		'default-position-x' => 'center',
                'wp-head-callback' => 'campmaine_background_style',
        ) ) );
}

add_action( 'after_setup_theme', 'campmaine_custom_background_setup' );

if ( ! function_exists( 'campmaine_background_style' ) ) :

/**
 * Modified from wp-includes/theme.php. 
 *
 * background-position modification.
 *
 * Default custom background callback.
 *
 */

function campmaine_background_style() {

    // $background is the saved custom image, or the default image.
    // background image overrides background color.
    $background = set_url_scheme( get_background_image() );

    // $color is the saved custom color.
    // A default is specified style.css. However, the value from the customizer will
    // override what is in style.css.
    $color = get_background_color();

    if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
       $color = false;
    }

    // Don't show the background image if the admin wants to use image sliders.
    $image_slider_urls = get_option('campmaine_image_slider_theme_options', array());

    $has_slider_images = implode('', $image_slider_urls);

    $style = $color ? "background-color: #$color;" : '';

    if (empty($has_slider_images)) {
	       	  $image = " background-image: url('$background');";

		  	 $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
		 	 if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			      $repeat = 'repeat';
		      	      $repeat = " background-repeat: $repeat;";

			            	      $position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );


					      // MAKE POSITION a percentage from TOP


	      		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
								     $position = 'left';
								     	       $position = " background-position: $position 66px;";

									       		 $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
											 	       if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
        $attachment = 'scroll';
    }

    $attachment = " background-attachment: $attachment;";

    $style .= $image . $repeat . $position . $attachment;
  }
?>
<style type="text/css" id="custom-background-css">
body.custom-background { <?php echo trim( $style ); ?> }

<?php if (empty($background)): ?>
nav#site-navigation {
  background-color: #<?php echo get_background_color(); ?>;
}
.main-navigation ul.sub-menu li a {
  background-color: #<?php echo get_background_color(); ?>;
}
.main-navigation ul.children li a {
  background-color: #<?php echo get_background_color(); ?>;
  border: none;
}
<?php endif; ?>

.content-background-color {
  background-color: <?php echo get_theme_mod( 'campmaine_content_background_color', '#687120' ); ?>;
}
div#footer-links li {
  color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
div#site-credits li a {
  color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
div#site-credits li {
  color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
div.nav-menu ul li a {
  color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
div.nav-menu ul li a:focus {
  background-color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
div.nav-menu ul li a:hover {
  background-color: <?php echo get_theme_mod( 'campmaine_menu_text_color', '#687120' ); ?>;
}
</style>
<?php
}
endif;