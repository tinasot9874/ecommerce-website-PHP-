$(document).ready( function() {
	// init Isotope
	var $grid = $('.masonry-grid-post').isotope({
		itemSelector: '.masonry-item',
		layoutMode: 'fitRows',
		getSortData: {
			price: '.price-sort-product parseInt'
			//category: '[data-category]',
		}
	});
	$('#price-sort').on( 'change', function() {
		var type = $(this).find(':selected').attr('data-sorttype');
		console.log(type);
		var sortValue = this.value;
		if(type=='ass'){
			$grid.isotope({ sortBy: sortValue , sortAscending: false});
		}
		else{
			$grid.isotope({ sortBy: sortValue , sortAscending: true});
		}
		$grid.isotope({ sortBy: sortValue });
	});
	// change is-checked class on buttons
	$('#price-sort').on( 'change', function() {
		var sortByValue = this.value;
		console.log(sortByValue);
		$grid.isotope({ sortBy: sortByValue});
	});

	$('.masonry-filter').on( 'click', 'a', function() {
		var filterValue = $( this ).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});

	$('.masonry-filter').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'a', function() {
			$buttonGroup.find('.active').removeClass('active');
			$( this ).addClass('active');
		});
	});

});





