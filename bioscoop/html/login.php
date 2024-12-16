<?php
ob_start(); // Start output buffering
session_start();
include 'header.php';
require 'database/databasetmp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {        

    $username1 = htmlspecialchars($_POST['username']);
    $password1 = $_POST['password'];

    // Check if the input matches with the admin table
    $adminQuery = "SELECT password FROM beheerder WHERE username = :username";
    $adminStatement = $pdo->prepare($adminQuery);
    $adminStatement->bindParam(':username', $username1);
    $adminStatement->execute();
    $adminResult = $adminStatement->fetch();

    if ($adminResult) {
        $adminEncryptedPassword = $adminResult['password'];

        if (password_verify($password1, $adminEncryptedPassword)) {
            $_SESSION['message'] = '<p class="success">Admin login successful.</p>';    
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username1;
            $_SESSION['role'] = 'admin'; 
            header('Location: home.php'); 
            exit(); 
        } else {
            $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
        }
    } else {
        // If not an admin, check the users table
        $query = "SELECT password FROM users WHERE username = :username";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username1);
        $statement->execute();
        $resultaat = $statement->fetch();

        if ($resultaat) {
            $EncryptedPassword = $resultaat['password'];

            if (password_verify($password1, $EncryptedPassword)) {
                $_SESSION['message'] = '<p class="success">Login successful.</p>';    
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username1;
                $_SESSION['role'] = 'user'; // Store the role as user
                header('Location: home.php');
                exit(); 
            } else {
                $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
            }
        } else {
            $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
        }
    }
}
ob_end_flush(); 
?>

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
