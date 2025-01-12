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
        
        
        $('.search-404').slideUp(600);
        $('.search-404').css('border','1px solid #88888810');
        $('.search-404 > input').css('border','1px solid #88888810');
      
        display()
    }
    $('#search-submit').on('click', ajaxSearch);

    function afficherTexte(texte) {
        const $message = $('.message');
    
        $message.removeClass('fade-in');
    
        $message.one('transitionend', function() {
            $message.html(texte);
            $message.addClass('fade-in');
        });
    }
    
    function display() {
        afficherTexte('Voici les photos que vous avez demandées');
    }
    
})(jQuery);

