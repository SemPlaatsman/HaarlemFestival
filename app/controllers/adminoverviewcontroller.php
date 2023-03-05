<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/eventservice.php';

class AdminOverviewController extends Controller
{
    private $venueService;
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
        $this->venueService = new VenueService();
    }

    public function index()
    {
        try {
            $event = $this->eventService->getEvent();
            $venue = $this->venueService->getVenue();
            $data = [
                'venue' => $venue,
                'event' => $event
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
            $dateStr = htmlspecialchars($_POST['date']);
            $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateStr);
            $address = htmlspecialchars($_POST['address']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->insertVenue($name, $date, $address, $seats);

            if ($result) {
                // return success response
                echo 'insert complete venue';
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
                echo 'Update complete venue';
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

    public function insertEvent()
    {
        try {
            $name = htmlspecialchars($_POST['name']);
            $dateStr = htmlspecialchars($_POST['date']);
            $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateStr);

            $result = $this->eventService->insertEvent($name, $date);

            if ($result) {
                // return success response
                echo 'insert complete event';
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateEvent()
    {
        try {
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $dateStr = htmlspecialchars($_POST['date']);
            $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateStr);

            $result = $this->eventService->updateEvent($id, $name, $date);

            if ($result) {
                // return succes response
                echo 'Update complete event';
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteEvent()
    {
        try {
            $id = htmlspecialchars($_POST['id']);
            $result = $this->eventService->deleteEvent($id);
            if ($result) {
                // return success response
                echo 'Event deleted';
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