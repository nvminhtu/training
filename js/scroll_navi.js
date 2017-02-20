$(document).ready(function(e) {
    

	
$(function a($){
	//alert("min");
	//console.log($('#navi_social').position().top);
	var $target = $('#s_navi');
	//var offtet =  $('#navi_social').position();
	//var min = $('#navi_social').outerHeight() +$('#navi_social').offset().top;
//	var min = $('#navi_social').offset().top + 340;
var min = $('#s_navi').offset().top - 5;

	
//	var w_content = $("#content_blog").width()+50;
	var max = $('#footer').offset().top - 65 - $target.outerHeight() ;
	var top = $target.offset().top - min + 30;

	console.log(min);
	console.log($target.offset().top);
	var $dummy = $('<div/>').css({
		width: $target.outerWidth() + 'px',
		height: $target.outerHeight() + 'px'
	}).addClass("dummy_navi").insertAfter($target);
		$target.css({
		position: 'fixed',
		top: top,
		right: $target.offset().left
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
				
				$target.css({ top: top + 90 });
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


