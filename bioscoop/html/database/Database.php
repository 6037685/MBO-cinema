<?php
abstract class Database  {
    protected $pdo;

    public function __construct() {
        try {
            $host = 'db';
            $dbname = 'Cinema';
            $username = 'root';
            $password = 'root';
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            echo 'Verbinding is niet goed' . $e->getMessage();
        }
    }   
}
?>