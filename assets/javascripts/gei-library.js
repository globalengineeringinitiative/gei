( function( $ ) {
	var $parent = $('body.page-template-page-library #resources.container');
    var $container = $('body.page-template-page-library #isotope');
    var language = $container.attr('data-language');
    $container.isotope({
		itemSelector: '.resource',
		layoutMode: 'vertical',
	});
	var load_posts = function() {
	    var module = [];
	    $('#module li a.active').each( function() {
	    	module.push( $(this).attr('data-filter') );
	    });
	    var skill = [];
	    $('#skill li a.active').each( function() {
	    	skill.push( $(this).attr('data-filter') );
	    });
	    var topic = [];
	    $('#topic li a.active').each( function() {
	    	topic.push( $(this).attr('data-filter') );
	    });
	    var type = [];
	    $('#type li a.active').each( function() {
	    	type.push( $(this).attr('data-filter') );
	    });
		$.ajax( {
			type		: "GET",
			data		: { module : module,  skill : skill, topic : topic, type : type, language : language },
			dataType	: "html",
			url			: "https://"+window.location.host+"/wp-content/themes/gei/loop-handler.php",
			beforeSend	: function() {
				$parent.addClass('loading');
			},
			success		: function( data ){
				$parent.removeClass('loading');
				var $data = $(data);
				$container.isotope( 'remove', $container.children() );
				$container.isotope( 'insert', $data );
			},
			error : function( jqXHR, textStatus, errorThrown ) {
				window.console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
        });
    };
	load_posts();
    $('.filters li a').on( 'click', function() {
	    if ( $(this).hasClass('active') ) {
		    $(this).removeClass('active');
	    } else {
		    $(this).addClass('active');
	    }
	    load_posts();
	});
} )( jQuery );
