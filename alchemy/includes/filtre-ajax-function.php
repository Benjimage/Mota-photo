<?php
function filtre() {
    $categorie  = $_POST['categorie']; /* appel ajax / type: POST, data { categorie } */
    $format  = $_POST['format']; /* appel ajax / type: POST, data { format } */
    $tri  = $_POST['tri']; /* appel ajax / type: POST, data { tri } */

    $tax_query = array();

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