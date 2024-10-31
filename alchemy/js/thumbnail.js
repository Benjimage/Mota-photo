const leftArrow = document.querySelector('.left');
const rightArrow = document.querySelector('.right');


leftArrow.addEventListener('mouseover', () => {
    let thumbNail = document.querySelector('.back')
    thumbNail.style = 'opacity: 1; transition: 0.6s';
    }
) ;
leftArrow.addEventListener('mouseout', () => {
    let thumbNail = document.querySelector('.back')
    thumbNail.style = 'opacity: 0; transition: 0.6s';
    }
) ;

rightArrow.addEventListener('mouseover', () => {
    let thumbNail = document.querySelector('.to')
    thumbNail.style = 'opacity: 1; transition: 0.6s';
    }
) ;
rightArrow.addEventListener('mouseout', () => {
    let thumbNail = document.querySelector('.to')
    thumbNail.style = 'opacity: 0; transition: 0.6s';
    }
) ;