let form = document.querySelector('.registerform');
let wachtwoord = document.querySelector('.wachtwoord');
let bevestigdWachtwoord = document.querySelector('.bevestigdWachtwoord');
let gebruiker = document.querySelector('.Gebruikersnaam');
let email = document.querySelector('.email');
let telefoonnummer = document.querySelector('.Telefoonnummer');
const emailRegex = /^[a-zA-Z0-9._-]+@(gmail\.com|hotmail\.com|[a-zA-Z0-9.-]+\.org)$/;
const minGebruikernaam = 5;
const minWachtwoord = 10;

if (form) {
    form.addEventListener('submit', function(event) {
        let valid = true; 
        let message = '';

        
        document.querySelector('.username-error').textContent = '';
        document.querySelector('.email-error').textContent = '';
        document.querySelector('.password-error').textContent = '';
        document.querySelector('.confirm-password-error').textContent = '';
        document.querySelector('.phone-error').textContent = '';

        if (gebruiker && gebruiker.value.length < minGebruikernaam) {
            message = `Gebruiker moet minstens ${minGebruikernaam} letters hebben`;
            document.querySelector('.username-error').textContent = message;
            valid = false; // Form is invalid
        }

        if (wachtwoord && wachtwoord.value.length < minWachtwoord) {
            message = `Je wachtwoord moet minstens ${minWachtwoord} tekens hebben`;
            document.querySelector('.password-error').textContent = message;
            valid = false;
        }

        if (wachtwoord && bevestigdWachtwoord && wachtwoord.value !== bevestigdWachtwoord.value) {
            message = "Wachtwoorden komen niet overeen";
            document.querySelector('.confirm-password-error').textContent = message;
            valid = false;
        }

        if (email && !emailRegex.test(email.value)) {
            message = "Geef een geldige email";
            document.querySelector('.email-error').textContent = message;
            valid = false;
        }

        if (telefoonnummer && telefoonnummer.value.length !== 10) {
            message = "Telefoonnummer moet 10 cijfers bevatten";
            document.querySelector('.phone-error').textContent = message;
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
}


    if (localStorage.getItem('Gebruikersnaam')) {
        gebruiker.value = localStorage.getItem('Gebruikersnaam');
    }
    if (localStorage.getItem('email')) {
        email.value = localStorage.getItem('email');
    }
    if (localStorage.getItem('wachtwoord')) {
        wachtwoord.value = localStorage.getItem('wachtwoord');
    }
    if (localStorage.getItem('bevestigdWachtwoord')) {
        bevestigdWachtwoord.value = localStorage.getItem('bevestigdWachtwoord');
    }
    if (localStorage.getItem('telefoonnummer')) {
        telefoonnummer.value = localStorage.getItem('telefoonnummer');
    }

    // het save de input van mensen
    gebruiker.addEventListener('input', function() {
        localStorage.setItem('Gebruikersnaam', gebruiker.value);
    });

    email.addEventListener('input', function() {
        localStorage.setItem('email', email.value);
    });

    wachtwoord.addEventListener('input', function() {
        localStorage.setItem('wachtwoord', wachtwoord.value);
    });

    bevestigdWachtwoord.addEventListener('input', function() {
        localStorage.setItem('bevestigdWachtwoord', bevestigdWachtwoord.value);
    });

    telefoonnummer.addEventListener('input', function() {
        localStorage.setItem('telefoonnummer', telefoonnummer.value);
    });

    form.addEventListener('submit', function() {
        localStorage.removeItem('Gebruikersnaam');
        localStorage.removeItem('email');
        localStorage.removeItem('wachtwoord');
        localStorage.removeItem('bevestigdWachtwoord');
        localStorage.removeItem('telefoonnummer');
    });