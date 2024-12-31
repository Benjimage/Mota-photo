<?php
require_once get_stylesheet_directory() . '/includes/photo-custom.php';
require_once get_stylesheet_directory() . '/includes/filtre-ajax-function.php';
require_once get_stylesheet_directory() . '/includes/load-more-ajax-function.php';
require_once get_stylesheet_directory() . '/includes/search-results-function.php';

/* Functions */

function alchemy_supports (){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('custom-logo', array('height' => 175,'width' => 400,'flex-width' => true,));
}

function alchemy_enqueue_styles() { 
    wp_enqueue_script('jquery');
    wp_enqueue_style('select2-style', get_stylesheet_directory_uri() . '/css/select2.css', array(), filemtime(get_stylesheet_directory() . '/css/select2.css')); 
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css')); 
    wp_enqueue_script('search-script', get_template_directory_uri() . '/js/search.js', array('jquery'), filemtime(get_template_directory() . '/js/search.js'), true);
    wp_enqueue_script('photo-script', get_template_directory_uri() . '/js/photo.js', array('jquery'), true);
    wp_enqueue_script('contact-script', get_template_directory_uri() . '/js/contact.js', array('jquery'), filemtime(get_template_directory() . '/js/contact.js'), true);
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), filemtime(get_template_directory() . '/js/lightbox.js'), true);
    wp_enqueue_script('select2-script', get_template_directory_uri() . '/js/select2.js', array('jquery'), filemtime(get_template_directory() . '/js/select2.js'), true);
    wp_enqueue_script('site-script', get_template_directory_uri() . '/js/script.js', array('select2-script'), filemtime(get_template_directory() . '/js/script.js'), true);
    $ajax_data = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    );

    wp_add_inline_script('site-script', 'let ajax_data = ' . wp_json_encode($ajax_data) . ';', 'before');
} 

function alchemy_localize_script() {
    $reference_value = get_field('reference');
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
add_action('wp_enqueue_scripts', 'alchemy_enqueue_styles'); 
add_action('wp_enqueue_scripts', 'alchemy_localize_script'); 
add_action('after_setup_theme', 'alchemy_supports');
add_action('after_setup_theme', 'register_alchemy_menu');

/* Filters */
add_filter('nav_menu_css_class', 'alchemy_menu_class');
add_filter('nav_menu_link_attributes', 'alchemy_menu_link_class');
add_filter('wp_nav_menu_items','add_menu_item',10, 2);
add_filter('wp_nav_menu_items','add_li_item',10, 2);

//function filtre() {
//    $categorie  = $_POST['categorie']; /* appel ajax / type: POST, data { categorie } */
//    $format  = $_POST['format']; /* appel ajax / type: POST, data { format } */
//    $tri  = $_POST['tri']; /* appel ajax / type: POST, data { tri } */

/*     $tax_query = array();

    $args = array(
        'post_type'         => 'photo',
        'posts_per_page'    => -1,
        'orderby'           => 'date',
        'order'             => $tri,
    );

    if(!empty($categorie)) {
        $tax_query[] = array(
            'taxonomy'  => 'categories-photos',
            'field'     => 'slug',
            'terms'     => $categorie,
        );
    }

    if(!empty($format)) {
        $tax_query[] = array(
            'taxonomy'  => 'format',
            'field'     => 'slug',
            'terms'     => $format,
        );
    }

    if(!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $catalog = new WP_Query($args);

    $retour = [];


    if($catalog->have_posts()) {
        $compteur = 0;
        while($catalog->have_posts()) : 
            ob_start();
            get_template_part('template-parts/photo', 'bloc', array(
                'compteur' => $compteur, 
                'catalog' => $catalog
            ));
            $retour[] = ob_get_clean();
        endwhile;
    }

      

    wp_send_json($retour);
}

add_action('wp_ajax_filtre', 'filtre'); 
add_action('wp_ajax_nopriv_filtre', 'filtre'); 
 
 */