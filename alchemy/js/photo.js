jQuery(document).ready(function($) {

    $(".btn").click(function(e) {
    e.preventDefault();
    $("#ref-photo").val(referencePhoto.inputValue);
    });

   /*  $('.prev').mouseenter(function(){
        console.log('SURVOL !!!')
        $('.back').fadeIn();
    });
    $('.prev').mouseleave(function(){
        console.log('BYE !!!')
        $('.back').fadeOut();
    });
    $('.next').mouseenter(function(){
        console.log('SURVOL !!!')
        $('.to').fadeIn();
    });
    $('.next').mouseleave(function(){
        console.log('BYE !!!')
        $('.to').fadeOut();
    }); */
});