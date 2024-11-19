<?php
require_once get_stylesheet_directory() . '/includes/photo-custom.php';

/* Functions */

function alchemy_supports (){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('custom-logo', array('height' => 175,'width' => 400,'flex-width' => true,));
}

function alchemy_enqueue_styles() { 
    wp_enqueue_script('jquery');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css')); 
    wp_enqueue_script('photo-script', get_template_directory_uri() . '/js/photo.js', array('jquery'), true);
    wp_enqueue_script('contact-script', get_template_directory_uri() . '/js/contact.js', array('jquery'), filemtime(get_template_directory() . '/js/contact.js'), true);
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), filemtime(get_template_directory() . '/js/lightbox.js'), true);
    wp_enqueue_script('filter-script', get_template_directory_uri() . '/js/filters.js', array('jquery'), filemtime(get_template_directory() . '/js/filters.js'), true);
} 
/* function enqueue_select2() {
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), null, true);
}
 */
function alchemy_localize_script() {
    $reference_value = get_post_field('reference');
    wp_localize_script('photo-script', 'referencePhoto', array('inputValue' => esc_js($reference_value)));
}

function register_alchemy_menu(){
	register_nav_menus(
		array(
			'header' => esc_html__( 'Menu header', 'alchemy' ),
			'footer' => esc_html__( 'Menu footer', 'alchemy' )
		)
	);
}

function alchemy_menu_class($classes) {
    $classes[] = 'alchemy_menu_class';
    return $classes;
}

function alchemy_menu_link_class($attrs) {
    $attrs['class'] = 'alchemy_menu_link_class';
    return $attrs;
}

function add_menu_item( $items, $args){
   if($args->theme_location === 'header') {
       $items .= "<li class=\"alchemy_menu_class contact\">CONTACT</li>";
   }
   return $items;
};  

function add_li_item( $items, $args){
    if($args->theme_location === 'footer') {
        $items .= "<li class=\"alchemy_menu_class\">TOUS DROITS RÉSERVÉS</li>";
    }
    return $items;
 };  
 
/* Actions */
/* add_action('wp_enqueue_scripts', 'enqueue_select2'); */
add_action('wp_enqueue_scripts', 'alchemy_enqueue_styles'); 
add_action('wp_enqueue_scripts', 'alchemy_localize_script'); 
add_action('after_setup_theme', 'alchemy_supports');
add_action('after_setup_theme', 'register_alchemy_menu');

/* Filters */
add_filter('nav_menu_css_class', 'alchemy_menu_class');
add_filter('nav_menu_link_attributes', 'alchemy_menu_link_class');
add_filter('wp_nav_menu_items','add_menu_item',10, 2);
add_filter('wp_nav_menu_items','add_li_item',10, 2);


 
 
