<?php
/**
 * Search Template of Traijing
 * Traijing theme
 */

get_header(); ?>
<div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
      	<?php include('parts/breadcrumbs.php'); ?>
        <h2 class="ttl_h201"><?php single_cat_title(); ?></h2>
        <div class="ct_article_box clearfix">
          <div class="ct_article_list_out clearfix">
            <!-- ct_article_list -->
            <?php
            	if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$author_id = get_the_author_meta('ID');
						$$img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_list');
            $img_blog_src = $img_blog[0];
                  		$editor_gallery = get_field('profile_picture', 'user_'. $author_id);
						$editor_avatar_url = $editor_gallery[0]['sizes']['img_author_tiny'];
						$nicename = get_the_author_meta( 'user_nicename', $author_id );
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
			                    <li class="ct_date01"><?php echo get_the_date('Y.m.d',$post->ID); ?></li>
			                    <li class="ct_view01"><?php echo do_shortcode('[post-views]'); ?></li>
			                    <li><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
			                  </ul>
			                  <p class="pl_auther"><span><img src="<?php echo $editor_avatar_url; ?>" width="28" height="28" alt=""></span><?php echo $nicename; ?></p>
			                </div>
			              </div>
			            </div>
			<?php	endwhile;

					wp_pagenavi(); //pagination
				else :

				endif;
			?>
            <!-- // end: ct_article_list -->
          <!-- .ct_article_list_out --></div>

        </div>
      </div>
      <!-- start : #navi -->
      <?php get_sidebar(); ?>
      <!-- end : #navi -->
    </div>
  </div>


<?php get_footer(); ?>
