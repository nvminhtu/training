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
						$fullname = $firstname.' '.$lastname;
                		$title_work = get_field('title_of_work', 'user_'. $author_id);
              
                		//editor information
              			$editor_gallery = get_field('profile_picture', 'user_'. $author_id);
						$editor_avatar_url = $editor_gallery[0]['sizes']['img_avatar'];
			?>
			<p class="article_detail_date">
          		<?php the_time('Y年n月j日'); ?>更新
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
					  		<a href="<?php echo get_author_posts_url( $author_id); ?>"><img src="<?php echo $editor_avatar_url; ?>" alt=""></a>
						<?php endif; ?>
		              </p>
		              <p class="cm_aname"><?php echo $fullname; ?></p>
		              <p class="cm_pos"><?php echo $title_work; ?></p>
		            </div>
		         </div>
	          
	          <?php the_content(); ?>

	          <div class="other_articles">
	            <div class="list_latestpost_sb_img">
	              <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dumm04.jpg"></a></p>
	            </div>
	            <div class="list_latestpost_sb_ct">
	              <p class="list_latestpost_sb_title"> <a href="#">記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。</a></p>
	              <p class="list_latestpost_sb_date"> 2016.00.00 </p>
	            </div>
	          </div>
	
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