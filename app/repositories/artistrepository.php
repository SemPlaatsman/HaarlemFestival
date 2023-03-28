<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';
class ArtistRepository extends Repository
{



    public function insert(string $name): bool
    {
        $stmnt = $this->connection->prepare("INSERT INTO artist (name) VALUES (:name)");
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        return $stmnt->execute();
    }

    public function update(int $id, string $name): bool
    {
        $stmnt = $this->connection->prepare("UPDATE artist SET name = :name WHERE id = :id");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        return $stmnt->execute();
    }

    public function delete(int $id): bool
    {
        $stmnt = $this->connection->prepare("DELETE FROM artist WHERE id = :id");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmnt->execute();
    }

    /*public function get(int $id): Artist
    {
    $stmnt = $this->connection->prepare("SELECT `id`, `name` FROM artist WHERE id = :id");
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Artist');
    $stmnt->execute();
    $artist = $stmnt->fetch();
    return $artist;
    }
    public function getAll(): array
    {
    $stmnt = $this->connection->prepare("SELECT `id` ,`name` FROM artist;");
    $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Artist');
    $stmnt->execute();
    $artist = $stmnt->fetchAll();
    return $artist;
    }*/



    public function get(int $id): Artist
    {
        $stmnt = $this->connection->prepare("SELECT `id`, `name` FROM artist WHERE id = :id");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();
        $artist = $stmnt->fetch();
        $artistObject = new Artist($artist["id"], $artist["name"]);
        if ($artist === false) {
            throw new Exception('Artist not found');
        }
        return $artistObject;
    }

    public function getAll(): array
    {
        $artists = array();
        $stmnt = $this->connection->prepare("SELECT `id` ,`name` FROM artist;");
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();
        $artist = $stmnt->fetchAll();
        foreach ($artist as $row) {
            $artistObject = new Artist($row['id'], $row['name']);
            array_push($artists, $artistObject);
        }
        return $artists;
    }
}