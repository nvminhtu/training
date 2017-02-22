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

/* 08- Get latest post with sticky */
add_shortcode('pickup_posts', 'pickup_posts_func');
function pickup_posts_func($atts) {
	extract(shortcode_atts(array(
     'title' => 'ジム入門！初心者特集',
     'sub_title' => 'これから開始される方へのアドバイス！',
     'number_post' => 1,
     'text_link' => 'ジム入門！初心者特集'
  	), $atts));

	$sticky = get_option( 'sticky_posts' );
	rsort( $sticky );

	/* Get the 5 newest stickies (change 5 for a different number) */
	$sticky = array_slice( $sticky, 0, $number_post );

	/* Query sticky posts */
	$the_query = new WP_Query( array(
			'post__in' => $sticky,
			'ignore_sticky_posts' => 1
		) );
	// The Loop
	if ( $the_query->have_posts() ) {

		$return .='<div class="list_navi list_navi01 clearfix">
		  	<dl>
		    <dt>'.$title.'<span>'.$sub_title.'</span></dt>';
				$return .= '<dd>';
				while ( $the_query->have_posts() ) {
					//get information
					$the_query->the_post();
					$time = get_the_date('Y.m.d', $post->ID);
			        $id = get_the_ID();
			        $author_id = $post->post_author;
			        $nicename = get_the_author_meta( 'user_nicename',$author_id);
			        $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
			        $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];

							//end information and return

							$img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_sidebar');
	            $img_blog_src = $img_blog[0];
							
					$return .='<dd><div class="list_latestpost_sb_img">
					        <p><a href="'.get_permalink().'">';

					if(has_post_thumbnail()) {
					    	$return .='<img src="'. $img_blog_src .'" alt="">';
					    } else {
					    	$return .='<img src="'.get_bloginfo('template_url').'/images/dummy60x60.jpg" alt="">';
					    }

					$return .='</a></p>
					      </div>
					      <div class="list_latestpost_sb_ct">
					        <p class="list_latestpost_sb_title"><a href="'.get_permalink().'">'.get_the_title().'</a></p>
					        <p class="list_latestpost_sb_info clearfix"><span class="nauther01">'.$nicename.'</span>'.do_shortcode('[post-views]').'</p>
					      </div></dd>';
		}
		$return .='</dl>
  		<p class="link01"><a href="'.get_bloginfo('siteurl').'/blogs/">'.$text_link.'</a></p>
</div>';
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	return $return;
}

/* 08- Get latest post with sticky */
add_shortcode('ranking_article', 'ranking_article_func');
function ranking_article_func($atts) {
	extract(shortcode_atts(array(
     'title' => 'アクセスランキング',
     'sub_title' => '最近投稿された記事の順位',
     'number_post' => 3,
     'text_link' => 'ランキングを見る'
  	), $atts));


	$return .='<div class="list_navi list_navi01 clearfix">
	  <dl>
	    <dt>'.$title.'<span>'.$sub_title.'</span></dt>';

	        global $post;
	        global $wp_query;

	        $args = array(
	          	'numberposts' => 3,
	          	'suppress_filters' => false,
				'orderby' => 'post_views',
				'fields' => ''
	        );
	        $blog_posts = get_posts($args);
	        if($blog_posts) {
	          $i=1;
	          foreach($blog_posts as $post) :
	            setup_postdata($post);
	            $time = get_the_date('Y.m.d', $post->ID);
	            $nd = get_the_content();
	            $id= get_the_ID();

	            $author_id = $post->post_author;
	            $nicename = get_the_author_meta( 'user_nicename' );
	            $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
	            $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];

	            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_sidebar');
	            $img_blog_src = $img_blog[0];

	    $return .='<dd>
	      <div class="list_latestpost_sb_img">
	        <p><a href="'.get_permalink().'">';

	          if(has_post_thumbnail()) {
					    	$return .='<img src="'. $img_blog_src .'" alt="">';
			    } else {
			    	$return .='<img src="'.get_bloginfo('template_url').'/images/dummy60x60.jpg" alt="">';
			    }
	            $return .='<span class="certi certi0'.$i.'">'.$i.'</span>
	          </a>
	        </p>
	      </div>
	      <div class="list_latestpost_sb_ct">
	        <p class="list_latestpost_sb_title"><a href="'.get_permalink().'">'.get_the_title().'</a></p>
	        <p class="list_latestpost_sb_info clearfix"><span class="nauther01">'.$nicename.'</span>'.do_shortcode('[post-views]').'</p>
	      </div>
	    </dd>';
	    	$i++;
	    endforeach;
	    wp_reset_query();
	    wp_reset_postdata();
	    }
	  $return .='</dl>
	  <p class="link01"><a href="'.get_bloginfo('siteurl').'/blogs">'.$text_link.'</a></p>
	</div>';

	return $return;
}

/* 09- Tag show shortcode */
add_shortcode('tag_show', 'tag_show_func');
function tag_show_func($atts) {
	extract(shortcode_atts(array(
	   'title'=> '話題のキーワード',
	   'sub_title' => '注目されている言葉',
       'order' => 'DESC',
       'text_link' => '他のキーワード'
  	), $atts));

	$return .= '<div class="list_navi clearfix">
      <dl>
        <dt>'.$title.'<span>'.$sub_title.'</span></dt>
        <dd>'.bwp_wp_tag_cloud().'</dd>
      </dl>
      <p class="link01"><a href="'.get_bloginfo('siteurl').'/tags/">他のキーワード</a></p>
    </div>';
    return $return;
}
function bwp_wp_tag_cloud($echo = false) {
	$args = array(
		'unit' => 'px',
		'smallest' => '12',
		'largest' => '12',
		'format' => 'list',
		'orderby' => 'count',
		'order' => 'DESC',
		'echo' => $echo
	);

	return wp_tag_cloud($args);
}
