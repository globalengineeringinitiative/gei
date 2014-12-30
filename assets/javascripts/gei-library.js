( function( $ ) {
	var $container = $('#isotope');
	$container.isotope({
	  itemSelector: '.gei_resource',
	  layoutMode: 'vertical',
	});
	var filters = {};
	$('.btn').on( 'click', function() {
		var $this = $(this);
		var $prev = $this.parents().siblings().children('.btn-primary');
	  	var $buttonGroup = $this.parents('.button-group');
	  	var filterGroup = $buttonGroup.attr('data-filter-group');
	  	filters[ filterGroup ] = $this.attr('data-filter');
	  	var filterValue = '';
	  	for ( var prop in filters ) {
	    	filterValue += filters[ prop ];
	  	}
	  	$container.isotope({ filter: filterValue });
	  	$this.addClass('btn-primary').removeClass('btn-default');
	  	$prev.addClass('btn-default').removeClass('btn-primary');
	});
	$container.isotope( 'on', 'layoutComplete', function( isoInstance, laidOutItems ) {
    	if ( laidOutItems.length === 0 ) {
			$('#no-match').show();
		} else {
			$('#no-match').hide();
     	}
	});
	$('.show-filter').on( 'click', function(e) {
		e.preventDefault();
		var group = $(this).attr('id');
		$('[data-filter-group="'+group+'"]').toggleClass('active');
		$(this).toggleClass('active');
	});
} )( jQuery );