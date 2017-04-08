<?php 
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_traijing_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'traijing_metabox',
        'title'         => __( 'Traijing Related Posts', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

  
    $cmb->add_field( array(
        'name'       => __( 'Select Related Posts', 'cmb2' ),
        'desc'       => __( 'check a post or multi posts', 'cmb2' ),
        'id'         => $prefix . 'post_multicheckbox',
        'type'       => 'multicheck',
        'options_cb' => 'cmb2_get_your_post_type_post_options',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Select Map Posts', 'cmb2' ),
        'desc'       => __( 'check locatio marker', 'cmb2' ),
        'id'         => $prefix . 'google_map',
        'type'       => 'pw_map'
    ) );    // Add other metaboxes as needed

    // User form
     $cmb_user = new_cmb2_box( array(
        'id'               => $prefix . 'edit',
        'title'            => esc_html__( 'User Profile Metabox', 'cmb2' ), // Doesn't output for user boxes
        'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
        'show_names'       => true
    ) );
    // Add focus topic
    $cmb_user->add_field( array(
        'name' => __( 'Focus Topic', 'cmb2' ),
        'desc' => __( 'Add or remove topic', 'cmb2' ),
        'id'   => $prefix . 'related_publications',
        'type' => 'tags',
    ) );
}

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options( $query_args ) {
    global $post, $typenow;

    $current_user = wp_get_current_user();
    $author_name = $current_user->user_login;
    $author_id = $post->post_author;
    
    $args = array(
        'post_type'   => 'post',
        'numberposts' => 10,
        'author' => $author_id,
        'post_status' => 'publish,future',
        'exclude'     => $post->ID
    );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}

/**
 * Gets 5 posts for your_post_type and displays them as options
 * @return array An array of options that matches the CMB2 options array
 */
function cmb2_get_your_post_type_post_options() {
    return cmb2_get_post_options( );
}
      