(function( $ ) {

	var wHeight = $(window).height()

	function addClass(){
		$('body').addClass('aesop-scrollit--covered')
	}
	function removeClass(){
		$('body').removeClass('aesop-scrollit--covered')
	}

	$('.aesop-scrollit').each( function() {

		var $this = $(this)

		$this.imagesLoaded( function() {

			console.log('ready')
			console.log( wHeight )

			// set the height of teh container to that of the window
			$this.css({
				'height': wHeight
			})
			.find('.aesop-scrollit--content').css({
				'height': wHeight
			})

			var watch = scrollMonitor.create( $this, {top:-wHeight} );

			watch.enterViewport(function() {
			    console.log( 'I have entered the viewport' );
			    addClass()
			});

			$this.find('.aesop-scrollit--content').scroll( function() {

				if( $(this).scrollTop() >= ( $(this)[0].scrollHeight - $(this).outerHeight() ) ) {
				     removeClass()
				 }
			});

		})

	})


})( jQuery );