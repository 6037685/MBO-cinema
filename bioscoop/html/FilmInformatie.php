<?php
session_start();
require_once 'Class/Movie.php';

if (isset($_GET['id'])) {
    $movieId = intval($_GET['id']);
    $movie = new Movie();
    $movieDetails = $movie->fetchById($movieId);

    if (!$movieDetails) {
        header('Location: films.php');
        exit();
    }
} else {
    header('Location: films.php');
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
    <title><?php echo htmlspecialchars($movieDetails['naam'], ENT_QUOTES, 'UTF-8'); ?> - Mbo Cinema</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section id="movie-img">
            <img src="<?php echo htmlspecialchars($movieDetails['background'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movieDetails['naam'], ENT_QUOTES, 'UTF-8'); ?>">
        </section>
        <section class="movie-wrapper">
            <article class="movie-info">
                <img src="<?php echo htmlspecialchars($movieDetails['cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movieDetails['naam'], ENT_QUOTES, 'UTF-8'); ?>">
                <article class="movie-title">
                    <h1><?php echo htmlspecialchars($movieDetails['naam'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <button id="reserveren">Reserveren</button>
                </article>    
            </article>
            <p style="text-align: center;">✔ reserveer gemakkelijk online ✔ Reserveringen gemakkelijk te annuleren ✔ 24/7 Support </p>
            <article class="movie-desc">
                <article class="movie-rating">
                    <p>Rating: <?php echo htmlspecialchars($movieDetails['rating'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Duur: <?php echo htmlspecialchars($movieDetails['duur'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <article class="movie-release">
                    <p>Release: <?php echo htmlspecialchars($movieDetails['datum'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <br>
                    <p><?php echo htmlspecialchars($movieDetails['beschrijving'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article> 
            </article>
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>