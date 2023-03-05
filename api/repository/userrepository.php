<?php
require_once __DIR__ . '/../repository/repository.php';

class UserRepository extends Repository
{
    //complete this class as User repository for the user table

    public function insert(string $name, string $address,string $password, string $date, bool $isadmin ): int
    {
        $stmnt = $this->connection->prepare("INSERT INTO `Users` (email, password, time_created, role, name) VALUES (:email,:password,:date,:admin,:name);");
        $stmnt->bindParam(':email', $address, PDO::PARAM_STR);
        $stmnt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmnt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmnt->bindParam(':admin', $isadmin, PDO::PARAM_STR);
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt->execute();
        return $this->connection->lastInsertId();
    }

    public function update(int $id, string $name, string $email,string $password, string $date, bool $isadmin): int
    {
        $stmnt = $this->connection->prepare("UPDATE `Users` SET email=:email , password = :password, time_created = :date, role = :admin , name =:name WHERE id=:id;");
        $stmnt->bindParam(':email', $address, PDO::PARAM_STR);
        $stmnt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmnt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmnt->bindParam(':admin', $Isadmin, PDO::PARAM_STR);
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt->bindParam(':id', $name, PDO::PARAM_STR);
        $stmnt->execute();
        return $this->connection->lastInsertId();
    }

    public function delete(int $id): int
    {
        $stmnt = $this->connection->prepare("DELETE FROM `Users` WHERE id = :id;");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->execute();
        return $this->connection->lastInsertId();
    }

    public function get(int $id): User
    {
        $stmnt = $this->connection->prepare("SELECT `id`, `email`, `password`, `time_created`, `role`, `name` FROM `Users` WHERE id = :id;");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute();
        $artist = $stmnt->fetch();
        if ($artist === false) {
            throw new Exception('User not found');
        }
        return $artist;
    }
    public function getAll(): array
    {
        $stmnt = $this->connection->prepare("SELECT `id`, `email`, `password`, `time_created`, `role`, `name`  FROM `Users`;");
        $stmnt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmnt->execute();
        $artist = $stmnt->fetchAll();
        return $artist;
    }
}

