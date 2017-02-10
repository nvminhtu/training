<?php
/*** 01.Add support for theme ***/
add_theme_support( 'title-tag' );

// add Featured Image
add_theme_support( 'post-thumbnails' );

add_image_size( 'img_avatar', 192, 192, true );
add_image_size( 'img_author_avatar', 260, 260, true );
add_image_size( 'img_author_tiny', 56, 56, true );
add_image_size( 'img_author_thumb', 116, 116, true );
add_image_size( 'img_author_list', 330, 330, true );
add_image_size( 'img_author_slider', 668, 9999);

// add image for post
add_image_size( 'img_blog_list', 220, 164, true );

// remove filter of wpautop
// remove_filter( 'the_excerpt', 'wpautop' );
// remove_filter( 'the_content', 'wpautop' );

// increa limit upload file
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/*** 02.Add included files ***/
require_once (dirname(__FILE__) . '/includes/add-image-size.php');
//require_once (dirname(__FILE__) . '/includes/custom-post-types.php');
require_once (dirname(__FILE__) . '/includes/widgets.php');

// ------ require shortcode ----
require_once (dirname(__FILE__) . '/includes/shortcode.php');
require_once (dirname(__FILE__) . '/includes/shortcode-member-blogs.php');
require_once (dirname(__FILE__) . '/includes/shortcode-member-info.php');

// ------ alloww shortcode in widget text
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

/*** 03.Setting for theme ***/
if (function_exists('register_nav_menu')) {
  register_nav_menu('sticky-menu-pc', 'Sticky Menu PC');
  register_nav_menu('sticky-menu-sp', 'Sticky Menu SP');
  register_nav_menu('service-menu', 'Service Menu');
  register_nav_menu('top-menu', 'Top Menu');
}

function add_custom_query_var( $vars ){
  $vars[] = "category";
  return $vars;
}
add_filter( 'query_vars', 'add_custom_query_var' );

function get_the_slug( $id=null ){
  if( empty($id) ):
    global $post;
    if( empty($post) )
      return ''; // No global $post var available.
    $id = $post->ID;
  endif;

  $slug = basename( get_permalink($id) );
  return $slug;
}
//limt character for contents
function limit_content() {
  $content = get_the_content();
  $content = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  echo $content;  
}


/*** 04. Update Editor ***/

function trim_word($text, $length, $startPoint=0, $allowedTags=""){
    $text = html_entity_decode(htmlspecialchars_decode($text));
    $text = strip_tags($text, $allowedTags);
    return $text = substr($text, $startPoint, $length);
}

function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/images/favicon.ico';
	  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height|class)="\d*"\s/', "", $html );
   return $html;
}
add_filter( 'get_image_tag_class', '__return_empty_string' );


//add <p> tag around image when inser to media
if( is_admin() ) {
  add_filter( 'image_send_to_editor', 'wp_image_wrap_init', 10, 8 );
  function wp_image_wrap_init( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
      return ' <p class="center">'. $html .'</p>';
  }
}

/*** 05. Customize Fields Admin ***/

function remove_website_row_wpse_94963_css() {
  echo '<style>tr.user-url-wrap{ display: none; }</style>';
  echo '<style>tr.user-profile-picture{ display: none; }</style>';
  echo '<style>tr.user-rich-editing-wrap{ display: none; }</style>';
  echo '<style>tr.user-admin-color-wrap{ display: none; }</style>';
  echo '<style>tr.user-comment-shortcuts-wrap{ display: none; }</style>';
  echo '<style>tr.user-admin-bar-front-wrap{ display: none; }</style>';
  echo '<style>tr.user-description-wrap{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_website_row_wpse_94963_css' );
add_action( 'admin_head-profile.php',   'remove_website_row_wpse_94963_css' ); 


