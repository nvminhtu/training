

$(document).ready(function(){
 "use strict";
  
$('#slide_torejin').owlCarousel({
    loop:true,
    margin:25,
    autoplay: true,
	autoplayTimeout: 5000,
	autoplaySpeed: 600,
    responsive:{
        0:{
            items:2,
            nav:true
        },
		 320:{
            items:2,
            nav:true
        },
		414:{
            items:3,
            nav:true
        },
		480:{
            items:5,
			nav:true,
			touchDrag: true,
        },
		
        768:{
            items:6,
			nav:true,
			touchDrag: true,
        },
		950:{
            items:5,
			nav:true,
			touchDrag: true,
        },
		1200:{
            items:5,
			nav:true,
			touchDrag: true,
        },
        1400:{
            items:6,
            nav:true,
        }
    }
});

});