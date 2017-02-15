<?php /* 
<div id="sidebar" class="clearfix">
  <?php dynamic_sidebar( 'Sidebar Widget' ); ?>
</div>
*/ ?>
<div id="navi" class="navi clearfix">
  <div class="cwidget-sidebar">
    <div class="navi_ad01 clearfix">
      <div class="navi_ad01_in">
        <p><img src="<?php bloginfo('template_url'); ?>/images/navi_ad01.jpg" alt=""></p>
      </div>
    </div>
  </div>
  
  <?php dynamic_sidebar( 'Sidebar Widget' ); ?>
  
  <div class="cwidget-sidebar">
     <div class="navi_ad02 clearfix">
        <div class="navi_ad01_in">
          <p><img src="<?php bloginfo('template_url'); ?>/images/navi_ad02.jpg" alt=""></p>
        </div>
      </div>
  </div>
 
  <div class="cwidget-sidebar">
    <?php echo do_shortcode('[ranking_article number_post="4" text_link="ランキングを見る" sub_title="最近投稿された記事の順位" title="アクセスランキング"]'); ?>
  </div>

  <div class="cwidget-sidebar">
    <div class="list_navi clearfix">
      <dl>
        <dt>話題のキーワード<span>注目されている言葉</span></dt>
        <dd>
          <?php wp_tag_cloud( 'format=list&orderby=count&order=DESC' ); ?>
        </dd>
      </dl>
      <p class="link01"><a href="#">他のキーワード</a></p>
    </div>
  </div>
<!-- end : #navi --> </div>