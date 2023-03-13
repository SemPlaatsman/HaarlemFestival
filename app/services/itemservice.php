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
        return $repository->getAllItems();
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
}
?>