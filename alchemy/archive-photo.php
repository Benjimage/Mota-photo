<?php get_header() ?>
<h1>Liste photo</h1>
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
       <h2><?php the_title();?></h2>
    <?php
        /* var_dump($post); */
        the_content();
            echo '<img src="<?php the_post_thumbnail();?>">';
            echo '<hr>';
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
    ?>

<?php get_footer() ?>