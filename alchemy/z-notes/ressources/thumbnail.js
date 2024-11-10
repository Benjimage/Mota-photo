/* Slider thumbnail */
const leftArrow = document.querySelector('.left');
const rightArrow = document.querySelector('.right');

if(leftArrow) {

    leftArrow.addEventListener('mouseover', () => {
            let thumbNail = document.querySelector('.back')
            thumbNail.style = 'opacity: 1; transition: 0.6s';
        }
    );
    leftArrow.addEventListener('mouseout', () => {
            let thumbNail = document.querySelector('.back')
            thumbNail.style = 'opacity: 0; transition: 0.6s';
        }
    );
}

if(rightArrow) {
    rightArrow.addEventListener('mouseover', () => {
            let thumbNail = document.querySelector('.to')
            thumbNail.style = 'opacity: 1; transition: 0.6s';
        }
    );
    rightArrow.addEventListener('mouseout', () => {
            let thumbNail = document.querySelector('.to')
            thumbNail.style = 'opacity: 0; transition: 0.6s';
        }
    );
}

/* Modal */
 const modal = document.querySelector(".modal");
 const contact = document.querySelectorAll(".contact");
 // const action = document.querySelector(".action");
 console.log('modal', modal);
 console.log('contact', contact);

 for (let i = 0; i < contact.length; i++) {
   console.log('addeventlistener');
   contact[i].addEventListener('click', modalDisplay );
 }

 // contact.addEventListener('click', modalDisplay );
 // action.addEventListener('click', modalDisplay );

 function modalDisplay() {
   console.log('modalDisplay');
   modal.style.display = "flex";
 }

 modal.onclick = (event) =>{
   console.log('modal click');
   if (event.target == modal) {
     console.log('modal none');
     modal.style.display = "none";
   }
 } 