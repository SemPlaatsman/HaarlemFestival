<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/useroverview.php';

class UserRepository extends Repository
{
    //complete this class as User repository for the user table

    public function getUser()
    {
        try {
            // Read all users
            $users = array();
            $stmt = $this->connection->prepare("SELECT `id`, `email`, `time_created`, `is_admin`, `name` FROM `users`");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $user = new UserOverview();
                $user->setId($row['id']);
                $user->setEmail($row['email']);
                $user->setTime_created(new DateTime($row['time_created']));
                $user->setIsAdmin($row['is_admin']);
                $user->setName($row['name']);
                array_push($users, $user);
            }
            return $users;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertUser(string $email, string $password, DateTime $time_created, bool $isAdmin, string $name): int
    {
        try {
            // hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Create a user
            $stmt = $this->connection->prepare("INSERT INTO `users` (`email`, `password`, `time_created`, `is_admin`, `name`) VALUES ( :email, :password, :time_created, :is_admin, :name)");

            $formattedTime_Created = $time_created->format('Y-m-d H:i:s');

            // Bind the parameters
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':time_created', $formattedTime_Created, PDO::PARAM_STR);
            $stmt->bindParam(':is_admin', $isAdmin, PDO::PARAM_BOOL);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateUser(int $id, string $name, string $email, string $password, string $date, bool $isadmin): int
    {
        $stmnt = $this->connection->prepare("UPDATE `users` SET email=:email , password = :password, time_created = :date, name =:name WHERE id=:id;");
        $stmnt->bindParam(':id', $name, PDO::PARAM_INT);
        $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmnt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmnt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmnt->bindParam(':is_admin', $isadmin, PDO::PARAM_STR);
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt->execute();
        return $this->connection->lastInsertId();
    }

    public function deleteUser(int $id): int
    {
        try {
            $stmt = $this->connection->prepare("SELECT `id` FROM `users` WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Record with the given ID does not exist
                return false;
            }

            $stmt = $this->connection->prepare("DELETE FROM `users` WHERE id=:id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Failed to delete the record
                return false;
            }

            return true;
        } catch (PDOException $e) {
            // Handle the exception
            return false;
        }
    }
}