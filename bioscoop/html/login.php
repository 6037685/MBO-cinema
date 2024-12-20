<?php
session_start();
require 'database/loginDatabase.php';


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login page Mbo Cinema">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="login, Mbo Cinema">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src='js/loginCheck.js'></script>
    <script defer src="js/index.js"></script>
</head>
<body>
    
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
                        <!-- display fout message -->
                        <?php 
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']); 
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
