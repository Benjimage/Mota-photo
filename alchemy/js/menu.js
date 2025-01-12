const burgerIcon = document.querySelector('.burger');
const slices = document.querySelectorAll('.line');
const menu = document.querySelector('.header-menu');

burgerIcon.addEventListener('click', () => {
    burgerIcon.classList.toggle('offsets');
    for (let slice of slices){
        slice.classList.toggle('cross');
    }
    menu.classList.toggle('display');
})


   