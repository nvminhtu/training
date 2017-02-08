<?php
/***
*** @shortcode for displaying list of member information
***/
add_shortcode('member_info', 'shortcode_member_info');
function shortcode_member_info($atts) {
  extract(shortcode_atts(array(
     'member_name' => '',
     'member_blog' => ''
  ), $atts));

  $content_shortcode =  '';
  $user = get_user_by('login',$member_name);
  $user_id = $user->ID;
  $user_info = get_userdata($user_id);
  $user_description = $user_info->description;
  $nickname = $user_info->nickname;
  $first_name = $user_info->first_name;
  $last_name = $user_info->last_name;
  $member_picture = get_field('member_picture', 'user_'. $user_id);
  $member_jp_name = get_field('member_jp_name', 'user_'. $user_id);
  $user_position = get_field('user_position', 'user_'. $user_id);
  $user_facebook_link = get_field('facebook_profile_link', 'user_'. $user_id);
  $user_twitter_link = get_field('twitter_profile_link', 'user_'. $user_id);
  $user_instagram_link = get_field('instagram_profile_link', 'user_'. $user_id);
  $user_blog_link = get_field('blog_link', 'user_'. $user_id);
  $user_blog_name = get_field('blog_name', 'user_'. $user_id);
  $slug_member_blog = str_replace(' ', '', $member_jp_name);

  $content_shortcode .= '<div class="box_member clearfix">
      <div id="'.$slug_member_blog.'" class="member_info clearfix">
        <div class="img_member01">';
        $content_shortcode .= '<p><img src="'.$member_picture.'" alt="'.$member_jp_name.'" /></p>';
        $content_shortcode .= '</div>';
          $content_shortcode .= '<div class="member_information">';
            $content_shortcode .= '<p class="name_member_title_jp">'.$member_jp_name.'</p>';
          $content_shortcode .= '<p class="name_member_title_en">'.$nickname.'</p>';
          $content_shortcode .= '<p class="position_member">'.$user_position.'</p>';
          $content_shortcode .= '<ul class="list_social_member">';
            $content_shortcode .= '<li><a href="'.$user_facebook_link.'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/icon_fb02.png" alt="" /></a></li>';
            $content_shortcode .= '<li><a href="'.$user_twitter_link.'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/icon_tw02.png" alt="" /></a></li>';
            $content_shortcode .= '<li><a href="'.$user_instagram_link.'" target="_blank"><img src="'.get_bloginfo('template_url').'/images/icon_ins02.png" alt="" /></a></li>';
          $content_shortcode .= '</ul>';
          $content_shortcode .= '<p class="link_out_member"><a href="'.$user_blog_link.'" target="_blank">'.$user_blog_name.'</a></p>';
        $content_shortcode .= '</div>';
        $content_shortcode .= '<div class="member_des">';
          $content_shortcode .= '<p>'.$user_description.'</p>';
        $content_shortcode .= '</div>';
      $content_shortcode .= '</div>';
      $content_shortcode .= '<div class="member_blog_list clearfix">
        <p class="title_member_blog">この人が書いた記事</p>';

          $args = array(
            'author_name' => $member_name,
            'post_type' =>'blog',
            'posts_per_page' => 3,
            'orderby' => date,
            'order' => desc
          );

          $the_query = new WP_Query($args);
          // The Loop
          if ( $the_query->have_posts() ) {
            $content_shortcode .= '<ul>';
            while ( $the_query->have_posts() ) {
              $the_query->the_post();
              $img_blog_thanks = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_thanks');
              $img_blog_src = $img_blog_thanks[0];

              $content_shortcode .= '<div class="member_blog clearfix">';
                $content_shortcode .= '<div class="member_blog_img">';
                  $content_shortcode .= '<p><a href="'.get_permalink().'"><img src="'.$img_blog_src.'"></a></p>';
                $content_shortcode .= '</div>';
                $content_shortcode .= '<div class="member_blog_ct">';
                  $content_shortcode .= '<p class="member_blog_date">'.get_the_date('Y.m.d', $post->ID).'</p>';
                  $content_shortcode .= '<p class="member_blog_title"> <a href="'.get_permalink().'">'.get_the_title().'</a></p>';
                $content_shortcode .= '</div>';
              $content_shortcode .= '</div>';

            }
            $content_shortcode .= '</ul>';
            /* Restore original Post Data */
            wp_reset_postdata();
          } else {
            // no posts found
          }

      $content_shortcode .= '</div>';
      $content_shortcode .= '<p class="btn btn01 btn_hblue btn_mw260"><a href="'.$member_blog.'"><span>もっと見る</span></a></p>';
    $content_shortcode .= '</div>';

   return $content_shortcode;
 }
