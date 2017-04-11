
            	$(window).bind('load resize',function(){
					//	alert("a");
					var w_window = $(window).outerWidth();
					var ratio = 668/500;
					
					var w_box = $('#traijing_slider01 li').outerWidth();
				/*	$('#traijing_slider01 li span').each(function() {
						if($(this).width()>w_box)
                        w_box = $(this).width();
                    });*/
					var h_box = w_box*500/668;
					if(w_window<=1400){
						console.log("w_window<=1400");
						$('#traijing_slider01 li').css({"width": w_box});
						$('#traijing_slider01 li span').css({"height": h_box, "width": w_box});
						$('#tr_slider_out .bx-viewport').css({"height": h_box});
						
					}
					else{
						console.log("else");
						$('#traijing_slider01 li').css({"width": 668});
						$('#traijing_slider01 li span').css({"height": 500, "width": 668});
						$('#tr_slider_out .bx-viewport').css({"height": 500});
					}
				});
  