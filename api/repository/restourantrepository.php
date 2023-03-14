<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restourant.php';


class RestourantRepository extends Repository{

    public function insert(string $name,int $seats ):int {
        $stmnt = $this -> connection -> prepare("INSERT INTO `Restaurant` (name, seats) VALUES (:name,:seats);");
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt -> bindParam(':seats', $seats, PDO::PARAM_STR);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();
    }

    public function update(int $id, string $name, int $seats) :int {
        $stmnt = $this -> connection -> prepare("UPDATE `Restaurant` SET name = :name , seats= :seats WHERE id = :id;");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt -> bindParam(':seats', $seats, PDO::PARAM_STR);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();
    }

    public function delete(int $id) : int {
        $stmnt = $this -> connection -> prepare("DELETE FROM `Restaurant` WHERE id = :id;");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> execute();
        return $this->connection-> lastInsertId();

    }

    public function get(int $id) : Restourant {
        $stmnt = $this -> connection -> prepare("SELECT `id`, `name`, `seats` FROM `Restaurant` WHERE id = :id ;");
        $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Restourant');
        $stmnt -> execute();
        $artist = $stmnt -> fetch();
        if ($artist === false) {
            throw new Exception('Restournat not found');
        }
        return $artist;
    }
    public function getAll():array  {
        $stmnt = $this -> connection -> prepare("SELECT `id`, `name`, `seats` FROM `Restaurant`;");
        $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Restourant');
        $stmnt -> execute();
        $artist = $stmnt -> fetchAll();
        return $artist;
    }

}