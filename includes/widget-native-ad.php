<?php
// ----------------- 01. Custom Widget for wordpress -----------------------
add_action( 'widgets_init', 'native_add_init' );

function native_add_init(){
    register_widget( 'native_add' );
}
 
class native_add extends WP_Widget {
 
  public function __construct() {
    $widget_details = array(
        'classname' => 'ad_native_widget',
        'description' => 'Widget for native banners'
    );
    parent::__construct( 'ad_native_widget', 'Native Ad Widget', $widget_details );
  }

  public function form( $instance ) {
    $title = '';
    if( !empty( $instance['title'] ) ) {
        $title = $instance['title'];
    }
 
    $text = '';
    if( !empty( $instance['text'] ) ) {
        $text = $instance['text'];
    }
  ?>
   
  <p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php
    echo $args['after_widget'];
  }
   
  public function update( $new_instance, $old_instance ) {  
    return $new_instance;
  }

  public function widget( $args, $instance ) {
    extract($args, EXTR_SKIP);

    echo $before_widget;
    
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
  
    if (!empty($title))
      echo $before_title . $title . $after_title;;
    
    /* #mtcode: show HTML for loading banners */
    $banner_top_title = get_field( 'banner_top_title','option');

    $content = '<div class="mb30 clearfix"><div class="navi_ad01_in">';
    
    if( have_rows('sidebar_banner_item','option') ): 

      while( have_rows('sidebar_banner_item','option') ): the_row(); 
        $native_banner_pic = get_sub_field('picture_of_banner','option');
        $native_category = get_sub_field('native_category','option');
        $native_slug = $native_category->slug;

        if(is_single()||is_category()) { //is post or category of posts
          if ( is_single() ) {
            $cats =  get_the_category();
            $cat = $cats[0];
          } else {
            $cat = get_category( get_query_var( 'cat' ) );
          }
          $cat_slug = $cat->slug;
          
          if($native_slug == $cat_slug) {
            $content .= '<img src="'.$native_banner_pic.'" alt="">';  
          }  
        } else { //is_page() or other pages (author)
          if($native_category=='') { //if don't select any category
            $content .= '<img src="'.$native_banner_pic.'" alt="">';  
          }
        }
      endwhile;
    endif;


    $content .= '</div></div>';
    /* end #mtcode: show HTML for loading banners */

    echo $content;
    echo $after_widget;
  }
}