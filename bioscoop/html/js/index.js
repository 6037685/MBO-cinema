const overlay = document.getElementsByClassName('overlay')
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


