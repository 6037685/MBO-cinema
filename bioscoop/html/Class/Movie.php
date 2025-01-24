<?php
require_once 'Database.php';

class Movie extends Database {
    private $id;
    private $naam;
    private $beschrijving;
    private $duur;
    private $datum;
    private $rating;
    private $cover;
    private $background;


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

    public function getCover() {
        return $this->$cover;
    }
    public function getBackground() {
        return $this->$background;
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

    public function setCover($cover) {
        $this->cover = $cover;
    }
    public function setBackground($background) {
        $this->background = $background;
    }


    public function fetchAll() {
        // Query fetched alle films
        $query = "SELECT * FROM movies";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function fetchById($id) {
        // Query fetched de film op basis van id
        $query = "SELECT * FROM movies WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
    public function fetchRecent() {
        // Query fetched de top 6 films op basis van datum en sorteert deze op datum
        $query = "SELECT * FROM movies ORDER BY datum DESC LIMIT 6";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function fetchRating() {
        // Query fetched de top 6 films op basis van rating
        // Checkt of de rating een getal is, zo niet dan wordt deze als laatste geplaatst
        // Om er voor te zorgen dat de films met nog geen rating niet bovenaan komen te staan.
        $query = "SELECT * FROM movies ORDER BY CASE WHEN rating REGEXP '^[0-9]+([.,][0-9]+)?(/10)?$' THEN 0 ELSE 1 END, CAST(REPLACE(REPLACE(rating, ',', '.'), '/10', '') AS DECIMAL(3,1)) DESC LIMIT 6";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function create() {
        $query = "INSERT INTO movies (naam, beschrijving, duur, datum, rating, cover, background) VALUES (:naam, :beschrijving, :duur, :datum, :rating, :cover, :background)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':naam', $this->naam);
        $statement->bindParam(':beschrijving', $this->beschrijving);
        $statement->bindParam(':duur', $this->duur);
        $statement->bindParam(':datum', $this->datum);
        $statement->bindParam(':rating', $this->rating);
        $statement->bindParam(':cover', $this->cover);
        $statement->bindParam(':background', $this->background);

        return $statement->execute();
    }

  
    public function update($id) {
        $query = "UPDATE movies SET naam = :naam, beschrijving = :beschrijving, duur = :duur, datum = :datum, rating = :rating, cover = :cover, background = :background WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':naam', $this->naam);
        $statement->bindParam(':beschrijving', $this->beschrijving);
        $statement->bindParam(':duur', $this->duur);
        $statement->bindParam(':datum', $this->datum);
        $statement->bindParam(':rating', $this->rating);
        $statement->bindParam(':cover', $this->cover);
        $statement->bindParam(':background', $this->background);
        return $statement->execute();
    }

 
    public function delete($id) {
        $query = "DELETE FROM movies WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
    
}
?>