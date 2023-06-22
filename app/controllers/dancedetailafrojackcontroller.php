<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';

class DanceDetailAfrojackController extends Controller
{
    private $pageService;

    public function __construct()
    {
        $this->pageService = new PageService();
    }

    public function index()
    {
        try {
            $pages = $this->pageService->getContent();
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }

            $data = [
                'pages' => $pages
            ];

            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}