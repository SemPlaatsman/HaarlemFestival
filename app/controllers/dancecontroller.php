<?php
require_once __DIR__ . '/controller.php';

class DanceController extends Controller
{
    public function index()
    {
        $this->displayView();
    }
}