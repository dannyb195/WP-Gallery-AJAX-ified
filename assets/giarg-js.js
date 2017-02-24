jQuery( document ).ready( function( $ ) {

	// alert( 'sdfsdf' );

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
				// console.log( 'success ' + data );


				var remaining_imgs = JSON.parse( data ),
					remaining_imgs = remaining_imgs.remaining_imgs;

				// console.log( remaining_imgs );


				// $( '.giarg-load-more' ).attr( 'data-imgs', remaining_imgs );

				$( '.giarg-load-more' ).attr( 'data-imgs', remaining_imgs );


			},
			error: function( data ) {
				// Possibly run .submit on the form here, need to look into project requirements more

				// console.log( data );
			},

		} );


	} );


} );
