<div id="idx_ct02" class="clearfix">
      <div class="inner clearfix">
        <div class="content content02 clearfix">
          <!-- 01. categories list here -->
          <div class="col_cate01 clearfix">
            <dl>
              <dt>カテゴリー</dt>
              <dd>
                <ul>
                  <li class="c01"><a href="<?php bloginfo('siteurl'); ?>">ホーム</a></li>
                  <?php
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' =>  FALSE
                    ) );
                    foreach( $categories as $category ) { ?>
                      <li class="c01">
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
              <?php if ( have_posts() ) :
                  // Start the Loop.
                  while ( have_posts() ) : the_post();
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
                         <img src="<?php echo $img_blog_src; ?>" alt="">
                      <?php } else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/img_dummy03.jpg" alt="">
                      <?php } ?>
                      <img src="<?php echo $img_blog_src; ?>" alt="">
                      <span class="pickup_box_view">43,215</span>
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
              <?php endwhile; 
                 wp_pagenavi(); //pagination
              else :
                //no post here
              endif; ?>
            </div>
          </div>
          <!-- 02.end list all posts here -->

        </div>
        <!-- Sidebar FrontPage Bottom -->
        <?php get_sidebar('frontpage-bottom'); ?>
        <!-- Sidebar FrontPage Bottom -->
      </div>
    </div>