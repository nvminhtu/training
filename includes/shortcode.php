<?php
/* 01. Template directory */
add_shortcode('tmpurl', 'shortcode_tmpurl');
function shortcode_tmpurl() {
	return get_bloginfo('template_url');
}

/* 02. Top page URL */
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
	return get_bloginfo('url');
}

/* 05- Twitter	*/
add_shortcode('twitter', 'shortcode_twitter');
function shortcode_twitter() {
	$content_shortcode = '';
	$content_shortcode .= '<div class="twitter_quote clearfix"><p><img src="'.get_bloginfo('template_url').'/images/twitter_quote_img.jpg" alt="" /></p></div>';
	return $content_shortcode;
}

/* 06- Instagram Quote 1	*/
add_shortcode('instagram_quote_1', 'shortcode_instagram_quote_1');
function shortcode_instagram_quote_1() {
	$content_shortcode = '';
	$content_shortcode .= '<div class="instagram_quote01 clearfix"><p><img src="'.get_bloginfo('template_url').'/images/instagram_quote01_img.jpg" alt="" /></p></div>';
	return $content_shortcode;
}

/* 07- Instagram Quote 2	*/
add_shortcode('instagram_quote_2', 'shortcode_instagram_quote_2');
function shortcode_instagram_quote_2() {
	$content_shortcode = '';
	$content_shortcode .= '<div class="instagram_quote02 clearfix"><p><img src="'.get_bloginfo('template_url').'/images/instagram_quote02_img.jpg" alt="" /></p></div>';
	return $content_shortcode;
}

?>
