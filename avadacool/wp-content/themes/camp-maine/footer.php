<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Camp Maine
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">

		     <div id="footer-links">
		     	  <ul>
			      <?php
			          $footer_items = array();

			          for ($i=0; $i<MAX_FOOTER_ITEMS; $i++) {
				      $item_value = get_theme_mod('campmaine_footer_item_' . $i, '');

				      if (!empty($item_value)) {
                                          $footer_item = esc_attr(sprintf(__('%s', 'campmaine'), $item_value), 'campmaine');
				          array_push ($footer_items, '<li class="menu-text-color">' . $footer_item . '</li>');
				      }
				  }

				  $footer_line = implode ('<li>&middot;</li>', $footer_items);

				  if (!empty($footer_line)) {
				     echo $footer_line;
				  }
			      ?>
		    	  </ul>
		    </div>

		    <div id="site-credits">
		    	 <ul>
			     <?php $branding_items = array();
			         if( get_theme_mod( 'campmaine_show_wordpress_branding' ) == '1' ) {
				     $branding_item = '<li><a href="' . esc_url( __( 'https://wordpress.org/', 'campmaine' ) ) . '" title="' . esc_attr( __('Semantic Personal Publishing Platform', 'campmaine' ), 'campmaine') . '">' . esc_attr(sprintf( __( 'Proudly powered by %s', 'campmaine' ), 'WordPress' ), 'campmaine') . '</a></li>';
				     array_push($branding_items, $branding_item);
				 }

			         if( get_theme_mod( 'campmaine_show_design_team_branding' ) == '1' ) {
				     $branding_item = '<li>' . esc_attr(__("Camp Maine theme by TAM'S TRADING POST", 'campmaine'), 'campmaine') . '</li>';
			             array_push($branding_items, $branding_item);
			         }

				 $branding_line = implode ('<li>&middot;</li>', $branding_items);

                                 if (!empty($branding_line)) {
                                     echo $branding_line;
                                 }
			    ?>
			</ul>
		    </div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>