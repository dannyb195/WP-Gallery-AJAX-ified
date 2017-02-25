<?php
/**
 * Plugin Name:     WP Gallery AJAX-ified
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     give-it-a-REST-gallery
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @todo Document usage, num_imgs_to_show specifically, fill out README, rename 'wpgalleryajaxified' to something better as I am not actually using the REST API at all
 *
 * @package         Give_It_A_REST_Gallery
 */

add_action( 'wp_enqueue_scripts', 'wpgalleryajaxified_scripts' );
function wpgalleryajaxified_scripts() {
	wp_enqueue_script( 'wpgalleryajaxified-js', plugin_dir_url( __FILE__ ) . 'assets/wpgalleryajaxified-js.js', array( 'jquery' ), '0.5', true );
	wp_localize_script( 'wpgalleryajaxified-js', 'ajaxdata', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'spinner' => apply_filters( 'wpgalleryajaxified_spinner', plugin_dir_url( __FILE__ ) . 'assets/img/spin.svg' ), // From http://loading.io/
		'spin_width' => apply_filters( 'wpgalleryajaxified_spin_width', 25 ),
		'spin_height' => apply_filters( 'wpgalleryajaxified_spin_height', 25 ),
	 ) );
}

require_once( 'inc/class-wpgalleryajaxified-gallery-filter.php' );
require_once( 'inc/class-wpgalleryajaxified-gallery-ajax-call.php');
