$(document).ready(function() {
    const $burgerIcon = $('.burger');
    const $slices = $('.line');
    const $menu = $('.header-menu');

    $burgerIcon.on('click', function() {
        $burgerIcon.toggleClass('offsets');
        $slices.each(function() {
            $(this).toggleClass('cross');
        });
        $menu.toggleClass('display');
    });
});
