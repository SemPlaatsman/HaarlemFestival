<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class LoginRepository extends Repository
{
    /**
     * Method to validate a user
     * Returns a ?User to check if the user was validated
     * If it returns null the user is invalid
     * If it returns a User the user is validated and can be used in the SESSION data
     * 
     * @param string $email
     * @param string $password
     * 
     * @return ?User
     */
    public function validateUser(string $email, string $password): ?User
    {
        $query = $this->connection->prepare("SELECT id, email, password, is_admin, name FROM users WHERE email=:email LIMIT 1");
        $query->bindParam(":email", $email);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
        if (!empty($result) && (isset($result['id']) && isset($result['email']) && isset($result['is_admin']) && isset($result['name'])) && password_verify($password, $result['password'])) {
            return new User($result['id'], $result['email'], boolval($result['is_admin']), $result['name']);
        }
        return null;
    }
}
?>