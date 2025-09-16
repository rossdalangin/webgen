<?php
/**
 * Custom Post Type Definitions
 *
 * @package FitPro
 */

/**
 * Register Custom Post Types
 */
function fitpro_register_post_types() {

    // --- Team Members CPT ---
    $team_labels = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'fitpro' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'fitpro' ),
        'menu_name'             => __( 'Team Members', 'fitpro' ),
        'name_admin_bar'        => __( 'Team Member', 'fitpro' ),
        'archives'              => __( 'Team Member Archives', 'fitpro' ),
        'attributes'            => __( 'Team Member Attributes', 'fitpro' ),
        'parent_item_colon'     => __( 'Parent Member:', 'fitpro' ),
        'all_items'             => __( 'All Team Members', 'fitpro' ),
        'add_new_item'          => __( 'Add New Team Member', 'fitpro' ),
        'add_new'               => __( 'Add New', 'fitpro' ),
        'new_item'              => __( 'New Team Member', 'fitpro' ),
        'edit_item'             => __( 'Edit Team Member', 'fitpro' ),
        'update_item'           => __( 'Update Team Member', 'fitpro' ),
        'view_item'             => __( 'View Team Member', 'fitpro' ),
        'view_items'            => __( 'View Team Members', 'fitpro' ),
        'search_items'          => __( 'Search Team Member', 'fitpro' ),
    );
    $team_args = array(
        'label'                 => __( 'Team Member', 'fitpro' ),
        'description'           => __( 'Post Type for Team Members', 'fitpro' ),
        'labels'                => $team_labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'fitpro_team', $team_args );


    // --- Services CPT ---
    $service_labels = array(
        'name'                  => _x( 'Services', 'Post Type General Name', 'fitpro' ),
        'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'fitpro' ),
        'menu_name'             => __( 'Services', 'fitpro' ),
        'name_admin_bar'        => __( 'Service', 'fitpro' ),
        'archives'              => __( 'Service Archives', 'fitpro' ),
        'attributes'            => __( 'Service Attributes', 'fitpro' ),
        'parent_item_colon'     => __( 'Parent Service:', 'fitpro' ),
        'all_items'             => __( 'All Services', 'fitpro' ),
        'add_new_item'          => __( 'Add New Service', 'fitpro' ),
        'add_new'               => __( 'Add New', 'fitpro' ),
        'new_item'              => __( 'New Service', 'fitpro' ),
        'edit_item'             => __( 'Edit Service', 'fitpro' ),
        'update_item'           => __( 'Update Service', 'fitpro' ),
        'view_item'             => __( 'View Service', 'fitpro' ),
        'view_items'            => __( 'View Services', 'fitpro' ),
        'search_items'          => __( 'Search Service', 'fitpro' ),
    );
    $service_args = array(
        'label'                 => __( 'Service', 'fitpro' ),
        'description'           => __( 'Post Type for Services', 'fitpro' ),
        'labels'                => $service_labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'fitpro_service', $service_args );

}
add_action( 'init', 'fitpro_register_post_types', 0 );
