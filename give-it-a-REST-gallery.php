<?php
/**
 * Plugin Name:     Give It A REST Gallery
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     give-it-a-REST-gallery
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @todo Document usage, num_imgs_to_show specifically, fill out README, rename 'giarg' to something better as I am not actually using the REST API at all
 *
 * @package         Give_It_A_REST_Gallery
 */

add_action( 'wp_enqueue_scripts', 'giarg_scripts' );
function giarg_scripts() {
	wp_enqueue_script( 'giarg-js', plugin_dir_url( __FILE__ ) . 'assets/giarg-js.js', array( 'jquery' ), '0.5', true );
	wp_localize_script( 'giarg-js', 'ajaxurl', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

require_once( 'inc/class-giarg-gallery-filter.php' );
require_once( 'inc/class-giarg-gallery-ajax-call.php');
