<?php
session_start();
require_once 'Class/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Do not sanitize the password
    $telefoonnmr = htmlspecialchars($_POST['Telefoonnummer'], ENT_QUOTES, 'UTF-8');

    if (empty($username) || empty($email) || empty($password) || empty($telefoonnmr)) {
        $_SESSION['message'] = '<p class="error">Vul aub alle velden in.</p>';
    } else {
        $user = new User();
        $user->register($username, $email, $password, $telefoonnmr);
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Registreer je bij Mbo Cinema en geniet van alle voordelen.">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="registreren, Mbo Cinema, account aanmaken, aanmelden">
    <title>Mbo cinema registreren</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <script src="js/registerCheck.js" defer></script> 
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="split-section">
        <article class="blank-section"></article>
        <article class="regist-section">
            <section class="login-container">
                <article class="login-form">    
                    <h2>Registreer formulier</h2>
                    <form class="registerform" method="POST">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" class="Gebruikersnaam" name="username" placeholder="Gebruikersnaam">
                        <p class="error-message username-error" style="color: red;"></p> 

                        
                        <label for="Email">Email-adres</label>
                        <input type="email" class="email" name="Email" placeholder="Email-adres">
                        <p class="error-message email-error" style="color: red;"></p> 


                        <label for="password">Wachtwoord</label>
                        <input type="password" class="wachtwoord" name="password" placeholder="Wachtwoord">
                        <p class="error-message password-error" style="color: red;"></p> 


                        <label for="bevestigdWachtwoord">Bevestig Wachtwoord</label>
                        <input type="password" class="bevestigdWachtwoord" name="bevestigdWachtwoord" placeholder="Bevestig Wachtwoord">
                        <p class="error-message confirm-password-error" style="color: red;"></p> 

                        <label for="Telefoonnummer">Telefoonnummer</label>
                        <input type="tel" class="Telefoonnummer" name="Telefoonnummer" placeholder="Telefoonnummer" pattern="[0-9]{10}" minlength="10" maxlength="10">
                        <p class="error-message phone-error" style="color: red;"></p> 

                        
                        <article class="form-message">
                            <?php
                               if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); 
                            }
                            ?>
                        </article>

                        <button type="submit">Registreer</button>
                    </form>
                    <article class="register">
                        <p><a href="login.php">Account? Login nu!</a></p>
                    </article>
                </article>
            </section>
        </article>
        <article class="image-section"></article>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
