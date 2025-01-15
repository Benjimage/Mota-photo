(function($){
  $('.contact').each(function(){
    $(this).on('click', function(){
     $('.modal').css('display', 'flex');
     $('.display').hide('slow');
    });
  });

  $('.modal').on('click', function(event){
    console.log(this);
    if(event.target == this){
      $(this).css('display', 'none');
      $('.display').show('slow');
    }
  });


})(jQuery);


