<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
require_once __DIR__ . '/../handler/contenthandler.php';

class YummyController extends Controller
{
    private $pageService;

    function __construct()
    {
        $this->pageService = new PageService();
    }

    public function index()
    {
        try {
            $pages = $this->pageService->getContent(explode("?", $_SERVER['REQUEST_URI'])[0]);
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }
            $this->displayView($pages);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateContent()
    {
        updateContent($this->pageService);
    }

    public function addTicket(){
        
    }
}
?>