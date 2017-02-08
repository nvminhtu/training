<?php get_header(); ?>
  <!-- main start -->
  <div id="main" class="clearfix">
    <div class="inner clearfix">
      <div id="content" class="clearfix">
        <div class="traijing_box_top clearfix">
          <?php 
            $author_id = get_the_author_meta('ID');
            $firstname = get_the_author_meta( 'user_firstname',$author_id );
            $lastname = get_the_author_meta( 'user_lastname', $author_id );
            $fullname = $firstname.' '.$lastname;
            $nicename = get_the_author_meta( 'user_nicename', $author_id );
            $description = get_field('description', 'user_'. $author_id);
          ?>

          <!-- editor pictures / video -->
          <div class="tr_top_main clearfix">
            <div id="tr_slider_out" class="clearfix">
              <ul id="traijing_slider01">
                <li><img src="<?php bloginfo('template_url'); ?>/images/traijing_img_slider01.jpg" alt=""></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/traijing_img_slider01.jpg" alt=""></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/traijing_img_slider01.jpg" alt=""></li>
              </ul>
              <div id="tr_slider_pager"> <a data-slide-index="0" href=""><img src="<?php bloginfo('template_url'); ?>/images/traijing_thumb_slider01.jpg" /></a> <a data-slide-index="1" href=""><img src="<?php bloginfo('template_url'); ?>/images/traijing_thumb_slider02.jpg" /></a> <a data-slide-index="2" href=""><img src="<?php bloginfo('template_url'); ?>/images/traijing_thumb_slider03.jpg" /></a> </div>
            </div>
          </div>
          <!-- end editor pictures / video -->

          <!-- editor information -->
          <div class="tr_top_info clearfix">
            <p class="list_ct_traijing_auther">
              <?php echo $fullname; ?>
              <span><?php echo $nicename; ?></span>
            </p>
            <p class="list_ct_traijing_txt">
              <?php echo $description; ?>
            </p>

            <!-- //comment out Followers and Follow Button
            <div class="box_focus clearfix">
              <p class="ttl_fc">Focus!</p>
              <p class="list_fc">ヨガ, 新体操, スーパーフード, 加圧トレーニング, トライアスロン, スイーツダイエット</p>
            </div>
            <p class="traijing_fl">4,672 フォロワー</p>
            <p class="btn_fl"><a href="">+ フォロー</a></p> -->

          </div>
          <!-- end editor information -->

         <!-- end traijing_box_top --></div>

        <div class="ct_article_box clearfix">
          <div class="ct_article_list_out clearfix"> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">イヤホン・ヘッドホン特集！スポーツしながらでも邪魔にならない導入すべき音楽ツールラインナップ</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date01">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
            <!-- ct_article_list -->
            <div class="list_ct_article clearfix">
              <div class="list_ct_article_img">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/traijing_article_list_img01.jpg" alt=""></a></p>
              </div>
              <div class="list_ct_article_ct">
                <p class="list_ct_article_title"><a href="#">まだまだ間に合う！ジムを冬に始めるべきビックリな理由</a></p>
                <p class="list_ct_article_txt">bluetooth接続が可能なイヤホンも多数販売されるようになり、それぞれの特徴や価格帯からどの商品がいいのかを厳選してみました。人それぞれの良し悪しがありますが、機能性と価格帯を中心に絞り込んでみました。実際の...</p>
                <div class="list_ct_article_info clearfix">
                  <ul>
                    <li class="ct_date">2016.07.18</li>
                    <li class="ct_view01">43,215</li>
                    <li class="ct_heart">442</li>
                  </ul>
                  <p class="pl_auther"><span><img src="<?php bloginfo('template_url'); ?>/images/img_auther01.png" alt=""></span>meri_moko4</p>
                </div>
              </div>
            </div>
            <!-- // end: ct_article_list --> 
          </div>
        </div>
      </div>
      <!-- start : #navi -->
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
                <ul class="list_tag01">
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
                </ul>
              </dd>
            </dl>
            <p class="link01"><a href="#">他のキーワード</a></p>
          </div>
        </div>
      </div>
      <!-- end : #navi --> 
    </div>
  </div>
  
  <!-- main end -->
  
<?php get_footer(); ?>