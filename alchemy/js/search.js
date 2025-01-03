(function($) {
    function ajaxSearch() {
        console.log('C\'est OK')
        $.ajax({
            type: 'POST',
            url: ajax_data.ajaxurl, 
            data: {
                action: 'search_display',
                categorie: $('#input-search').val(),
            },
            success: function(response) {
            $('#resultat').append(response);
            },
            error: function(response) {
                console.log('Erreur');
            }
        })
        $('.message').html( 'Voici les photos que vous avez demandées');
        $('.search-404').animate({
            top: '-500px',
            opacity: '0',
            height: '0',
          }, 'slow');
        $(".vanish").css('display', 'none');
        $('.catalog').css('padding','0')
        $('.main-centered h3').css('padding','0')
    }
    $('#search-submit').on('click', ajaxSearch);
})(jQuery);