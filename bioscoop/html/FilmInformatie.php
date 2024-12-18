<?php
session_start();
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

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bekijk de details van de film.">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="film, bioscoop, Mbo Cinema, filmvertoning">
    <title><?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?> - Mbo Cinema</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
     
        <section class="movie-details">
            <h1><?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <img src="<?php echo htmlspecialchars($movie['src'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?>">
            <p><?php echo htmlspecialchars($movie['beschrijving'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Duur: <?php echo htmlspecialchars($movie['duur'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Release Date: <?php echo htmlspecialchars($movie['datum'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Rating: <?php echo htmlspecialchars($movie['rating'], ENT_QUOTES, 'UTF-8'); ?></p>
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>