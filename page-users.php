<?php
/**
 * Template Name: User List
 * @package WordPress
 * @subpackage Traijing
 * @since Traijing
 * Content will be gotten from admin editor
 */ ?>
 <?php get_header(); ?>

  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        <h2 class="ttl_h201">トレージン一覧</h2>
		<div class="ct_article_box clearfix">
          <div class="ct_article_list_out clearfix"> 
          	<?php 
			  	$no=2;// total no of author to display
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			    if($paged==1){
			  		$offset=0;  
				} else {
				   $offset= ($paged-1)*$no;
				}

			    $args = array(
					'role' => 'Editor',
			        'number' => $no, 
			        'offset' => $offset,
			     );

			    $user_query = new WP_User_Query( $args );
			    if ( !empty( $user_query->results ) ) {
			        foreach ( $user_query->results as $user ) { 
			        	//get information of user
			        	$author_id = $user->ID;
			        	$firstname = get_the_author_meta( 'user_firstname',$author_id );
		              	$lastname = get_the_author_meta( 'user_lastname', $author_id );
		             	 $fullname = $firstname.' '.$lastname;
		              	$nicename = get_the_author_meta( 'user_nicename', $author_id );
		              	$description = get_field('description', 'user_'. $author_id);
		              	$focus_topic = get_field('focus_topic', 'user_'. $author_id);
			        	$editor_gallery = get_field('profile_picture', 'user_'. $user->ID);
			        	$editor_avatar_tiny = $editor_gallery[0]['sizes']['img_author_list'];
			       	?>
					 <div class="list_ct_traijing clearfix">
		              <div class="list_ct_traijing_img">
		                <p><a href="<?php echo get_author_posts_url($author_id); ?>"><img src="<?php echo $editor_avatar_tiny;  ?>" alt=""></a></p>
		              </div>
		              <div class="list_ct_traijing_ct">
		                <div class="list_ct_traijing_info clearfix">
		                  <p class="list_ct_traijing_auther"><?php echo $fullname; ?><span><?php echo $nicename; ?></span></p>
		                  <p class="traijing_fl">4,672 フォロワー</p>
		                  <p class="btn_fl"><a href="">+ フォロー</a></p>
		                </div>
		                <div class="list_ct_traijing_bt clearfix">
		                  <style>
		                  	.list_ct_traijing_txt p {
		                  		font-size: 14px;
		                  	}
		                  </style>
		                  <div class="list_ct_traijing_txt"><?php echo $description; ?></div>
		                  <div class="box_focus clearfix">
		                    <p class="ttl_fc">Focus!</p>
		                    <p class="list_fc"><?php echo $focus_topic; ?></p>
		                  </div>
		                </div>
		              </div>
		            </div>
			        <?php }
			    }
				else {
				  //No user found
				} 

				// Pagination go here
				$total_user = $user_query->total_users;  
	            $total_pages = ceil($total_user/$no);
				echo paginate_links(array(  
	              'base' => get_pagenum_link(1) . '%_%',  
	              'format' => '?paged=%#%',  
	              'current' => $paged,  
	              'total' => $total_pages,  
	              'prev_text' => 'Previous',  
	              'next_text' => 'Next'  
	            ));
			?>
            
			</div>
        </div>
      </div>
     <?php get_sidebar(); ?>
    </div>
  </div>
  
  <!-- main end -->

 <?php get_footer(); ?>