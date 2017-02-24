<?php
/**
 * undocumented class
 *
 * @package default
 * @author
 **/
class Giarg_Gallery_Ajax_Call {

	/**
	 * Our construct
	 */
	public function __construct() {
		add_action( 'wp_ajax_giarg_ajax', array( $this, 'giarg_ajax' ) );
		add_action( 'wp_ajax_nopriv_giarg_ajax', array( $this, 'giarg_ajax' ) );
	}

	/**
	 * [giarg_ajax description]
	 * @return string JSON response
	 */
	public function giarg_ajax() {

		/**
		 * All current image ids at the time of click of button.giarg-load-more via data-imgs
		 * @var [type]
		 */
		$imgs = explode( ',', $_GET['imgs'] );

		/**
		 * Images that will be shown on the next click after the click that just happened
		 * this value updates the data-imgs of button.giarg-load-more
		 * @var array
		 */
		$return_imgs = array_slice( $imgs , 0, $_GET['imgs_to_show'] );


		/**
		 * For each image that we should show on click, here we will build its HTML output
		 * @var array
		 */
		$show_imgs = array();
		foreach ($return_imgs as $img_id ) {

			$img_src = wp_get_attachment_image_src( intval( $img_id ), 'thumbnail' );

			/**
			 * @todo move this DOM output to a template part as it is a direct copy/paste of what is in class-giarg-gallery-filter.php
			 * @var string
			 */
			$output = '<figure class="gallery-item">';
				$output .= '<div class="gallery-icon landscape">';
					$output .= '<a href="' . get_permalink( $img_id ) . '"><img width="' . esc_attr( $img_src[1] ) . '" height="' . esc_attr( $img_src[2] ) . '" src="' . esc_url( $img_src[0] ) . '" class="attachment-thumbnail size-thumbnail" alt=""></a>';
				$output .= '</div>';
			$output .= '</figure>';

			$show_imgs[] = $output;
		}

		/**
		 * Building our array to return to our AJAX call
		 * @var array
		 */

		wp_send_json( json_encode( array(
			'remaining_imgs' => implode( ',', array_diff( $imgs, $return_imgs ) ),
			'show_imgs' => $show_imgs,
		) ) );

	} // End giarg_ajax

} // END class

new Giarg_Gallery_Ajax_Call();
