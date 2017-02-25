jQuery( document ).ready( function( $ ) {

	$( '.wpgalleryajaxified-load-more' ).on( 'click', function() {

		var next_imgs_to_show = $( this ).attr( 'data-imgs' );
		var imgs_to_show = $( this ).attr( 'data-imgs_to_show' );

		$.ajax( {
			url: ajaxdata.ajaxurl,
			type: 'GET',
			data: {
				'action': 'wpgalleryajaxified_ajax',
				'imgs': next_imgs_to_show,
				'imgs_to_show': imgs_to_show,
			},
			beforeSend: function() {
				$( 'button.wpgalleryajaxified-load-more' ).after( '<img class="wpgalleryajaxified-loading" height="' + ajaxdata.spin_height + '" width="' + ajaxdata.spin_width + '" src="' + ajaxdata.spinner + '" />' );
			},
			success: function( data ) {

				var data = JSON.parse( data ),
					remaining_imgs = data.remaining_imgs;
					imgs_to_show = data.show_imgs;

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
			    $( 'img.wpgalleryajaxified-loading' ).remove();
			},

		} ); // End ajax call

	} ); // End click function

} ); // End doc.ready
