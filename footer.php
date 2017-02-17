<div id="footer" class="clearfix">
    <div id="footer_top" class="clearfix">
      <div class="inner clearfix">
        <div class="fcol footer_logo clearfix">
          <p><a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""><span>トレージン！</span></a></p>
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
          <dl>
            <dt>お問い合わせ</dt>
            <dd>
              <p class="txt_ct">トレージン（ライター）の応募や広告掲載の依頼など、トレージンに関するお問い合わせはこちらからお願いします。</p>
              <ul class="list_choose_ct">
                <li>
                  <input type="radio" id="f-option" name="selector">
                  <label for="f-option">トレージンへの応募</label>
                  <div class="check"></div>
                </li>
                <li>
                  <input type="radio" id="f-option2" name="selector">
                  <label for="f-option2">広告掲載</label>
                  <div class="check"></div>
                </li>
                <li>
                  <input type="radio" id="f-option3" name="selector">
                  <label for="f-option3">その他</label>
                  <div class="check"></div>
                </li>
              </ul>
              <div class="box_s_f clearfix">
              <input type="text">
              <input type="mail">
                <textarea></textarea>
                <button class="sf01">送信</button>
              </div>
            </dd>
          </dl>
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
<?php wp_footer(); ?>
</html>