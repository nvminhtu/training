<?php get_header(); ?>
<!-- main start -->
<div id="main" class="clearfix">
  <div class="inner ftb">
    <div id="topic_path" class="clearfix">
      <ul>
        <li><a href="<?php bloginfo('url'); ?>">HOME</a> &gt; </li>
        <li>ブログ一覧</li>
      </ul>
    </div>
    <div id="container" class="clearfix">
      <div id="content" class="clearfix">
        <h3 class="title_lblog">すべての記事一覧</h3>
        <div class="box_archive_blog clearfix">
          <?php
            global $post;
            global $wp_query;
            global $numposts;

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
          		'post_type' =>'blog',
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
            ?>
            <div class="<?php echo $color_class; ?> heightLine-01 bloglist_box01 box_link" data-color-code="<?php echo $term_color_code; ?>">
              <div class="blog_img">
                <a href="<?php echo get_permalink(); ?>">
                  <?php if (!empty($check_new_for_blog)){ ?>
                  <span class="blog_inew"><span>NEW!</span></span>
                  <?php } ?>
                  <img src="<?php echo $img_archive_blog_src; ?>" alt="<?php the_title(); ?>">
                  <span class="blog_time"><?php echo $time; ?></span>
                </a>
              </div>
              <div class="blog_idx_info">
                <p class="blog_title"><?php the_title(); ?></p>
                <div class="blog_list_n blog_cate_list">
                  <?php
                    // 01. Load Cats of Blog
                    $terms = wp_get_post_terms($post->ID, 'blog-cat', '');
                    if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                         echo "<ul class='blog_list_tag clearfix'>";
                         foreach ( $terms as $term ) {
                           echo "<li><a href='".get_term_link($term)."'>" . $term->name . "</a></li>";
                         }
                         echo "</ul>";
                     }
                  ?>
                </div>
                <div class="blog_list_n blog_tag_list">
                  <?php
                  // 02. Load Tags
                  if(has_tag()) {
                    the_tags( '<ul class="blog_list_tag clearfix"><li>', '</li><li>', '</li></ul>' );
                  } else { ?>
                  <ul class="blog_list_tag clearfix">
                    <li></li>
                  </ul>
                  <?php } ?>

                </div>
              </div>
            </div>

        		<?php	$i++;
        			endforeach;
            ?>


          <?php
                wp_reset_query();
        			wp_reset_postdata();
        	 	}
          ?>
          <!--end blog list--></div>
        <p class="btn btn01 btn_hblue btn_mw500"><a id="more_blog" href="javascript:void(0)"><span>もっと見る</span></a></p>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<!-- main end -->
<?php get_footer(); ?>
