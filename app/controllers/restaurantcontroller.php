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
            $restaurants = $this->restaurantservice->getRestaurants();
            $data = [
                'restaurant' => $restaurants
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertRestaurant()
    {
        try {
            $name = htmlspecialchars($_POST['name']);
            $seats = htmlspecialchars($_POST['seats']);
            $location = htmlspecialchars($_POST['location']);
            $adultPrice = htmlspecialchars($_POST['adult_price']);
            $kidsPrice = htmlspecialchars($_POST['kids_price']);
            $reservationFee = htmlspecialchars($_POST['reservation_fee']);

            $result = $this->restaurantservice->createRestaurant($name, $seats, $location, $adultPrice, $kidsPrice, $reservationFee);

            if ($result) {
                // redirect to the same page with a success query parameter
                $_SESSION['success_message'] = 'The restaurant: ' . $name . ' has been successfully inserted.';
                header("Location: /restaurant");
                exit;
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateRestaurant()
    {
        try {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $seats = htmlspecialchars($_POST['seats']);
            $location = htmlspecialchars($_POST['location']);
            $adultPrice = htmlspecialchars($_POST['adult_price']);
            $kidsPrice = htmlspecialchars($_POST['kids_price']);
            $reservationFee = htmlspecialchars($_POST['reservation_fee']);

            $result = $this->restaurantservice->updateRestaurant($id, $name, $seats, $location, $adultPrice, $kidsPrice, $reservationFee);

            if ($result) {
                // redirect to the same page with a success query parameter
                $_SESSION['success_message'] = 'The restaurant with id: ' . $id . ' has been successfully changed.';
                header("Location: /restaurant");
                exit;
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteRestaurant()
    {
        try {
            $id = $_POST['id'];
            $result = $this->restaurantservice->deleteRestaurant($id);

            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The restaurant with id: ' . $id . ' has been successfully inserted.';
                header("Location: /restaurant");
            } else {
                // return failed response
                echo 'Something went wrong with the deletion';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>