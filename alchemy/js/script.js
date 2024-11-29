(function($) {
    $('#categorie').select2();
    $('#formats').select2();
    $('#date').select2();

    $('#categorie').on('change', function(event){
        console.log('Clic sur : ',$(this).val());
        ajaxCall();
    });
    $('#formats').on('change', function(event){
        console.log('Clic sur : ',$(this).val());
        ajaxCall();

    });
    $('#date').on('change', function(event){
        console.log('Clic sur : ',$(this).val());
        ajaxCall();

    });

    console.log(ajax_data.ajaxurl);

    function ajaxCall() {
        $.ajax({
            type: 'POST',
            url: ajax_data.ajaxurl, // voir functions.php
            data: {
                action: 'filtre',
                categorie: $('#categorie').val(),
                format: $('#formats').val(),
                tri: $('#date').val(),
            },
            // beforeSend: exécuté avant l'envoi de la requête ( exemple gif animé )
            success: function(response) {
                console.log(response);
                $('.frame').empty();
                response.forEach(function(photo) {
                    $('.frame').append(photo);
                })
            },
            error: function(response) {
                console.log('Erreur');
            }
            // complete: function() {}  // exécuté dans tous les cas 
        })
    }

})(jQuery);