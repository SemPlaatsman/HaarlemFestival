<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/useroverview.php';
require_once __DIR__ . '/../models/user.php';

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

    public function getUserByEmail(string $email){
        try {
            $stmt = $this->connection->prepare("SELECT `id`, `email`, `time_created`, `is_admin`, `name` FROM `users` WHERE email=:email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
            if (!empty($result) && (isset($result['id']) && isset($result['email']) && isset($result['is_admin']) && isset($result['name']))) {
                return new User($result['id'], $result['email'], boolval($result['is_admin']), $result['name']);
            }
            return null;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertUser(string $email, string $password, DateTime $time_created, bool $isAdmin, string $name)
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

    public function updateUser(int $id, string $email, string $password, bool $isAdmin, string $name): int
    {
        try {
            // hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Update a user
            $stmnt = $this->connection->prepare("UPDATE `users` SET email=:email, password = :password, is_admin = :isAdmin, name =:name WHERE id=:id");

            // Bind the parameters
            $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmnt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmnt->bindParam(':isAdmin', $isAdmin, PDO::PARAM_BOOL);
            $stmnt->bindParam(':name', $name, PDO::PARAM_STR);

            $stmnt->execute();

            if ($stmnt->rowCount() == 0) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }
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

    public function deleteKey(string $key)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `password_reset_temp` WHERE `key`=:key");
            $stmt->bindParam(':key', $key, PDO::PARAM_INT);
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

    public function checkResetKey(string $email, string $key) : bool{
        try {
            $stmt = $this->connection->prepare("SELECT expDate FROM password_reset_temp WHERE `key`=:key AND email=:email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':key', $key, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
            if (!empty($result) && (isset($result['expDate']))) {
                $currentDate = date("Y-m-d H:i:s");
                return $result['expDate'] >= $currentDate;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    

    public function resetPassword(string $email, string $password)
    {
        try {
            // hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Update a user
            $stmnt = $this->connection->prepare("UPDATE `users` SET email=:email, password = :password WHERE email=:email");

            // Bind the parameters
            $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmnt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

            $stmnt->execute();

            if ($stmnt->rowCount() == 0) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addResetTocken(string $email, string $key, string $expDate){
        try {
            
            // Create a reset token
            $stmt = $this->connection->prepare("INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ( :email, :key, :expDate)");

            // Bind the parameters
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':key', $key, PDO::PARAM_STR);
            $stmt->bindParam(':expDate', $expDate, PDO::PARAM_STR);
            
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}