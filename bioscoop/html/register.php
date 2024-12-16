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
</head>
<body>
    <?php
        include 'header.php'; 
    ?>

    <main class="split-section">
        <article class="blank-section"></article>
        <article class="regist-section">
            <section class="login-container">
                <article class="login-form">    
                    <h2>registreer form</h2>
                    <form method="POST">

                        <label for="username">Gebruikersnaam</label>
                        <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                        
                        <label for="Email">Email-adres</label>
                        <input type="Email" id="Email" name="Email" placeholder="Email-adres" required>

                        
                        <label for="password">Wachtwoord</label>
                        <input type="password" id="password" name="password" placeholder="Wachtwoord" required>

                        
                        <label for="Telefoonnummer">Telefoonnummer</label>
                        <input type="Telefoonnummer" id="Telefoonnummer" name="Telefoonnummer" placeholder="Telefoonnummer"
                        type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                        <div class="form-message">
                            <?php
                                if(!empty($message)){
                                    echo $message;
                                }
                            ?>
                        </div>

                        <button type="submit">registreer</button>
                    </form>
                    <article class="register">
                        <p><a href="login.php">Account? Login nu!</a></p>
                    </article>
                </article>
            </section>
        </article>
        <article class="image-section"></article>
    </main>
    <?php
        require 'database/databasetmp.php';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username1 = htmlspecialchars($_POST['username']);
            $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
            $password1 = $_POST['password'];
            $telefoonnmr = htmlspecialchars($_POST['Telefoonnummer']);

            if (empty($username1) || empty($email) || empty($password1) || empty($telefoonnmr)) {
                $message = '<p class="error">Vul aub alle velden in.</p>';
                echo " vul aub alle velden in";
            } else {

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
                    $message = '<p class="success">Registratie succesvol!</p>';
                } else {
                    $message = '<p class="error">Er is iets misgegaan bij het registreren. Probeer het opnieuw.</p>';
                }
            
            }
        }
            
    ?>

    <?php include 'footer.php'; ?>
</body>
</html>
