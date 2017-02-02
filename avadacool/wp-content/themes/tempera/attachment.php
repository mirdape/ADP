<?php
/**
 * The template for displaying attachments.
 *
 * @package Cryout Creations
 * @subpackage tempera
 * @since tempera 0.5
 */

get_header(); ?>

		<section id="container" class="single-attachment one-column">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php if ( ! empty( $post->post_parent ) ) : ?>
					<p class="page-title"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', 'tempera' ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery"><?php
						/* translators: %s - title of parent post */
						printf( '<span class="meta-nav">&laquo;</span> %s', get_the_title( $post->post_parent ) );
					?></a></p>
				<?php endif; ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-meta">
						<?php tempera_posted_on();
						echo "<span class=\"attach-size\">";
							if ( wp_attachment_is_image() ) {
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Full size is %s pixels', 'tempera'),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __('Link to full-size image', 'tempera') ),
										$metadata['width'],
										$metadata['height']
									)
								);
							}
						echo "</span>";
						cryout_post_meta_hook();
						?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<div class="entry-attachment">
<?php if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
						<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
							$attachment_size = apply_filters( 'tempera_attachment_size', 900 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
						?></a></p>

					<div class="entry-utility">
						<?php tempera_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'tempera' ), '<span class="edit-link"><i class="icon-edit"></i> ', '</span>' ); cryout_post_footer_hook(); ?>
					</div><!-- .entry-utility -->

				</div><!-- #post-## -->

<?php else : ?>
						<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo basename( esc_url( get_permalink() ) ); ?></a>
<?php endif; ?>
						</div><!-- .entry-attachment -->
						<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>

<?php the_content( __( 'Continue reading','tempera').' <span class="meta-nav">&rarr;</span>' ); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tempera' ), 'after' => '</div>' ) ); ?>

					</div><!-- .entry-content -->

						<div id="nav-below" class="navigation">
							<div class="nav-previous"><?php previous_image_link( false,'<i class="meta-nav-prev"></i>'.__("Previous image","tempera")); ?></div>
							<div class="nav-next"><?php next_image_link( false,__("Next image","tempera").'<i class="meta-nav-next"></i>' ); ?></div>
						</div><!-- #nav-below -->


<?php comments_template(); ?>

<?php endwhile; ?>



			</div><!-- #content -->
		</section><!-- #container -->

<?php get_footer(); ?>
