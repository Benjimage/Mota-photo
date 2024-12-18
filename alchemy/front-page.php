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
            <!-- <div class="middle less">
                <div class="left-box"> -->
                    <?php /*  get_template_part('template-parts/categorie'); */ ?>
                    <?php /* get_template_part('template-parts/formats'); */ ?>
                <!-- </div> -->
                <?php get_template_part('template-parts/filters');/* get_template_part('template-parts/date'); */ ?>
            <!-- </div> -->
            
            <?php 
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 10,
                    'orderby' => 'rand',
                );
                $catalog = new WP_Query($args);
                if ($catalog->have_posts()) : 
                    echo('<div class="frame">');
                    $compteur = 0;
                    while ($catalog->have_posts()) { 
                        get_template_part('template-parts/photo', 'bloc', array(
                            'compteur' => $compteur, 
                            'catalog' => $catalog
                        ));
                        $compteur++;
                    } 
                    echo('</div>');
                else:
                    echo '<p>No content found</p>';
                endif;
                wp_reset_postdata(); 
            ?>
            <div class="load-more-container">
                <div class="btn load-more">Charger plus</div>
            </div>
        </div>
<?php endwhile;endif; ?>
<?php get_footer(); ?>