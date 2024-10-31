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
                                <li>Référence : <?php echo get_field('reference'); ?></li>
                                <li>Catégorie : <?php echo strip_tags(get_the_term_list( $post->ID, 'categories-photos' )); ?></li>
                                <li>Format : <?php echo strip_tags(get_the_term_list( $post->ID, 'format' )); ?></li>
                                <li>Type: <?php echo get_field( 'type'); ?></li>
                                <li>Année : <?php echo get_the_date('Y'); ?></li>
                            </ul>
                        </div>
                    </div>
                        <figure class="main-picture">
                           <?php the_post_thumbnail();?>
                        </figure>
                </div>

                <div class="middle">
                    <div class="left-box">
                        <p>Cette photo vous intéresse ?</p>
                        <div class="btn action">Contact</div>
                    </div>
                    <div class="preview">
                    <div class="miniature prev-thumbnail">
                        <?php echo get_the_post_thumbnail( get_previous_post(), 'post-thumbnail', array('class' => 'back') ); ?> 
                        </div>
                        <div class="miniature next-thumbnail">
                        <?php 
                        if(is_single('team-mariee')){
                            echo '';
                        } else {
                            echo get_the_post_thumbnail( get_next_post(), 'post-thumbnail', array('class' => 'to') ); 
                        }
                        ?> 
                        </div>
                        <div class="cmd">
                            <a href="<?php echo get_the_permalink(get_previous_post())?>" class="prev">
                                <img src="<?php echo get_template_directory_uri() ."/assets/icones/left-arrow.svg"?>" class="arrow left">
                            </a>
                            <a href="<?php echo get_the_permalink(get_next_post())?>" class="next">
                                <img src="<?php echo get_template_directory_uri() ."/assets/icones/right-arrow.svg"?>" class="arrow right">
                            </a>
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
                                    'terms' => get_the_term_list( $post->ID, 'categories-photos' ), 
                                )
                            )
                        );

                        $photos = new WP_Query($args);
                        if($photos->have_posts()):
                            while($photos->have_posts()): $photos->the_post();
                            echo '<a href="'. get_the_permalink(). '">'  . get_the_post_thumbnail(null, 'full', array('class'=>'liked-img')) . '</a>';
                        endwhile;
                    else: 
                        echo '<p>Il n\'y pas d\'autre image dans cette catégorie.</p>';
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
