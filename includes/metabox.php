<?php 
/*add_action( 'add_meta_boxes', 'add_custom_box_wpse_94701' );
add_action( 'save_post', 'save_postdata_wpse_94701', 10, 2 );

function add_custom_box_wpse_94701() 
{
    // Post types to insert the meta box. Adjust array <-------
    foreach( array( 'post') as $pt )
        add_meta_box(
            'other_post_attached',
            __( '関連記事' ), 
            'blogroll_box_wpse_94701',
            $pt,
            'normal'
        );
}


function blogroll_box_wpse_94701() 
{ 
    $current_user = wp_get_current_user();
    $author_name = $current_user->user_login;
    global $post, $typenow;

    // Get all posts of a type, excluding the current post
    $args = array(
        'numberposts' => -1,
        'post_type'   => $typenow,
        'author_name' => $author_name,
        'post_status' => 'publish,future',
        'exclude'     => $post->ID,
    );
    $get_posts = get_posts( $args );

    $saved = get_post_meta( $post->ID, 'custom_parent', true);

    // Security
    wp_nonce_field( plugin_basename( __FILE__ ), 'noncename_wpse_94701' );

    // Dropdown
    echo '<select multiple="multiple" name="custom_parent" id="custom_parent" width="100%">
        <option value="">- Select other posts -'.'</option>';
    foreach ( $get_posts as $parent_post ) 
    {
        printf(
            '<option value="%d" %s> %s</option>',
            $parent_post->ID,
            selected( $saved, $parent_post->ID, false),
            $parent_post->post_title
        );
    }
    echo '</select>';
}


function save_postdata_wpse_94701( $post_id, $post_object ) 
{
    // Verify auto save 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    // Security
    if ( 
        !isset( $_POST['noncename_wpse_94701'] ) 
        || !wp_verify_nonce( $_POST['noncename_wpse_94701'], plugin_basename( __FILE__ ) ) 
        )
        return;

    // Allowed post types. Adjust array <-------
    $allowed_post_types = array( 'post', 'portfolio' );
    if ( !in_array( $post_object->post_type, $allowed_post_types ) )
        return;

    // Process post data
    if ( isset( $_POST['custom_parent'] )  )
        update_post_meta( $post_id, 'custom_parent', $_POST['custom_parent'] );
    else 
        delete_post_meta( $post_id, 'custom_parent' );
} */

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
    // Add other metaboxes as needed

}

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options( $query_args ) {
    $current_user = wp_get_current_user();
    $author_name = $current_user->user_login;

    global $post, $typenow;
    $args = array(
        'post_type'   => 'post',
        'numberposts' => 10,
        'author_name' => $author_name,
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
      