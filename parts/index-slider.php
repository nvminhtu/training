<div id="main_visual" class="clearfix">
    <div class="inner clearfix">
        <?php 
          $shortcode_slider = get_field( 'homepage_slider','option');
         // echo $shortcode_slider = "'".$shortcode_slider."'";
          echo do_shortcode($shortcode_slider);
        ?>
      </div>
  </div>