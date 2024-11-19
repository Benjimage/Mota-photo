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
        wp_reset_postdata(); ?>
        <div class="catalog">
            <div class="middle less">
                <div class="left-box">
                    <?php get_template_part('template-parts/categorie'); ?>
                    <?php get_template_part('template-parts/formats'); ?>
                </div>
                <?php get_template_part('template-parts/date'); ?>
            </div>
            <?php get_template_part('template-parts/catalog'); ?>
        </div>
<?php
        the_content();
    endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_footer() ?>

<?php 

/*
    1. listes déroulantes select1 (categories) 
    2. select1.on('change', function(event) {
    
        -> appel AJAX -> wp_ajax_... -> WP_QUERY (categorie = ???) -> Mis en page avec JQuery 
    
    })
*/