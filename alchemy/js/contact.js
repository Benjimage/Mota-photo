// const modal = document.querySelector(".modal");
// const contact = document.querySelectorAll(".contact");
// // const action = document.querySelector(".action");
// console.log('modal', modal);
// console.log('contact', contact);

// for (let i = 0; i < contact.length; i++) {
//   console.log('addeventlistener');
//   contact[i].addEventListener('click', modalDisplay );
// }

// // contact.addEventListener('click', modalDisplay );
// // action.addEventListener('click', modalDisplay );

// function modalDisplay() {
//   console.log('modalDisplay');
//   modal.style.display = "flex";
// }

// modal.onclick = (event) =>{
//   console.log('modal click');
//   if (event.target == modal) {
//     console.log('modal none');
//     modal.style.display = "none";
//   }
// } 

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


