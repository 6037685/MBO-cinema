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
        <script defer src="index.js"></script>
    </head>
    <body>
       <?php 
            include 'header.php';
       ?>
       
 <main>
    <section class="contact-container">
        <article class='contact-layer'>
        <h1>Contact</h1>
        <p>Lorem ipsum dolor sit amet et delectus accommodare his consul copiosae legendo.</p>
        </article>
        <article class="content">
            <!-- Contactinformatie -->
            <article class="contact-info">
                <h2>Contact informatie</h2>
                <p>📞 0612345678</p>
                <p>✉️ gmail.com</p>
                <p>📍 Locatie</p>
                <div class="maps">MAPS</div>
            </article>
            <article class="contact-form">
                <h2>Bericht ons</h2>
                <form>
                    <input type="text" placeholder="Je naam" required>
                    <input type="email" placeholder="Je email" required>
                    <input type="tel" placeholder="Je telefoonnummer">
                    <textarea placeholder="Waar kunnen we mee helpen" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </article>
        </article>
        </section>
    </main>
    <?php 
    
    include 'footer.php';

    ?>
    </body>
</html>