<?php
/**
 * undocumented class
 *
 * @package default
 * @author
 **/
class Giarg_Gallery_Ajax_Call {

	public function __construct() {
		add_action( 'wp_ajax_giarg_ajax', array( $this, 'giarg_ajax' ) );
		add_action( 'wp_ajax_nopriv_giarg_ajax', array( $this, 'giarg_ajax' ) );
	}

	public function giarg_ajax() {


		// echo "_GET\n<pre>";
		// print_r($_GET);
		// echo "</pre>\n\n";

		$imgs = explode( ',', $_GET['imgs'] );

		$return_imgs = array_slice( $imgs , 0, $_GET['imgs_to_show'] );

		// echo "return_imgs\n<pre>";
		// print_r($return_imgs);
		// echo "</pre>\n\n";

		$return = array(
			'remaining_imgs' => implode( ',', array_diff( $imgs, $return_imgs ) ),
			'show_imgs' => array(
				'img_1' => 'places holders for dom output',
				'img_2' => 'places holders for dom output',
			),
		);

		wp_send_json( json_encode( $return ) );

	}

} // END class

new Giarg_Gallery_Ajax_Call();
