<section class="overlay">
    <article id="overlayTitel">
        <label id="closeMenu"><p>✕</p></label>
    </article>
        <article id="overlay-Menu">
            <a href="Home.php">Home</a>
            <a href="films.php">Films</a>
            <a href="contact.php">Contact</a>
            <a href="Beveiliging.php">Beveiliging</a>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="account.php"><button id="loginButton">Account</button></a>
            <?php else: ?>
                <a href="login.php"><button id="loginButton">Inloggen</button></a>
            <?php endif; ?>
        </article>
</section>