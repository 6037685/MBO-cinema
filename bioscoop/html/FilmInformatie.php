<?php
session_start();
require 'database/filminfoDatabase.php';
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