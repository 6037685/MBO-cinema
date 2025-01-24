<?php require_once 'Class/User.php'; ?>
<head>
<link rel="stylesheet" type="text/css" href="Css/styl.css">
<link rel="stylesheet" type="text/css" href="Css/overlay.css">
</head>

<?php require_once 'overlay.php'; ?>

<section id="headerBox">
    <header id="head">
        <nav class="menu">
            <h1>MBO<br>Cinema</h1>
            <article id="menu-A">
                <a href="home.php">Home</a>
                <a href="films.php">Films</a>
                <a href="Beveiliging.php">Beveiliging</a>
                <a href="contact.php">Contact</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="Beheer.php" style="color: #633a49;">Admin</a>
                <?php endif; ?>
            </article>
            <article></article>
            <article></article>
    
            
            <?php  if (User::isLoggedIn()): ?>
                <a id="loginWrapper" href="account.php"><button id="loginButton">Account</button></a>
            <?php else: ?>
                <a id="loginWrapper" href="login.php"><button id="loginButton">Inloggen</button></a>
            <?php endif; ?>
            
            <label id="hamburgerWrapper"><button id="loginButton">☰</button></label>
            <script defer src="index.js"></script>
        </nav>
    </header>
</section>