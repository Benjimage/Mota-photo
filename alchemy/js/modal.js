const modal = document.querySelector(".modal");

const contact = document.querySelector(".contact");

const contactFromPost = document.querySelector(".btn");

contact.onclick = () => {
  modal.style.display = "flex";
}

contactFromPost.onclick = () => {
  modal.style.display = "flex";
}

window.onclick = (event) =>{
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

