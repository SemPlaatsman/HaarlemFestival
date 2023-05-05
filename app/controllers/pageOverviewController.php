<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
class pageOverviewController extends Controller {
    public function index()
    {
        $this->displayView();

    }
}
?>

