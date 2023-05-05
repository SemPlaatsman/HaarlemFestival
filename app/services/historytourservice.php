<?php
require_once __DIR__ . '/../repositories/historytourrepository.php';
require_once __DIR__ . '/../models/tour.php';

/**
 * Summary of HistoryTourService
 */
class HistoryTourService
{
    private $HistoryRepository;

    function __construct() {
        $this->HistoryRepository = new HistoryTourRepository();
    }

    /**
     * Summary of getTour
     * @param string $string
     * @return Tour
     */
    public function getToursByLang(int $language = 0) : array
    {


         $languages=array("English", "Dutch", "Chinese");

        return $this->HistoryRepository->getToursByLanguage($languages[$language]);
    }

    public function getAllTours() {
        return $this->HistoryRepository->getAllTours();
    }

    // function getItems() : array 
    // {
    //     return $this->HistoryRepository->getAllItems();
    // }

    // public function insertItem(Item $item) : int
    // {
    //     return $this->HistoryRepository->insertItem($item);
    // }

    // public function updateItem(Item $item) : bool
    // {
    //     return $this->HistoryRepository->updateItem($item);
    // }

    // public function deleteItem(int $id) : bool
    // {
    //     return $this->HistoryRepository->deleteItem($id);
    // }


}
?>