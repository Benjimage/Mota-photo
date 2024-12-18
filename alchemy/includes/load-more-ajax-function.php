<?php
function load_more(){
    $args =array(
        'post_type'         => 'photo',
        'posts_per_page'    => 8,
        'offset'            => 8,
    );  

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

add_action('wp_ajax_load_more', 'load_more'); 
add_action('wp_ajax_nopriv_load_more', 'load_more');