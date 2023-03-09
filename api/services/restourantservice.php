<?php
require_once __DIR__ . '/../repository/restourantrepository.php';
require_once __DIR__ . '/../models/restourant.php';
class RestourantService{

    private $repository;

    function __construct()
    {
        $this->repository = new RestourantRepository();
    }

    function getRestourant(int $id) : ?Restourant
    {
        try {
            $Restourant = $this->repository->get($id);
        } catch (Exception $e) {
            throw new ServiceException('Error getting restourant: ' . $e->getMessage(), 404);
        } 
        return $Restourant;
    }
    
    function getRestourants() : array 
    {
        try{

        $Restourants = $this->repository->getAll();
        return $Restourants ?? [];
        }catch(Exception $e){
            throw new ServiceException("An error occurred while retrieving the list of restourants.".$e->getMessage(), 500);
        }
    }

    function createRestourant(Restourant $Restourant) : Restourant
    {
        $id = $this->repository->insert($Restourant->name, $Restourant->seats);
        return $this->getRestourant($id);
    }

    function updateRestourant(int $id, Restourant $updatedRestourant) : Restourant
    {
        $repository = new RestourantRepository();
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