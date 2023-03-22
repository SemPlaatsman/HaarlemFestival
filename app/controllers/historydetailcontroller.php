<?php
require_once __DIR__ . '/controller.php';
require_once  'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';
class HistoryDetailController extends Controller {
    function __construct(string $page) {

    }
    public function index() {
       
     
      
        $this->displayView();


    }
}
?>