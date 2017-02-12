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
    <div id="idx_ct01" class="clearfix">
      <div class="inner clearfix">
        <div class="content content01 clearfix">
          <!-- 02.banner management -->
          <div class="topic_path clearfix">
            <ul>
              <li><a href="#">【本日限定】配達日を土日指定でポイントアップ</a></li>
            </ul>
          </div>
          <div class="ct_bnr01">
            <p><img src="<?php bloginfo('template_url'); ?>/images/bnr_tpoint.jpg" alt=""></p>
          </div>
          <!-- end 02.banner management -->

          <?php include('parts/first-index-loop.php'); ?>

        </div>
        <!-- Sidebar FrontPage Top -->
       	<?php get_sidebar('frontpage-top'); ?>
        <!-- End Sidebar FrontPage Top -->
        
      </div>
    </div>
    <!-- idx_ct02 -->
    <?php include('parts/second-index-loop.php'); ?>
  </div>
  <!-- main end --></div>
  
<?php get_footer();?>
