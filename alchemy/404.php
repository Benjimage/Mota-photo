<?php get_header() ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title();
        the_content();
    endwhile;
else :
?>

    <div class="main-centered">
        <?php echo '<h3 class="message fade fade-in">La page que vous recherchez n\'existe pas</h3>'; ?>
        <div class="search-404">
            <p class="search-message vanish">Entrez votre recherche</p>
            <input type="text" name="" id="input-search" class="vanish">
            <input type="button" value="Rechercher" id="search-submit" class="vanish">
        </div>
        <div class="catalog">
            <div id="resultat">
            </div>
        </div>
    </div>
<?php
endif;
?>

<?php get_footer() ?>