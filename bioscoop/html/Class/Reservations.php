<?php
require_once 'Database.php';

class Reservation extends Database {
    private $id;
    private $user_id;
    private $movie_id;
    private $reservation_datum;

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getMovieId() {
        return $this->movie_id;
    }

    public function getReservationDate() {
        return $this->reservation_date;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setMovieId($movie_id) {
        $this->movie_id = $movie_id;
    }

    public function setReservationDate($reservation_date) {
        $this->reservation_date = $reservation_date;
    }

    public function create() {
        $query = "INSERT INTO reservations (user_id, movie_id, reservation_date) VALUES (:user_id, :movie_id, :reservation_date)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $this->user_id);
        $statement->bindParam(':movie_id', $this->movie_id);
        $statement->bindParam(':reservation_date', $this->reservation_date);
        return $statement->execute();
    }

    public function fetchAll() {
        $query = "SELECT * FROM reservations";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function fetchByUserId($user_id) {
        $query = "SELECT * FROM reservations WHERE user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>