<?php
/**
 * Template Name: TAGS
 * @package WordPress
 * @subpackage Traijing
 * @since Traijing
 * Content will be gotten from admin editor
 */ ?>
 <?php get_header(); ?>

 
<!-- main start -->
<div id="main" class="clearfix">
  <div class="inner">
  	<?php include('parts/breadcrumbs.php'); ?>
  	<div class="tag-list">
  		<?php
			$tags = get_terms( array("post_tag"), array("orderby"=>"count","order"=>"DESC"));
			if ( !empty( $tags ) && !is_wp_error( $tags ) ) :
				
				echo '<ul class="wp-tag-cloud">';
				foreach ( $tags as $tag ) :
					$term_link = get_term_link( $tag );
					echo '<li><a href="'. esc_url( $term_link ) .'">' . $tag->name . '(' . $tag->count . ')'.'</a></li>';
				endforeach;
				echo '</ul>';
			endif;
		?>
  	</div>
    <?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
 	<?php	//the_content();
		endwhile;
	    // End of the loop.
	?>
  <!-- .inner --></div>
<!-- #main --></div>
<?php get_footer(); ?>
