<!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Kishan & Julian">
        <meta name="keywords" content="">
        <title>Mbo cinema</title>
        <link rel="stylesheet" type="text/css" href="Css/styl.css">
        <link rel="stylesheet" type="text/css" href="Css/overlay.css">
        <script defer src="index.js"></script>
    </head>
    <body>
            <?php 
                    include_once 'header.php';
            ?>
            <?php
                        require_once 'overlay.php' 
            ?>
<main>
    <Section class="Placeholder"> 
        <h1></h1>
    </Section>
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
        <section class="info-section">
            <article id="info-article">
                <img src="img/Circle-placeholder.png">
                <h1>Beveiligd</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
            <article id="info-article">
                <img src="img/Circle-placeholder.png">
                <h1>Gemakkelijk tickets reserveren</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
            <article id="info-article">
                <img src="img/Circle-placeholder.png">
                <h1>Contact</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta incidunt voluptate nostrum ullam delectus ut, eum consectetur atque accusantium eius culpa suscipit nobis voluptatum aut distinctio, fugiat magni debitis non.</p>
            </article>
        </section>
</main>
    <?php 
        include_once 'footer.php';
    ?>
    </body>
</html>