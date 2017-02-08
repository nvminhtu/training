(function($){
	$(function(){
		$('a[href^="#"]').click(function(){
			if ( $( $(this).attr('href') ).length ) {
				var p = $( $(this).attr('href') ).offset();
				$('html,body').animate({ scrollTop: p.top - 73 }, 600);
			}
			return false;
		});
	});
})(jQuery);



