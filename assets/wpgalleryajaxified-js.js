jQuery( document ).ready( function( $ ) {

	$( '.wpgalleryajaxified-load-more' ).on( 'click', function() {

		var next_imgs_to_show = $( this ).attr( 'data-imgs' );
		var imgs_to_show = $( this ).attr( 'data-imgs_to_show' );

		$.ajax( {
			url: ajaxurl.ajaxurl,
			type: 'GET',
			data: {
				'action': 'wpgalleryajaxified_ajax',
				'imgs': next_imgs_to_show,
				'imgs_to_show': imgs_to_show,
			},
			success: function( data ) {

				var data = JSON.parse( data ),
					remaining_imgs = data.remaining_imgs;
					imgs_to_show = data.show_imgs;

				// $( 'button.wpgalleryajaxified-load-more' ).after( '<img class="wpgalleryajaxified-loading" src="' + ajaxurl.admin_url + '/images/spinner.gif" />' );

				/**
				 * Updating images to show on next click
				 */
				$( '.wpgalleryajaxified-load-more' ).attr( 'data-imgs', remaining_imgs );

				/**
				 * Appending images to our gallery
				 */
				imgs_to_show.forEach( function( item, index ) {
					$( '.wpgalleryajaxified-contain' ).append( item );
				} );

			},
			error: function( data ) {
			},
			complete: function() {

				/**
				 * Adding a slight delay here as sometimes this actually happens to fast
				 * and the user does not gt any feedback.
				 */
				setTimeout(function() {
				    $( 'img.wpgalleryajaxified-loading' ).remove();
				}, 200);
			},

		} ); // End ajax call

	} ); // End click function

} ); // End doc.ready
