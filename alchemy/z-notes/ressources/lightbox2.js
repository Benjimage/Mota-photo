(function($){

    const lightboxList = [];
    let id_image_courante = 0;
    function navigate(param){
        if(param === 'next'){
            if( id_image_courante === lightboxList.length -1) {
                id_image_courante=0;
            } else {
                id_image_courante++;
            }
            affiche_image(); 
        } else if (param === 'prev'){
            if(id_image_courante === 0) {
                id_image_courante = lightboxList.length -1;
            } else {
                id_image_courante--;
            }
            affiche_image();
        }
    }
    function affiche_image() {
        let image_courante = lightboxList[id_image_courante];
        
        $('.reference-img').html(image_courante.ref);
        $('.categorie-img').html(image_courante.cat);
        $('.img-container img').attr('src',image_courante.src);
        
        if(image_courante.format === 'Paysage') {
            $('.img-container').addClass('paysage');
        } else if(image_courante.format === 'Portrait') {
            $('.img-container').removeClass('paysage');
        } 
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

    $('#next-img').on('click', ()=>{ navigate('next')});
    $('#alt-next').on('click', ()=>{ navigate('next')});

    $('#prev-img').on('click',()=>{ navigate('prev')});
    $('#alt-prev').on('click',()=>{ navigate('prev')});

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