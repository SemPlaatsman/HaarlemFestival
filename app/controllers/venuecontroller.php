<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';

class VenueController extends Controller
{
    private $venueService;

    function __construct()
    {
        $this->venueService = new VenueService();
    }

    public function index()
    {
        try {
            $venue = $this->venueService->getVenue();
            $data = [
                'venue' => $venue
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertVenue()
    {
        try {
            $name = htmlspecialchars($_POST['name']);
            $location = htmlspecialchars($_POST['location']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->insertVenue($name, $location, $seats);

            if ($result) {
                // redirect to the same page with a success query parameter
                $_SESSION['success_message'] = 'The venue: ' . $name . ' has been successfully inserted.';
                header("Location: /venue");
                exit;
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateVenue()
    {
        try {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $location = htmlspecialchars($_POST['location']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->updateVenue($id, $name, $location, $seats);

            if ($result) {
                // return succes response
                $_SESSION['success_message'] = 'The venue with id: ' . $id . ' has been successfully changed.';
                header("Location: /venue");
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteVenue()
    {
        try {
            $id = $_POST['id'];
            $result = $this->venueService->deleteVenue($id);
            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The venue with id: ' . $id . ' has been successfully deleted.';
                header("Location: /venue");
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