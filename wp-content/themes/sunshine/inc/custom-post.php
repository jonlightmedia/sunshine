<?php 

// ========================================================================================================================

function my_custom_post_client() {
  $labels = array(
    'name'               => _x( 'Clients', 'post type general name' ),
    'singular_name'      => _x( 'Client', 'post type singular name' ),
    'add_new'            => _x( 'Add New item', '' ),
    'add_new_item'       => __( 'Add New item' ),
    'edit_item'          => __( 'Edit item' ),
    'new_item'           => __( 'New item' ),
    'all_items'          => __( 'All items' ),
    'view_item'          => __( 'View item' ),
    'search_items'       => __( 'Search item' ),
    'not_found'          => __( 'No item found' ),
    'not_found_in_trash' => __( 'No item found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Clients'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Our clients list',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
  );
  register_post_type( 'client', $args ); 
}
add_action( 'init', 'my_custom_post_client');

function my_custom_post_team() {
  $labels = array(
    'name'               => _x( 'Teams', 'post type general name' ),
    'singular_name'      => _x( 'Team', 'post type singular name' ),
    'add_new'            => _x( 'Add New item', '' ),
    'add_new_item'       => __( 'Add New item' ),
    'edit_item'          => __( 'Edit item' ),
    'new_item'           => __( 'New item' ),
    'all_items'          => __( 'All items' ),
    'view_item'          => __( 'View item' ),
    'search_items'       => __( 'Search item' ),
    'not_found'          => __( 'No item found' ),
    'not_found_in_trash' => __( 'No item found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Teams'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Our teams list',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-universal-access-alt',
    'supports'      => array( 'title', 'thumbnail', 'editor' ),
    'has_archive'   => true,
  );
  register_post_type( 'team', $args ); 
}
add_action( 'init', 'my_custom_post_team');
