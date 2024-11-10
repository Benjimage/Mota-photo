(function($){


    $(document).on('click', '.fullscreen-icon', function() {
        /* $('#lightbox').show(); */
        $('#lightbox').css("display", "flex");

        console.log($('#lightbox').data('src'));
        //alert($('#lightbox').data('reference'));
    });

    $('.close-button').on('click', function() {
        $('#lightbox').hide();
    })


})(jQuery)