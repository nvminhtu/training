<div id="idx_ct01" class="clearfix">
  <div class="inner clearfix">
    <div class="content content01 clearfix">
      <!-- 01.banner management -->
      <?php
        $banner_top_title = get_field( 'banner_top_title','option');
        $banner_picture_upload = get_field( 'banner_picture_upload','option');
        $banner_picture_url = get_field( 'homepage_banner_link','option');

        if( $banner_top_title ) { ?>
          <div class="topic_path clearfix">
            <ul>
              <li><?php echo $banner_top_title; ?></li>
            </ul>
          </div>
        <?php }
        if( $banner_picture_upload ) { ?>
          <div class="ct_bnr01">
            <p><a href="<?php echo $banner_picture_url; ?>"><img src="<?php echo $banner_picture_upload; ?>" alt=""></a></p>
          </div>
        <?php }
      ?>
      <!-- end 01.banner management -->

      <!-- 02.loop posts -->
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
            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_index');
            $img_blog_src = $img_blog[0];
            $img_archive_blog_src = $img_archive_blog[0];

            $time = get_the_date('Y.m.d', $post->ID);
            $nd = get_the_content();
            $id = get_the_ID();

            $author_id = $post->post_author;
            $nicename = get_the_author_meta( 'user_nicename' );
            $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
            $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];

            $d1 = new DateTime( get_the_date('Y-m-d', $post->ID));
            $d2 = new DateTime(date('Y-m-d'));
            $interval = $d1->diff($d2);
            $diff = $interval->format('%a');

          ?>
          <div class="col3 col clearfix">
            <div class="col_inner clearfix">

                <div class="plist_info clearfix">
                  <p class="pimg01">
                    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { ?>
                      <img src="<?php echo $img_blog_src; ?>" alt="<?php the_title(); ?>">
                    <?php } else { ?>
                      <img src="<?php bloginfo('template_url'); ?>/images/dummy323x200.jpg" alt="<?php the_title(); ?>">
                    <?php } ?>
                    </a>
                    <?php if($diff<3){ ?>
                      <span><img src="<?php bloginfo('template_url'); ?>/images/icon_new01.png" alt="<?php the_title(); ?>"></span>
                    <?php } ?>

                  </p>
                  <div class="pl_bottom">
                    <p class="pl_auther"><span><img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt="<?php echo $nicename; ?>"></span><?php echo $nicename; ?></p>
                    <p class="pl_date"><?php echo $time; ?></p>
                  </div>
                </div>
              <p class="pl_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
          </div>
          <?php $i++;
               endforeach;

              wp_reset_query();
            wp_reset_postdata();
          }
        ?>
      </div>
      <!-- 02.end loop posts -->
    </div>
    <!-- Sidebar FrontPage Top -->
    <div class="navi navi01 clearfix">
      <?php dynamic_sidebar( 'Homepage Widget Top' ); ?>
    </div>
    <!-- End Sidebar FrontPage Top -->

  </div>
</div>
