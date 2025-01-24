<?php
require_once 'Database.php';

class Reservation extends Database {
    private $id;
    private $user_id;
    private $movie_id;
    private $reservation_date;

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
        // Haal de reserveringen op van de ingelogde gebruiker
        $query = "SELECT reservations.*, movies.naam AS movie_naam, movies.cover AS movie_cover 
                  FROM reservations 
                  JOIN movies ON reservations.movie_id = movies.id 
                  WHERE reservations.user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function delete($reservation_id) {
        $query = "DELETE FROM reservations WHERE id = :reservation_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':reservation_id', $reservation_id);
        return $statement->execute();
    }
}
?>