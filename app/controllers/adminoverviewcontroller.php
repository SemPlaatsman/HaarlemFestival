<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';

class AdminOverviewController extends Controller
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
            $this->displayView($venue);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertVenue()
    {
        try {
            $name = htmlspecialchars($_POST['name']);
            $dateStr = htmlspecialchars($_POST['date']);
            $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateStr);
            $address = htmlspecialchars($_POST['address']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->insertVenue($name, $date, $address, $seats);

            if ($result) {
                // return success response
                echo 'insert complete';
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
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $dateStr = htmlspecialchars($_POST['date']);
            $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateStr);
            $address = htmlspecialchars($_POST['address']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->updateVenue($id, $name, $date, $address, $seats);

            if ($result) {
                // return succes response
                echo 'Update complete';
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
            $id = htmlspecialchars($_POST['id']);
            $result = $this->venueService->deleteVenue($id);
            if ($result) {
                // return success response
                echo 'Venue deleted';
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