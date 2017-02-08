<?php get_header(); ?>

<?php
  if ( have_posts() ) :
  	while ( have_posts() ) : the_post();
      $thumb = get_post_thumbnail_id();
      $img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image
      $time = get_the_date('Y.m.d', $post->ID);
      $nd = get_the_content();
      $id= get_the_ID();
    ?>
    <!-- main start -->
    <div id="main" class="clearfix">
      <div class="inner ftb">
        <div id="topic_path" class="clearfix">
          <ul>
            <li><a href="<?php bloginfo('siteurl'); ?>">HOME</a> &gt; </li>
            <li><a href="<?php bloginfo('siteurl'); ?>/blog/">ブログ一覧</a> &gt; </li>
            <li><?php the_title(); ?></li>
          </ul>
        </div>
        <div id="container" class="clearfix blog_detail">
          <div id="content" class="blog_detail">
            <p class="blog_time"><?php echo $time; ?></p>
            <h1 class="bh"><?php the_title(); ?></h1>
            <div class="dblog_in clearfix">
              <div class="blogd_cate_list clearfix">
                <?php
                // 01. Load Cats of Blog
                $terms = wp_get_post_terms($post->ID, 'blog-cat', '');
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                     echo "<ul>";
                     foreach ( $terms as $term ) {
                       echo "<li><a href='".get_term_link($term)."'>" . $term->name . "</a></li>";
                     }
                     echo "</ul>";
                 }
                ?>
              </div>
              <div class="blogd_tag_list clearfix">
                <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
              </div>
            </div>
            <div class="social_top">
              <?php include('parts/social-top.php'); ?>
            </div>
            <div class="blogd_content clearfix">
              <p class="center"><img src="<?php echo $img_url; ?>" /></p>
              <?php the_content(); ?>
              <?php echo do_shortcode('[related_blogs]'); ?>

              <?php include('parts/social-bottom.php') ?>

              <div class="adsense_area_box clearfix">
                <div class="adsense_box clearfix">
                  <!-- Start Adsense code -->
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				  	<!-- groovoost.com - under blog articles 300×250 2 -->
				  	<ins class="adsbygoogle"
				  	style="display:inline-block;width:300px;height:250px"
				  	data-ad-client="ca-pub-7469938523971093"
				  	data-ad-slot="5845613165"></ins>
				  	<script>
				  	(adsbygoogle = window.adsbygoogle || []).push({});
				  </script>
                  <!-- End Adsense code -->
                </div>
                <div class="adsense_box clearfix">
                  <!-- Start Adsense code -->
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				  	<!-- groovoost.com - under blog articles 300×250 2 -->
				  	<ins class="adsbygoogle"
				  	style="display:inline-block;width:300px;height:250px"
				  	data-ad-client="ca-pub-7469938523971093"
				  	data-ad-slot="5845613165"></ins>
				  	<script>
				  	(adsbygoogle = window.adsbygoogle || []).push({});
				  </script>
                  <!-- End Adsense code -->
                </div>
              <!-- .adsense_area_box --></div>


              <div class="person_box clearfix">
            	 <p class="ptitle_01">記事を書いたひと</p>
               <?php
                //get the author meta information
                $firstname = get_the_author_meta( 'user_firstname' );
                $lastname = get_the_author_meta( 'user_lastname' );
                $biographical = get_the_author_meta( 'description' );
                $fullname = $firstname.' '.$lastname;
                $author_id = get_the_author_meta('ID');
                $user_position = get_field('user_position', 'user_'. $author_id);
                $user_jp_name =  get_field('member_jp_name', 'user_'. $author_id);
                $slug_member_blog = str_replace(' ', '', $user_jp_name);
              ?>
            	 <div class="img_person clearfix">
                 	<p><?php echo get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size );  ?></p>
            	</div>
            			<div class="info_person clearfix">
            				<p class="person_name"><a href="<?php bloginfo('siteurl'); ?>/member/"><?php echo $user_jp_name; ?></a></p>
            				<p class="person_positon"><?php echo $user_position; ?></p>
            			</div>
            			<p class="person_des"><?php echo $biographical; ?></p>
            	</div>

            </div>
          </div>
          <!-- #### sidebar ####-->
          <?php get_sidebar(); ?>
          <!-- #### //sidebar ####-->
        </div>
      </div>
    </div>
    <!-- main end -->
  	<?php endwhile;
  else :
  endif;
?>
<?php get_footer(); ?>
