<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';
class ArtistRepository extends Repository {
    


    public function insertItem(string $name):bool {
        $stmnt = $this -> connection -> prepare("INSERT INTO Item (name) VALUES (:name)");
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
        return $stmnt -> execute();
    }

    public function updateItem(int $id, string $name) :bool {
        $stmnt = $this -> connection -> prepare("UPDATE Item SET name = :name WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
       return  $stmnt -> execute();
    }

    public function deleteItem(int $id) : bool {
        $stmnt = $this -> connection -> prepare("DELETE FROM Item WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        return $stmnt -> execute();
    }

    public function getItem(int $id) : Item {
        $stmnt = $this -> connection -> prepare("SELECT * FROM Item WHERE id = :id");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
        $stmnt -> execute();
        $artist = $stmnt -> fetch();
        return $artist;
    }
    public function getAllItems():array  {
        $stmnt = $this -> connection -> prepare("SELECT * FROM Item;");
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
        $stmnt -> execute();
        $artist = $stmnt -> fetchAll();
        return $artist;
    }
}