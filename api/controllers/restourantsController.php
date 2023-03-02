<?php
//controller class for a rest api


include_once __DIR__ . '/../helpers/jsonHelper.php';
include_once __DIR__ . '/../helpers/objectHelper.php';

class RestourantController
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
        echo "get restourant";
        return true;
        // if (!is_null($id)) {
        //     $restourant = $this->service->getRestourant($id);
        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $restourant; //might need to make different functions for single and multiple

        //     if ($this->objectHelper->checkEmpty($restourant)) {

        //         return false;
        //     }

        //     $this->jsonHelper->printJson($array);
        //     return true;
        // } else {

        //     $restourants = $this->service->getRestourants();
        //     $this->jsonHelper->printJson($restourants);
        //     return true;
        // }
    }

    public function create(int $id = null, Object $data): bool
    {
        echo "create restourant";
        return true;

        // $restourant = $this->MakeRestourant($data, $id);

        // $insertedRestourant = $this->service->createRestourant($restourant);
        // if (!is_null($insertedRestourant)) {

        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $insertedRestourant; //might need to make different functions for single and multiple

        //     $this->jsonHelper->printJson($array);

        //     return true;
        // }
        // return false;
    }

    public function update(int $id = null, Object $data): bool
    {
        echo "update restourant";
        return true;

        // $restourant = $this->MakeRestourant($data, $id);

        // $updatedRestourant = $this->service->updateRestourant($restourant);
        // if (!is_null($updatedRestourant)) {

        //     $array = array();    //janky hack to make it work with the jsonHelper 
        //     $array[0] = $updatedRestourant; //might need to make different functions for single and multiple

        //     $this->jsonHelper->printJson($array);

        //     return true;
        // }
    }
}
