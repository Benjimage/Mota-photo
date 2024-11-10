(function($){

  $('.contact').each(function(){
    $(this).on('click', function(){
     $('.modal').css('display', 'flex');
    });
  });

  $('.modal').on('click', function(event){
    console.log(this);
    if(event.target == this){
      $(this).css('display', 'none');
    }
  });


})(jQuery);


