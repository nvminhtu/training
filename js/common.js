
$(document).ready(function() {
	"use strict";
	$(".boxlink,.list_ct_traijing,.list_navi01 dd,.list_ct_article,.col_inner,.pickup_box").click(function(){
		 window.location=$(this).find("a").attr("href");
		return false;
	});
	// contact form 7: add more div
	$("<div class='check'></div>").insertAfter( ".wpcf7-list-item-label" );
	
	// link open in new tab
	$('a').each(function() {
   	   var a = new RegExp('/' + window.location.host + '/');
	   if(!a.test(this.href)) {
	       $(this).click(function(event) {
	           event.preventDefault();
	           event.stopPropagation();
	           window.open(this.href, '_blank');
	       });
	   }
	});

	$('.ct_article_detail a').each(function() {
   	   var a = new RegExp('/' + window.location.host + '/');
	   if(!a.test(this.href)) {
	       $(this).addClass('external');
	   }
	});

	/** $('.insta_img01').each(function() {
		var insta_h = $(this).find('img').data('height');
		if(insta_h < 289 ) {
			$(this).addClass('insta_h');	
		} else {
			$(this).addClass('lon hon');
		}
		
		
	}); */
	
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
		$("#nav_gmenu_sp").css("height",h_list_menu_sticky_header).stop(1,1).slideToggle(300);
});
});


$(window).bind("load",function(){
  "use strict";
  var $searchTrigger = $('[data-ic-class="search-trigger"]'),
      $searchInput = $('[data-ic-class="search-input"]'),
      $searchClear = $('[data-ic-class="search-clear"]');
  		$searchTrigger.on('click', function () {
		var $this = $('[data-ic-class="search-trigger"]');
		if($this.hasClass("active")){
			$this.removeClass('active');
		}
		else{
			$this.addClass('active');
			$searchInput.focus();
		}
  });
  
  $searchInput.blur(function(){
    if($searchInput.val().length > 0){
      return false;
    } else {
      
     
	 /* if($searchTrigger.hasClass("active")){
			$searchTrigger.removeClass('active');
		}
		else{
			$searchTrigger.addClass('active');
		}
     */
    }
    
  });
  
  $searchClear.click(function(){
    $searchInput.val('');
  });
  
  $searchInput.focus(function(){
    $searchTrigger.addClass('active');
  });
  
});