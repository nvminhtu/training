<?php get_header(); ?>
  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        <?php include('parts/breadcrumbs.php'); ?>

        <div class="ct_article_detail clearfix">
	        <?php
				if ( have_posts() ) :
				  	while ( have_posts() ) : the_post();
				    	$editor_comment = get_field('editor_comment', $post->ID);

						$author_id = get_the_author_meta('ID');
						$firstname = get_the_author_meta( 'user_firstname' );
                		$lastname = get_the_author_meta( 'user_lastname' );
						$fullname = $lastname.' '.$firstname;
                		$title_work = get_field('title_of_work', 'user_'. $author_id);

                		//editor information
              			$editor_gallery = get_field('profile_picture', 'user_'. $author_id);
						$editor_avatar_url = $editor_gallery[0]['sizes']['img_avatar'];

            			//post thumbnail
			            $thumb = get_post_thumbnail_id();
			            $img_blog = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_blog_thumbnail');
			            $img_blog_src = $img_blog[0];
			            $img_blog_w = $img_blog[1];
			            $img_blog_h = $img_blog[2];
			            $img_caption = get_post(get_post_thumbnail_id($post->ID))->post_excerpt;
			            $img_refer_url = get_post(get_post_thumbnail_id($post->ID))->post_content;
			?>
			<p class="article_detail_date">
          		<?php the_time('Y年n月j日'); ?>更新<?php echo do_shortcode('[post-views]'); ?>
          		<span class="like_heart"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></span>
          	</p>
         	<p class="article_detail_title"><?php the_title(); ?></p>
          		<div class="article_detail_box_cm clearfix">
          			<?php if($editor_comment!='') { ?>
		            <div class="article_detail_cm_pop clearfix">
		               <?php echo $editor_comment; ?>
		            </div>
		            <?php } ?>
		            <div class="article_detail_cm_au clearfix">
		              <p class="cm_img">
		                <?php if( $editor_gallery ): ?>
					  		<a href="<?php echo get_author_posts_url( $author_id); ?>"><img src="<?php echo $editor_avatar_url; ?>" width="96" height="96" alt="<?php echo $fullname; ?>"></a>
						<?php endif; ?>
		              </p>
		              <p class="cm_aname"><?php echo $fullname; ?></p>
		              <p class="cm_pos"><?php echo $title_work; ?></p>
		            </div>
		         </div>
            <?php if(has_post_thumbnail()) { ?>
	             <div class="center">
	             	<div class="featured_picture" style="width: <?php echo $img_blog_w; ?>px;"><img src="<?php echo $img_blog_src; ?>" alt="<?php echo get_the_title(); ?>" data-width="<?php echo $img_blog_w; ?>" data-height="<?php echo $img_blog_h; ?>" >
	             		<?php if(isset($img_refer_url) && $img_refer_url!=''){ ?>
	             			<div class="desc" style="width: <?php echo $img_blog_w; ?>px;">
	             				<span>写真引用元： <a href="<?php echo $img_refer_url; ?>"><?php echo $img_refer_url; ?></a></span>
	             			</div>
	             		<?php } ?>
	             	</div>
	             	<?php if(isset($img_caption) && $img_caption!='') { ?>
	             		<p class="pic_description" style="width: <?php echo $img_blog_w; ?>px;">
	             		▲<?php echo $img_caption; ?></p>
	             	<?php } ?>
	             </div>
            <?php } ?>
	          <?php the_content(); ?>

			<?php

				$post_objects = get_post_meta( $post->ID, '_traijing_post_multicheckbox', true );

				if( $post_objects ): ?>

				    <?php foreach( $post_objects as $post):
				    	setup_postdata($post);
				     		$time = get_the_date('Y.m.d', $post->ID);
							$img_other_blogs = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_other_blogs');
							$img_other_blogs_src = $img_other_blogs[0];
							setup_postdata($post); ?>
							<div class="other_articles">
								<div class="list_latestpost_sb_img">
									<p>
										<a href="<?php echo get_permalink($post->ID); ?>">
											<?php //get featured image
											if ( has_post_thumbnail($post->ID) ) { ?>
												<img src="<?php echo $img_other_blogs_src; ?>" alt="<?php echo get_the_title($post->ID); ?>"  />
											<?php } else { ?>
												<img src="<?php echo get_bloginfo('template_url'); ?>/images/dummy92x70.jpg">
											<?php } ?>
										</a>
									</p>
								</div>
								<div class="list_latestpost_sb_ct">
									<p class="list_latestpost_sb_title">
									<a href="<?php echo get_permalink($post->ID); ?>">
										<?php echo get_the_title($post->ID); ?></a>
									</p>
									<p class="list_latestpost_sb_date"><?php echo $time; ?></p>
								</div>
							</div>
				    <?php endforeach; ?>

				    <?php wp_reset_postdata(); ?>
				<?php endif; ?>



        <?php endwhile;
		  		else :
		  endif;
		?>
        <!-- end ct_article_detail --></div>

        <?php include('parts/related-posts.php'); ?>

        <!-- start : adsense_area_box -->
        <div class="adsense_area_box clearfix">
          <div class="adsense_box clearfix"> 1 </div>
          <div class="adsense_box clearfix"> 2 </div>
        </div>
        <!-- end : adsense_area_box -->

        <!-- start : related_author-->
        <?php include('parts/other-authors.php'); ?>
        <!-- end : related_author-->

      </div>
      <!-- start : #navi -->
      <?php get_sidebar(); ?>
      <!-- end : #navi -->
    </div>
  </div>

  <!-- main end -->
<?php get_footer();?>
