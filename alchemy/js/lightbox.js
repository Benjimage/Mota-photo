(function($){


    $(document).on('click', '.fullscreen-icon', function() {
        $('#lightbox').css("display", "flex");

        console.log($('#lightbox').data('src'));
    });

    $('.close-button').on('click', function() {
        $('#lightbox').hide();
    })


})(jQuery)