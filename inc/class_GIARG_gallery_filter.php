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

		$img_ids_as_array = explode( ',', $atts['include'] );

		$output = '<div class="gallery gallery-columns-3 giarg-contain">';
			foreach( $img_ids_as_array as $img_id ) {
				$output .= '<figure class="gallery-item">';
					$output .= '<div class="gallery-icon landscape">';
						$output .= '<a href="http://vanilla-php.dev/dsc20040724_152504_532-jpg/"><img width="150" height="150" src="http://vanilla-php.dev/wp-content/uploads/2017/02/dsc20040724_152504_532-150x150.jpg" class="attachment-thumbnail size-thumbnail" alt=""></a>';
					$output .= '</div>';
				$output .= '</figure>';
			}
		$output .= '</div><!-- End .gallery-contain -->';

		return $output;
	}

} // END class

new GIARG_Gallery_Filter();
