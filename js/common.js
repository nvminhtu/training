

$(document).ready(function() {
	"use strict";
	$('#totop').hover(function(){
		$(this).find('img').addClass('active');
	},function(){
		$(this).find('img').removeClass('active');
	});

});


//list_menu_sticky_header
$(window).bind("load",function(){
	"use strict";
	var h_window = $(window).height();
	var h_list_menu_sticky_header = h_window - 52;
	$('#btn_menu').click(function(){
		//fix bg outer dark
		//$("#bg_box_out").toggleClass('active');
		$("#bg_box_out").fadeToggle();		
		//nav-icon toggle class open
		$(this).find("#nav-icon").toggleClass('open');
		//list_menu_sticky_header toggle
		$("#nav_menu_sp").css("height",h_list_menu_sticky_header).stop(1,1).slideToggle(300);
});
});