// Path: html/js/index.js

let overlay = document.getElementsByClassName('overlay')
const open = document.querySelector("#hamburgerWrapper")

const close = document.querySelector("#closeMenu")


open.addEventListener('click', function() {
    overlay[0].classList.remove('hide')
    overlay[0].classList.add('show')
})

close.addEventListener('click', function() {
    overlay[0].classList.remove('show')
    overlay[0].classList.add('hide')
})

// Beheerder Pagina JS

$(document).ready(function() {
    $('#movies-table').DataTable();
});

        
function editMovie(movie) {
    document.getElementById('movie-id').value = movie.id;
    document.getElementById('naam').value = movie.naam;
    document.getElementById('beschrijving').value = movie.beschrijving;
    document.getElementById('duur').value = movie.duur;
    document.getElementById('datum').value = movie.datum;
    document.getElementById('rating').value = movie.rating;
    document.getElementById('src').value = movie.src;
}
