<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';

class YummyController extends Controller
{
    private $pageService;
    private $restaurantService;

    function __construct()
    {
        $this->pageService = new PageService();
        $this->restaurantService = new RestaurantService();
    }

    public function index()
    {
        $model = [];
        try {
            $pages = $this->pageService->getContent(explode("?", $_SERVER['REQUEST_URI'])[0]);
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }
            $model += ['pages' => $pages];
            $model += ['restaurants' => $this->restaurantService->getRestaurants()];
            $this->displayView($model);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function addTicket()
    {

    }
}
?>