<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 1,
            'orderby' => 'rand',
        );
        $query_for_banner = new WP_Query($args);

        if ($query_for_banner->have_posts()) {
            echo '<div class="banner">';
            while ($query_for_banner->have_posts()) {
                $query_for_banner->the_post();
                echo get_the_post_thumbnail(null, 'full', array('class' => 'banner-img')); 
                }
        ?>
                <img class="photo-event" src="<?php echo get_template_directory_uri() . '/assets/images/PHOTOGRAPHE EVENT.svg' ?>;">
        <?php
            echo '</div>';
        } else {
            esc_html_e('Désolé, aucune publication ne répond à votre requête.');
        }
        wp_reset_postdata();
  
        the_content();
    endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>
<!-- 
<div class="filtres">Filtres(catégories) (formats) (ordre de tri)</div>

<div class="photos">Photos (WP_QUERY)</div> -->

<?php get_footer() ?>