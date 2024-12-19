<?php
require 'database/databasetmp.php'; // Database connection

// Check if the movie ID is set in the URL and fetch the movie details. If not, display an error message.
// htmlspecialchars() is used to prevent XSS attacks by escaping special characters.

if (isset($_GET['id'])) {
    $movieId = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

    // Fetch movie details van the database
    try {
        $query = "SELECT * FROM movies WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $movieId, PDO::PARAM_INT);
        $statement->execute();
        $movie = $statement->fetch(); // gebruik de default fetch mode die is ingesteld in databasetmp.php

        if (!$movie) {
            echo '<p class="error">Film niet gevonden.</p>';
            exit();
        }
    } catch (PDOException $e) {
        echo '<p class="error">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
        exit();
    }
} else {
    echo '<p class="error">Geen film ID opgegeven.</p>';
    exit();
}

?>