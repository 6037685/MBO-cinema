<?php
    session_start();
    require_once 'Class/Movie.php';
    $movie = new Movie();
    $movies = $movie->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bekijk de films die we hebben in Mbo Cinema.">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="films, bioscoop, Mbo Cinema, filmvertoning">
    <title>Films Mbo cinema</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="movie-container">
            <h1 id="h1-films">
                <a href="#">Populaire Films<i>></i></a>
            </h1>
            <section class="article-container">
                <?php foreach ($movies as $movie): ?>
                    <article class="movie">
                    <a href="FilmInformatie.php?id=<?php echo htmlspecialchars($movie['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <h2><?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <img src="<?php echo htmlspecialchars($movie['cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                    </article>
                <?php endforeach; ?>
            </section>
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>