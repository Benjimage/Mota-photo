<?php
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 10,
    'orderby' => 'rand',
);
$catalog = new WP_Query($args);
if ($catalog->have_posts()) { ?>
    <div class="catalog">
        <div class="frame">
            <?php while ($catalog->have_posts()) { ?>
                <div class="photo-bloc">
                    <div class="card-grid">
                        <?php $catalog->the_post(); ?>
                        <?php echo get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'no')); ?>
                    </div>
                    <div class="overlay">
                        <div class="icons eye-icon">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <img src="<?php echo get_template_directory_uri() ."/assets/icones/Icon_eye.svg"?>" alt="Voir la photo">                            
                            </a>
                        </div>
                        <div class="icons fullscreen-icon">
                            <img src="<?php echo get_template_directory_uri() ."/assets/icones/Icon_fullscreen.svg"?>" alt="Ouvrir la lightbox">                            
                        </div>
                    </div>
                </div>    
            <?php } ?>
        </div>
        <div class="btn contact action">Charger plus</div>
    </div>
<?php
}
wp_reset_postdata();
?>

<?php



