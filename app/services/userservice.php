<?php
require_once __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    public function getUser()
    {
        $repository = new UserRepository();

        return $repository->getUser();
    }

    public function deleteUser(int $id)
    {
        $repository = new UserRepository();

        return $repository->deleteUser($id);
    }

    public function insertUser(string $email, string $password, DateTime $time_created, bool $isAdmin, string $name)
    {
        $repository = new UserRepository();
        return $repository->insertUser($email, $password, $time_created, $isAdmin, $name);
    }

/*
public function updateUser(int $id, string $name, DateTime $start_date, DateTime $end_date)
{
$repository = new UserRepository();
return $repository->updateEvent($id, $name, $start_date, $end_date);
}*/
}
?>