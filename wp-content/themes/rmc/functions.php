<?php

register_nav_menus ();

/* Creating Option Section */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/* Products Post Type */

add_action( 'init', 'codex_products_init' );
/**
 * Register a Products post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_products_init() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Product', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'product', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Product', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Product', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Product', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Product', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Products', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Products', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Products:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No products found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No product found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'products' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'products', $args );
}

/* end products */

add_action( 'init', 'create_products_taxonomies', 0 );

// create taxonomie, products_or_brochures Types for the post type "products_or_brochures"
function create_products_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Type Products', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type Product', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type Products' ),
		'all_items'         => __( 'All Type Products' ),
		'parent_item'       => __( 'Parent Type Product' ),
		'parent_item_colon' => __( 'Parent Type Product:' ),
		'edit_item'         => __( 'Edit Type Products' ),
		'update_item'       => __( 'Update Type Products' ),
		'add_new_item'      => __( 'Add New Type Product' ),
		'new_item_name'     => __( 'New Type Product Name' ),
		'menu_name'         => __( 'Type Products' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true
	);

	register_taxonomy( 'type_products', array( 'products' ), $args );
}

/* end taxonomi Type Products Or Brochures from Products Or Brochures */

function select_product(){
    echo $_POST['option'];
}
add_action( 'wp_ajax_the_ajax_hook_2', 'select_product' );
add_action( 'wp_ajax_nopriv_the_ajax_hook_2', 'select_product' );


