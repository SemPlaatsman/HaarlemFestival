<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
require_once __DIR__ . '/../services/performanceservice.php';
require_once __DIR__ . '/../handler/contenthandler.php';

class DanceController extends Controller
{
    private $pageService;
    private $performanceService;

    public function __construct()
    {
        $this->pageService = new PageService();
        $this->performanceService = new PerformanceService();
    }

    public function index()
    {
        try {
            $pages = $this->pageService->getContent();
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }

            $performance = $this->performanceService->getPerformance();

            $data = [
                'pages' => $pages,
                'performances' => $performance
            ];

            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function updateContent()
    {
        updateContent($this->pageService);
    }
}