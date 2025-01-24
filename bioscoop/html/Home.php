<?php
session_start(); 


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom op de homepagina van Mbo Cinema. Ontdek ons aanbod en meer!">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="home, Mbo Cinema, films, bioscoop">
    <title>Home pagina</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
    <script defer src="js/slideshow.js"></script>

</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="slideshow-container"> 
            <article class='slidesFade'>
            <article class='numberText'>Dark</article>
            <img class="slide-img" src="img/dark.jpg" alt="">
            <article class='slide-text'>Over film</article>
            </article>

            <article class='slidesFade'>
            <article class='numberText'>The Boys</article>
            <img class="slide-img" src="img/the boys.jpg" alt="">
            <article class='slide-text'>Over film</article>
            </article>

            <article class='slidesFade'>
            <article class='numberText'>Spider-Man: Across the Spider-Verse</article>
            <img class="slide-img" src="img/spiderman.webp" alt="">
            <article class='slide-text'>Over film</article>
            </article>
        </section>
        <section class="recent-movies-container">
            <h1 id="h1-recent">
                <a href="#">Populaire Films<i>></i></a>
            </h1>
            <section class="recent-article-container">
                <?php foreach ($ratingMovies as $ratingMovie): ?>
                    <article class="movie">
                        <a href="FilmInformatie.php?id=<?php echo htmlspecialchars($ratingMovie['id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <h2><?php echo htmlspecialchars($ratingMovie['naam'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <img src="<?php echo htmlspecialchars($ratingMovie['cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($ratingMovie['naam'], ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                    </article>
                <?php endforeach; ?>
            </section>
        </section>
        <section class="recent-movies-container">
            <h1 id="h1-recent">
                <a href="#">Recent toegevoegd<i>></i></a>
            </h1>
            <section class="recent-article-container">
                <?php foreach ($recentMovies as $recentMovie): ?>
                    <article class="movie">
                        <a href="FilmInformatie.php?id=<?php echo htmlspecialchars($recentMovie['id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <h2><?php echo htmlspecialchars($recentMovie['naam'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <img src="<?php echo htmlspecialchars($recentMovie['cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($recentMovie['naam'], ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                    </article>
                <?php endforeach; ?>
            </section>
        </section>
        <section class="info-section">
            <article id="info-article">
                <img src="img/secured.jpeg">
                <h1>Beveiligd</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
            <article id="info-article">
                <img src="img/ticket.jpeg">
                <h1>Gemakkelijk tickets reserveren</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
            <article id="info-article">
                <img src="img/telefoon.png">
                <h1>Contact</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>