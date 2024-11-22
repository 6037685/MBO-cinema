<?php

// verbinding van database
$host = 'db';
$dbname = 'phplessen';
$username = 'root';
$password = 'root';

try { // verbind het
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    echo "verbinding is goed";

}   catch (PDOException $e){
    echo 'Verbinding is niet goed' . $e->getMessage();
}

?>