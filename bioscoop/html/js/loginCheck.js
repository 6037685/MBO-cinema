let gebruiker = document.querySelector('#username');
let wachtwoord = document.querySelector('#password');
let form = document.querySelector('.login-form');

if (form) {
    if (localStorage.getItem('username')) {
        gebruiker.value = localStorage.getItem('username');
    }
    if (localStorage.getItem('password')) {
        wachtwoord.value = localStorage.getItem('password');
    }

    gebruiker.addEventListener('input', function() {
        localStorage.setItem('username', gebruiker.value);
    });

    wachtwoord.addEventListener('input', function() {
        localStorage.setItem('password', wachtwoord.value);
    });

    form.addEventListener('submit', function() {
        localStorage.removeItem('username');
        localStorage.removeItem('password');
    });
}
