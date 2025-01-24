<?php 
    require 'Database.php';

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $email = htmlspecialchars($_POST['Email']);
    $telefoonnummer = $_POST['Telefoonnummer'];

    $queryCheck = 'SELECT * FROM users WHERE username = :username OR email = :email';
    $statementCheck = $pdo->prepare($queryCheck);
    $statementCheck->bindParam(':username', $username);
    $statementCheck->bindParam(':email', $email);
    $statementCheck->execute();

    if ($statementCheck->rowCount() > 0) {
        echo "Deze naam of email is al in gebruik. Probeer opnieuw.";
    } else {
        $options = [
            'cost' => 12
        ];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $query = 'INSERT INTO users (username, password, email, telefoonnummer) VALUES (:username, :password, :email, :telefoonnummer)';
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefoonnummer', $telefoonnummer);

        if ($statement->execute()) {
            echo "Je bent geregistreerd!";
        } else {
            echo "Registratie is mislukt. Probeer opnieuw.";
        }
    }
?>
