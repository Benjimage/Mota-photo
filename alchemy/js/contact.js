const modal = document.querySelector(".modal");
const contact = document.querySelector(".contact");
const action = document.querySelector(".action");

contact.addEventListener('click', modalDisplay );
action.addEventListener('click', modalDisplay );

function modalDisplay() {
  modal.style.display = "flex";
}

window.onclick = (event) =>{
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 


