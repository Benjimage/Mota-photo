jQuery(document).ready(function($) {

    $(".btn").click(function(e) {
    e.preventDefault();
    $(".ref-photo").val(referencePhoto.inputValue);
    });

    $('.prev').on('mouseenter',function(){
        $('.back').fadeIn(600);
    });
    $('.prev').on('mouseleave',function(){
        $('.back').fadeOut(600);
    });
    $('.next').on('mouseenter',function(){
        $('.to').fadeIn(600);
    });
    $('.next').on('mouseleave',function(){
        $('.to').fadeOut(600);
    }); 

    
});