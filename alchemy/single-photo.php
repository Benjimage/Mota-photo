<?php get_header() ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>  
            <div class="main-content">
                <div class="top">
                    <div class="left-column">
                        <div class="meta">
                            <div class="title-box">
                                <h2 class="single-photo-title"><?php the_title();?></h2>
                            </div>
                            <ul>
                                <li>Référence : <?php echo get_post_field('reference'); ?></li>
                                <li>Catégorie : <?php echo strip_tags(get_the_term_list( $post->ID, 'categories-photos' )); ?></li>
                                <li>Format : <?php echo strip_tags(get_the_term_list( $post->ID, 'format' )); ?></li>
                                <li>Type: <?php echo get_post_field( 'type'); ?></li>
                                <li>Année : <?php echo get_the_date('Y'); ?></li>
                            </ul>
                        </div>
                    </div>
                        <figure class="main-picture">
                           <?php the_post_thumbnail();?>
                        </figure>
                </div>
<?php 
    $next = get_next_post();
    $prev = get_previous_post();
?>
                <div class="middle">
                    <div class="left-box">
                        <p>Cette photo vous intéresse ?</p>
                        <div class="btn contact">Contact</div>
                    </div>
                    <div class="preview">
                    <div class="miniature prev-thumbnail">
                        <?php 
                            if($prev) {
                                echo get_the_post_thumbnail( $prev, 'post-thumbnail', array('class' => 'back') ); 
                            } else {
                                echo '';
                            }    
                        ?> 
                        </div>
                        <div class="miniature next-thumbnail">
                        <?php 
                            if($next){
                                echo get_the_post_thumbnail( $next, 'post-thumbnail', array('class' => 'to') ); 
                            } else {
                                echo '';
                            }
                        ?> 
                        </div>
                        <div class="cmd">
                            <?php if($prev) { ?>
                                <a href="<?php echo get_the_permalink($prev)?>" class="prev">
                                    <img src="<?php echo get_template_directory_uri() ."/assets/icones/left-arrow.svg"?>" class="arrow left">
                                </a>
                            <?php } ?>
                            <?php if($next) { ?>
                                <a href="<?php echo get_the_permalink($next)?>" class="next">
                                    <img src="<?php echo get_template_directory_uri() ."/assets/icones/right-arrow.svg"?>" class="arrow right">
                                </a>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>

                
                <div class="bottom">
                    <?php 
                        $args = array(
                            'post_type' => 'photo',
                            'posts_per_page' => 2,
                            'orderby' => 'rand',
                            'post__not_in' => array(get_the_ID()),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categories-photos',
                                    'field' => 'slug',
                                    'terms' => get_the_term_list( $post->ID, 'categories-photos' ), 
                                )
                            )
                        );

                        $catalog = new WP_Query($args);
                        
                        if($catalog->have_posts()) {
                    ?>
                        <h6 class="bottom-title">VOUS AIMEREZ AUSSI</h6>
                        <div class="liked">
                        <?php 
                            $compteur=0;
                            while($catalog->have_posts()): 
                                get_template_part('template-parts/photo', 'bloc', array(
                                    'compteur' => $compteur, 
                                    'catalog' => $catalog
                                ));
                            endwhile;
                            ?> 
                        </div>
                    <?php } else { ?>
                        <h6 class="bottom-title">AUCUNE IMAGE SIMILAIRE</h6>
                    <?php 
                        } 
                        wp_reset_postdata(); 
                    ?>
                </div>
            </div>
    </main>
<?php 
    the_content();
    endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
?>

<?php get_footer() ?>
