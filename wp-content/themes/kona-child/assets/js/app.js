if ($('.designers-index a').length) {
	$(document.body).on('click', function () {
		console.log('activated');
		$('.designers-section').removeClass('fade');
	});


	$('.designers-index a').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();

		$([document.documentElement, document.body]).animate({
			scrollTop: $($(this).attr('href')).offset().top - 210,
		}, 500);

		$('.designers-section').addClass('fade');
		$($(this).attr('href')).removeClass('fade');
	});
}