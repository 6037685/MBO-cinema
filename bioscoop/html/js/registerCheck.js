
    let form = document.querySelector('.registerform');
    let wachtwoord = document.querySelector('.wachtwoord');
    let bevestigdWachtwoord = document.querySelector('.bevestigdWachtwoord');
    let gebruiker = document.querySelector('.Gebruikersnaam');
    let email = document.querySelector('.email');
    const emailRegex = /^[a-zA-Z0-9._-]+@(gmail\.com|hotmail\.com|[a-zA-Z0-9.-]+\.org)$/;
    const minGebruikernaam = 5;
    const minWachtwoord = 10;
 
    if (form) {
        form.addEventListener('submit', function(event) {
            // Zelfde wachtwoord validatie
            if (wachtwoord && bevestigdWachtwoord && wachtwoord.value !== bevestigdWachtwoord.value) {
                alert("Wachtwoorden komen niet overeen");
                event.preventDefault();
                return;
            }

            // minimaal gebruikersnaam validatie
            if (gebruiker && gebruiker.value.length < minGebruikernaam) {
                alert(`Gebruiker moet minstens ${minGebruikernaam} letters hebben`);
                event.preventDefault();
                return;
            }

            // minimaal wachtwoord validatie
            if (wachtwoord && bevestigdWachtwoord && (wachtwoord.value.length < minWachtwoord || bevestigdWachtwoord.value.length < minWachtwoord)) {
                alert(`Je wachtwoord moet minstens ${minWachtwoord} tekens hebben!`);
                event.preventDefault();
                return;
            }

            // check of echte email is
            if (email && !emailRegex.test(email.value)) {
                alert("Geef een geldige email");
                event.preventDefault();
                return;
            }
        });
    }
