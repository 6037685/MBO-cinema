<?php
    session_start(); // Start the session at the beginning of the script

    require 'database/Logout.php';
    
    ?>
                
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom op de accountpagina van Mbo Cinema. Bekijk hier je accountinformatie, reserveringen en meer!">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="Account, Mbo Cinema, films, bioscoop">
    <title>Home pagina</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="accountWrapper">
            <article class="accountNavWrapper">
                <nav class="accountNav">
                    <ul>
                        <li><a href="#">Account Informatie</a></li><hr>
                        <li><a href="#">Wachtwoord Veranderen</a></li><hr>
                        <li><a href="#">Mijn reserveringen</a></li><hr>
                        <li><a href="#">Uitloggen</a></li>
                    </ul>
                </nav>
            </article>

            <article class="accountContent">

                <section class="accountInfo">
                    <h2>Account Informatie</h2>
                    <p>Gebruikersnaam: <?php echo $_SESSION['username']; ?></p>
                    <p>Email: <?php echo $_SESSION['email']; ?></p>
                    <p>Telefoonnummer: <?php echo $_SESSION['phone']; ?></p>
                </section>
                <hr>
                <section class="wachtwoord">
                    <h2>Wachtwoord Veranderen</h2>
                    <form method="POST">
                        <label for="oldPassword">Oud wachtwoord</label>
                        <input type="password" id="oldPassword" name="oldPassword" placeholder="Oud wachtwoord" required>
                            
                        <label for="newPassword">Nieuw wachtwoord</label>
                        <input type="password" id="newPassword" name="newPassword" placeholder="Nieuw wachtwoord" required>
                            
                        <label for="confirmPassword">Bevestig wachtwoord</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Bevestig wachtwoord" required>
                         
                        <article class="forgot-password">
                            <a href="#">Wachtwoord vergeten?</a>
                        </article>
                        
                        <button type="submit">Wachtwoord veranderen</button>
                    </form>
                </section>
                <hr>
                <section class="reserveringen">
                    <h2>Mijn reserveringen</h2>
                </section>
                <hr>
                <section class="uitloggen">
                    <form method="POST">
                        <button type="submit" name="logout">Uitloggen</button>
                    </form>
                </section>
                </article>    
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>