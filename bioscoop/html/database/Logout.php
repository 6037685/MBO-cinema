<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Destroy the session and redirect to the homepage
    session_destroy();
    header('Location: login.php');
    exit();
}

?>