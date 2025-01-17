<?php 
require 'database/databasetmp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username1 = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $password1 = $_POST['password']; // Do not sanitize the password
    $telefoonnmr = htmlspecialchars($_POST['Telefoonnummer'], ENT_QUOTES, 'UTF-8');

    if (empty($username1) || empty($email) || empty($password1) || empty($telefoonnmr)) {
        $_SESSION['message'] = '<p class="error">Vul aub alle velden in.</p>';
    } else {
        try {
            // Check if the username already exists in users table
            $usernameQueryUsers = "SELECT COUNT(*) FROM users WHERE username = :username";
            $usernameStatementUsers = $pdo->prepare($usernameQueryUsers);
            $usernameStatementUsers->bindParam(':username', $username1);
            $usernameStatementUsers->execute();
            $usernameCountUsers = $usernameStatementUsers->fetchColumn();

            // Check if the username already exists in beheerder table
            $usernameQueryBeheerder = "SELECT COUNT(*) FROM beheerder WHERE username = :username";
            $usernameStatementBeheerder = $pdo->prepare($usernameQueryBeheerder);
            $usernameStatementBeheerder->bindParam(':username', $username1);
            $usernameStatementBeheerder->execute();
            $usernameCountBeheerder = $usernameStatementBeheerder->fetchColumn();

            // Check if the email already exists in users table
            $emailQueryUsers = "SELECT COUNT(*) FROM users WHERE email = :email";
            $emailStatementUsers = $pdo->prepare($emailQueryUsers);
            $emailStatementUsers->bindParam(':email', $email);
            $emailStatementUsers->execute();
            $emailCountUsers = $emailStatementUsers->fetchColumn();

            // Check if the email already exists in beheerder table
            $emailQueryBeheerder = "SELECT COUNT(*) FROM beheerder WHERE email = :email";
            $emailStatementBeheerder = $pdo->prepare($emailQueryBeheerder);
            $emailStatementBeheerder->bindParam(':email', $email);
            $emailStatementBeheerder->execute();
            $emailCountBeheerder = $emailStatementBeheerder->fetchColumn();

            if ($usernameCountUsers > 0 || $usernameCountBeheerder > 0) {
                $_SESSION['message'] = '<p class="error">Gebruikersnaam bestaat al. Gebruik een andere gebruikersnaam.</p>';
            } elseif ($emailCountUsers > 0 || $emailCountBeheerder > 0) {
                $_SESSION['message'] = '<p class="error">Email-adres bestaat al. Gebruik een ander email-adres.</p>';
            } else {
                // Encrypt the password
                $opties = [
                    'cost' => 13,
                ];
                $EncryptedPassword = password_hash($password1, PASSWORD_BCRYPT, $opties);

                $query = "INSERT INTO users (username, email, password, telnmr) 
                          VALUES (:username, :email, :password, :telefoonnummer)";
                $statement = $pdo->prepare($query);
                $statement->bindParam(':username', $username1);
                $statement->bindParam(':email', $email);
                $statement->bindParam(':password', $EncryptedPassword);
                $statement->bindParam(':telefoonnummer', $telefoonnmr);

                if ($statement->execute()) {
                    $_SESSION['message'] = '<p class="success">Registratie succesvol. U kunt nu inloggen.</p>';
                    header('Location: login.php');
                    exit();
                } else {
                    $_SESSION['message'] = '<p class="error">Er is een fout opgetreden. Probeer het opnieuw.</p>';
                }
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = '<p class="error">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
        }
    }
}
?>