<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/openinghourservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';

class OpeningHourController extends Controller
{
    private $openinghourservice;
    private $restaurantservice;

    function __construct()
    {
        $this->openinghourservice = new OpeningHourService();
        $this->restaurantservice = new RestaurantService();
    }

    public function index()
    {
        try {
            $openinghour = $this->openinghourservice->getOpeningHour();
            $restaurant = $this->restaurantservice->getRestaurants();
            $data = [
                'openinghour' => $openinghour,
                'restaurant' => $restaurant
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertOpeningHour()
    {
        try {
            $restaurantId = intval($_POST['restaurant_id']);
            $dayOfWeek = intval($_POST['day_of_week']);

            $openingTimeStr = htmlspecialchars($_POST['opening_time']);
            $openingTime = DateTime::createFromFormat('H:i:s', $openingTimeStr);

            $closingTimeStr = htmlspecialchars($_POST['closing_time']);
            $closingTime = DateTime::createFromFormat('H:i:s', $closingTimeStr);

            $result = $this->openinghourservice->insertOpeningHour($restaurantId, $dayOfWeek, $openingTime, $closingTime);

            if ($result) {
                // redirect to the same page with a success query parameter
                header("Location: /openinghour");
                exit;
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateOpeningHour()
    {
        try {
            $id = $_POST['id'];
            $dayOfWeek = intval($_POST['day_of_week']);

            $openingTimeStr = htmlspecialchars($_POST['opening_time']);
            $openingTime = DateTime::createFromFormat('H:i:s', $openingTimeStr);

            $closingTimeStr = htmlspecialchars($_POST['closing_time']);
            $closingTime = DateTime::createFromFormat('H:i:s', $closingTimeStr);

            $result = $this->openinghourservice->updateOpeningHour($id, $dayOfWeek, $openingTime, $closingTime);

            if ($result) {
                // redirect to the same page with a success query parameter
                header("Location: /openinghour");
                exit;
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteOpeningHour()
    {
        try {
            $id = $_POST['id'];
            $result = $this->openinghourservice->deleteOpeningHour($id);
            if ($result) {
                // return success response
                header("Location: /openinghour");
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