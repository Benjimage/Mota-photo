(function($) {
    function ajaxSearch() {
        console.log('OK')
        console.log(ajax_data)
        $.ajax({
            type: 'POST',
            url: ajax_data.ajaxurl, 
            data: {
                action: 'search_display',
                categorie: $('#input-search').val(),
            },
            success: function(response) {
                console.log(response);
            $('#resultat').append(response);
            },
            error: function(response) {
                console.log('Erreur');
            }
        })
    }
    $('#search-submit').on('click', ajaxSearch);
})(jQuery);