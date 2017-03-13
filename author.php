<?php get_header(); ?>
  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        
        <div class="traijing_box_top clearfix">
          <?php 
              $author = get_queried_object();
              $author_id = $author->ID;
              $firstname = get_the_author_meta( 'user_firstname', $author_id );
              $lastname = get_the_author_meta( 'user_lastname', $author_id );
              $fullname = $lastname.' '.$firstname;
              $nicename = get_the_author_meta( 'user_nicename', $author_id );
              $description = get_field('description', 'user_'. $author_id);
              $focus_topic = get_field('focus_topic', 'user_'. $author_id);
              $promotion_video = get_field('promotion_video', 'user_'. $author_id);
              $editor_gallery = get_field('profile_picture', 'user_'. $author_id);
              $editor_avatar_tiny = $editor_gallery[0]['sizes']['img_author_tiny'];
              $insta_username = get_the_author_meta('insta_username', $author_id);

          ?>
         
          <?php /* ---------------### 1.1.editor pictures / video-------------------------------- */ ?>
          <div class="tr_top_main clearfix">
            
            <?php 
              if(isset($promotion_video)&&$promotion_video!='') { 
                //01. IF has VIDEO
            ?>
              <div id="tr_slider_out" class="clearfix">
                <?php //1.1 Vimeo
                  if(preg_match('/https:\/\/(www\.)*vimeo\.com\/.*/',$promotion_video)){ 
                ?>
                  <iframe src="https://player.vimeo.com/video/57399324" width="668" height="374" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <?php } ?>

                <?php //1.2 Youtube
                  if(preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$promotion_video)){ 
                ?>
                    <iframe width="668" height="374" src="https://www.youtube.com/embed/jovTHH9yrHY" frameborder="0" allowfullscreen></iframe>
                <?php } ?>
              </div> 

            <?php } else {  
                //02. IF doesn't have VIDEO
            ?>
              <div id="tr_slider_out" class="clearfix">
                <ul id="traijing_slider01">
                  <?php // loop author slider main
                      $i = 0;
                      if( $editor_gallery ): 
                      foreach( $editor_gallery as $image ): 
                        if($i<3) {
                      ?>
                        <li>
                          <?php if($image['sizes']['img_author_slider-width'] < 668 && $image['sizes']['img_author_slider-height']< 500 ) { ?>
                              <img src="<?php echo $image['sizes']['img_author_slider_fixed']; ?>" alt="<?php echo $image['alt']; ?>"/>
                          <?php } else if($image['sizes']['img_author_slider-width'] > 668 && $image['sizes']['img_author_slider-height'] > 500 ) { ?>
                              <img src="<?php echo $image['sizes']['img_author_slider_fixed']; ?>" alt="<?php echo $image['alt']; ?>"/>
                          <?php } else if($image['sizes']['img_author_slider-width'] > 668 && $image['sizes']['img_author_slider-height'] < 500 ) { ?>
                              <img src="<?php echo $image['sizes']['img_author_slider_w']; ?>" alt="<?php echo $image['alt']; ?>"/>
                          <?php } else if ($image['sizes']['img_author_slider-width'] < 668 && $image['sizes']['img_author_slider-height'] > 500 ) { ?>
                              <img src="<?php echo $image['sizes']['img_author_slider_h']; ?>" alt="<?php echo $image['alt']; ?>"/>
                          <?php } else  { ?>
                            <img src="<?php echo $image['sizes']['img_author_slider_fixed']; ?>" alt="<?php echo $image['alt']; ?>"/>
                          <?php } ?>
                        </li>  
                      <?php } 
                      $i++; 
                      endforeach; 
                      
                    endif; 
                    // end loop author thumb
                  ?>
                </ul>

                <div id="tr_slider_pager">
                  <?php // loop author thumb
                      $j = 0;
                      if( $editor_gallery ): 
                      foreach( $editor_gallery as $image ): 
                        if($j<3) {
                      ?>
                        <a data-slide-index="<?php echo $j; ?>" href=""> <img src="<?php echo $image['sizes']['img_author_thumb']; ?>" width="58" height="58" alt="<?php echo $image['alt']; ?>" />
                        </a>  
                      <?php } 
                      $j++;
                      endforeach;
                    endif; 
                    // end loop author thumb
                  ?>
                </div>
              <!-- #tr_slider_out --></div>
            <?php } ?>
          </div>
          <?php /* ---------------### end 1.1.editor pictures / video-------------------------------- */ ?>

          <?php /* ---------------### 1.2 editor information-------------------------------- */ ?>
          <div class="tr_top_info clearfix">
            <p class="list_ct_traijing_auther">
              <?php echo $fullname; ?>
              <span><?php echo $nicename; ?></span>
            </p>
            <p class="list_ct_traijing_txt">
              <?php echo $description; ?>
            </p>

           
            <div class="box_focus clearfix">
              <p class="ttl_fc">Focus!</p>
              <div class="list_fc"><?php echo $focus_topic; ?></div>
            </div>
             <!-- //comment out Followers and Follow Button
            <p class="traijing_fl">4,672 フォロワー</p>
            <p class="btn_fl"><a href="">+ フォロー</a></p> -->

          </div>
          <?php /* ---------------### end 1.2 editor information -------------------------------- */ ?>
         <!-- end traijing_box_top --></div>
          

        <?php /* ---------------### 02.Instagram of user -------------------------------- */ ?>
        <div class="ct_article_box clearfix">
          <p class="ptitle_02">Instagramの写真</p>
          <?php echo do_shortcode('[ap_instagram_slider set_username="'.$insta_username.'"]'); ?>
        </div>
        <?php /* ---------------### End 02.Instagram of user -------------------------------- */ ?>
        

        <?php /* ---------------### 03. Load posts of user -------------------------------- */ ?>
        <div class="ct_article_box clearfix">
          <div class="ct_article_list_out clearfix"> 
            <?php if ( have_posts() ) :
                  // Start the Loop.
                while ( have_posts() ) : the_post(); 
                  $thumb = get_post_thumbnail_id();
                  $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_list');
                  $img_blog_src = $img_blog[0];
                ?>
                    <div class="list_ct_article clearfix">
                      <div class="list_ct_article_img">
                        <p>
                          <a href="<?php the_permalink(); ?>">
                          <?php if(has_post_thumbnail()) { ?>
                            <img src="<?php echo $img_blog_src; ?>" alt="<?php the_title(); ?>">
                          <?php } else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/images/dummy220x164.jpg" alt="<?php the_title(); ?>">
                          <?php } ?>
                          </a>
                        </p>
                      </div>
                      <div class="list_ct_article_ct">
                        <p class="list_ct_article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p class="list_ct_article_txt">
                        <?php //show content limited
                            $content_display = mb_substr(wp_strip_all_tags( get_the_content()), 0, 120, 'UTF-8'); 
                              $content_length = mb_strlen($content_display);
                            if($content_length > 119) {
                              echo $content_display.' ...';
                            } else {
                              echo $content_display;
                            }
                          ?>
                        </p>
                        <div class="list_ct_article_info clearfix">
                          <ul>
                            <li class="ct_date01"><?php echo  get_the_date('Y.m.d',$post->ID); ?></li>
                            <li class="ct_view01"><?php echo do_shortcode('[post-views]'); ?></li>
                            <li><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
                          </ul>
                          <p class="pl_auther"><span><img src="<?php echo $editor_avatar_tiny; ?>" alt=""></span><?php echo $nicename; ?></p>
                        </div>
                      </div>
                    </div>
                <?php  endwhile; // End the loop.

                 wp_pagenavi(); //pagination
              else :
                  //no post here
              endif;
            ?>
          <!-- ct_article_list_out --></div>

          <?php include('parts/other-authors.php'); ?>

        <!-- ct_article_box --></div>
        <?php /* ---------------### 03. Load posts of user -------------------------------- */ ?>

      </div>
      <!-- start : #navi -->
      <?php get_sidebar(); ?>
      <!-- end : #navi --> 
    </div>
  </div>
  
  <!-- main end -->
  
<?php get_footer(); ?>