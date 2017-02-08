<?php
/***
*** @shortcode for displaying list of blogs
***/
add_shortcode('member_blog', 'shortcode_member_blog');
function shortcode_member_blog($atts) {
  extract(shortcode_atts(array(
     'member_name' => ''
  ), $atts));
	$content_shortcode = '<h3 class="title_lblog">'.get_the_title().'が書いた記事一覧</h3>';
	$content_shortcode .= '<div class="box_archive_blog clearfix">';
  global $post;
  global $wp_query;
  global $numposts;

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
    'post_type' =>'blog',
    'author_name' => $member_name,
    'posts_per_page' => -1,
    'orderby' => date,
    'order' => desc,
    'field' => 'slug',
    'paged' => $paged
  );

  $the_query = new WP_Query( $args );
  $number_blogs = $wp_query->found_posts;

  $blog_posts = get_posts($args);
  if($blog_posts) {

  $i=1;
  foreach($blog_posts as $post) : setup_postdata($post);
    // get the term <blog-cat> of the post ID
    $terms = get_the_terms( get_the_ID(), 'blog-cat' );
    if ( $terms && ! is_wp_error( $terms ) ) :
      $selectTermID = $terms[0]->term_id;
    endif;
    $selectTermID;
    $get_term_id = 'blog-cat_'.$selectTermID;

    $term_color_code = get_field('color_code', $get_term_id);
    $term_color_codes = explode("#", $term_color_code);
    $color_class = 'blog-cat-'.$term_color_codes[1];

    $thumb = get_post_thumbnail_id();
    $img_url = wp_get_attachment_url($thumb,'full');
    $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog');
    $img_archive_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_archive_blog');
    $img_blog_src = $img_blog[0];
    $img_archive_blog_src = $img_archive_blog[0];

    $time = get_the_date('Y.m.d', $post->ID);
    $nd = get_the_content();
    $id= get_the_ID();
    $check_new_for_blog = get_post_meta($post->ID, 'check_new_for_blog',true);

    $content_shortcode .= '<div class="'.$color_class.' heightLine-01 bloglist_box01 box_link" data-color-code="'.$term_color_code.'">';
      $content_shortcode .= '<div class="blog_img">';
        $content_shortcode .= '<a href="'.get_permalink().'">';
          if (!empty($check_new_for_blog)){
            $content_shortcode .= '<span class="blog_inew"><span>NEW!</span></span>';
          }
            $content_shortcode .= '<img src="'.$img_archive_blog_src.'" alt="'.get_the_title().'">';
            $content_shortcode .= '<span class="blog_time">'.$time.'</span>';
        $content_shortcode .= '</a>';
      $content_shortcode .= '</div>';
      $content_shortcode .= '<div class="blog_idx_info">';
      $content_shortcode .= '<p class="blog_title">'.get_the_title().'</p>';
        $content_shortcode .= '<div class="blog_list_n blog_cate_list">';

            // 01. Load Cats of Blog
            $terms = wp_get_post_terms($post->ID, 'blog-cat', '');
            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                 $content_shortcode .= '<ul class="blog_list_tag clearfix">';
                 foreach ( $terms as $term ) {
                   $content_shortcode .= '<li><a href="'.get_term_link($term).'">'. $term->name .'</a></li>';
                 }
                 $content_shortcode .= '</ul>';
             }

        $content_shortcode .= '</div>';
        $content_shortcode .= '<div class="blog_list_n blog_tag_list">';

          // 02. Load Tags
          if(has_tag()) {
            //the_tags( '<ul class="blog_list_tag clearfix"><li>', '</li><li>', '</li></ul>' );
            $content_shortcode .= '<ul class="blog_list_tag clearfix">';
            $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
               $content_shortcode .= '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</li>';
              }
            }
            $content_shortcode .= '</ul>';

          } else {
          $content_shortcode .= '<ul class="blog_list_tag clearfix">';
            $content_shortcode .= '<li></li>';
          $content_shortcode .= '</ul>';
          }

        $content_shortcode .= '</div>';
      $content_shortcode .= '</div>';
    $content_shortcode .= '</div>';

      $i++;
      endforeach;

        wp_reset_query();
      wp_reset_postdata();
    }

  $content_shortcode .= '<!--end blog list--></div>';
  $content_shortcode .= '<p class="btn btn01 btn_hblue btn_mw500"><a id="more_blog" href="javascript:void(0)"><span>もっと見る</span></a></p>';

   return $content_shortcode;
 }
