<?php
session_start();
require_once 'database/Reservation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['movie_id']) && isset($_SESSION['user'])) {
    $movie_id = intval($_POST['movie_id']);
    $user_id = $_SESSION['user_id']; // Assuming you store user ID in session
    $reservation_date = date('Y-m-d H:i:s');

    $reservation = new Reservation();
    $reservation->setUserId($user_id);
    $reservation->setMovieId($movie_id);
    $reservation->setReservationDate($reservation_date);

    if ($reservation->create()) {
        echo "Reservering succesvol!";
    } else {
        echo "Er is een fout opgetreden.";
    }
} else {
    echo "Ongeldige aanvraag.";
}