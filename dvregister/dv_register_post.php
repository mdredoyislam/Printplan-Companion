<?php

// Register Custom Taxonomy
function dv_post_type() {
    $labels = array(
		'name'                  => 'Projects',
		'singular_name'         => 'Projects',
		'menu_name'             => 'Projects',
		'name_admin_bar'        => 'Projects',
		'archives'              => 'Item Project',
		'attributes'            => '',
		'parent_item_colon'     => '',
		'all_items'             => 'All Project',
		'add_new_item'          => 'Add New Project',
		'add_new'               => 'Add New',
	);
	$args = array(
		'label'                 => 'Projects',
		'description'           => 'All Projects',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail', 'status'),
		'taxonomies'            => array( 'project_type', 'project_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
        'menu_icon'             => 'dashicons-layout',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'dv_post_type' );


// Register Custom Taxonomy
function dv_register_taxonomy() {

	$labels = array(
		'name'                       => 'Project Type',
		'singular_name'              => 'Project Type',
		'menu_name'                  => 'Project Type',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'project_type', array( 'project' ), $args );

	$labels = array(
		'name'                       => 'Project Tags',
		'singular_name'              => 'Project Tags',
		'menu_name'                  => 'Project Tags',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_tag', array( 'project' ), $args );

}
add_action( 'init', 'dv_register_taxonomy', 0 );