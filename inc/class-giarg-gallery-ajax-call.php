<?php
/**
 * undocumented class
 *
 * @package default
 * @author
 **/
class Giarg_Gallery_Ajax_Call {

	public function __construct() {

		echo 'construct';

		add_action( 'wp_ajax_giarg_ajax', array( $this, 'giarg_ajax' ) );
		add_action( 'wp_ajax_nopriv_giarg_ajax', array( $this, 'giarg_ajax' ) );
	}

	public function giarg_ajax() {


		echo "_GET\n<pre>";
		print_r($_GET);
		echo "</pre>\n\n";

		echo 'something';

		die();

	}

} // END class

new Giarg_Gallery_Ajax_Call();
