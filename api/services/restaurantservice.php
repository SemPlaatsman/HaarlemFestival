<?php
require_once __DIR__ . '/../repositories/restaurantrepository.php';
require_once __DIR__ . '/../models/restaurant.php';
class RestaurantService{

    private $repository;

    function __construct()
    {
        $this->repository = new RestaurantRepository();
    }

    function getRestaurant(int $id) : ?Restaurant
    {
        try {
            $Restaurant = $this->repository->get($id);
        } catch (Exception $e) {
            throw new ServiceException('Error getting restaurant: ' . $e->getMessage(), 404);
        } 
        return $Restaurant;
    }
    
    function getRestaurants() : array 
    {
        try{

        $Restaurants = $this->repository->getAll();
        return $Restaurants ?? [];
        }catch(Exception $e){
            throw new ServiceException("An error occurred while retrieving the list of restaurants.".$e->getMessage(), 500);
        }
    }

    function createRestaurant(Restaurant $Restaurant) : Restaurant
    {

        try {
            $restaurantId = $this->repository->insert($Restaurant->getName(), $Restaurant->getSeats(), $Restaurant->getLocation(), $Restaurant->getAdultPrice(), $Restaurant->getKidsPrice(), $Restaurant->getReservationFee());
            $Restaurant->id=$restaurantId;

            return $Restaurant;
        } catch (Exception $e) {
            throw new ServiceException('Failed to create restaurant: ' . $e->getMessage());
        }


    }

    function updateRestaurant(int $id, Restaurant $updatedRestaurant) : Restaurant
    {
        try{
            $this->repository->update($id, $updatedRestaurant->getName(), $updatedRestaurant->getSeats(), $updatedRestaurant->getLocation(), $updatedRestaurant->getAdultPrice(), $updatedRestaurant->getKidsPrice(), $updatedRestaurant->getReservationFee());
            return $this->repository->get($id);
        }
        catch(Exception $e){
            throw new ServiceException('Failed to update restaurant: ' . $e->getMessage());
        }
    }

    function deleteRestaurant(int $id) : void
    {
        try {
            $this->repository->delete($id);
        } catch (Exception $e) {
            throw new ServiceException('Failed to delete restaurant: ' . $e->getMessage());
        }
    }
    
}