<?php 
  /***
   ** Load other Authors
  ***/
?>
<div class="related_auther clearfix mt30">
  <p class="ptitle_02">トレージン</p>
  <?php 
    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query(array (
        'role' => 'Editor',
        'order' => 'ASC',
        'orderby' => 'display_name',
        'exclude' => array($author_id)
    ));

    // Get the results
    $user_data = $wp_user_query->get_results();

    // Looping managers
    if (!empty($user_data)) {
        echo '<div id="slide_torejin">';
        foreach ($user_data as $user) {
            // get all the user's data
            $user_info = get_userdata($user->ID);
            $author_id = $user->ID;
            $firstname = $user_info->first_name;
            $lastname = $user_info->last_name;
            $fullname = $lastname.' '.$firstname;
            $editor_avatar_url = get_field('profile_avatar', 'user_'. $user->ID);
            //$editor_avatar_url = $editor_gallery[0]['sizes']['img_author_avatar'];
            echo '<div class="torejin_bx01">';
         ?>
            <p class="torejin_img"><a href="<?php echo get_author_posts_url( $author_id); ?>"><img src="<?php echo $editor_avatar_url; ?>" alt="<?php echo $fullname; ?>" /></a></p>
            <p class="torejin_name"><?php echo $fullname; ?></p>
         <?php   
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'No other users found';
    }
?>
  <p class="btn03 btn"><a href="<?php bloginfo('url'); ?>/user-list/">トレージン一覧</a></p>
</div>