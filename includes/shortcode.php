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

/* 08- Author Information	*/
add_shortcode('author_info', 'shortcode_author_info');
function shortcode_author_info() {
	$content_shortcode = '';
	$content_shortcode .= '<div class="person_box clearfix">
	 <p class="ptitle_01">記事を書いたひと</p>
	 <div class="img_person clearfix">
				<p><img src="'.get_bloginfo('template_url').'/images/person_img.jpg" alt="" /></p>
			</div>
			<div class="info_person clearfix">
				<p class="person_name">もりし</p>
					<p class="person_positon">代表取締役 CEO</p>
			</div>
			<p class="person_des">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
	</div>';
	return $content_shortcode;
}

/* 09- Blog Sidebar Shortcode - show 4 categories has most posts	*/
add_shortcode('blog-cat-list', 'shortcode_blog_cat_list');
function shortcode_blog_cat_list() {
		$content_shortcode = '';
		$content_shortcode .= '<dl>';
			$content_shortcode .= '<dt>BLOG</dt>';
			$content_shortcode .= '<dd>';
					$terms = get_terms( 'blog-cat', array( 'orderby' => 'count', 'hide_empty' => 0, 'order' => 'DESC'));
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						$content_shortcode .= '<ul>';
						$i = 0;
						foreach ( $terms as $term ) {
								if($i < 4) {
									$content_shortcode .= '<li><a href="'.get_term_link($term).'">' . $term->name . '</a></li>';
								}
								$i++;
						}
						$content_shortcode .= '</ul>';
					}
			$content_shortcode .= '</dd>';
		$content_shortcode .= '</dl>';
		return $content_shortcode;
}
?>
