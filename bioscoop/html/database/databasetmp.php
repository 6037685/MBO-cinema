<?php

// verbinding van database
$host = 'db';
$dbname = 'Cinema';
$username = 'Cinema';
$password = 'mD.d/bq4[8MRUycz';

try { // verbind het
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);

}   catch (PDOException $e){
    echo 'Verbinding is niet goed' . $e->getMessage();
}

?>