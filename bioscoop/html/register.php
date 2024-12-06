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
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="split-section">
        <article class="blank-section"></article>
        <article class="regist-section">
            <section class="login-container">
                <article class="login-form">    
                    <h2>registreer form</h2>
                    <form>
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" id="username" name="username" placeholder="Gebruikersnaam">
                        
                        <label for="Email">Email-adres</label>
                        <input type="Email" id="Email" name="Email" placeholder="Email-adres">

                        
                        <label for="password">Wachtwoord</label>
                        <input type="password" id="password" name="password" placeholder="Wachtwoord">

                        
                        <label for="Telefoonnummer">Telefoonnummer</label>
                        <input type="Telefoonnummer" id="Telefoonnummer" name="Telefoonnummer" placeholder="Telefoonnummer">

                        <button type="submit">registreer</button>
                    </form>
                    <article class="register">
                        <p><a href="#">Account? Login nu!</a></p>
                    </article>
                </article>
            </section>
        </article>
        <article class="image-section"></article>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
