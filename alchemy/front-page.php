<?php get_header() ?>

<?php echo __DIR__ .'<br>'; ?>
<?php echo __LINE__ .'<br>'; ?>
<?php echo __FILE__ ; ?>
<?php
    if(have_posts()) :
        while(have_posts()) : the_post();
            the_title();
            the_content();
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
?>
<div class="banner">Hero (WP_QUERY)</div>

<div class="filtres">Filtres(catégories) (formats) (ordre de tri)</div>

<div class="photos">Photos (WP_QUERY)</div>

<?php get_footer() ?>