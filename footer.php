<div id="footer" class="clearfix">
    <div id="footer_top" class="clearfix">
      <div class="inner clearfix">
        <div class="fcol footer_logo clearfix">
          <p><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""><span>トレージン！</span></a></p>
        </div>
        <div class="fcol flink fcol01 clearfix">
          <?php dynamic_sidebar( 'Footer Menu 1' ); ?>
        </div>
        <div class="fcol flink fcol02 clearfix">
          <?php dynamic_sidebar( 'Footer Menu 2' ); ?>
        </div>
        <div class="fcol flink fcol03 clearfix">
          <?php dynamic_sidebar( 'Footer Menu 3' ); ?>
        </div>
        <div class="fcol fcol04 clearfix">
          <?php echo do_shortcode('[contact-form-7 id="255" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>
    <div id="footer_info" class="clearfix">
      <div class="inner clearfix">
        <?php dynamic_sidebar( 'Footer Menu Bottom' ); ?>
        <address>
          <?php dynamic_sidebar( 'Footer Copyright Bottom' ); ?>
        </address>
      </div>
    </div>
  </div>
  <div id="bg_box_out">&nbsp;</div>
</div>
</body>

<!--Select and manipulate your video-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vimeo.player.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/video-top.js"></script>
<?php wp_footer(); ?>
</html>