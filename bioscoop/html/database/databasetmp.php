<?php
require_once 'database/Database.php';

// verbinding database details
$host = 'db';
$dbname = 'Cinema';
$username = 'root';
$password = 'root';


$db = new Database($host, $dbname, $username, $password);
// PDO verbinding
$pdo = $db->getPDO();
?>