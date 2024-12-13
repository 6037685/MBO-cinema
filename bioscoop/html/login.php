<?php session_start(); ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Log in bij Mbo Cinema om toegang te krijgen tot je account.">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="inloggen, Mbo Cinema, account, login">
    <title>Mbo cinema inloggen</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="index.js"></script>
</head>
<body>
    <?php
        include 'header.php';
     ?>

    <main class="split-section">
        <article class="blank-section"></article>
        <article class="form-section">
            <section class="login-container">
                <article class="login-form">    
                    <h2>Login form</h2>
                    <form method="POST" action="login.php">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                        
                        <label for="password">Wachtwoord</label>
                        <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
                        
                        <article class="forgot-password">
                            <a href="#">Wachtwoord vergeten?</a>
                        </article>
                        <article>
                        <?php 
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); // Wis de sessie, zodat het bericht niet steeds blijft staan
                            }
                        ?>
                        </article>
                        <button type="submit">Login</button>
                    </form>
                    <article class="register">
                        <p><a href="register.php">Geen account? registreer nu</a></p>
                    </article>
                </article>
            </section>
        </article>
        <article class="image-section"></article>
    </main>

    

    <?php include 'footer.php'; ?>
</body>
</html>
