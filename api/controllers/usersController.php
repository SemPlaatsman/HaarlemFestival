<?php
//controller class for a rest api
// reads the data from the request and passes it to the service


include_once __DIR__ . '/../helpers/jsonHelper.php';
include_once __DIR__ . '/../helpers/objectHelper.php';

class UserController
{
    private $service;
    private $jsonHelper;
    private $objectHelper;


    public function __construct()
    {
        $this->jsonHelper = new JsonHelper();
        $this->objectHelper = new ObjectHelper();
    }

    public function get(int $id = null): bool
    {

        echo "get user";
        return true;

        // if (!is_null($id)) {
        //     $user = $this->service->getUser($id);
        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $user; //might need to make different functions for single and multiple

        //     if ($this->objectHelper->checkEmpty($user)) {

        //         return false;
        //     }

        //     $this->jsonHelper->printJson($array); 
        //     return true;
        // } else {

        //     $users = $this->service->getUsers();
        //     $this->jsonHelper->printJson($users);
        //     return true;
        // }
    }

    public function create(int $id = null, Object $data): bool
    {
        echo "create user";
        return true;

        // $user = $this->MakeUser($data,$id);

        // $insertedUser = $this -> service -> createUser($user);
        // if (!is_null($insertedUser)){

        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $insertedUser; //might need to make different functions for single and multiple

        //     $this->jsonHelper->printJson($array);

        //     return true;
        // }
        // return false;


    }

    public function update(int $id = null, Object $data): bool
    {
        echo "update user";
        return true;

        // $user = $this->MakeUser($data,$id);

        // $updatedUser = $this -> service -> updateUser($user);
        // if (!is_null($updatedUser)){

        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $updatedUser; //might need to make different functions for single and multiple

        //     $this->jsonHelper->printJson($array);

        //     return true;
        // }
        // return false;
    }

    public function delete(int $id = null): bool
    {
        echo "delete user";
        return true;

        // $deletedUser = $this -> service -> deleteUser($id);
        // if (!is_null($deletedUser)){

        //     $array = array
        // }
    }
}
