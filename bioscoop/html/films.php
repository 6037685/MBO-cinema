<?php
session_start();
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
        <script defer src="index.js"></script>
    </head>
    <body>
            <?php 
                    include_once 'header.php';
            ?>
<main>
    <section class="movie-container">
        <h1 id="h1-films">
            <a href="#">Populaire Films<i>></i></a>
        </h1>
            <section class="article-container">
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
            </section>
        </section>
        <section class="movie-container">
        <h1 id="h1-films">
            <a href="#">Onlangs Toegevoegd<i>></i></a>
        </h1>
            <section class="article-container">
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
            </section>
        </section>
        <section class="movie-container">
        <h1 id="h1-films">
            <a href="#">Klant Favoriete<i>></i></a>
        </h1>
            <section class="article-container">
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
                <article class="movie"></article>
            </section>
        </section>
</main>
    <?php 
        include_once 'footer.php';
    ?>
    </body>
</html>