<?php /* 
<div id="sidebar" class="clearfix">
  <?php dynamic_sidebar( 'Sidebar Widget' ); ?>
</div>
*/ ?>
<div id="navi" class="navi clearfix">
  <div class="navi_ad01 clearfix">
    <div class="navi_ad01_in">
      <p><img src="<?php bloginfo('template_url'); ?>/images/navi_ad01.jpg" alt=""></p>
    </div>
  </div>
   <?php include('parts/article-pickup-sidebar.php'); ?>
  <div class="navi_ad02 clearfix">
    <div class="navi_ad01_in">
      <p><img src="<?php bloginfo('template_url'); ?>/images/navi_ad02.jpg" alt=""></p>
    </div>
  </div>
  <div class="navi02 clearfix">
    <?php include('parts/article-list-sidebar.php'); ?>
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