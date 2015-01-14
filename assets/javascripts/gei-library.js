( function( $ ) {
    $('.filters li a').on( 'click', function() {
	    if ( $(this).hasClass('active') ) {
		    $(this).removeClass('active');
	    } else {
		    $(this).parent().parent().children().children('a').removeClass('active');
		    $(this).addClass('active');
	    }
	    var module = $('#module li a.active').attr('data-filter');
	    var skill = $('#skill li a.active').attr('data-filter');
	    var topic = $('#topic li a.active').attr('data-filter');
	    var $container = $('body.page-template-page-library #isotope');
	    $container.isotope({
			itemSelector: '.resource',
			layoutMode: 'vertical',
		});
		var load_posts = function() { $.ajax( {
				type		: "GET",
				data		: { module : module,  skill : skill, topic : topic, },
				dataType	: "html",
				url			: "http://"+window.location.host+"/wp-content/themes/gei/loop-handler.php",
				beforeSend	: function() {},
				success		: function( data ){
					var $data = $(data);
					$container.isotope( 'remove', $container.children() );
					$container.isotope( 'insert', $data );
					$container.isotope( 'layout' );
				},
				error : function( jqXHR, textStatus, errorThrown ) {
					window.console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
	        });
	    };
	    
	    load_posts();
	});
} )( jQuery );