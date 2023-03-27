<?php
require_once __DIR__ . '/controller.php';
require_once  'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';

class HistoryDetailController extends Controller {
    public $basedir="/img/png/history/detail/";

    function __construct() {

    }
    public function index(string $page) {
       
     
        $this->basedir.=$page;

        $this->displayView();


    }
}
?>