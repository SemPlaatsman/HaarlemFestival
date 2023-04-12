<?php


require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/tour.php';

require_once __DIR__ . '/../services/historytourservice.php';
require_once __DIR__ . '/../services/itemservice.php';
require_once __DIR__ . '/../services/pageservice.php';

require_once __DIR__ . '/../handler/contenthandler.php';

require_once 'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';

/**
 * Summary of HistoryController
 */
class HistoryController extends Controller
{
    private $historyService;
    private $pageService;
    protected $schedule;
    function __construct()
    {
        $this->historyService = new HistoryTourService();
        $this->pageService = new PageService();
    }

    public function index()
    {
        // $this->schedule = $this->getSchedule(0);

        try {
            $pages = $this->pageService->getContent();
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }
            $this->displayView($pages);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    /**
     * Summary of getSchedule
     * @param string $language
     * @param int|null $week
     * @param int|null $year
     * @return Tour|array
     */
    public function getSchedule(string $language, ?int $week = null, ?int $year = null)
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        $tours = $this->historyService->getToursByLang($language);
        $data = array();

        foreach ($tours as $tour) {

           array_push($data,$tour->toObject());
        }

        echo json_encode($data);

    }


    public function insertItem()
    {
        try {
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateContent()
    {
        updateContent($this->pageService);
    }
}