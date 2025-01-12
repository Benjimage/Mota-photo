(function($) {
    const lightboxList = [];
    let id_image_courante = 0;

    function navigate(direction) {
        if (direction === 'next') {
            id_image_courante = (id_image_courante + 1) % lightboxList.length;
        } else if (direction === 'prev') {
            id_image_courante = (id_image_courante - 1 + lightboxList.length) % lightboxList.length;
        }
        affiche_image();
    }

    function affiche_image() {
        const image_courante = lightboxList[id_image_courante];
        
        $('.reference-img').html(image_courante.ref);
        $('.categorie-img').html(image_courante.cat);
        $('.img-container img').attr('src', image_courante.src);
        $('.img-container').toggleClass('paysage', image_courante.format === 'Paysage');
    }

    $('.fullscreen-icon').each(function() {
        const image = {
            src: $(this).data('img-src'),
            ref: $(this).data('ref'),
            cat: $(this).data('cat'),
            id: $(this).data('id'),
            format: $(this).data('format'),
        };
        lightboxList.push(image);
    });

    $(document).on('click', '.fullscreen-icon', function() {
        $('#lightbox').css("display", "flex");
        id_image_courante = $(this).data('id');
        affiche_image();
    });

    $('#next-img, #alt-next').on('click', () => navigate('next'));
    $('#prev-img, #alt-prev').on('click', () => navigate('prev'));

    $('.close-button').on('click', () => {
        $('#lightbox').hide();
    });

})(jQuery);
