<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
require_once __DIR__ . '/../handler/contenthandler.php';
require_once 'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';

class HistoryDetailController extends Controller
{
    private $pageService;
    public $basedir = "/img/png/history/detail/";
    public $title;
    function __construct()
    {
        $this->pageService = new PageService();
    }
    public function index(string $page)
    {


        //$this->basedir .= $page;
        //$this->title = $page;
        //$this->displayView();
        try {
            $this->basedir .= $page;
            $this->title = $page;
            $pages = $this->pageService->getContent();
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

}
?>