let teller = 0;
const slides = document.getElementsByClassName('slidesFade');
function slideshow() {
    for (let slide = 0; slide < slides.length; slide++) {
        slides[slide].style.display = 'none'; 
        slides[teller].style.display = 'block'; 
    }

    teller++;
    if (teller >= slides.length) {
        teller = 0; 
    }
}

setInterval(slideshow, 6000);
slideshow();

const slideText = document.getElementsByClassName('slide-text');

for (let i = 0; i < slideText.length; i++) {
    slideText[i].addEventListener('click', function() {
        alert('A slide was clicked!');
    });
}