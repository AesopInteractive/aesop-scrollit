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
				'height': wHeight - 100,
				'position': 'relative',
				'top'	: 50
			})

			var watch = scrollMonitor.create( $this, {top:-wHeight} );

			watch.enterViewport(function() {
			    console.log( 'I have entered the viewport' );
			    addClass()
			});


        	// Save a reference to the element
        	var img = $this.find('.aesop-scrollit--img')

        	img.css({
				'height': wHeight + 200
			})

			$this.find('.aesop-scrollit--content').scroll( function() {

		        var scrollTop = $(this).scrollTop();
        	        var offset = 0;
        	        var height = $(this)[0].scrollHeight;

				var yBgPosition = Math.round((offset - scrollTop) * 0.1);

    			img.css({'transform':'translate3d(0px,' + yBgPosition + 'px, 0px)'});

				if( $(this).scrollTop() >= ( $(this)[0].scrollHeight - $(this).outerHeight() ) ) {
				    removeClass()
				}
			});

		})

	})


})( jQuery );