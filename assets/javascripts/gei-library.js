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
} )( jQuery );