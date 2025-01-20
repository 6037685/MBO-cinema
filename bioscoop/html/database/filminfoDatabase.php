<?php
require 'database/databasetmp.php'; // Database connection
require 'Movie.php';

// Check if the movie ID is set in the URL and fetch the movie details. If not, display an error message.
if (isset($_GET['id'])) {
    $movieId = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

    // Instantiate the Movie class and fetch movie details
    $movieClass = new Movie();
    $movie = $movieClass->fetchById($movieId);

    if (!$movie) {
        echo '<p class="error">Film niet gevonden.</p>';
        exit();
    }
} else {
    echo '<p class="error">Geen film ID opgegeven.</p>';
    exit();
}
?>