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
            <?php while ($catalog->have_posts()) {  
                echo '<div class="card-grid">';
                /* echo '<div class="above"><img src="<?php echo get_template_directory_uri() ."../assets/icones/Icon_eye.svg"?>" ></div>'; */
                $catalog->the_post();
                echo get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'no'));
                echo '</div>';
            } ?>
        </div>
        <div class="btn contact action">Charger plus</div>
    </div>
<?php
}
wp_reset_postdata();
?>

<?php


/* $args = array(
    'post_type' => 'photo',
    'posts_per_page' => 10,
    'orderby' => 'rand',
);
$catalog = new WP_Query($args);
if ($catalog->have_posts()) {
    echo '<div class="catalog"><div class="frame">';
    while ($catalog->have_posts()) {
        echo '<div class="cardalog">';
        $catalog->the_post();
        echo get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'card-img'));
        echo '</div>';
    }
    echo '</div></div>';
}
wp_reset_postdata(); */
