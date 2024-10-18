<?php get_header() ?>

<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>  <!-- la variable est accessible à partir de là -->
            <div class="main-content">
                <div class="top">
                    <div class="left-column">
                        <div class="meta">
                            <div class="title-box">
                                <h2 class="single-photo-title"><?php the_title();?></h2>
                            </div>
                            <ul>
                                <li>Référence : <?php echo get_post_meta( $post->ID, 'Référence', true ); ?></li>
                                <li>Catégorie : <?php echo strip_tags(get_the_term_list( $post->ID, 'categories-photos' )); ?></li>
                                <li>Format : <?php echo strip_tags(get_the_term_list( $post->ID, 'format' )); ?></li>
                                <li>Type: <?php echo get_post_meta( $post->ID, 'Type', true ); ?></li>
                                <li>Année : <?php echo get_the_date('Y'); ?></li>
                            </ul>
                        </div>
                    </div>
                        <figure class="main-picture">
                           <?php the_post_thumbnail();?>
                        </figure>
                </div>

                <div class="middle">
                    <div class="left">
                        <p>Cette photo vous intéresse ?</p>
                        <div class="btn">Contact</div>
                    </div>
                    <div class="preview">
                        <div class="miniature">
                        <?php echo get_the_post_thumbnail( get_previous_post() ); ?> 
                        </div>
                        <div class="cmd">
                            <div class="prev">
                                <div class="left-arrow">
                                    <div></div>
                                </div>
                            </div>
                            <div class="next">
                                <div class="right-arrow">                        
                                    <div id="next"></div>                        
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom">
                    <h6 class="bottom-title">VOUS AIMEREZ AUSSI</h6>
                    <div class="liked">
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
                                    'terms' => get_the_term_list( $post->ID, 'categories-photos' ), // à mettre dans une variable !
                                )
                            )
                        );

                        $photos = new WP_Query($args);
                        if($photos->have_posts()):
                            while($photos->have_posts()): $photos->the_post();
                            echo '<a href="'. get_the_permalink(). '">'  . get_the_post_thumbnail(null, 'full', array('class'=>'liked-img')) . '</a>';
                        endwhile;
                        endif;
                        wp_reset_postdata();
                        ?> 
                    </div>
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
