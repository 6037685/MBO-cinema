<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main></main>
    <h1>hallo medewerker</h1>

    <?php

// verbinding van database
$host = 'db';
$dbname = 'phplessen';
$username = 'root';
$password = 'root';

try { // verbind het
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "verbinding is goed";

}   catch (PDOException $e){
    echo 'Verbinding is niet goed' . $e->getMessage();
}

?>
</main>
</body>
</html>