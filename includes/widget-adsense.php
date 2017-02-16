<?php
// ----------------- 01. Custom Widget for wordpress -----------------------
add_action( 'widgets_init', 'my_widget_init' );

function my_widget_init(){
    register_widget( 'my_widget' );
}
 
class my_widget extends WP_Widget {
 
  public function __construct() {
    $widget_details = array(
        'classname' => 'ad_widget',
        'description' => 'Widget for advertising'
    );
    parent::__construct( 'ad_widget', 'Ad Widget', $widget_details );
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

  <p>
    <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" ><?php echo esc_attr( $text ); ?></textarea>
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
    $text = empty($instance['title']) ? ' ' : $instance['text'];
    if (!empty($title))
      echo $before_title . $title . $after_title;;
    
    $content = '<div class="mb30 clearfix">
      <div class="navi_ad01_in">'.$text.'</div>
    </div>';

    echo $content;
    echo $after_widget;
  }
}