jQuery(document).ready(function(){
	// slick carousel 
	jQuery('.-new-items').slick({
	  infinite: true,
	  slidesToShow: 5,
	  slidesToScroll: 2,
	  dots: true,
	  prevArrow:"<div class='carousel-prev'></div>",
	  nextArrow:"<div class='carousel-next'></div>",
	  responsive: [
	      {
	        breakpoint: 1024,
	        settings: {
	          slidesToShow: 3,
	          slidesToScroll: 3,
	          infinite: true,
	          dots: true
	        }
	      },
	      {
	        breakpoint: 600,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 2
	        }
	      }
	    ]
	});

	jQuery('.-must-hv-items').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  dots: true,
	  prevArrow:"<div class='carousel-prev v-half'></div>",
	  nextArrow:"<div class='carousel-next v-half'></div>",
	});

	// END slick carousel 


	// Navigation
	jQuery(window).resize(function() {
	    jQuery('#header').css("margin-top", jQuery(".top-nav").height());
	}).resize();



	// END Navigation

});