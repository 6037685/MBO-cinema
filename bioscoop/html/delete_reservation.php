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

    $reservation->delete($reservation_id);

    header('Location: Home.php');
    exit();
}
?>