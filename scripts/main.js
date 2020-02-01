$(document).ready(function() {
	$('#opinion-carousel').owlCarousel({
		items: 1,
		margin: 10,
		loop: true,
		dots: true,
		dotsEach: true,
		autoplay: true,
		autoplayTimeout: 3400,
		autoplayHoverPause: true,
		animateIn: 'slideInZoom',
	});
	$('#posts-carousel').owlCarousel({
		margin: 10,
		loop: true,
		dots: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				autoplay: true,
				autoplayTimeout: 3400,
				autoplayHoverPause: true,
			},
			768: {
				items: 3,
			},
		},
	});
});
