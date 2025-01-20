<?php
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    User::logout();
    exit();
}
?>