<?php
session_start();
require 'database/databasetmp.php'; // Database connection

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'beheerder') {
    header('Location: home.php');
    exit();
}

// Handle form submission for creating and updating movies
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = htmlspecialchars($_POST['naam'], ENT_QUOTES, 'UTF-8');
    $beschrijving = htmlspecialchars($_POST['beschrijving'], ENT_QUOTES, 'UTF-8');
    $duur = htmlspecialchars($_POST['duur'], ENT_QUOTES, 'UTF-8');
    $datum = htmlspecialchars($_POST['datum'], ENT_QUOTES, 'UTF-8');
    $rating = htmlspecialchars($_POST['rating'], ENT_QUOTES, 'UTF-8');
    $src = htmlspecialchars($_POST['src'], ENT_QUOTES, 'UTF-8');

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update movie
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
        $query = "UPDATE movies SET naam = :naam, beschrijving = :beschrijving, duur = :duur, datum = :datum, rating = :rating, src = :src WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
    } else {
        // Create new movie
        $query = "INSERT INTO movies (naam, beschrijving, duur, datum, rating, src) VALUES (:naam, :beschrijving, :duur, :datum, :rating, :src)";
        $statement = $pdo->prepare($query);
    }

    $statement->bindParam(':naam', $naam);
    $statement->bindParam(':beschrijving', $beschrijving);
    $statement->bindParam(':duur', $duur);
    $statement->bindParam(':datum', $datum);
    $statement->bindParam(':rating', $rating);
    $statement->bindParam(':src', $src);

    if ($statement->execute()) {
        header('Location: beheer.php');
        $_SESSION['bericht'] = '<p class="success">Film succesvol opgeslagen.</p>';
        exit();
    } else {
        $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het opslaan van de film.</p>';
        header('Location: beheer.php');
        exit();
    }
}

// Handle deletion of movies
if (isset($_GET['delete'])) {
    $id = htmlspecialchars($_GET['delete'], ENT_QUOTES, 'UTF-8');
    $query = "DELETE FROM movies WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    if ($statement->execute()) {
        $_SESSION['bericht'] = '<p class="success">Film succesvol verwijderd.</p>';
        header('Location: beheer.php');
        exit();
    } else {
        $_SESSION['bericht'] = '<p class="error">Er is een fout opgetreden bij het verwijderen van de film.</p>';
        header('Location: beheer.php');
        exit();
    }
}

// Fetch movies from the database
try {
    $query = "SELECT * FROM movies";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $movies = $statement->fetchAll(); 
} catch (PDOException $e) {
    echo '<p class="error">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
    exit();
}
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
    <link rel="stylesheet" type="text/css" href="Css/overlay.cssIt">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script defer src="js/index.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <main>
        <section class="beheer-container">
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
                    <label for="src">Afbeelding URL:</label>
                    <p style="color: aquamarine;"><i>Voeg de URL van de afbeelding toe!</i></p>
                    <p style="color: aquamarine;"><i>Bijvoorbeeld: <br> https://m.media-amazon.com/images/M/MV5BYWI2ZWE1NDktYmI1MC00MDAzLWI3MGYtMTgwMjkzNmJjY2ZlXkEyXkFqcGc@._V1_.jpg</i></p>
                    <input type="text" name="src" id="src" required>

                    <?php
                        if (isset($_SESSION['bericht'])) {
                            echo $_SESSION['bericht'];
                            unset($_SESSION['bericht']); 
                        }
                    ?>
                    <button type="submit">Opslaan</button>
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
                                    <td><img src="<?php echo htmlspecialchars($movie['src'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($movie['naam'], ENT_QUOTES, 'UTF-8'); ?>" width="100"></td>
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
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>