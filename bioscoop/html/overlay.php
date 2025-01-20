<section class="overlay">
    <article id="overlayTitel">
        <label id="closeMenu"><p>✕</p></label>
    </article>
        <article id="overlay-Menu">
            <a href="Home.php">Home</a>
            <a href="films.php">Films</a>
            <a href="contact.php">Contact</a>
            <a href="Beveiliging.php">Beveiliging</a>
            
            <?php if (User::isLoggedIn()): ?>
                <a href="account.php"><button id="loginButton">Account</button></a>
            <?php else: ?>
                <a href="login.php"><button id="loginButton">Inloggen</button></a>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="Beheer.php" style="color: #633a49;">Admin</a>
                <?php endif; ?>
        </article>
</section>