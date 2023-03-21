<?php
require_once __DIR__ . '/controller.php';

class HistoryDetailController extends Controller {
    function __construct(string $page) {

        $this->index();
    }
    public function index() {
       
     


        $this->displayView();


    }
}
?>