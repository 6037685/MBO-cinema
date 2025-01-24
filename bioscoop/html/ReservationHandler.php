<?php
session_start();
require_once 'Class/Reservation.php';
require_once 'Class/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!User::isLoggedIn()) {
        header('Location: login.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $movie_id = intval($_POST['movie_id']);
    $reservation_date = date('Y-m-d H:i:s');

    $reservation = new Reservation();
    $reservation->setUserId($user_id);
    $reservation->setMovieId($movie_id);
    $reservation->setReservationDate($reservation_date);

    if ($reservation->create()) {
        $_SESSION['message'] = '<p style="text-align: center;" class="success">Reservering succesvol!</p>';
    } else {
        $_SESSION['message'] = '<p style="text-align: center;" class="error">Er is een fout opgetreden bij het maken van de reservering.</p>';
    }

    header('Location: FilmInformatie.php?id=' . $movie_id);
    exit();
}
?>