<?php
/* 01- Search Box	*/
add_shortcode('search_box', 'search_box');
function search_box() {
	$content_shortcode = '';
  $content_shortcode .= '<div class="search_navi clearfix">';
    $content_shortcode .= '<div class="search_navi_ct">';
      $content_shortcode .= '<form role="search" method="get" id="searchform" class="searchform" action="'.home_url( '/' ).'">';
        $content_shortcode .= '<div>';
          $content_shortcode .= '<input type="text" placeholder="キーワードで検索" value="" name="s" id="s">';
          $content_shortcode .= '<input type="submit" id="searchsubmit" value="検索">';
        $content_shortcode .= '</div>';
      $content_shortcode .= '</form>';
    $content_shortcode .= '</div>';
  $content_shortcode .= '</div>';

  return $content_shortcode;
}

/* 02- Blog Categories List	*/
add_shortcode('categories_list', 'categories_list');
function categories_list() {
	$content_shortcode = '';
  $content_shortcode .= '<dl class="sidebar_list sidbar_list_cate">';
    $content_shortcode .= '<dt>他記事のカテゴリ</dt>';
    $content_shortcode .= '<dd>';
      $terms = get_terms("blog-cat");
      if ( !empty( $terms ) && !is_wp_error( $terms ) ){
           $content_shortcode .= '<ul>';
           foreach ( $terms as $term ) {
             $content_shortcode .= '<li><a href="'.get_term_link($term).'">'. $term->name .'</a></li>';
           }
           $content_shortcode .= '</ul>';
       }
    $content_shortcode .= '</dd>';
  $content_shortcode .= '</dl>';

  return $content_shortcode;
}

/* 03- Related Posts Sidebar	*/
add_shortcode('sb_related_posts', 'sb_related_posts');
function sb_related_posts($atts) {

  extract(shortcode_atts(array(
     'number_posts' => 3
  ), $atts));

	$content_shortcode = '';

  $content_shortcode .= '<dl class="sidebar_list sidbar_list_post">';
    $content_shortcode .= '<dt>関連記事（他の人気記事）</dt>';
       //load related blogs for this blog
        global $post;
	      $postID=$post->ID;
        $args = array(
  				'post_type' => 'blog',
  				'post__not_in' => array($postID),
  				'posts_per_page' => $number_posts,
  				'orderby' => date,
  				'order' => desc,
  				'field' => 'slug'
    		);
        $query = new WP_Query( $args );
	// The Loop
 	if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
					global $post;
					$query->the_post();
					$time = get_the_date('Y.m.d', $post->ID);
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image
					$img_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_sidebar'); //get full URL to image

          $content_shortcode .= '<dd>';
            $content_shortcode .= '<div class="list_latestpost_sb_img">';
              $content_shortcode .= '<p>';
                $content_shortcode .= '<a href="'.get_permalink().'">';
                  if ( has_post_thumbnail() ) {
                    $content_shortcode .= '<img src="'.$img_thumb[0].'" alt="'.get_the_title().'" />';
                  } else {
                    $content_shortcode .= '<img src="'.get_bloginfo('template_url').'/images/navi_list_blogimg01.jpg">';
                  }
                $content_shortcode .= '</a>';
              $content_shortcode .= '</p>';
            $content_shortcode .= '</div>';
            $content_shortcode .= '<div class="list_latestpost_sb_ct">';
              $content_shortcode .= '<p class="list_latestpost_sb_date">'.$time.'</p>';
              $content_shortcode .= '<p class="list_latestpost_sb_title"><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
            $content_shortcode .= '</div>';
          $content_shortcode .= '</dd>';

          	 }
          }
      		/* Restore original Post Data */
      		wp_reset_query();
          wp_reset_postdata();

  $content_shortcode .= '</dl>';
  $content_shortcode .= '<div class="view_blog btn01 btn_hblue"><a href="'.get_bloginfo('siteurl').'/blog/"><span>一覧はこちら</span></a></div>';

  return $content_shortcode;
}
