<div class="list_navi list_navi01 clearfix">
  <dl>
    <dt>アクセスランキング<span>最近投稿された記事の順位</span></dt>
    <?php 
        global $post;
        global $wp_query;

        $args = array(
          'numberposts' => 3,
          'orderby' => date,
          'order' => desc,
          'field' => 'slug'
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
          ?>
    <dd>
      <div class="list_latestpost_sb_img">
        <p>
          <a href="#">
            <?php if(has_post_thumbnail()) { ?>
              <img src="<?php echo $img_blog_src; ?>" width="60" height="60" alt="<?php the_title(); ?>">
            <?php } else { ?>
              <img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" width="60" height="60" alt="<?php the_title(); ?>">
            <?php } ?>
            <span class="certi certi01">1</span>
          </a>
        </p>
      </div>
      <div class="list_latestpost_sb_ct">
        <p class="list_latestpost_sb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <p class="list_latestpost_sb_info clearfix"><span class="nauther01"><?php echo $nicename; ?></span><span class="nview">66,539</span></p>
      </div>
    </dd>
    <?php $i++;
    endforeach;
    wp_reset_query();
    wp_reset_postdata(); 
    } 
  ?>
  </dl>
  <p class="link01"><a href="#">ランキングを見る</a></p>
</div>
