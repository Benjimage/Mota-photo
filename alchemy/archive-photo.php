<?php get_header() ?>
<div class="main-content">
    <div class="row">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
        <a href="<?php the_permalink() ?>" target="_blank" class="card-link">
            <div class="card">
                <?php the_post_thumbnail(null, 'medium', array('class' => 'card-img')) ?>
                <div>
                    <h5 class="card-title"><?php the_title() ?></h5>
                    <h6><?php the_category() ?></h6>
                    <ul>
                        <?php
                        the_terms(get_the_ID(), 'categorie-photo', '<li>', '</li><li>', '</li>');
                        ?>
                    </ul>
                </div>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
    <?php else: ?>
        <h1>No content found</h1>
    <?php endif; ?>
</div>

<?php get_footer() ?>