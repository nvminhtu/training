$(document).ready(function(e) {
    

	
$(function a($){
	
	var $target = $('#s_navi');
	var min, top, rightTarget; 

	if( $('#s_navi').length ) {
	    min = $('#s_navi').offset().top - 5;
	} else {
		min = 0;
	}

	var max = $('#footer').offset().top - 65 - $target.outerHeight() ;
	
	if( $target.length ) {
	    top = $target.offset().top - min + 30;
	    rightTarget = $target.offset().left;
	} else {
		top = 0;
	}
	
	var $dummy = $('<div/>').css({
		width: $target.outerWidth() + 'px',
		height: $target.outerHeight() + 'px'
	}).addClass("dummy_navi").insertAfter($target);
		$target.css({
		position: 'fixed',
		top: top,
		right: rightTarget
	});

	var timer;
	var dest;
	var scrollTop;
	var s_h_menu;
	var callback = function(){
		var top_sticky_menu_header = $("#main").offset().top;
		if ($(this).scrollTop() > top_sticky_menu_header - 99) {
			s_h_menu = 0;
		}
		else{
			s_h_menu = 0;
		}
		if($(window).width()>950){
			
			$target.css({right:"inherit"});
			$target.css({left:$dummy.offset().left});
		}
		else{
			$target.css({right:"3%"});
			$target.css({left:"auto"});
		}
		
		if( scrollTop != $(window).scrollTop() ) {
			$target.stop();
			if( min  > $(window).scrollTop()+ 80 ){
				$target.css({ top: top + min - $(window).scrollTop() - 20 });
			} else if( max < $(window).scrollTop()+ 80 ){
				$target.css({ top: top + max - $(window).scrollTop() });
			} else {
				
				$target.css({ top: top + 50 });
				var sub = scrollTop - $(window).scrollTop();
				sub = sub < 0
						? Math.max( sub, -30 )
						: Math.min( sub, 30 );

			}
			scrollTop = $(window).scrollTop();
		}
	};
	

	
	$(window).bind('scroll resize', callback);
	callback();



	$(window).resize(function() {
		a();
	});



})

});


