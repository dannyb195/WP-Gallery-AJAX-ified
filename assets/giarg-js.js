jQuery( document ).ready( function( $ ) {

	// alert( 'sdfsdf' );

	$( '.giarg-load-more' ).on( 'click', function() {
		// $( '.giarg-contain' ).append( 'dfsgdsfg' );

		$.ajax( {
			url: ajaxurl.ajaxurl,
			type: 'GET',
			data: {
				'action': 'giarg_ajax',
			},
			success: function( data ) {

				// $( 'span.loading' ).html( 'Created ' + data.data.length + ' Posts' );

				// var posts = data.data;
				// posts.forEach( function( item, index ) {
				// 	$( '.dans_prefix_options' ).append( 'Post created with ID of: ' + item + '</br>' );
				// } );

				// alert( data );

				console.log( 'success ' + data );

			},
			error: function( data ) {
				// Possibly run .submit on the form here, need to look into project requirements more

				// console.log( data );
			},

		} );


	} );


} );
