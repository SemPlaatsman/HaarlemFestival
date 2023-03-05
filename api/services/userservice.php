<?php
require_once __DIR__ . '/../repository/userrepository.php';
require_once __DIR__ . '/../models/user.php';

class UserService{
    function getUser(int $id) : User
    {
        $repository = new UserRepository();
        try {
            $Users = $repository->get($id);
        } catch (Exception $e) {
            $Users = new User();
        } 
        return $Users;
    }
    
    function getUsers() : array 
    {
        $repository = new UserRepository();
        if(!$repository->getAll()){
            
            return array();
        }
   

        return $repository->getAll();
    }

    function createUsers(User $User) : User
    {
        $repository = new UserRepository();
        $id = $repository->insert($User->name, $User->email, $User->password, $User->time_created, $User->role);
        return $this->getUser($id);
    }

    function updateUsers(int $id, User $updatedUsers) : User
    {
        $repository = new UserRepository();
        $returnedID = $repository->update($id,$updatedUsers->name, $updatedUsers->email, $updatedUsers->password, $updatedUsers->time_created, $updatedUsers->role);
        $retrievedUser = $this->getUser($id);
        if($updatedUsers->name == $retrievedUser->name){
            return $retrievedUser;
        }

        return null;
    }

    function deleteUsers(int $id) : bool
    {
        $repository = new UserRepository();
        return $repository->delete($id);
    }
}
?>