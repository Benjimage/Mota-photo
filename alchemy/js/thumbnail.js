const leftArrow = document.querySelector('.prev');
console.log(leftArrow);
const rightArrow = document.querySelector('.next');
console.log(rightArrow);


leftArrow.addEventListener('click', () => {
    console.log('OK Left')
    }
) ;
rightArrow.addEventListener('click', () => {
    console.log('OK Right')
    }
) ;