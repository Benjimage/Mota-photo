<?php
function search_display(){
    $categorie  = $_POST['categorie'];
    $args =array(
        'post_type'         => 'photo',
        'posts_per_page'    => 8,
    ); 

    $tax_query = array();

    if(!empty($categorie)) {
        $args['tax_query'] = array(
            'taxonomy'  => 'categories-photos',
            'field'     => 'slug',
            'terms'     => $categorie,
        );
    } 

    $results = new WP_Query($args);

    $retour = [];


    if( $results->have_posts()) {
       
        while( $results->have_posts()) : 
            $compteur=0;
            ob_start();
            get_template_part('template-parts/photo', 'bloc', array(
                'compteur' => $compteur, 
                'catalog' => $results
            ));
            $compteur++;
            $retour[] = ob_get_clean();
        endwhile;
    }

    

    wp_send_json($retour);
}

add_action('wp_ajax_search_display', 'search_display'); 
add_action('wp_ajax_nopriv_search_display', 'search_display');