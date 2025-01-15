const burgerIcon = document.querySelector('.burger');
const slices = document.querySelectorAll('.line');
const menu = document.querySelector('.header-menu');

burgerIcon.addEventListener('click', () => {
    burgerIcon.classList.toggle('offsets');
    for (let slice of slices){
        slice.classList.toggle('cross');
    }
    menu.classList.toggle('display');
})

/*     (function($){
        const $burgerIcon = $('.burger');
        const $slices = $('.line');
        const $menu = $('.header-menu');
    
        $burgerIcon.on('click', function() {
            $burgerIcon.toggleClass('offsets');
            $slices.toggleClass('cross');
            $menu.toggleClass('display');
        });
    })(jQuery);
    */