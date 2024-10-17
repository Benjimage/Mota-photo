<footer>
<?php get_template_part('template-parts/contact') ?>
<?php  wp_nav_menu(['theme_location' => 'footer',
 'container' => false,
 'menu_class' => 'footer-menu'
 ]);
 ?>
</footer>
<?php wp_footer()?>
</body>
</html>