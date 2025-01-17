<?php

class Movie {
    private $id;
    private $naam;
    private $beschrijving;
    private $duur;
    private $datum;
    private $rating;
    private $src;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function getDuur() {
        return $this->duur;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getSrc() {
        return $this->src;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setBeschrijving($beschrijving) {
        $this->beschrijving = $beschrijving;
    }

    public function setDuur($duur) {
        $this->duur = $duur;
    }

    public function setDatum($datum) {
        $this->datum = $datum;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function setSrc($src) {
        $this->src = $src;
    }

    // Fetch all movies from the database
    public function fetchAll() {
        $query = "SELECT * FROM movies";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a single movie by ID
    public function fetchById($id) {
        $query = "SELECT * FROM movies WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new movie
    public function create() {
        $query = "INSERT INTO movies (naam, beschrijving, duur, datum, rating, src) VALUES (:naam, :beschrijving, :duur, :datum, :rating, :src)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':naam', $this->naam);
        $statement->bindParam(':beschrijving', $this->beschrijving);
        $statement->bindParam(':duur', $this->duur);
        $statement->bindParam(':datum', $this->datum);
        $statement->bindParam(':rating', $this->rating);
        $statement->bindParam(':src', $this->src);
        return $statement->execute();
    }

    // Update an existing movie
    public function update($id) {
        $query = "UPDATE movies SET naam = :naam, beschrijving = :beschrijving, duur = :duur, datum = :datum, rating = :rating, src = :src WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':naam', $this->naam);
        $statement->bindParam(':beschrijving', $this->beschrijving);
        $statement->bindParam(':duur', $this->duur);
        $statement->bindParam(':datum', $this->datum);
        $statement->bindParam(':rating', $this->rating);
        $statement->bindParam(':src', $this->src);
        return $statement->execute();
    }

    // Delete a movie by ID
    public function delete($id) {
        $query = "DELETE FROM movies WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
?>