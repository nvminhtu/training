<?php
/**
 * Template Name: Index
 * @package WordPress
 * @subpackage Traijing
 * @since Traijing
 * Content will be gotten from admin editor
 */ ?>
<?php get_header(); ?>

<!-- main start -->
  <div id="main" class="clearfix">
    <!-- 01.slider -->
    <?php include('parts/index-slider.php'); ?>
    <!-- end 01.slider -->
    
    <!-- idx_ct01 -->
    <?php include('parts/first-index-loop.php'); ?>

    <!-- idx_ct02 -->
    <?php include('parts/second-index-loop.php'); ?>
  </div>
  <!-- main end --></div>
  
<?php get_footer();?>
