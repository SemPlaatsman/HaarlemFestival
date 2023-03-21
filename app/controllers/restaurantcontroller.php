<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/restaurantservice.php';

class RestaurantController extends Controller
{
    private $restaurantservice;

    function __construct()
    {
        $this->restaurantservice = new RestaurantService();
    }

    public function index()
    {
        try {
            $restaurant = $this->restaurantservice->getRestaurants();
            $data = [
                'restaurant' => $restaurant
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>