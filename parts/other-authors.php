<?php 
  /***
   ** Load other Authors
  ***/
?>
<!-- <div class="related_auther clearfix">
  <p class="ptitle_02">トレージン</p>
  <div id="slide_torejin">
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img01.jpg" alt="" /></a></p>
      <p class="torejin_name">まなみ</p>
    </div>
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img02.jpg" alt="" /></a></p>
      <p class="torejin_name">鴻池はなこ</p>
    </div>
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img03.jpg" alt="" /></a></p>
      <p class="torejin_name">S. Masako</p>
    </div>
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img04.jpg" alt="" /></a></p>
      <p class="torejin_name">もこもこ</p>
    </div>
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img05.jpg" alt="" /></a></p>
      <p class="torejin_name">シュワルツももこ</p>
    </div>
    <div class="torejin_bx01">
      <p class="torejin_img"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/torejin_img06.jpg" alt="" /></a></p>
      <p class="torejin_name">金本池ももこ</p>
    </div>
  </div>
  <p class="btn03 btn"><a href="">トレージン一覧</a></p>
</div> -->

<div class="related_auther clearfix">
  <p class="ptitle_02">トレージン</p>
<?php 
    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query(array (
        'role' => 'Editor',
        'order' => 'ASC',
        'orderby' => 'display_name'
    ));

    // Get the results
    $user_data = $wp_user_query->get_results();

    // Looping managers
    if (!empty($user_data)) {
        echo '<div id="slide_torejin">';
        foreach ($user_data as $user)
        {
            // get all the user's data
            $user_info = get_userdata($user->ID);
            $firstname = $user_info->first_name;
            $lastname = $user_info->last_name;
            $fullname = $firstname.' '.$lastname;
            $editor_gallery = get_field('profile_picture', 'user_'. $user->ID);
            $editor_avatar_url = $editor_gallery[0]['sizes']['img_author_avatar'];
            echo '<div class="torejin_bx01">';
         ?>
            <p class="torejin_img"><a href="#"><img src="<?php echo $editor_avatar_url; ?>" alt="" /></a></p>
            <p class="torejin_name"><?php echo $fullname; ?></p>
         <?php   
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'No users found';
    }
?>
  <p class="btn03 btn"><a href="">トレージン一覧</a></p>
</div>