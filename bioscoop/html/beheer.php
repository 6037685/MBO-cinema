<?php
session_start();
require_once 'Class/Movie.php'; // Include the Movie class
require_once 'Class/User.php';
require_once 'Class/Reservation.php';



// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: home.php');
    exit();
}

$movie = new Movie();
$user = new User();
$reservation = new Reservation();

$AdminDetails = $user->fetchUserDetails($_SESSION['user']);
$usernames = $user->UserFetchAllUsenames();
$reservations = $reservation->fetchAllWithUserDetails();

// Form handeler for adding and updating movies
if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['movie-submit']) ) {
    $movie->setNaam(htmlspecialchars($_POST['naam'], ENT_QUOTES, 'UTF-8'));
    $movie->setBeschrijving(htmlspecialchars($_POST['beschrijving'], ENT_QUOTES, 'UTF-8'));
    $movie->setDuur(htmlspecialchars($_POST['duur'], ENT_QUOTES, 'UTF-8'));
    $movie->setDatum(htmlspecialchars($_POST['datum'], ENT_QUOTES, 'UTF-8'));
    $movie->setRating(htmlspecialchars($_POST['rating'], ENT_QUOTES, 'UTF-8'));
    $movie->setCover(htmlspecialchars($_POST['cover'], ENT_QUOTES, 'UTF-8'));
    $movie->setBackground(htmlspecialchars($_POST['background'], ENT_QUOTES, 'UTF-8'));

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update movie
        if ($movie->update(htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'))) {
            $_SESSION['bericht'] = '<p class="success">Film succesvol opgeslagen.</p>';
        } else {
            $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het opslaan van de film.</p>';
        }
    } else {
        // Create new movie
        if ($movie->create()) {
            $_SESSION['bericht'] = '<p class="success">Film succesvol opgeslagen.</p>';
        } else {
            $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het opslaan van de film.</p>';
        }
    }
    header('Location: beheer.php');
    exit();
}

// Handle deletion of movies
if (isset($_GET['delete'])) {
    if ($movie->delete(htmlspecialchars($_GET['delete'], ENT_QUOTES, 'UTF-8'))) {
        $_SESSION['bericht'] = '<p class="success">Film succesvol verwijderd.</p>';
    } else {
        $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het verwijderen van de film.</p>';
    }
    header('Location: beheer.php');
    exit();
}

