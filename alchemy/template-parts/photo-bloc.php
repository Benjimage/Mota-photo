<?php
    $compteur = $args['compteur'];
    $catalog = $args['catalog'];
?>
<?php $catalog->the_post(); ?>
<div class="photo-bloc" data-id="<?php echo get_the_ID(); ?>">
    <div class="card-grid">
        <?php echo get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'no'));  ?>
    </div>
    <div class="overlay">
        <div class="icons eye-icon">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <img src="<?php echo get_template_directory_uri() ."/assets/icones/Icon_eye.svg"?>" alt="Voir la photo">                            
            </a>
        </div>
        <div class="icons fullscreen-icon" 
            data-img-src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" 
            data-ref="<?php echo get_post_field('reference'); ?>" 
            data-format ="<?php echo strip_tags(get_the_term_list( $post->ID,'format')); ?>" 
            data-cat="<?php echo strip_tags(get_the_term_list( $post->ID, 'categories-photos' )); ?>"
            data-id="<?php echo $compteur++; ?>"
            >
            <img src="<?php echo get_template_directory_uri() ."/assets/icones/Icon_fullscreen.svg"?>" alt="Ouvrir la lightbox">                            
        </div>
    </div>
</div>    