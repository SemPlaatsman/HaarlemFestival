<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';
class ArtistRepository extends Repository {
    


    public function insert(string $name):int {
        $stmnt = $this -> connection -> prepare("INSERT INTO `artist` (name) VALUES (:name)");
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();
    }

    public function update(int $id, string $name) :int {
        $stmnt = $this -> connection -> prepare("UPDATE `artist` SET name = :name WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();
    }

    public function delete(int $id) : int {
        $stmnt = $this -> connection -> prepare("DELETE FROM `artists` WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();

    }

    public function get(int $id) : Artist {
        $stmnt = $this -> connection -> prepare("SELECT `id` ,`name` FROM Artist WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Artist');
        $stmnt -> execute();
        $artist = $stmnt -> fetch();
        if ($artist === false) {
            throw new Exception('Artist not found');
        }
        return $artist;
    }
    public function getAll():array  {
        $stmnt = $this -> connection -> prepare("SELECT `id` ,`name` FROM `artist`;");
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Artist');
        $stmnt -> execute();
        $artist = $stmnt -> fetchAll();
        return $artist;
    }
}