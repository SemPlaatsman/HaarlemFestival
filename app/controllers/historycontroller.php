<?php

use JetBrains\PhpStorm\Language;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/tour.php';

require_once __DIR__ . '/../services/historytourservice.php';
require_once __DIR__ . '/../services/itemservice.php';

require_once  'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';

/**
 * Summary of HistoryController
 */
class HistoryController extends Controller {
    private $historyService;
    protected $schedule;
    function __construct() {
        $this->historyService = new HistoryTourService();
    }

    public function index() {
       
     
        // $this->schedule = $this->getSchedule(0);


        $this->displayView();


    }

    /**
     * Summary of getSchedule
     * @param string $language
     * @param int|null $week
     * @param int|null $year
     * @return Tour|array
     */
    public function getSchedule(String $language,?int $week =null, ?int $year=null) {
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        $tours = $this->historyService->getToursByLang($language);
        $data = array();
        
        foreach ($tours as $tour) {
           array_push($data,$tour->toObject());
        }
        echo json_encode($data);

    }


    // private function printschedulephp(){
    //     $tours = $this->historyService->getToursByLang($language);

    //     $dates =  array();
    //           foreach ($tours as $row) {

    //             if (!in_array($row->getDate()->format("F j"), $dates)) {
    //               array_push($dates, $row->getDate()->format("F j"));
    //               echo "<tr>";
    //               echo "<td class='border-0 rounded-pill bg-transparent'>" . $row->getDate()->format("F j") . "</td>";

    //               foreach ($this->schedule as $time) {
    //                 if ($row->getDate()->format("F j") == $time->getDate()->format("F j")) {
    //                   echo "<td class='border-0 rounded-pill bg-primary-a text-center'>" . $time->getDate()->format("H:i") . "</td>";
    //                 }
    //               }
    //               echo "</tr>";
    //             }
    //           }
    // }

    // public function insertItem()
    // {
    //     try {
    //         $id = 10;
    //         $order_id = 2;
    //         $event_id = 2;
    //         $total_price = 1;
    //         $VAT = 1;
    //         $QR_Code = 1;
    //         $item = new Item($id, $order_id, $event_id, $total_price, $VAT, $QR_Code);

    //         $result = $this->itemService->deleteItem(10);

    //         if ($result) {
    //             // return success response
    //             echo 'insert complete item';
    //         } else {
    //             // return failed response
    //             echo 'Something went wrong with the insert';
    //         }
    //     } catch (Exception $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }
}
