<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/components/connect.php');

class Model {
    public function __construct() {
        $this->db = DataBase::getConnection();
    }

    public function getGenre() {
        $query = "SELECT id, title FROM genre";
        $result = $this->db->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function getActor() {
        $query = "SELECT id, name FROM actor";
        $result = $this->db->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    public function getFilmByGenre($id) {
        $query = "SELECT f.name, f.date, f.country, f.quality, f.resolution, f.codec, f.producer, f.director, f.carrier FROM film as f JOIN film_genre AS fg ON fg.id_film = f.id WHERE fg.id_genre = :id";
        $result = $this->db->prepare($query);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmByActor($id) {
        $query = "SELECT f.name, f.date, f.country, f.quality, f.resolution, f.codec, f.producer, f.director, f.carrier FROM film as f JOIN film_actor AS fa ON fa.id_film = f.id WHERE fa.id_actor = :id";
        $result = $this->db->prepare($query);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmByDate($from, $to) {
        $query = "SELECT f.name, f.date, f.country, f.quality, f.resolution, f.codec, f.producer, f.director, f.carrier FROM film as f WHERE f.date >= :from AND f.date <= :to";
        $result = $this->db->prepare($query);
        $result->bindParam('from', $from, PDO::PARAM_STR);
        $result->bindParam('to', $to, PDO::PARAM_STR);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>