<div class="list_c01 clearfix">
  <?php
    global $post;
    global $wp_query;
    global $numposts;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
      'posts_per_page' => 6,
      'orderby' => date,
      'order' => desc,
      'paged' => $paged
    );

    $the_query = new WP_Query( $args );
    $number_blogs = $wp_query->found_posts;

    $blog_posts = get_posts($args);
    if($blog_posts) {

    $i=1;
    foreach($blog_posts as $post) : setup_postdata($post);
      
      $thumb = get_post_thumbnail_id();
      $img_url = wp_get_attachment_url($thumb,'full');
      $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog');
      $img_blog_src = $img_blog[0];
      $img_archive_blog_src = $img_archive_blog[0];

      $time = get_the_date('Y.m.d', $post->ID);
      $nd = get_the_content();
      $id = get_the_ID();
      
      $author_id=$post->post_author;
      $nicename = get_the_author_meta( 'user_nicename' );
      $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
      $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];
    ?>
    <div class="col3 col clearfix">
      <div class="col_inner clearfix">
        <a href="<?php the_permalink(); ?>">
          <div class="plist_info clearfix">
            <p class="pimg01"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy01.jpg" alt=""><span><img src="<?php bloginfo('template_url'); ?>/images/icon_new01.png" alt=""></span></p>
            <div class="pl_bottom">
              <p class="pl_auther"><span><img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt="<?php echo $nicename; ?>"></span><?php echo $nicename; ?></p>
              <p class="pl_date"><?php echo $time; ?></p>
            </div>
          </div>
        </a>
        <p class="pl_title"><?php the_title(); ?></p>
      </div>
    </div>
    <?php $i++;
         endforeach;

        wp_reset_query();
      wp_reset_postdata();
    }
  ?>
</div>