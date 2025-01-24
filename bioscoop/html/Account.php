<?php
    session_start(); // Start the session at the beginning of the script
    require_once 'Class/User.php';
    require_once 'Logout.php';
    require_once 'Class/Reservation.php';

    if(!User::isLoggedIn()) {
        header('Location: login.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $reservation = new Reservation();
    $reservations = $reservation->fetchByUserId($user_id);

    $user = new User();
    $userDetails = $user->fetchUserDetails($_SESSION['user']);
?>
                
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom op de accountpagina van Mbo Cinema. Bekijk hier je accountinformatie, reserveringen en meer!">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="Account, Mbo Cinema, films, bioscoop">
    <title>Home pagina</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script defer src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="accountWrapper">
            <article class="accountNavWrapper">
                <nav class="accountNav">
                    <ul>
                        <li><a href="#">Account Informatie</a></li><hr>
                        <li><a href="#">Wachtwoord Veranderen</a></li><hr>
                        <li><a href="#">Mijn reserveringen</a></li><hr>
                        <li><a href="#">Uitloggen</a></li>
                    </ul>
                </nav>
            </article>

            <article class="accountContent">

                <section class="accountInfo">
                    <h2>Account Informatie</h2>
                    <p>Gebruikersnaam: <?php echo htmlspecialchars($userDetails['username'], ENT_QUOTES, 'UTF-8')?></p>
                    <p>Email: <?php echo htmlspecialchars($userDetails['email'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Telefoonnummer: <?php echo htmlspecialchars($userDetails['telnmr'], ENT_QUOTES, 'UTF-8'); ?></p>
                </section>
                <hr>
                <section class="wachtwoord">
                    <h2>Wachtwoord Veranderen</h2>
                    <form method="POST">
                        <label for="oldPassword">Oud wachtwoord</label>
                        <input type="password" id="oldPassword" name="oldPassword" placeholder="Oud wachtwoord" required>
                            
                        <label for="newPassword">Nieuw wachtwoord</label>
                        <input type="password" id="newPassword" name="newPassword" placeholder="Nieuw wachtwoord" required>
                            
                        <label for="confirmPassword">Bevestig wachtwoord</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Bevestig wachtwoord" required>
                         
                        <article class="forgot-password">
                            <a href="#">Wachtwoord vergeten?</a>
                        </article>
                        
                        <button type="submit">Wachtwoord veranderen</button>
                    </form>
                </section>
                <hr>
                <article class="movies-layer">
                <h2>Reservations</h2>
                <table id="movies-table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Datum</th>
                            <th>Afbeelding</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php if (!empty($reservations)): ?>
                                <?php foreach ($reservations as $reservation): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($reservation['movie_naam'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($reservation['reservation_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><img src="<?php echo htmlspecialchars($reservation['movie_cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($reservation['movie_naam'], ENT_QUOTES, 'UTF-8'); ?>"></td>
                                        <td>
                                            <form method="POST" action="delete_reservation.php" style="display:inline;">
                                                <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($reservation['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <button type="submit" class="reservation-button" onclick="return confirm('Weet je zeker dat je deze reservering wilt verwijderen?')">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">Geen reserveringen gevonden.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                </table>
            </article>
                <hr>
                <section class="uitloggen">
                    <form method="POST">
                        <button type="submit" name="logout">Uitloggen</button>
                    </form>
                </section>
            </article>   
        </section>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>