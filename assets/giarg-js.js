jQuery( document ).ready( function( $ ) {

	$( '.giarg-load-more' ).on( 'click', function() {

		var next_imgs_to_show = $( this ).attr( 'data-imgs' );
		var imgs_to_show = $( this ).attr( 'data-imgs_to_show' );

		$.ajax( {
			url: ajaxurl.ajaxurl,
			type: 'GET',
			data: {
				'action': 'giarg_ajax',
				'imgs': next_imgs_to_show,
				'imgs_to_show': imgs_to_show,
			},
			success: function( data ) {

				var data = JSON.parse( data ),
					remaining_imgs = data.remaining_imgs;
					imgs_to_show = data.show_imgs;

				/**
				 * Updating images to show on next click
				 */
				$( '.giarg-load-more' ).attr( 'data-imgs', remaining_imgs );

				imgs_to_show.forEach( function( item, index ) {
					$( '.giarg-contain' ).append( item );
				} );

			},
			error: function( data ) {
				// console.log( data );
			},

		} );


	} );


} );
