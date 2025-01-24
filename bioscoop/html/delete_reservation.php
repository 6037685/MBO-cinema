<?php
session_start();
require_once 'Class/Reservation.php';
require_once 'Class/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!User::isLoggedIn()) {
        header('Location: login.php');
        exit();
    }

    $reservation_id = intval($_POST['reservation_id']);
    $reservation = new Reservation();

    if ($reservation->delete($reservation_id)) {
        $_SESSION['message'] = '<p class="success">Reservering succesvol verwijderd!</p>';
    } else {
        $_SESSION['message'] = '<p class="error">Er is een fout opgetreden bij het verwijderen van de reservering.</p>';
    }

    header('Location: Home.php');
    exit();
}
?>