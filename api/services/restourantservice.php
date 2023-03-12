<?php
require_once __DIR__ . '/../repository/restourantrepository.php';
require_once __DIR__ . '/../models/restourant.php';
class RestourantService{


    function getRestourant(int $id) : Restourant
    {
        $repository = new RestourantRepository();
        try {
            $Restourant = $repository->get($id);
        } catch (Exception $e) {
            $Restourant = new Restourant();
        } 
        return $Restourant;
    }
    
    function getRestourants() : array 
    {
        $repository = new RestourantRepository();
        if(!$repository->getAll()){
            
            return array();
        }
   

        return $repository->getAll();
    }

    function createRestourant(Restourant $Restourant) : Restourant
    {
        $repository = new RestourantRepository();
        $id = $repository->insert($Restourant->name, $Restourant->seats);
        return $this->getRestourant($id);
    }

    function updateRestourant(int $id, Restourant $updatedRestourant) : Restourant
    {
        $repository = new RestourantRepository();
        $returnedID = $repository->update($id, $updatedRestourant->name, $updatedRestourant->seats);
        $retrievedRestourant = $this->getRestourant($id);
        if($updatedRestourant->name == $retrievedRestourant->name){
            return $retrievedRestourant;
        }

        return null;
    }

    function deleteRestourant(int $id) : bool
    {
        $repository = new RestourantRepository();
        return $repository->delete($id);
    }
    
}