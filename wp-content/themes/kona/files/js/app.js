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
	  dots: false,
	  prevArrow:"<div class='carousel-prev v-half'></div>",
	  nextArrow:"<div class='carousel-next v-half'></div>",
	});

	// END slick carousel 


	// Navigation
	jQuery(window).resize(function() {
	    jQuery('#header').css("margin-top", jQuery(".top-nav").height());
	}).resize();
	// END Navigation


	//equal height
	jQuery.fn.equalHeights = function(){
		var max_height = 0;
		jQuery(this).each(function(){
			max_height = Math.max(jQuery(this).height(), max_height);
		});
		jQuery(this).each(function(){
			jQuery(this).height(max_height);
		});
	};

	setTimeout(function(){ 
		jQuery('.single-items--des').equalHeights();
	}, 333);

	// END equal height

	// Overlay Banner
	if(jQuery('.banner-desc__small').find('.overlay').length !== 0){
		jQuery('.banner-desc__small').css('width','70%');
		jQuery('.banner-desc__small').find('.overlay').css('width','100%');
	}
	// END Overlay Banner

});


// login page overlapping 

jQuery(document).ready(function(){

	if(jQuery('#username').length > 0 ){
		jQuery('.woocommerce-form-row').addClass('has-val');
		console.log('has-val');
	}

	if(jQuery('#password').length > 0 ){
		jQuery('.woocommerce-form-row').addClass('has-val');
		console.log('has-val');
	}

});

// END login page overlapping

jQuery(document).ready(function(){

//designer page :: added active 
jQuery('.designers-index a').on('click', function(){
	jQuery('.designers-index a').removeClass('active');
	jQuery(this).toggleClass('active');

})

// END designer page :: added active

});