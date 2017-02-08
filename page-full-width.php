<?php
/**
 * Template Name: Full Width
 * @package WordPress
 * @subpackage GrooVoost
 * @since GrooVoost
 * Content will be gotten from admin editor
 */ 
get_header(); ?>

<!-- main start -->
<div id="main" class="clearfix">
  
    <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
      the_content();
		endwhile;
    // End of the loop.
		?>
<!-- #main --></div>
<?php get_footer(); ?>
