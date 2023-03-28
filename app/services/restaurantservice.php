<?php
require_once __DIR__ . '/../repositories/restaurantrepository.php';
require_once __DIR__ . '/../models/restaurant.php';
class RestaurantService
{

    private $repository;

    function __construct()
    {
        $this->repository = new RestaurantRepository();
    }

    function getRestaurant(int $id): ?Restaurant
    {
        try {
            $Restaurant = $this->repository->get($id);
        } catch (Exception $e) {
            throw new Exception('Failed to retrieve restaurant: ' . $e->getMessage());
        }
        return $Restaurant;
    }

    function getRestaurants(): array
    {
        try {

            $Restaurants = $this->repository->getAll();
            return $Restaurants ?? [];
        } catch (Exception $e) {
            throw new Exception('Failed to retrieve restaurants: ' . $e->getMessage());
        }
    }

    /*function createRestaurant(Restaurant $Restaurant): Restaurant
    {
    try {
    $restaurantId = $this->repository->insert($Restaurant->getName(), $Restaurant->getSeats(), $Restaurant->getLocation(), $Restaurant->getAdultPrice(), $Restaurant->getKidsPrice(), $Restaurant->getReservationFee());
    $Restaurant->id = $restaurantId;
    return $Restaurant;
    } catch (Exception $e) {
    throw new Exception('Failed to create restaurant: ' . $e->getMessage());
    }
    }*/

    function createRestaurant(string $name, int $seats, string $location, int $adultPrice, int $kidsPrice, int $reservationFee)
    {
        try {
            return $this->repository->insert($name, $seats, $location, $adultPrice, $kidsPrice, $reservationFee);
        } catch (Exception $e) {
            throw new Exception('Failed to create restaurant: ' . $e->getMessage());
        }
    }

    /*function updateRestaurant(int $id, Restaurant $updatedRestaurant): Restaurant
    {
    try {
    $this->repository->update($id, $updatedRestaurant->getName(), $updatedRestaurant->getSeats(), $updatedRestaurant->getLocation(), $updatedRestaurant->getAdultPrice(), $updatedRestaurant->getKidsPrice(), $updatedRestaurant->getReservationFee());
    return $this->repository->get($id);
    } catch (Exception $e) {
    throw new ServiceException('Failed to update restaurant: ' . $e->getMessage());
    }
    }*/

    function updateRestaurant(int $id, string $name, int $seats, string $location, int $adultPrice, int $kidsPrice, int $reservationFee)
    {
        try {
            return $this->repository->update($id, $name, $seats, $location, $adultPrice, $kidsPrice, $reservationFee);
        } catch (Exception $e) {
            throw new ServiceException('Failed to update restaurant: ' . $e->getMessage());
        }
    }

    function deleteRestaurant(int $id): bool
    {
        try {
            //$this->repository->delete($id);
            return $this->repository->delete($id);
        } catch (Exception $e) {
            throw new ServiceException('Failed to delete restaurant: ' . $e->getMessage());
        }
    }

}