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
        <div class="list_navi list_navi01 clearfix">
          <dl>
            <dt>ジム入門！初心者特集 <span>これから開始される方へのアドバイス！</span></dt>
            <dd>
              <div class="list_latestpost_sb_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""></a></p>
              </div>
              <div class="list_latestpost_sb_ct">
                <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
              </div>
            </dd>
            <dd>
              <div class="list_latestpost_sb_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""></a></p>
              </div>
              <div class="list_latestpost_sb_ct">
                <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
              </div>
            </dd>
            <dd>
              <div class="list_latestpost_sb_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""></a></p>
              </div>
              <div class="list_latestpost_sb_ct">
                <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
              </div>
            </dd>
            <dd>
              <div class="list_latestpost_sb_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""></a></p>
              </div>
              <div class="list_latestpost_sb_ct">
                <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
              </div>
            </dd>
          </dl>
          <p class="link01"><a href="#">ジム入門！初心者特集</a></p>
        </div>
        <div class="navi_ad02 clearfix">
          <div class="navi_ad01_in">
            <p><img src="<?php bloginfo('template_url'); ?>/images/navi_ad02.jpg" alt=""></p>
          </div>
        </div>
        <div class="navi02 clearfix">
          <div class="list_navi list_navi01 clearfix">
            <dl>
              <dt>アクセスランキング<span>最近投稿された記事の順位</span></dt>
              <dd>
                <div class="list_latestpost_sb_img">
                  <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""><span class="certi certi01">1</span></a></p>
                </div>
                <div class="list_latestpost_sb_ct">
                  <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                  <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
                </div>
              </dd>
              <dd>
                <div class="list_latestpost_sb_img">
                  <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""><span class="certi certi02">2</span></a></p>
                </div>
                <div class="list_latestpost_sb_ct">
                  <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                  <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
                </div>
              </dd>
              <dd>
                <div class="list_latestpost_sb_img">
                  <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img_dummy02.jpg" alt=""><span class="certi certi03">3</span></a></p>
                </div>
                <div class="list_latestpost_sb_ct">
                  <p class="list_latestpost_sb_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                  <p class="list_latestpost_sb_info clearfix"><span class="nauther01">supsestarkei</span><span class="nview">66,539</span></p>
                </div>
              </dd>
            </dl>
            <p class="link01"><a href="#">ランキングを見る</a></p>
          </div>
          <div class="list_navi clearfix">
            <dl>
              <dt>話題のキーワード<span>注目されている言葉</span></dt>
              <dd>
                <?php wp_tag_cloud( 'format=list&orderby=count&order=DESC' ); ?>
               <!--  <ul class="list_tag01">
                  <li><a href="#">トレーニング</a></li>
                  <li><a href="#">トレ</a></li>
                  <li><a href="#">トレーニ</a></li>
                  <li><a href="#">トレー</a></li>
                  <li><a href="#">トレーニ</a></li>
                  <li><a href="#">トレーニング</a></li>
                  <li><a href="#">トレーニング</a></li>
                  <li><a href="#">トレーニング</a></li>
                  <li><a href="#">トレーニング</a></li>
                  <li><a href="#">トレーニ</a></li>
                  <li><a href="#">トレーニング</a></li>
                </ul> -->
              </dd>
            </dl>
            <p class="link01"><a href="#">他のキーワード</a></p>
          </div>
        </div>
      <!-- end : #navi --> </div>