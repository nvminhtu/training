<?php
function pretty_pagination() {
  echo 'test';
  $range = 4;
  global $paged;

  if(empty($paged)) $paged = 1;

  $orig_query = $wp_query; // fix for pagination to work
  $wp_query =  $the_query;
  echo $pages = $wp_query->max_num_pages;

  if(!$pages){
      $pages = 1;
  }


  if(1 != $pages) {
      echo '<div class="navi_list clearfix"><ul>';
      if($paged > 1) {
        echo '<li class="prev_page"><span>&lsaquo; Previous</span></a></li>';
      } else {
        echo '<li class="prev_page disable"><a href="'.get_pagenum_link($paged - 1).'">&lsaquo; Previous</a></li>';
      }

      for ($i=1; $i <= $pages; $i++) {
        if (1 != $pages) {
              if($paged == $i) {
                echo '<li class="active"><span class="current">'.$i.'</span></li>';
              } else {
                echo '<li><a href="'.get_bloginfo('siteurl').'/blog/page/'.$i.'" class="inactive">'.$i.'</a></li>';
              }
          }
      }
      $next_page = $paged + 1;
      if ($paged < $pages) echo '<li class="next_page"><a href="'.get_bloginfo('siteurl').'/blog/page/'.$next_page.'">Next &rsaquo;</a>';
      echo '</ul></div>';
  }

  $wp_query = $orig_query;
 }

/*
function custom_pagination() {
  $range = 4;
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;
  if($pages == '') {
      $orig_query = $wp_query; // fix for pagination to work
      $wp_query =  $the_query;
      $pages = $wp_query->max_num_pages;

      if(!$pages){
          $pages = 1;
      }
  }

  if(1 != $pages) {
      $content_shortcode .= '<div class=\"pagination\">';
      //$content_shortcode .= '<span>Page '.$paged.' of '.$pages.'</span>';
      // if($paged > 2 && $paged > $range+1 && $showitems < $pages) $content_shortcode .= '<a href="'.get_pagenum_link(1).'">&laquo; First</a>';
      if($paged > 1 && $showitems < $pages) $content_shortcode .= '<a href="'.get_pagenum_link($paged - 1).'">&lsaquo; Previous</a>';

      for ($i=1; $i <= $pages; $i++) {
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
              if($paged == $i) {
                $content_shortcode .= '<span class="current">'.$i.'</span>';
              } else {
                // $content_shortcode .= '<a href="'.get_bloginfo('siteurl').'/blog/page/'.$i.'">'.$i.'</a>';
                $content_shortcode .= '<a href="'.get_bloginfo('siteurl').'/blog/page/'.$i.'" class="inactive">'.$i.'</a>';
              }
          }
      }
      $next_page = $paged + 1;
      if ($paged < $pages && $showitems < $pages)  $content_shortcode .= '<a href="'.get_bloginfo('siteurl').'/blog/page/'.$next_page.'">Next &rsaquo;</a>';
      //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)  $content_shortcode .= '<a href="'.get_pagenum_link($pages).'">Last &raquo;</a>';
       $content_shortcode .= '</div>';
  }
  $wp_query = $orig_query;
} */
 ?>
