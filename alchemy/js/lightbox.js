(function($){

    const lightboxList = [];
    let id_image_courante = 0;

    $('#prev-img').on('mouseenter',function(){
      //$('#prev-img').attr('src',);
      console.log('OK')
    });
    
    $('#prev-img').on('mouseleave',function(){
      //$('#prev-img').attr('src',);
      console.log('Gone')
    });
    
    $('#next-img').on('mouseenter',function(){
      //$('#next-img').attr('src',);
      console.log('OK')
    });
    $('#next-img').on('mouseleave',function(){
      //$('#next-img').attr('src',);
      console.log('Gone')
    });

    function affiche_image() {
        let image_courante = lightboxList[id_image_courante];

        console.log(image_courante.ref);
        console.log($('.reference-img'));

        $('.reference-img').html(image_courante.ref);
        $('.categorie-img').html(image_courante.cat);
        $('.img-container img').attr('src',image_courante.src);
    }

    $('.fullscreen-icon').each(function() {
        const image = {
            src: $(this).data('img-src'),
            ref: $(this).data('ref'),
            cat: $(this).data('cat'),
            id: $(this).data('id'),
        };
        lightboxList.push(image);
        console.log(image);
    });

    $(document).on('click', '.fullscreen-icon', function() {
        $('#lightbox').css("display", "flex");


        id_image_courante = $(this).data('id');
        console.log(id_image_courante);

        affiche_image();

        if( id_image_courante === 0 ) {
            $('#prev-img').hide();
        } else {
            $('#prev-img').show();
        }

        if(id_image_courante === lightboxList.length - 1) {
            $('#next-img').hide();
        } else {
            $('#next-img').show();
        }

    });

    $('#next-img').on('click', function(e) {
        e.preventDefault();
        if( id_image_courante === lightboxList.length -1) {
            id_image_courante=0;
        } else {
            id_image_courante++;
        }
        affiche_image();
    });

    $('#prev-img').on('click', function(e) {
        e.preventDefault();
        if(id_image_courante === 0) {
            id_image_courante = lightboxList.length -1;
        } else {
            id_image_courante--;
        }
        affiche_image();
    });

    $('.close-button').on('click', function() {
        $('#lightbox').hide();
    })


})(jQuery)

/*




Front-page : 
- toutes les données nécessaires à la lightbox
- pour chaque photo affichée => dataset : url_img, référence, catégorie

JS : 
Alimenter un tableau avec les données de toutes photos => classe qui permet de sélectionner les éléments qui portent le dataset



Déclenchement de la lightbox (front-page / single-photo)

Lightbox : 
1 - Image qui correspond à la photo cliquée (+ catégorie + référence )
2 - flèches préc. et suivant => Liste des images 

*/