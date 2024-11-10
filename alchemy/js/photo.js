jQuery(document).ready(function($) {

    $(".btn").click(function(e) {
    e.preventDefault();
    $("#ref-photo").val(referencePhoto.inputValue);
    });

    $('.prev').on('mouseenter',function(){
        console.log('SURVOL !!!')
        $('.back').fadeIn(600);
    });
    $('.prev').on('mouseleave',function(){
        console.log('BYE !!!')
        $('.back').fadeOut(600);
    });
    $('.next').on('mouseenter',function(){
        console.log('SURVOL !!!')
        $('.to').fadeIn(600);
    });
    $('.next').on('mouseleave',function(){
        console.log('BYE !!!')
        $('.to').fadeOut(600);
    }); 

    
});