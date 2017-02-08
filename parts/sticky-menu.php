<?php if(is_home()||is_front_page()) {
    $menu_class = " fixed";
} else {
    $menu_class = '';
} ?>

<div id="sticky_menu_header" class="clearfix<?php echo $menu_class; ?>">
  <div class="inner clearfix">
    <div class="sticky_menu_top">
      <p id="stiky_logo"><a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo_sticky.png" alt="" /></a></p>
      <div id="btn_menu"><a href="javascript:void(0)">
        <div id="nav-icon"> <span></span> <span></span> <span></span> <span></span> </div>
        </a></div>
      <!-- nav for PC -->
      <?php
      $arg_sticky = array (
                        'theme_location' => 'sticky-menu-pc',
                        'menu_id' => 'list_menutop_sticky'
                      );
        wp_nav_menu($arg_sticky);
      ?>
        <!-- nav for works inner -->

      <div id="works_menu_top">
        <div class="list_cate_menu clearfix">
          <div class="list_cate_menu_inner clearfix">
            <ul id="list_cate_menu01">
              <?php
                $wactive_slug = '';
                $default_posts_per_page = get_option( 'posts_per_page' );
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                global $post;
                global $wp_query;
                $args = array(
                  'post_type' =>'service',
                  'posts_per_page' => -1,
                  'orderby' => date,
                  'order' => desc,
                  'field' => 'slug'
                );
                $the_query = new WP_Query( $args );
                $blog_posts = get_posts($args);
                if($blog_posts) {
                $i=0;
                foreach($blog_posts as $post) : setup_postdata($post);
                  $service_id = $post->ID;
                  $chkworks = check_has_work($service_id);
                  if($chkworks == 'true') {
                    $i++;
              ?><li><a <?php if($i==1) { echo 'class="is-active"'; $wactive_slug = get_the_slug($service_id); } ?> href="<?php echo get_permalink($service_id); ?>" role="#w-<?php echo get_the_slug($service_id); ?>">
                <?php echo get_the_title( $service_id); ?></a></li>
                <?php
                    }

                  endforeach;
                  wp_reset_postdata();
                }

                //echo '<li>'.check_has_work(36).'</li>';
              ?>


            </ul>
          </div>
        </div>
        <div class="list_single_menu clearfix">
          <div class="list_single_menu_inner clearfix">
              <?php
                global $wp_query;
                $args = array(
                  'post_type' =>'service',
                  'posts_per_page' => -1,
                  'orderby' => date,
                  'order' => desc,
                  'field' => 'slug'
                );
                $the_query = new WP_Query( $args );
                $blog_posts = get_posts($args);
                if($blog_posts) {

                  $i=1;
                  foreach($blog_posts as $post) : setup_postdata($post);
                    $service_id = $post->ID;
                    $service_of_work = get_the_slug($post->ID);
                   ?>
                    <div <?php if($wactive_slug == $service_of_work) { echo "style='display:block;'"; } ?> id="w-<?php echo get_the_slug($post->ID); ?>" class="listsgPost works clearfix">
                      <ul>
                        <?php
                          // start load works
                              global $post;
                              global $wp_query;
                              $args = array(
                                'post_type' =>'work',
                                'orderby' => date,
                                'posts_per_page' => -1,
                                'field' => 'slug',
                                'paged' => $paged
                              );
                              $the_query = new WP_Query( $args );
                              $blog_posts = get_posts($args);
                              if($blog_posts) {
                                $j=1;
                                foreach($blog_posts as $post) : setup_postdata($post);

                                  $post_categories = wp_get_post_categories(get_the_ID());
                                  $thumb = get_post_thumbnail_id();
                                  $img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image
                                  $img_sub_menu = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_sub_menu');
                                  $img_sub_menu_src = $img_sub_menu[0];
                                  $time = get_the_date('Y.m.d', $post->ID);
                                  $nd = get_the_content();
                                  $work_id= $post->ID;
                                  $work_title = get_the_title($work_id);
                                  $work_content = get_the_content($work_id);

                                  // custom fields
                                  $work_product_title = get_field('work_product_title',$post->ID);
                                  $work_product_sub_title = get_field('work_product_sub_title',$post->ID);
                                  $work_product_cost = get_field('work_product_cost',$post->ID);
                                  $work_product_period = get_field('work_product_period',$post->ID);
                                  $work_product_title = get_field('work_product_title',$post->ID);
                                  $work_product_link = get_field('work_product_link',$post->ID);
                                  $service_slugs = '';
                                  $service_name = '';
                                  $service_child_id = '';
                                  //get service is the same to current selected service tab
                                  $post_objects = get_field('selected_service',$post->ID);

                                    if( $post_objects ):
                                      foreach( $post_objects as $post):

                                        $service_slugs .= get_the_slug($post->ID). ' ';
                                        $service_name = get_the_title($post->ID);
                                          $service_child_id = $post->ID;
                                          $field_id = get_the_ID();
                                          $color_code = get_field('service_color',$field_id);
                                      endforeach;
                                      wp_reset_postdata();
                                    endif;


                                  ?>
                                  <?php
                                  if($service_child_id==$service_id) { $j++;
                                    if($j<=5) {
                                  ?>
                                  <li>
                                    <a href="<?php echo get_permalink($work_id); ?>" class="header-dropdown-item">
                                      <img class="header-dropdown-image" src="<?php echo $img_sub_menu_src; ?>" >
                                      <p class="header-dropdown-title"><?php echo $work_title; ?></p>
                                    </a>
                                  </li>
                                  <?php }
                                    }
                                    endforeach; ?>
                                  <li>
                                    <div class="header-dropdown-more">
                                      <p class="btn btn01 btn_hblue"><a href="<?php echo get_permalink($service_id); ?>"><span>もっと見る</span></a></p>
                                    </div>
                                  </li>
                              <?php }
                          // end load works
                        ?>
                      </ul>
                    </div>
                  <?php endforeach;
                    wp_reset_postdata();
                }
              ?>

          </div>
        </div>
      </div>
      <!-- //nav for works inner -->

      <!-- nav for blog inner -->

      <div id="blog_menu_top">
        <div class="list_cate_menu clearfix">
          <div class="list_cate_menu_inner clearfix">
            <ul id="list_cate_menu01">
              <?php
                $terms = get_terms(array(
                            'taxonomy' => 'blog-cat',
                            'hide_empty' => true,
                        ));
                $i = 0;
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                  foreach ( $terms as $term ) {
                    $i++;
                    ?>
                    <li><a <?php if($i==1) { echo 'class="is-active"'; } ?> href="<?php echo get_term_link($term); ?>" role="#<?php echo $term->slug;?>">
                      <?php echo $term->name; ?></a>
                    </li>
                  <?php }
                }
              ?>
            </ul>
          </div>
        </div>
        <div class="list_single_menu clearfix">
          <div class="list_single_menu_inner clearfix">
            <?php
              $terms = get_terms(array(
                          'taxonomy' => 'blog-cat',
                          'hide_empty' => false,
                      ));
              $i = 0;
              if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                foreach ( $terms as $term ) {
                  $i++;
                  ?>
                  <div id="<?php echo $term->slug; ?>" class="listsgPost clearfix">
                    <ul>
                      <?php
                        global $post;
                        global $wp_query;
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $query = new WP_Query( array(
                            'post_type' => 'blog',       // name of post type.
                            'posts_per_page' => 5,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'blog-cat',   // taxonomy name
                                    'field' => 'slug',         // term_id, slug or name
                                    'terms' => $term->slug     // term id, term slug or term name
                                )
                            )
                          ) );
                          $number_blogs = $query->found_posts;
                          while ( $query->have_posts() ) : $query->the_post();
                              $img_sub_menu = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_sub_menu');
                              $img_sub_menu_src = $img_sub_menu[0];
                            ?>
                            <li>
                              <a href="<?php echo get_permalink(); ?>" class="header-dropdown-item">
                                <img class="header-dropdown-image" src="<?php echo $img_sub_menu_src; ?>" >
                                <p class="header-dropdown-title"><?php echo get_the_title(); ?></p>
                              </a>
                            </li>
                          <?php endwhile;
                          wp_reset_query();
                        ?>
                        <li>
                          <div class="header-dropdown-more">
                            <p class="btn btn01 btn_hblue"><a href="<?php echo get_term_link($term); ?>"><span>もっと見る</span></a></p>
                          </div>
                        </li>
                    </ul>
                  </div>
                  <?php }
              }
            ?>
          </div>
        </div>
      </div>
      <!-- //nav for blog inner -->

      <!-- nav for PC -->

      <!-- nav for SP -->
      <?php
       $arg_sticky_2 = array (
                        'theme_location' => 'sticky-menu-sp',
                        'menu_id' => 'nav_menu_sp'
                      );
        wp_nav_menu($arg_sticky_2);

      ?>

      <!-- nav for SP -->
    </div>
  </div>
</div>
