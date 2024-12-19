<?php
// Fetch movies van de database
require 'database/databasetmp.php';

try {
    $query = "SELECT * FROM movies";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $movies = $statement->fetchAll(); // gebruik de default fetch mode die is ingesteld in databasetmp.php
} catch (PDOException $e) {
    echo '<p class="error">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
?>