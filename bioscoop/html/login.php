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
        <script defer src="js/index.js"></script>
    </head>
    <body>
       <?php 
       
       include 'header.php';
       
       ?>
<main>
    <section class="login-container">
        <article class="login-form">    
            <h2>Login form</h2>
            <form>
                <label for="username">Gebruikersnaam</label>
                <input type="text" id="username" name="username" placeholder="Gebruikersnaam">
                
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" placeholder="Wachtwoord">
                
                <article class="forgot-password">
                    <a href="#">Wachtwoord vergeten</a>
                </article>
                
                <button type="submit">Login</button>
            </form>
            <article class="register">
                <p>Geen account? <a href="#">registreer nu</a></p>
            </article>
        </article>
        <article class="login-image">
            <img src="placeholder.jpg" alt="Placeholder afbeelding">
        </article>
        </section>
</main>
    <?php 
    
    include 'footer.php';

    ?>
    </body>
</html>