// Handle form submission for appointing an admin
if (isset($_POST['appoint_admin'])) {
    if (isset($_POST['username'], $_POST['action'])) {
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $action = htmlspecialchars($_POST['action'], ENT_QUOTES, 'UTF-8');

        if ($action === 'appoint') {
            $role = 1; // Role 1 for admin
            $message = 'Gebruiker succesvol aangesteld als admin.';
        } elseif ($action === 'remove') {
            $role = 0; // Role 0 for regular user
            $message = 'Gebruiker succesvol verwijderd als admin.';
        } else {
            $role = null;
        }

        if ($role !== null && $user->updateUserRole($username, $role)) {
            $_SESSION['bericht'] = '<p class="success">' . $message . '</p>';

            if ($username === $_SESSION['user']) {
                // Log out the current user
                session_unset();
                session_destroy();
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het bijwerken van de rol.</p>';
        }
        header('Location: beheer.php');
        exit();
    }
}
// Fetch movies from the database
$movies = $movie->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Beheer films in Mbo Cinema.">
    <meta name="author" content="Kishan & Julian">
    <meta name="keywords" content="beheer, films, bioscoop, Mbo Cinema">
    <title>Beheer Films - Mbo Cinema</title>
    <link rel="stylesheet" type="text/css" href="Css/styl.css">
    <link rel="stylesheet" type="text/css" href="Css/overlay.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="Beheer-info">
            <h1>Beheerder paneel</h1>
            <h2><b>Welkom <?php echo htmlspecialchars($AdminDetails['username']) ?>!</b></h2>
            <p>
                <p>Dit is de beheerder paneel.</p>
                <p>Je kan films toevoegen, bewerken en verwijderen.</p>
                <p>Ook kan je nieuwe admins toevoegen.</p>
                <p>Daarnaast is het ook mogelijk om alle reserveringen te beheren.</p>
                <a href="home.php">Terug naar home ➤</a>
            </p>
        </section>
        
        <section class="beheer-container">
            <h1 class="Beheer-h1">Beheer Films</h1>
            <article class="beheer-layer">
                <form method="POST" action="beheer.php" class="beheer-form">
                    <h2>Film Toevoegen</h2>
                    <p>Voeg een nieuwe film toe of bewerk een bestaande film.</p>
                    <input type="hidden" name="id" id="movie-id">
                    <label for="naam">Naam:</label>
                    <input type="text" name="naam" id="naam" required>
                    <label for="beschrijving">Beschrijving: <i>max 500 woorden</i></label>
                    <textarea name="beschrijving" id="beschrijving" required></textarea>
                    <label for="duur">Duur:</label>
                    <input type="text" name="duur" id="duur" required>
                    <label for="datum">Datum:</label>
                    <input type="date" name="datum" id="datum" required>
                    <label for="rating">Rating:</label>
                    <input type="text" name="rating" id="rating" required>
                    <hr>
                    <p style="color: aquamarine;"><i>Voeg de URL van de afbeelding toe!</i></p>
                    <p style="color: aquamarine;"><i>Bijvoorbeeld: <br> https://m.media-amazon.com/images/M/MV5BYWI2ZWE1NDktYmI1MC00MDAzLWI3MGYtMTgwMjkzNmJjY2ZlXkEyXkFqcGc@._V1_.jpg</i></p>
                    <label for="src">Cover Afbeelding:</label>
                    <p style="color: aquamarine;"><i>Gebruik graag een staand afbeelding!</i></p>
                    <input type="text" name="cover" id="cover" required>
                    <label for="src">Achtergrond Afbeelding:</label>
                    <p style="color: aquamarine;"><i>Gebruik graag een liggend afbeelding!</i></p>
                    <input type="text" name="background" id="background" required>

                    <?php
                        if (isset($_SESSION['bericht'])) {
                            echo $_SESSION['bericht'];
                            unset($_SESSION['bericht']); 
                        }
                    ?>
                    <button type="submit" name="movie-submit">Opslaan</button>
                </form>
            </article>

            <article class="movies-layer">
                <h2>Bestaande Films</h2>
                <table id="movies-table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Beschrijving</th>
                            <th>Duur</th>
                            <th>Datum</th>
                            <th>Rating</th>
                            <th>Afbeelding</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($movies)): ?>
                            <?php foreach ($movies as $movie): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($movie['beschrijving'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($movie['duur'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($movie['datum'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($movie['rating'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><img src="<?php echo htmlspecialchars($movie['cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?>" width="100"></td>
                                    <td>
                                        <button class="movie-button" onclick="editMovie(<?php echo htmlspecialchars(json_encode($movie), ENT_QUOTES, 'UTF-8'); ?>)">Bewerken</button>
                                        <form method="GET" action="beheer.php" style="display:inline;">
                                            <input type="hidden" name="delete" value="<?php echo htmlspecialchars($movie['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                            <button type="submit" class="movie-button" onclick="return confirm('Weet je zeker dat je deze film wilt verwijderen?')">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">Geen films gevonden.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </article>
        </section>
        <!-- Breakpoint -->
        <h1 class="Beheer-h1">Beheer Admins</h1>

        <section class="beheer-admin">
            <form method="POST" action="beheer.php" class="beheer-form">
                <h2>Admins Beheren</h2>
                <p>Voeg een nieuwe admin toe of beheer bestaande admins.</p>
                <label for="username">Gebruikersnaam:</label>
                <select name="username" id="username" required>
                    <?php foreach ($usernames as $username): ?>
                        <option value="<?php echo htmlspecialchars($username['username'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($username['username'], ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="action">Actie:</label>
                <select name="action" id="action" required>
                    <option value="appoint">Toevoegen als admin</option>
                    <option value="remove">Verwijderen als admin</option>
                </select>
                <button type="submit" name="appoint_admin">Toevoegen</button>
            </form>
        </section>

        <h1 class="Beheer-h1">Beheer Reserveringen</h1>
        <section class="beheer-reserveringen">
            <article class="movies-layer">
                <h2>Reserveringen</h2>
                <table id="movies-table">
                    <thead>
                        <tr>
                            <th>Gebruikersnaam</th>
                            <th>Film Naam</th>
                            <th>Datum</th>
                            <th>Afbeelding</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['user_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['movie_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['reservation_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><img src="<?php echo htmlspecialchars($reservation['movie_cover'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($reservation['movie_name'], ENT_QUOTES, 'UTF-8'); ?>" width="100"></td>
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
                                <td colspan="5">Geen reserveringen gevonden.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </article>
        </section>     
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>