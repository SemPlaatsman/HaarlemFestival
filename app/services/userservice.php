<?php
require_once __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    private $userRepository;

    function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function getUser()
    {
        $repository = new UserRepository();

        return $this->userRepository->getUser();
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->deleteUser($id);
    }

    public function insertUser(string $email, string $password, DateTime $time_created, bool $isAdmin, string $name)
    {
        return $this->userRepository->insertUser($email, $password, $time_created, $isAdmin, $name);
    }

    public function updateUser(int $id, string $email, string $password, bool $isAdmin, string $name)
    {
        return $this->userRepository->updateUser($id, $email, $password, $isAdmin, $name);
    }

    public function getUserByEmail(string $email)
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function checkResetKey(string $email, string $key)
    {
        return $this->userRepository->checkResetKey($email, $key);
    }

    public function resetPassword(string $email, string $password)
    {
        return $this->userRepository->resetPassword($email, $password);
    }

    public function addResetTocken(string $email, string $key, string $expDate)
    {
        return $this->userRepository->addResetTocken($email, $key, $expDate);
    }
    
    public function deleteKey(string $email)
    {
        return $this->userRepository->deleteKey($email);
    }
}

?>
