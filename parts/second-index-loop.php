<div id="idx_ct02" class="clearfix">
  <div class="inner clearfix">
    <div class="content content02 clearfix">
      <!-- 01. categories list here -->
      <div class="col_cate01 clearfix">
        <dl>
          <dt>カテゴリー</dt>
          <dd>
            <ul>
              <li class="c01"><a href="<?php bloginfo('url'); ?>">
                <span><img src="<?php bloginfo('template_url'); ?>/images/icon_cate01.png"></span>
                ホーム</a>
              </li>
              <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'exclude' =>array(1), //don't load uncategorized 
                    'hide_empty' =>  FALSE
                ) );
                foreach( $categories as $category ) { ?>
                  <li>
                    <span>
                      <?php $img_arr = get_field('category_image',  'category_'.$category->term_id); ?>
                      <img src="<?php echo $img_arr['url']; ?>">
                    </span>
                    <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                  </li>
                <?php 
              }
            ?>
            </ul>
          </dd>
        </dl>
      </div>
      <!-- end 01.categories list here -->

      <!-- 02.list all posts here -->
      <div class="col_pickup clearfix">
        <p class="title_pickup"><span>Pick Up</span>ピックアップ</p>
        <div class="list_pickup clearfix">
          <?php 
            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'paged' => $paged,
                'page' => $paged
              );
            $the_query = new WP_Query( $query_args ); 
            if ( $the_query->have_posts() ) : 
              while ( $the_query->have_posts() ) : $the_query->the_post();
                $time = get_the_date('Y.m.d', $post->ID);
                $nd = get_the_content();
                $id = get_the_ID();
                $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_index_second');
                $img_blog_src = $img_blog[0];

                $author_id = $post->post_author;
                $nicename = get_the_author_meta( 'user_nicename' );
                $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
                $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];
              ?>
              <div class="pickup_box clearfix">
                <div class="pickup_box_sb_img">
                  <p>
                    <a href="<?php the_permalink(); ?>">
                      <?php if(has_post_thumbnail()) { ?> 
                         <img src="<?php echo $img_blog_src; ?>" alt="<?php the_title(); ?>">
                      <?php } else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/dummy100x100.jpg" alt="">
                      <?php } ?>
                      <?php echo do_shortcode('[post-views]'); ?>
                    </a>
                  </p>
                </div>
                <div class="pickup_box_sb_ct">
                  <p class="pickup_box_sb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                  <div class="pickup_box_sb_info">
                    <p class="pl_auther"><span><img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt="<?php echo $nicename; ?>"></span><?php echo $nicename; ?></p>
                    <p class="pl_date"><?php echo $time; ?></p>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
              <!-- end of the loop -->

              <!-- mt: pagination here -->
              <?php
                if (function_exists(custom_index_pagination)) {
                  custom_index_pagination($the_query->max_num_pages,"",$paged);
                }
              ?>
              <!-- mt: end pagination here -->

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
      </div>
      <!-- 02.end list all posts here -->
  
    </div>
    <!-- Sidebar FrontPage Bottom -->
    <div class="navi navi02 clearfix">
      <?php dynamic_sidebar( 'Homepage Widget Bottom' ); ?>
    </div>
    <!-- Sidebar FrontPage Bottom -->
  </div>
</div>