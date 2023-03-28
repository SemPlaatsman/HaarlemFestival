<?php
require_once __DIR__ . '/controller.php';

class AdminOverviewController extends Controller
{
    public function index()
    {
        try {
            $this->displayView();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>