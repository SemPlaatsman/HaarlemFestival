<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/eventservice.php';
require_once __DIR__ . '/../services/artistservice.php';

class AdminOverviewController extends Controller
{
    private $venueService;
    private $eventService;
    private $artistservice;

    function __construct()
    {
        $this->eventService = new EventService();
        $this->venueService = new VenueService();
        $this->artistservice = new ArtistService();
    }

    public function index()
    {
        try {
            $event = $this->eventService->getEvent();
            $venue = $this->venueService->getVenue();
            $artist = $this->artistservice->getArtists();
            $data = [
                'venue' => $venue,
                'event' => $event,
                'artist' => $artist
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
            $location = htmlspecialchars($_POST['location']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->insertVenue($name, $date, $location, $seats);

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
            $location = htmlspecialchars($_POST['location']);
            $seats = htmlspecialchars($_POST['seats']);

            $result = $this->venueService->updateVenue($id, $name, $date, $location, $seats);

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

            $dateStrStart = htmlspecialchars($_POST['start_date']);
            $dateStart = DateTime::createFromFormat('Y-m-d', $dateStrStart);

            $dateStrEnd = htmlspecialchars($_POST['end_date']);
            $dateEnd = DateTime::createFromFormat('Y-m-d', $dateStrEnd);

            $result = $this->eventService->insertEvent($name, $dateStart, $dateEnd);

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

            $dateStrStart = htmlspecialchars($_POST['start_date']);
            $dateStart = DateTime::createFromFormat('Y-m-d', $dateStrStart);

            $dateStrEnd = htmlspecialchars($_POST['end_date']);
            $dateEnd = DateTime::createFromFormat('Y-m-d', $dateStrEnd);

            $result = $this->eventService->updateEvent($id, $name, $dateStart, $dateEnd);

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

    public function insertArtist()
    {
        try {
            //$name = htmlspecialchars($_POST['name']);
            $artist = new Artist();
            $artist->name = htmlspecialchars($_POST['name']);

            $result = $this->artistservice->createArtist($artist);

            if ($result) {
                // return success response
                echo 'insert complete artist';
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateArtist()
    {
        try {
            // $id = htmlspecialchars($_POST['id']);
            //$name = htmlspecialchars($_POST['name']);

            $artist = new Artist();
            $artist->id = intval($_POST['id']);
            $artist->name = htmlspecialchars($_POST['name']);

            $result = $this->artistservice->updateArtist($artist);

            if ($result) {
                // return succes response
                echo 'Update complete artist';
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteArtist()
    {
        try {
            $id = htmlspecialchars($_POST['id']);

            $result = $this->artistservice->deleteArtist($id);
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