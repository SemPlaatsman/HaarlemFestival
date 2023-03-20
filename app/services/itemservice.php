<?php
require_once __DIR__ . '/../repositories/itemrepository.php';

class ItemService
{
    private $itemRepository;

    function __construct() {
        $this->itemRepository = new ItemRepository();
    }

    public function getItem(int $id) : Item
    {
        return $this->itemRepository->getItem($id);
    }

    function getItems() : array 
    {
        return $this->itemRepository->getAllItems();
    }

    public function insertItem(Item $item) : int
    {
        return $this->itemRepository->insertItem($item);
    }

    public function updateItem(Item $item) : bool
    {
        return $this->itemRepository->updateItem($item);
    }

    public function deleteItem(int $id) : bool
    {
        return $this->itemRepository->deleteItem($id);
    }

    public function insertReservation(Reservation $reservation):int 
    {
        return $this->itemRepository->insertReservation($reservation);
    }

    public function deleteReservation(int $id) : bool
    {
        return $this->itemRepository->deleteReservation($id);
    }

    public function updateReservation(Reservation $reservation):bool 
    {
        return $this->itemRepository->updateReservation($id);
    }

    public function getReservation(int $id) : Item
    {
        return $this->itemRepository->getReservation($id);
    }

    function getReservations() : array 
    {
        return $this->itemRepository->getAllReservations();
    }
}
?>