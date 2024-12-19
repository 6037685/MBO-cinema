<?php
ob_start(); // Start output buffering
include 'header.php';
require 'database/databasetmp.php';

// Check if the user is already logged in
if ($_SERVER['REQUEST_METHOD'] === 'POST') {        

    // Get the input from the form
    $username1 = htmlspecialchars($_POST['username']);
    $password1 = $_POST['password'];

    // Check if the input matches with the admin table
    $adminQuery = "SELECT password, email, telnmr FROM beheerder WHERE username = :username";
    $adminStatement = $pdo->prepare($adminQuery);
    $adminStatement->bindParam(':username', $username1);
    $adminStatement->execute();
    $adminResult = $adminStatement->fetch();

    // check if the input matches with the beheerder table
    if ($adminResult) {
        $adminEncryptedPassword = $adminResult['password'];

        // Check if the password matches with the encrypted password
        if (password_verify($password1, $adminEncryptedPassword)) {
            $_SESSION['message'] = '<p class="success">Admin login successful.</p>';    
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username1;
            $_SESSION['email'] = $adminResult['email'];
            $_SESSION['phone'] = $adminResult['telnmr'];
            $_SESSION['role'] = 'beheerder'; // Store the role as beheerder
            header('Location: home.php'); 
            exit(); 
        } else {
            $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
        }
    } else {
        // If not an beheerder, check the users table
        $query = "SELECT password, email, telnmr FROM users WHERE username = :username";
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
                $_SESSION['email'] = $resultaat['email'];
                $_SESSION['phone'] = $resultaat['telnmr'];
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