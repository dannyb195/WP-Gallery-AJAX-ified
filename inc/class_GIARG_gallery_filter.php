<?php
/**
 *
 */

/**
 * undocumented class
 *
 * @package default
 * @author
 **/
class GIARG_Gallery_Filter {

	public function __construct() {
		add_filter( 'post_gallery', array( $this, 'gallery_filter' ), 10, 2 );
	}

	/**
	 * [gallery_filter description]
	 * @param  string $output    output string for gallery
	 * @param  array $atts       shortcode attributes
	 * @param  boolean $instance 0||1
	 * @return string            output string for gallery
	 */
	public function gallery_filter( $output, $atts ) {

		/**
		 * Moving our image IDs to an array so we can loop over them
		 */
		$img_ids_as_array = explode( ',', $atts['include'] );

		/**
		 * Checking if the columns of the gallery have been updated by the user
		 * WP defaults to 3
		 */
		$columns = isset( $atts['columns'] ) ? $atts['columns'] : '3';

		/**
		 * Checking if we have a user input to designate how many images to show / load at a time
		 * @var [type]
		 */
		$offset = isset( $atts['num_imgs_to_show'] ) ? intval( $atts['num_imgs_to_show'] ) : apply_filters( 'giarg_num_imgs_to_show', 5 );

		/**
		 * On initial load we are only showing these images
		 */
		$imgs_to_show = array_slice( $img_ids_as_array, 0, $offset, true );

		/**
		 * Building gallery output
		 */
		$output = '<div class="gallery gallery-columns-' . intval( $columns ) . ' giarg-contain">';

			foreach( $imgs_to_show as $img_id ) {

				$img_src = wp_get_attachment_image_src( intval( $img_id ), 'thumbnail' );

				if ( false != $img_src ) {
					$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
							$output .= '<a href="' . get_permalink( $img_id ) . '"><img width="' . $img_src[1] . '" height="' . $img_src[2] . '" src="' . esc_url( $img_src[0] ) . '" class="attachment-thumbnail size-thumbnail" alt=""></a>';
						$output .= '</div>';
					$output .= '</figure>';
				} // End if not false

			} // End foreach


		$output .= '</div><!-- End .gallery-contain -->';
		$output .= '<button class="giarg-load-more">' . esc_html__( 'Load More Images', 'give-it-a-REST-gallery' ) . '</button>';

		return $output;
	}

} // END class

new GIARG_Gallery_Filter();
