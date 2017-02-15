<?php get_header(); ?>

<!-- main start -->
<div id="main" class="clearfix">
  <div class="inner">
    <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
      		the_content();
		endwhile;
    // End of the loop.
		?>
  <!-- .inner --></div>
<!-- #main --></div>
<?php get_footer(); ?>
