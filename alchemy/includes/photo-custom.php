<?php
// Register Custom Post Type
function photo_post_type() {

	$labels = array(
		'name'                  => _x( 'Photos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Photo', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Photos', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Toutes les photos', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une photo', 'text_domain' ),
		'add_new'               => __( 'Ajouter une photo', 'text_domain' ),
		'new_item'              => __( 'Nouvelle photo', 'text_domain' ),
		'edit_item'             => __( 'Editer le post photo', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour ', 'text_domain' ),
		'view_item'             => __( 'Voir la photo', 'text_domain' ),
		'view_items'            => __( 'Voir les photos', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Image principale', 'text_domain' ),
		'set_featured_image'    => __( 'Définir l\'image principale', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image principale', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image principale', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer la photo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'photo', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
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
		'capability_type'       => 'page',
	);
	register_post_type( 'photo', $args );

}
add_action( 'init', 'photo_post_type', 0 );

// Register Custom Taxonomy
function photo_format() {

	$labels = array(
		'name'                       => _x( 'Formats photos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Format photo', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Formats', 'text_domain' ),
		'all_items'                  => __( 'Tous les formats', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Ajouter un format', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'format', array( 'photo' ), $args );

}
add_action( 'init', 'photo_format', 0 );

// Register Custom Taxonomy
function categories_photos() {

	$labels = array(
		'name'                       => _x( 'Categories photos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Categorie photo', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Catégorie photo', 'text_domain' ),
		'all_items'                  => __( 'Toutes les catégories de photos', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'Nom de la nouvelle catégorie', 'text_domain' ),
		'add_new_item'               => __( 'Ajouter une catégorie', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'categories photos', array( 'photo' ), $args );

}
add_action( 'init', 'categories_photos', 0 );


